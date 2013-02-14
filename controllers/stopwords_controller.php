<?php
class StopwordsController extends AppController {

	var $name = 'Stopwords';
	var $components = array('Auth', 'RequestHandler');
	
	function beforeFilter() {
		$this->Auth->allow('index', 'view');
	}

	var $paginate = array(
			'limit' => 10,
			'order' => array(
					'Stopword.lib' => 'asc'
			)
	);
	
	function index() {
		$this->Stopword->recursive = 0;
		if($this->data['Stopword']['q']) {
			$input = $this->data['Stopword']['q'];
			# sanitize the query
			App::import('Sanitize');
			$q = Sanitize::escape($input);
			$options = array(
					"Stopword.lib LIKE '%" .$q ."%'"
			);
			$this->set(array('stopwords' => $this->paginate('Stopword', $options)));
		} else {
		$this->set('stopwords', $this->paginate());
		}
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid stopword', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('stopword', $this->Stopword->read(null, $id));
	}

	function add() {
		eject_non_admin();
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
		eject_non_admin();
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
		eject_non_admin();
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