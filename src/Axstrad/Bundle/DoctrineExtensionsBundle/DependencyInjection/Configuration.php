<?php

namespace Axstrad\Bundle\DoctrineExtensionsBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/extension.html#cookbook-bundles-extension-config-class}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('axstrad_doctrine_extensions');

        $rootNode
            ->append($this->getVendorNode('orm'))
            ->children()
                ->arrayNode('class')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('activatable')
                            ->cannotBeEmpty()
                            ->defaultValue('Axstrad\DoctrineExtensions\Activatable\ActivatableListener')
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }

    /**
     * @param string $name
     */
    private function getVendorNode($name)
    {
        $treeBuilder = new TreeBuilder();
        $node = $treeBuilder->root($name);

        $node
            ->useAttributeAsKey('id')
            ->prototype('array')
                ->performNoDeepMerging()
                ->children()
                    ->scalarNode('activatable')->defaultFalse()->end()
                ->end()
            ->end()
        ;

        return $node;
    }
}
