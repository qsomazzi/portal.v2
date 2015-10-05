<?php

namespace Portal\Bundle\MoneyBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * Class Configuration.
 *
 * @author Quentin Somazzi <qsomazzi@gmail.com>
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $treeBuilder->root('portal_money')
            ->children()
                ->arrayNode('class')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('transaction')->defaultValue('Portal\\Bundle\\MoneyBundle\\Entity\\Transaction')->end()
                        ->scalarNode('category')->defaultValue('Portal\\Bundle\\AppBundle\\Entity\\Classification\\Category')->end()
                    ->end()
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
