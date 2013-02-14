<?php

class CommentsController extends AppController {
	
	/*http://milesj.me/code/cakephp/spam-blocker
	 * or comments:

    author - The authors name
    email - The authors email
    website - The authors website
    content - The comment body
    status - The comments status (approved, denied)
    points - The points scored


For articles:

    foreign_id - The foreign key ID that comments relate to
    slug - The URL slug
    title - The title

	 */

var $name = 'Comments';


var $components = array('RequestHandler','Auth');
	function beforeFilter() {
		$this->Auth->allow('index', 'view', 'add', 'captcha_image', 'beforeSave');
	}
	

	
	function index() {
		$this->Comment->recursive = 0;
		$this->set('comments', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid comment', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('comment', $this->Comment->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Comment->create();

			/*echo $this->data['Comment']['captcha'];
			echo "§§§§" ;
			echo $this->Session->read('captcha');
			//echo $_SESSION['captcha'];
			exit;*/
			if($this->data['Comment']['captcha']!=$this->Session->read('captcha'))
			{
//				$this->Session->setFlash(__('Please enter correct captcha code and try again.', true));
				__('Please enter correct captcha code and try again.');
				//echo $this->redirect($this->referer());
//				echo $this->Html->url($this->referer());
				echo "<br/><a href=\"javascript:history.back();\">Retour</a>";
				exit;
			}
		
			if ($this->Comment->save($this->data)) {
				$this->Session->setFlash(__('The comment has been saved', true));
//				$this->redirect(array('action' => 'index'));
				$this->redirect(array('action' => '../posts/view/'.$this->data['Comment']['post_id']));
				
			} else {
				$this->Session->setFlash(__('The comment could not be saved. Please, try again.', true));
			}
		}
		$posts = $this->Comment->Post->find('list');
		$this->set(compact('posts'));
	}

	function edit($id = null) {
		eject_non_admin();
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid comment', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Comment->save($this->data)) {
				$this->Session->setFlash(__('The comment has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The comment could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Comment->read(null, $id);
		}
		$posts = $this->Comment->Post->find('list');
		$this->set(compact('posts'));
	}

	function delete($id = null) {
		eject_non_admin();
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for comment', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Comment->delete($id)) {
			$this->Session->setFlash(__('Comment deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Comment was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	
	/* captcha: see
	 * http://blog.jambura.com/2011/05/02/simple-way-to-create-captcha-in-cakephp/
	*/
	function captcha_image(){
		App::import('Vendor', 'captcha/captcha');
		
		$captcha = new captcha();
		$captcha->show_captcha();
	}

}
