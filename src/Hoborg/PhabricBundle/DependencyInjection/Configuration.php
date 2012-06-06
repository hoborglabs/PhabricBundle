<?php
namespace Hoborg\Bundle\CommonsBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface {

	public function getConfigTreeBuilder() {

		$treeBuilder = new TreeBuilder();
		$rootNode = $treeBuilder->root('phabric');

		$rootNode
			->children()
				->scalarNode('connection_name')->defaultValue('default')->end()
			->end();

		return $treeBuilder;
	}
}