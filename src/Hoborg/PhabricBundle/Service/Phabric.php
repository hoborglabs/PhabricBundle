<?php
namespace Hoborg\PhabricBundle\Service;

class Phabric {

	protected $doctrine = null;

	/**
	 * @var \Phabric\Phabric
	 */
	protected $phabric = null;

	public function __construct($doctrine, $config) {

		$this->doctrine = $doctrine;
		$db = $doctrine->getConnection('hoborg_cmns_identity');
		$datasource = new \Phabric\Datasource\Doctrine($db, $config);
		$this->phabric = new \Phabric\Phabric($datasource);

		foreach ($config as $key => $entity) {
			$this->phabric->createEntity($key, $entity);
		}
	}

	public function getPhabric() {
		return $this->phabric;
	}
}
