<?php
class UstensilesController extends AppController {

	var $name = 'Ustensiles';
	var $components = array('RequestHandler','Auth');
	
	function beforeFilter() {
		$this->Auth->allow('index', 'view');
	}
	
	var $paginate = array(
			'limit' => 100,
			'order' => array(
					'Ustensile.lib' => 'asc'
			)
	);
	
	function index() {
		$this->Ustensile->recursive = 0;
		if($this->data['Ustensile']['q']) {
			$input = $this->data['Ustensile']['q'];
			# sanitize the query
			App::import('Sanitize');
			$q = Sanitize::escape($input);
			$options = array(
					"Ustensile.lib LIKE '%" .$q ."%'"
					." OR Ustensile.groupe LIKE '%" .$q ."%'"
					." OR Ustensile.note LIKE '%" .$q ."%'"
			);
			$this->set(array('ustensiles' => $this->paginate('Ustensile', $options)));
		} else {
		$this->set('ustensiles', $this->paginate());
		}
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid ustensile', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('ustensile', $this->Ustensile->read(null, $id));
	}

	function add() {
		eject_non_admin();
		if (!empty($this->data)) {
			$this->Ustensile->create();
			if ($this->Ustensile->save($this->data)) {
				$this->Session->setFlash(__('The ustensile has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ustensile could not be saved. Please, try again.', true));
			}
		}
		$recettes = $this->Ustensile->Recette->find('list');
		$this->set(compact('recettes'));
	}

	function edit($id = null) {
		eject_non_admin();
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid ustensile', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Ustensile->save($this->data)) {
				$this->Session->setFlash(__('The ustensile has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ustensile could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Ustensile->read(null, $id);
		}
		$recettes = $this->Ustensile->Recette->find('list');
		$this->set(compact('recettes'));
	}

	function delete($id = null) {
		eject_non_admin();
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for ustensile', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Ustensile->delete($id)) {
			$this->Session->setFlash(__('Ustensile deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Ustensile was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
