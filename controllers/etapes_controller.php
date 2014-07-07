<?php
class EtapesController extends AppController {
	var $name = 'Etapes';
	var $components = array('Auth', 'RequestHandler');
		var $helpers = array('Fck');
	
	
	function beforeFilter() {
		$this->Auth->allow('index','view','viewimg');
	}
	var $paginate = array(
			'limit' => 20,
			'order' => array(
					'Etape.id' => 'desc'
			)
	);
	
	function index() {
		$this->Etape->recursive = 0;
		if($this->data['Etape']['q']) {
			$q = $this->data['Etape']['q'];
			$options = array(
					"Etape.text LIKE '%" .$q ."%'"
			);
			$this->set(array('etapes' => $this->paginate('Etape', $options)));
		} else {
		
		$this->set('etapes', $this->paginate());
		}
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
		$ingredients = $this->Etape->Ingredient->find('list');
		$modecuissons = $this->Etape->Modecuisson->find('list');
		$recettes = $this->Etape->Recette->find('list');
		$this->set(compact('recettes','ingredients','modecuissons'));
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
		$ingredients = $this->Etape->Ingredient->find('list', array('order'=>'Ingredient.libelle'));
		$modecuissons = $this->Etape->Modecuisson->find('list');
		$recettes = $this->Etape->Recette->find('list', array('order'=>'Recette.titre'));
		$this->set(compact('recettes','ingredients','modecuissons'));
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
		eject_non_admin();
	}
	
	function delete_ingredient($id=null){
		/*
		 * unhe fonction pour effacer un ingrédient d'une étape d'une recette
		 */
	}
	function add_ingredient($etape) {
		
	}
	
}
