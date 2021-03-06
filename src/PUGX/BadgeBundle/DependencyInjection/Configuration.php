<?php

/*
 * This file is part of the badge-poser package.
 *
 * (c) PUGX <http://pugx.github.io/>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace PUGX\BadgeBundle\DependencyInjection;

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
        $rootNode = $treeBuilder->root('pugx_badge');
        $rootNode
            ->children()
            ->booleanNode('disable_cache')->defaultValue('%kernel.debug%')->end()
            ->arrayNode('allin_badges')
                    ->prototype('scalar')
                    ->end()
                ->end()
            ->arrayNode('badges')
                ->prototype('array')
                ->children()
                    ->scalarNode('route')->isRequired()->end()
                    ->scalarNode('name')->isRequired()->end()
                    ->scalarNode('label')->isRequired()->end()
                    ->scalarNode('type')->end()
                    ->scalarNode('latest')->end()
            ->end()
        ->end();

        return $treeBuilder;
    }
}
