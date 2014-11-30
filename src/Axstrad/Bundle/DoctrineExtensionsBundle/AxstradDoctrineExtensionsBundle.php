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
 */
namespace Axstrad\Bundle\DoctrineExtensionsBundle;

use Axstrad\Bundle\DoctrineExtensionsBundle\DependencyInjection\Compiler\ValidateExtensionConfigurationPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;


/**
 * Axstrad\Bundle\DoctrineExtensionsBundle\AxstradDoctrineExtensionsBundle
 */
class AxstradDoctrineExtensionsBundle extends Bundle
{
    /**
     * {@inheritdoc}
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);
        $container->addCompilerPass(new ValidateExtensionConfigurationPass());
    }
}
