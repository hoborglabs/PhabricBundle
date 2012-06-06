<?php
namespace Hoborg\PhabricBundle;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\HttpKernel\Bundle\Bundle;

class PhabricBundle extends Bundle {

	public function build(ContainerBuilder $container) {
		parent::build($container);
	}
}
