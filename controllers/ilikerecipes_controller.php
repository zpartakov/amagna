<?php
class IlikerecipesController extends AppController {

	var $name = 'Ilikerecipes';
	
	var $components = array('Auth', 'RequestHandler');

	var $paginate = array(
			'limit' => 100,
			'order' => array(
					'Ilikerecipe.user_id' => 'asc'
			)
	);
	
	
	/*
	 * logged user preferred recipes
	*/
	
	function myrecipes() {
		//$options=array("Ilikerecipe.user_id LIKE '".$_SESSION['Auth']['User']['id'] ."'");
		//$recettes = $this->ilikerecipes->Recette->find('all',$options);
		$this->Ilikerecipe->recursive = 0;
		$this->set('ilikerecipes', $this->paginate());
	}
	
	function index() {
		eject_non_admin();
		
		$this->Ilikerecipe->recursive = 0;
		$this->set('ilikerecipes', $this->paginate());
	}

	function view($id = null) {
		eject_non_admin();
		
		if (!$id) {
			$this->Session->setFlash(__('Invalid ilikerecipe', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('ilikerecipe', $this->Ilikerecipe->read(null, $id));
	}

	function add() {
		eject_non_admin();
		
		if (!empty($this->data)) {
			$this->Ilikerecipe->create();
			if ($this->Ilikerecipe->save($this->data)) {
				$this->Session->setFlash(__('The ilikerecipe has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ilikerecipe could not be saved. Please, try again.', true));
			}
		}
		$users = $this->Ilikerecipe->User->find('list');
		$recettes = $this->Ilikerecipe->Recette->find('list');
		$this->set(compact('users', 'recettes'));
	}

	function edit($id = null) {
		eject_non_admin();
		
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid ilikerecipe', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Ilikerecipe->save($this->data)) {
				$this->Session->setFlash(__('The ilikerecipe has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ilikerecipe could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Ilikerecipe->read(null, $id);
		}
		$users = $this->Ilikerecipe->User->find('list');
		$recettes = $this->Ilikerecipe->Recette->find('list');
		$this->set(compact('users', 'recettes'));
	}

	function delete($id = null) {
		eject_non_admin();
		
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for ilikerecipe', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Ilikerecipe->delete($id)) {
			$this->Session->setFlash(__('Ilikerecipe deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Ilikerecipe was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
