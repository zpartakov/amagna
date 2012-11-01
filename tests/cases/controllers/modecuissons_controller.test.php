<?php
/* Modecuissons Test cases generated on: 2012-06-28 15:18:45 : 1340889525*/
App::import('Controller', 'Modecuissons');

class TestModecuissonsController extends ModecuissonsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class ModecuissonsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.modecuisson', 'app.recette', 'app.country', 'app.type', 'app.user', 'app.menu', 'app.stat', 'app.etape', 'app.etapes_recette', 'app.ingredient', 'app.ingredients_recette', 'app.modecuissons_recette', 'app.saison', 'app.recettes_saison');

	function startTest() {
		$this->Modecuissons =& new TestModecuissonsController();
		$this->Modecuissons->constructClasses();
	}

	function endTest() {
		unset($this->Modecuissons);
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
