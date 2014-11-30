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
namespace Axstrad\Bundle\ExtraFrameworkBundle\DependencyInjection\Compiler;

use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;


/**
 * Axstrad\Bundle\ExtraFrameworkBundle\DependencyInjection\Compiler\OverrideSensioDoctrineParamConverter
 */
class OverrideSensioDoctrineParamConverter implements CompilerPassInterface
{
    public function process(ContainerBuilder $container)
    {
        $definition = $container->getDefinition('sensio_framework_extra.converter.doctrine.orm');
        $definition->setClass(
            $container->getParameter('axstrad_framework.request.doctrine_param_converter.class')
        );
        $definition->addArgument(new Reference('service_container'));
    }
}
