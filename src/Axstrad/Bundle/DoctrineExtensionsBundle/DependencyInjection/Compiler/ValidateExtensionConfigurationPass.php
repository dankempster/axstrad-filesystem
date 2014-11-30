<?php

namespace Axstrad\Bundle\DoctrineExtensionsBundle\DependencyInjection\Compiler;

/**
 * Dependancies
 */
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;

/**
 * Axstrad\Bundle\DoctrineExtensionsBundle\DependencyInjection\Compiler\ValidateExtensionConfigurationPass
 *
 * USe to validate the bundle's configuration
 */
class ValidateExtensionConfigurationPass implements CompilerPassInterface
{
    /**
     * @param ContainerBuilder $container
     */
    public function process(ContainerBuilder $container)
    {
        $container->getExtension('axstrad_doctrine_extensions')->configValidate($container);
    }
}
