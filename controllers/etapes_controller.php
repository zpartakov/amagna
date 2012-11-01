<?php
class EtapesController extends AppController {
	//var $helpers = array('Glossary'); //whishlist:adapt, see libs/functions : glossaire
	var $components = array('Auth', 'RequestHandler');
	
	var $name = 'Etapes';
	
	function beforeFilter() {
		$this->Auth->allow('index','view','viewimg');
	}
	
	function index() {
		$this->Etape->recursive = 0;
		$this->set('etapes', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid etape', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('etape', $this->Etape->read(null, $id));
	}
	
	function viewimg($id = null) {
		$this->layout = 'facile';
		
		if (!$id) {
			$this->Session->setFlash(__('Invalid etape', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('etape', $this->Etape->read(null, $id));
	}

	function add() {
				eject_non_admin();

		if (!empty($this->data)) {
			$this->Etape->create();
			if ($this->Etape->save($this->data)) {
				$this->Session->setFlash(__('The etape has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The etape could not be saved. Please, try again.', true));
			}
		}
		$recettes = $this->Etape->Recette->find('list');
		$this->set(compact('recettes'));
	}

	function edit($id = null) {
				eject_non_admin();

		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid etape', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Etape->save($this->data)) {
				$this->Session->setFlash(__('The etape has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The etape could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Etape->read(null, $id);
		}
		$recettes = $this->Etape->Recette->find('list');
		$this->set(compact('recettes'));
	}

	function delete($id = null) {
				eject_non_admin();

			$this->Session->setFlash(__('Invalid id for etape', true));
			$this->redirect(array('action'=>'index'));
		
		if ($this->Etape->delete($id)) {
			$this->Session->setFlash(__('Etape deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Etape was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	
	function deplacer($id = null) {
	
	}
	
}
