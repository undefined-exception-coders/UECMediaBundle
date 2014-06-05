<?php

namespace UEC\MediaBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('uec_media');

        $rootNode
            ->children()
                ->scalarNode('db_driver')
                    ->defaultValue('orm')
                    ->validate()
                    ->ifNotInArray(array('orm'))
                        ->thenInvalid('Value "%s" is not a valid db_driver')
                    ->end()
                ->end()
                ->scalarNode('file_name_generator')
                    ->defaultValue('uec_media.file_system.file_name_generator.default')
                ->end()
                ->arrayNode('path_generator')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('id')
                            ->defaultValue('uec_media.path.generator')
                        ->end()
                        ->scalarNode('base_path')
                            ->defaultValue('uploads')
                        ->end()
                    ->end()
                ->end()
                ->scalarNode('model')
                    ->isRequired()
                    ->cannotBeEmpty()
                ->end()
                ->arrayNode('contexts')
                    ->useAttributeAsKey('name')
                    ->prototype('array')
                        ->children()
                            ->scalarNode('id')
                                ->isRequired()
                                ->cannotBeEmpty()
                            ->end()
                        ->end()
                    ->end()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
