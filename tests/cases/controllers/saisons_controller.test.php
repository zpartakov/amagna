<?php
/* Saisons Test cases generated on: 2012-06-28 14:15:39 : 1340885739*/
App::import('Controller', 'Saisons');

class TestSaisonsController extends SaisonsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class SaisonsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.saison', 'app.recette', 'app.recettes_saison');

	function startTest() {
		$this->Saisons =& new TestSaisonsController();
		$this->Saisons->constructClasses();
	}

	function endTest() {
		unset($this->Saisons);
		ClassRegistry::flush();
	}

	function testIndex() {

	}

	function testAdd() {

	}

	function testEdit() {

	}

	function testDelete() {

	}

	function testAdminIndex() {

	}

	function testAdminView() {

	}

	function testAdminAdd() {

	}

	function testAdminEdit() {

	}

	function testAdminDelete() {

	}

}
