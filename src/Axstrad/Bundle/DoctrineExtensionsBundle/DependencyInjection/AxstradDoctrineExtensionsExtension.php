<?php

namespace Axstrad\Bundle\DoctrineExtensionsBundle\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * This is the class that loads and manages your bundle configuration
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html}
 */
class AxstradDoctrineExtensionsExtension extends Extension
{
    private $entityManagers = array();

    /**
     * {@inheritDoc}
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        $configuration = new Configuration();
        $config = $this->processConfiguration($configuration, $configs);

        $loader = new Loader\XmlFileLoader($container, new FileLocator(__DIR__.'/../Resources/config'));
        $loader->load('services.xml');

        foreach ($config['orm'] as $name => $listeners) {
            foreach ($listeners as $ext => $enabled) {
                $listener = sprintf('axstrad_doctrine_extensions.listener.%s', $ext);
                if ($enabled && $container->hasDefinition($listener)) {
                    $attributes = array('connection' => $name);
                    $definition = $container->getDefinition($listener);
                    $definition->addTag('doctrine.event_subscriber', $attributes);
                }
            }

            $this->entityManagers[$name] = $listeners;
        }

        foreach ($config['class'] as $listener => $class) {
            $container->setParameter(sprintf('axstrad_doctrine_extensions.listener.%s.class', $listener), $class);
        }
    }

    public function configValidate(ContainerBuilder $container)
    {
        foreach (array_keys($this->entityManagers) as $name) {
            if (!$container->hasDefinition(sprintf('doctrine.dbal.%s_connection', $name))) {
                throw new \InvalidArgumentException(sprintf('Invalid %s config: DBAL connection "%s" not found', $this->getAlias(), $name));
            }
        }
    }
}
