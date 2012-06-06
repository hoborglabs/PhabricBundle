<?php
namespace Hoborg\PhabricBundle\DependencyInjection;

use Symfony\Component\HttpKernel\DependencyInjection\Extension,
	Symfony\Component\DependencyInjection\ContainerBuilder,
	Symfony\Component\DependencyInjection\Loader\YamlFileLoader,
	Symfony\Component\Config\FileLocator;

class PhabricExtension extends Extension {

	public function load(array $configs, ContainerBuilder $container) {

		$configuration = new Configuration();
		$config = $this->processConfiguration($configuration, $configs);

		if (!isset($config['connection_name'])) {
			throw new \InvalidArgumentException('The "connection_name" option must be set');
		}
		$container->setParameter('phabric.connection_name', $config['connection_name']);

		$loader = new YamlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config'));
		$loader->load('services.yml');
	}
}