<?php
/**
 * This file is part of the Axstrad library.
 *
 * (c) Dan Kempster <dev@dankempster.co.uk>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author Dan Kempster <dev@dankempster.co.uk>
 * @package Axstrad\Bundle\ExtraFrameworkBundle
 */
namespace Axstrad\Bundle\ExtraFrameworkBundle\Request\ParamConverter;

use Doctrine\Common\Persistence\ManagerRegistry;
use PhpOption\Option as PhpOption;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ConfigurationInterface;
use Sensio\Bundle\FrameworkExtraBundle\Request\ParamConverter\DoctrineParamConverter as SensioDoctrineParamConverter;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;


/**
 * Axstrad\Bundle\ExtraFrameworkBundle\Request\ParamConverter\DoctrineParamConverter
 *
 * Extends the standard DoctrineParamConverter so that the Doctrine Entity classname can be specified as a DI container
 * paramerter. Also if the Repository returns a PhpOption\Option object, it's value will be extracted and returned or a
 * NotFoundException will be thrown.
 */
class DoctrineParamConverter extends SensioDoctrineParamConverter
{
    /**
     * @var ContainerInterface
     */
    protected $container = null;

    /**
     * Class constructor
     *
     * @param ContainerInterface $container The application's DI Container
     */
    public function __construct(ManagerRegistry $manager, ContainerInterface $container)
    {
        $this->container = $container;

        parent::__construct($manager);
    }

    /**
     * @uses convertClassParamToClassName
     */
    public function apply(Request $request, ConfigurationInterface $configuration)
    {
        $this->convertClassParamToClassName($configuration);

        if (parent::apply($request, $configuration)==true) {
            // With the addition of the phpoption/phpoption package included as part of Symfony 2.2, it's possible that
            // a PhpOption/Option object will be returned containing the result of the entity lookup. Especially if
            // Axstrad\Doctrine\Orm\EntityManager is used.

            // Fetch the return entity from the request - this is where parent::apply() puts it before returning a bool
            $name = $configuration->getName();
            $entity = $request->attributes->get($name);


            if ($entity instanceof PhpOption) {
                // Get the value from the PhpOption, if it has none then do one of two things
                //  * if the param is optional, return false; Otherwise
                //  * throw a NotFoundHttpException
                $entity = $entity->getOrCall(function() use ($request, $configuration, $name) {
                    $request->attributes->remove($name);

                    if (!$configuration->isOptional()) {
                        throw new NotFoundHttpException(sprintf('%s object not found.', $configuration->getClass()));
                    }
                    else return false;
                });

                // PhpOption has a value so set it to the request, overwriting the PhpOption
                $request->attributes->set($name, $entity);
            }

            return true;
        }
        else return false;
    }

    /**
     * @uses convertClassParamToClassName
     */
    public function supports(ConfigurationInterface $configuration)
    {
        $this->convertClassParamToClassName($configuration);

        return parent::supports($configuration);
    }

    /**
     * Converts a Class parameter to a class name
     *
     * If <em>configuration</em>->getClass() matches /%(.*)%/ then it is interpreted as a DI container parameter; And
     * the DI container is asked for a parameter value using $1 (from the regex) as the key.
     *
     * @param ConfigurationInterface $configuration
     * @return void
     */
    protected function convertClassParamToClassName(ConfigurationInterface $configuration)
    {
        if (preg_match('/^%(.*)%$/', $configuration->getClass(), $matches)) {
            $param = $this->container->getParameter($matches[1]);
            $configuration->setClass($param);
        }
    }
}
