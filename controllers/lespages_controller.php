<?php
class LespagesController extends AppController {

	var $name = 'Lespages';
	var $components = array('Auth', 'RequestHandler');

		var $helpers = array('Fck');
	
function beforeFilter() {
		$this->Auth->allow('view');
	}
	
	function index() {
		$this->Lespage->recursive = 0;
		$this->set('lespages', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid lespage', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('lespage', $this->Lespage->read(null, $id));
	}

	function add() {
		eject_non_admin();
		if (!empty($this->data)) {
			$this->Lespage->create();
			if ($this->Lespage->save($this->data)) {
				$this->Session->setFlash(__('The lespage has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The lespage could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		eject_non_admin();
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid lespage', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Lespage->save($this->data)) {
				$this->Session->setFlash(__('The lespage has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The lespage could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Lespage->read(null, $id);
		}
	}

	function delete($id = null) {
		eject_non_admin();
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for lespage', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Lespage->delete($id)) {
			$this->Session->setFlash(__('Lespage deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Lespage was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>
