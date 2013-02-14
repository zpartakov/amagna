<?php
class RecettesController extends AppController {

	var $name = 'Recettes';
	var $components = array('Auth', 'RequestHandler');

	function beforeFilter() {
	 if($_POST['language']) {
		Configure::write('Config.language', $_POST['language']);
	 }
	$this->Auth->allow('index', 'commissions', 'ustensiles', 'indeximg', 'view', 'viewimg');
	}
	
	var $paginate = array(
        'limit' => 100,
        'order' => array(
            'Recette.titre' => 'asc'
        )
    );

/* img controller for visual output of recipes */

	function indeximg() {
		$this->Recette->recursive = 0;
		if($this->data['Recette']['q']) {
					$input = $this->data['Recette']['q']; 
					# sanitize the query
					App::import('Sanitize');
					$q = Sanitize::escape($input);
					$options = array(
					"Recette.titre LIKE '%" .$q ."%'"
					);
					$this->set(array('recettes' => $this->paginate('Recette', $options))); 
		}elseif($_GET['typ']) {
					$options = array(
					"Recette.type_id=".$_GET['typ']
					);
					$this->set(array('recettes' => $this->paginate('Recette', $options))); 
		} else {
		$this->set('recettes', $this->paginate());
		}
	}
	
	function viewimg($id = null) {
		$this->layout = 'facile';
		if (!$id) {
			$this->Session->setFlash(__('Invalid recette', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('recette', $this->Recette->read(null, $id));
	}

/* a page to compute the thing to buy for a given recipe and a given number of person */	
	function commissions($id = null) {
		$this->layout = 'facile';
	}

/* the tools needed for the recipe */
	function ustensiles($id = null) {
		$this->layout = 'facile';
	}
	
	
/* classical cake controllers */

	function index() {
		$this->Recette->recursive = 0;
		if($this->data['Recette']['q']) {
					$input = $this->data['Recette']['q']; 
					# sanitize the query
					App::import('Sanitize');
					$q = Sanitize::escape($input);
					$options = array(
					"Recette.titre LIKE '%" .$q ."%'"
					);
					$this->set(array('recettes' => $this->paginate('Recette', $options))); 
		}elseif($_GET['typ']) {
					$options = array(
					"Recette.type_id=".$_GET['typ']
					);
					$this->set(array('recettes' => $this->paginate('Recette', $options))); 
		} else {
		$this->set('recettes', $this->paginate());
		}
	}
	
	
	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid recette', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('recette', $this->Recette->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Recette->create();
			if ($this->Recette->save($this->data)) {
				$this->Session->setFlash(__('The recette has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The recette could not be saved. Please, try again.', true));
			}
		}
		$countries = $this->Recette->Country->find('list');
		$types = $this->Recette->Type->find('list');
		$users = $this->Recette->User->find('list');
		$etapes = $this->Recette->Etape->find('list');
		$ingredients = $this->Recette->Ingredient->find('list');
		$modecuissons = $this->Recette->Modecuisson->find('list');
		$orthographes = $this->Recette->Orthographe->find('list');
		$saisons = $this->Recette->Saison->find('list');
		$this->set(compact('countries', 'types', 'users', 'etapes', 'ingredients', 'modecuissons', 'orthographes', 'saisons'));
	}

	function edit($id = null) {
		eject_non_admin();
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid recette', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Recette->save($this->data)) {
				$this->Session->setFlash(__('The recette has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The recette could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Recette->read(null, $id);
		}
		$countries = $this->Recette->Country->find('list');
		$types = $this->Recette->Type->find('list');
		$users = $this->Recette->User->find('list');
		$etapes = $this->Recette->Etape->find('list');
		/*
		 * tip: do not include any ingredients, so that the quantities are preserved in the link table ingredients_recettes
		 */
		//$ingredients = $this->Recette->Ingredient->find('list');
		//$ingredients=$this->data['Ingredient'];
		$modecuissons = $this->Recette->Modecuisson->find('list');
		$orthographes = $this->Recette->Orthographe->find('list');
		$saisons = $this->Recette->Saison->find('list');
		$this->set(compact('countries', 'types', 'users', 'etapes', 'ingredients', 'modecuissons', 'orthographes', 'saisons'));
	}

	function delete($id = null) {
		eject_non_admin();
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for recette', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Recette->delete($id)) {
			$this->Session->setFlash(__('Recette deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Recette was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}

	function ingredients($id = null) {
		/*
		 * a function to print and edit the given ingredients for a recipe
		 */
		$recette= $this->Recette->read(null, $id);
		$this->set(compact('recette'));		
	}
	
	function supprimer($id=null){
		eject_non_admin();
		/* 
		 * a function to delete an ingredient for a given recipe
		 */
		//do not display layout
		$this->layout = '';
		//$this->redirect($this->referer());		
	}
	
	function ajouteringredient($id=null){
		/* display all ingredients for adding one to recipe */
		$ingredients = $this->Recette->Ingredient->find('all', array ('order' => 'Ingredient.libelle'));
		$this->set(compact('ingredients'));
	}
	function ajouteringredientok($id=null){
		/*
		 * add a given ingredient to recipe
		 */				
	}
	
}
