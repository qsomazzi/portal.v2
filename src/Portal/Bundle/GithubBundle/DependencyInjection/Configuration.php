<?php

namespace Portal\Bundle\GithubBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class Configuration
 *
 * @package Portal\Bundle\GithubBundle\DependencyInjection
 * @author  Quentin Somazzi <qsomazzi@gmail.com>
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritDoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $treeBuilder->root('portal_github')
            ->children()
                ->arrayNode('cache')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('dir')->defaultValue(false)->end()
                    ->end()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}