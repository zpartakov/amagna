<?php
class CountriesController extends AppController {

	var $name = 'Countries';
	var $components = array('RequestHandler','Auth');
	
	function beforeFilter() {
		$this->Auth->allow('index', 'view');
	}
	
	var $paginate = array(
			'limit' => 50,
			'order' => array(
					'Country.name' => 'asc'
			)
	);
	
	function index() {
		$this->Country->recursive = 0;
		$this->set('countries', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid country', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('country', $this->Country->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Country->create();
			if ($this->Country->save($this->data)) {
				$this->Session->setFlash(__('The country has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The country could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		eject_non_admin();
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid country', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Country->save($this->data)) {
				$this->Session->setFlash(__('The country has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The country could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Country->read(null, $id);
		}
	}

	function delete($id = null) {
		eject_non_admin();
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for country', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Country->delete($id)) {
			$this->Session->setFlash(__('Country deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Country was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
