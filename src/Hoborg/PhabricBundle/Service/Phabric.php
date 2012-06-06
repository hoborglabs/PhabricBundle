<?php
namespace Hoborg\PhabricBundle\Service;

class Phabric {

	protected $doctrine = null;

	/**
	 * @var \Phabric\Phabric
	 */
	protected $phabric = null;

	public function __construct($doctrine) {
		$this->doctrine = $doctrine;

		$db = $this->getContainer()->get('doctrine')->getConnection(self::DB_IDENTITY);
		$datasource = new \Phabric\Datasource\Doctrine($db, $phabricConfig['entities']);
		$this->phabric = new \Phabric\Phabric($datasource);
	}

	public function getPhabric() {
		return $this->phabric;
	}
}
