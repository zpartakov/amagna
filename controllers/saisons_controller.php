<?php
class SaisonsController extends AppController {

	var $name = 'Saisons';
	var $components = array('RequestHandler','Auth');
	
	function beforeFilter() {
		$this->Auth->allow('index', 'view');
	}
	function index() {
		$this->Saison->recursive = 0;
		$this->set('saisons', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid saison', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('saison', $this->Saison->read(null, $id));
	}

	function add() {
		eject_non_admin();
		if (!empty($this->data)) {
			$this->Saison->create();
			if ($this->Saison->save($this->data)) {
				$this->Session->setFlash(__('The saison has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The saison could not be saved. Please, try again.', true));
			}
		}
		$recettes = $this->Saison->Recette->find('list');
		$this->set(compact('recettes'));
	}

	function edit($id = null) {
		eject_non_admin();
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid saison', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Saison->save($this->data)) {
				$this->Session->setFlash(__('The saison has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The saison could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Saison->read(null, $id);
		}
		$recettes = $this->Saison->Recette->find('list');
		$this->set(compact('recettes'));
	}

	function delete($id = null) {
		eject_non_admin();
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for saison', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Saison->delete($id)) {
			$this->Session->setFlash(__('Saison deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Saison was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
