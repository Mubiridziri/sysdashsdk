<?php

namespace Mubiridziri\Sysdashsdk\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('sys_dash_sdk');
        if (method_exists($treeBuilder, 'getRootNode')) {
            $rootNode = $treeBuilder->getRootNode();
        } else {
            // BC layer for symfony/config 4.1 and older
            $rootNode = $treeBuilder->root('sys_dash_sdk');
        }

        $rootNode->children()
            ->scalarNode('address')
            ->cannotBeEmpty()
            ->end()
            ->scalarNode('token')
            ->cannotBeEmpty()
            ->end();

        return $treeBuilder;
    }
}