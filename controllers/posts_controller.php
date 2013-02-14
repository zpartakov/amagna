<?php
class PostsController extends AppController {

	var $name = 'Posts';
	var $components = array('RequestHandler','Auth');
	var $helpers = array('Text');
	
	function beforeFilter() {
		$this->Auth->allow('index', 'view', 'flux');
	}
	var $paginate = array(
        'limit' => 20,
        'order' => array(
            'Post.created' => 'DESC'
        )
    );
	function index() {
		if( $this->RequestHandler->isRss() ){
			$posts = $this->Post->find('all', array('limit' => 20, 'order' => 'Post.created DESC'));
			return $this->set(compact('posts'));
		} else {
		// this is not an Rss request, so deliver
		// data used by website's interface
		$this->Post->recursive = 0;
		$this->set('posts', $this->paginate());
		}
	}
	
	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid post', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('post', $this->Post->read(null, $id));
	}

	function add() {
		eject_non_admin();
		if (!empty($this->data)) {
			$this->Post->create();
			if ($this->Post->save($this->data)) {
				$this->Session->setFlash(__('The post has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The post could not be saved. Please, try again.', true));
			}
		}
		$users = $this->Post->User->find('list');
		$this->set(compact('users'));
	}

	function edit($id = null) {
		eject_non_admin();
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid post', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Post->save($this->data)) {
				$this->Session->setFlash(__('The post has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The post could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Post->read(null, $id);
		}
		$users = $this->Post->User->find('list');
		$this->set(compact('users'));
	}

	function delete($id = null) {
		eject_non_admin();
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for post', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Post->delete($id)) {
			$this->Session->setFlash(__('Post deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Post was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
