<?php

namespace YottaCms\Bundle\YottaPhpSettingsBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    /**
     * {@inheritdoc}
     */
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('yotta_php_settings');

        $rootNode
            ->children()
                ->variableNode('ini')
            ->end();

        return $treeBuilder;
    }
}
