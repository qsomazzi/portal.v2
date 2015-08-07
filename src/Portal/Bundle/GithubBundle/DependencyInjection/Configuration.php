<?php

namespace Portal\Bundle\GithubBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class Configuration.
 *
 * @author  Quentin Somazzi <qsomazzi@gmail.com>
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $treeBuilder->root('portal_github')
            ->children()
                ->scalarNode('cache')->defaultValue(false)->end()
                ->arrayNode('class')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('gist')->defaultValue('Portal\\Bundle\\GithubBundle\\Entity\\Gist')->end()
                        ->scalarNode('tag')->defaultValue('Portal\\Bundle\\GithubBundle\\Entity\\Tag')->end()
                    ->end()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
