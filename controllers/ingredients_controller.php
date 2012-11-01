<?php
class IngredientsController extends AppController {

	var $name = 'Ingredients';
	
	var $components = array('RequestHandler','Auth');
	function beforeFilter() {
		$this->Auth->allow('index', 'view');
	}
	#criteres de tri
	var $paginate = array(
			'limit' => 100,
			'order' => array(
					'Ingredient.libelle' => 'ASC'
			)
	);
	

	
	function index() {
		$this->Ingredient->recursive = 0;
		if($this->data['Ingredient']['q']) {
			$input = $this->data['Ingredient']['q'];
			# sanitize the query
			App::import('Sanitize');
			$q = Sanitize::escape($input);
			$options = array(
					"Ingredient.libelle LIKE '%" .$q ."%'"
			);
					$this->set(array('ingredients' => $this->paginate('Ingredient', $options)));
		} else {
		$this->set('ingredients', $this->paginate());
		}
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid ingredient', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('ingredient', $this->Ingredient->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Ingredient->create();
			if ($this->Ingredient->save($this->data)) {
				$this->Session->setFlash(__('The ingredient has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ingredient could not be saved. Please, try again.', true));
			}
		}
		//$recettes = $this->Ingredient->Recette->find('list');
		//$this->set(compact('recettes'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid ingredient', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Ingredient->save($this->data)) {
				$this->Session->setFlash(__('The ingredient has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ingredient could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Ingredient->read(null, $id);
		}
		//$recettes = $this->Ingredient->Recette->find('list');
		//$this->set(compact('recettes'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for ingredient', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Ingredient->delete($id)) {
			$this->Session->setFlash(__('Ingredient deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Ingredient was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	function admin_index() {
		$this->Ingredient->recursive = 0;
		$this->set('ingredients', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid ingredient', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('ingredient', $this->Ingredient->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Ingredient->create();
			if ($this->Ingredient->save($this->data)) {
				$this->Session->setFlash(__('The ingredient has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ingredient could not be saved. Please, try again.', true));
			}
		}
		$recettes = $this->Ingredient->Recette->find('list');
		$this->set(compact('recettes'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid ingredient', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Ingredient->save($this->data)) {
				$this->Session->setFlash(__('The ingredient has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ingredient could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Ingredient->read(null, $id);
		}
		$recettes = $this->Ingredient->Recette->find('list');
		$this->set(compact('recettes'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for ingredient', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Ingredient->delete($id)) {
			$this->Session->setFlash(__('Ingredient deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Ingredient was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
