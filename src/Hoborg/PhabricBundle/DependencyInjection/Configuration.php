<?php
namespace Hoborg\PhabricBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder,
	Symfony\Component\Config\Definition\Builder\ArrayNodeDefinition,
	Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface {

	public function getConfigTreeBuilder() {

		$treeBuilder = new TreeBuilder();
		$rootNode = $treeBuilder->root('phabric');

		$rootNode
			->children()
				->scalarNode('connection_name')->defaultValue('default')->end()
			->end();

		$this->addEntriesSection($rootNode);

		return $treeBuilder;
	}

	public function addEntriesSection(ArrayNodeDefinition $rootNode) {
		$rootNode
			->children()
				->arrayNode('entities')
					->useAttributeAsKey('id')
					->prototype('array')
					->children()
						->scalarNode('tableName')->end()
						->scalarNode('entityName')->end()
						->scalarNode('primaryKey')->end()
						->scalarNode('nameCol')->end()
						->arrayNode('nameTransformations')->end()
						->arrayNode('dataTransformations')->end()
				->end()
			->end();
	}
}