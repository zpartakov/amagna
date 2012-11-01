<?php
/* Etape Test cases generated on: 2012-06-28 13:57:33 : 1340884653*/
App::import('Model', 'Etape');

class EtapeTestCase extends CakeTestCase {
	var $fixtures = array('app.etape', 'app.recette', 'app.etapes_recette');

	function startTest() {
		$this->Etape =& ClassRegistry::init('Etape');
	}

	function endTest() {
		unset($this->Etape);
		ClassRegistry::flush();
	}

}
