<?php
/* Recettes Test cases generated on: 2012-06-28 14:17:11 : 1340885831*/
App::import('Controller', 'Recettes');

class TestRecettesController extends RecettesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class RecettesControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.recette');

	function startTest() {
		$this->Recettes =& new TestRecettesController();
		$this->Recettes->constructClasses();
	}

	function endTest() {
		unset($this->Recettes);
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
