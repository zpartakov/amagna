<?php
class GlossairesController extends AppController {

	var $name = 'Glossaires';
	var $helpers = array('Form', 'Alaxos.AlaxosForm', 'Alaxos.AlaxosHtml','Fck');
	var $components = array('Alaxos.AlaxosFilter','Auth','RequestHandler');
	
	function beforeFilter() {
		$this->Auth->allow('index','view','viewimg', 'terme');
	 }

	var $paginate = array(
        'limit' => 20,
        'order' => array(
            'Glossaire.libelle' => 'asc'
        )
    );
	
	function index() {
		$this->Glossaire->recursive = 0;
		if($this->data['Glossaire']['q']) {
			$input = $this->data['Glossaire']['q'];
			# sanitize the query
			App::import('Sanitize');
			$q = Sanitize::escape($input);
			$options = array(
					"Glossaire.libelle LIKE '%" .$q ."%'"
			);
			$this->set(array('glossaires' => $this->paginate('Glossaire', $options)));
		} else {
			$this->set('glossaires', $this->paginate());
		}
	}

	function view($id = null) {
		$this->_set_glossaire($id);
	}

	
	function viewimg($id = null) {
		$this->layout = 'facile';
		$this->_set_glossaire($id);
	}			
	
	function add() {
		eject_non_admin();
		if (!empty($this->data))
		{
			$this->Glossaire->create();
			if ($this->Glossaire->save($this->data))
			{
				$this->Session->setFlash(___('the glossaire has been saved', true), 'flash_message');
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the glossaire could not be saved. Please, try again.', true), 'flash_error');
			}
		}
		
	}

	function edit($id = null) {
		eject_non_admin();
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid glossaire', true), 'flash_error');
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data)) {
			if ($this->Glossaire->save($this->data))
			{
				$this->Session->setFlash(___('the glossaire has been saved', true), 'flash_message');
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the glossaire could not be saved. Please, try again.', true), 'flash_error');
			}
		}
		$this->_set_glossaire($id);
	}

	function delete($id = null)	{			
		eject_non_admin();
		if (!$id)		{
			$this->Session->setFlash(___('invalid id for glossaire', true), 'flash_error');
			$this->redirect(array('action'=>'index'));
		}		
		if ($this->Glossaire->delete($id))
		{
			$this->Session->setFlash(___('glossaire deleted', true), 'flash_message');
			$this->redirect(array('action'=>'index'));
		}			
		$this->Session->setFlash(___('glossaire was not deleted', true), 'flash_error');
		$this->redirect(array('action' => 'index'));
	}
	
	function _set_glossaire($id)
	{
		if(empty($this->data))
	    {
    	    $this->data = $this->Glossaire->read(null, $id);
            if($this->data === false)
            {
                $this->Session->setFlash(___('invalid id for Glossaire', true), 'flash_error');
                $this->redirect(array('action' => 'index'));
            }
	    }
	    
	    $this->set('glossaire', $this->data);
	}
	
	function terme($id){
	}
	
}
?>
