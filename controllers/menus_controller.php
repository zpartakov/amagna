<?php
class MenusController extends AppController {

	var $name = 'Menus';
	var $components = array('Auth', 'RequestHandler');
	
	function beforeFilter() {
		$this->Auth->allow('index','indeximg', 'view', 
				'viewimg', 'commissions', 'lesmenus_saison');
	}
	
	function index() {
		$this->Menu->recursive = 0;
		$this->set('menus', $this->paginate());
	}
	
	function indeximg() {
		$this->layout = 'facile';
		
		$this->Menu->recursive = 0;
		$this->set('menus', $this->paginate());
	}
	
	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid menu', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('menu', $this->Menu->read(null, $id));
	}	
	/*
	 * facilitated view
	 */
	function viewimg($id = null) {
		$this->layout = 'facile';
		
		if (!$id) {
			$this->Session->setFlash(__('Invalid menu', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('menu', $this->Menu->read(null, $id));
	}

	function add() {
		eject_non_admin();
		if (!empty($this->data)) {
			$this->Menu->create();
			if ($this->Menu->save($this->data)) {
				$this->Session->setFlash(__('The menu has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The menu could not be saved. Please, try again.', true));
			}
		}
		$saisons = $this->Menu->Saison->find('list');
		$recettes = $this->Menu->Recette->find('list');
		$this->set(compact('saisons', 'recettes'));
	}

	function edit($id = null) {
		eject_non_admin();
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid menu', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Menu->save($this->data)) {
				$this->Session->setFlash(__('The menu has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The menu could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Menu->read(null, $id);
		}
		$saisons = $this->Menu->Saison->find('list');
		$recettes = $this->Menu->Recette->find('list');
		$this->set(compact('saisons', 'recettes'));
	}

	function delete($id = null) {
		eject_non_admin();
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for menu', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Menu->delete($id)) {
			$this->Session->setFlash(__('Menu deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Menu was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	
	/*
	 * other functions
	 */
	
	/*
	 * print menus for a given season
	 */
	function lesmenus_saison($saison){
		$sql="SELECT * FROM menus WHERE (saison_id='" .$saison ."' OR saison_id='5')";
		//echo $sql;
		$sql=mysql_query($sql);
		$i=0;
	echo "<h2>Menus proposés pour cette saison</h2>";
	echo "<ul>";
		while($i<mysql_num_rows($sql)){
			echo "<li><a href=\"menus/view/" .mysql_result($sql,$i,'id')."\">" 
			.mysql_result($sql,$i,'libelle')
			."</a>";
			echo "</li>";
			$i++;
		}
	echo "</ul>";		
	}
	
}
