<?php

namespace Mubiridziri\Sysdashsdk\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $treeBuilder = new TreeBuilder('sysdash');
        $rootNode = $treeBuilder->getRootNode();

        $rootNode->children()
            ->scalarNode('address')
            ->cannotBeEmpty()
            ->end();

        return $treeBuilder;
    }
}