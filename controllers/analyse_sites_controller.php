<?php
class AnalyseSitesController extends AppController {

	var $name = 'AnalyseSites';

	function index() {
		$this->AnalyseSite->recursive = 0;
		$this->set('analyseSites', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid analyse site', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('analyseSite', $this->AnalyseSite->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->AnalyseSite->create();
			if ($this->AnalyseSite->save($this->data)) {
				$this->Session->setFlash(__('The analyse site has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The analyse site could not be saved. Please, try again.', true));
			}
		}
		$users = $this->AnalyseSite->User->find('list');
		$this->set(compact('users'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid analyse site', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->AnalyseSite->save($this->data)) {
				$this->Session->setFlash(__('The analyse site has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The analyse site could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->AnalyseSite->read(null, $id);
		}
		$users = $this->AnalyseSite->User->find('list');
		$this->set(compact('users'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for analyse site', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->AnalyseSite->delete($id)) {
			$this->Session->setFlash(__('Analyse site deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Analyse site was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
