<?php
class ModecuissonsController extends AppController {

	var $name = 'Modecuissons';
	var $components = array('RequestHandler','Auth');
	
	function beforeFilter() {
		$this->Auth->allow('index', 'view');
	}
	var $paginate = array(
			'limit' => 100,
			'order' => array(
					'Modecuisson.lib' => 'asc'
			)
	);
	
	function index() {
		$this->Modecuisson->recursive = 0;
		$this->set('modecuissons', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid modecuisson', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('modecuisson', $this->Modecuisson->read(null, $id));
	}

	function add() {
		eject_non_admin();
		if (!empty($this->data)) {
			$this->Modecuisson->create();
			if ($this->Modecuisson->save($this->data)) {
				$this->Session->setFlash(__('The modecuisson has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The modecuisson could not be saved. Please, try again.', true));
			}
		}
		$recettes = $this->Modecuisson->Recette->find('list');
		$this->set(compact('recettes'));
	}

	function edit($id = null) {
		eject_non_admin();
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid modecuisson', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Modecuisson->save($this->data)) {
				$this->Session->setFlash(__('The modecuisson has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The modecuisson could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Modecuisson->read(null, $id);
		}
		$recettes = $this->Modecuisson->Recette->find('list');
		$this->set(compact('recettes'));
	}

	function delete($id = null) {
		eject_non_admin();
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for modecuisson', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Modecuisson->delete($id)) {
			$this->Session->setFlash(__('Modecuisson deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Modecuisson was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
