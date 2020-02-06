<?php

namespace Xpat\TinkoffBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

/**
 * This is the class that validates and merges configuration from your app/config files.
 *
 * To learn more see {@link http://symfony.com/doc/current/cookbook/bundles/configuration.html}
 */
class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('xpat_tinkoff');

        $rootNode
            ->children()
                ->scalarNode("api_url")->isRequired()->end()
                ->scalarNode("terminal_key")->isRequired()->end()
                ->scalarNode("password")->isRequired()->end()
                ->scalarNode('notification_route')->end()
                ->scalarNode('success_route')->end()
                ->scalarNode('fail_route')->end()
            ->end();
        // Here you should define the parameters that are allowed to
        // configure your bundle. See the documentation linked above for
        // more information on that topic.

        return $treeBuilder;
    }
}
