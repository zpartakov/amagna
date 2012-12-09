<?php
class StopwordsController extends AppController {

	var $name = 'Stopwords';

	function index() {
		$this->Stopword->recursive = 0;
		$this->set('stopwords', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid stopword', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('stopword', $this->Stopword->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Stopword->create();
			if ($this->Stopword->save($this->data)) {
				$this->Session->setFlash(__('The stopword has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The stopword could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid stopword', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Stopword->save($this->data)) {
				$this->Session->setFlash(__('The stopword has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The stopword could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Stopword->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for stopword', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Stopword->delete($id)) {
			$this->Session->setFlash(__('Stopword deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Stopword was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>