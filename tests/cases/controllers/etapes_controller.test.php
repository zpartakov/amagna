<?php
/* Etapes Test cases generated on: 2012-06-28 13:57:52 : 1340884672*/
App::import('Controller', 'Etapes');

class TestEtapesController extends EtapesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class EtapesControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.etape', 'app.recette', 'app.etapes_recette');

	function startTest() {
		$this->Etapes =& new TestEtapesController();
		$this->Etapes->constructClasses();
	}

	function endTest() {
		unset($this->Etapes);
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
