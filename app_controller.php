<?php
/*
 * this is the main cakephp's application controller
 */
class AppController extends Controller {
	var $helpers = array('Html', 'Form', 'Javascript', 'Ajax', 'Session', 'Text', 'Video');

//var $components = array('Session', 'Cookie', 'Auth');
 
#useful functions to trim before sending
	function whitespace(&$value, &$key){
		$key = trim($key);
		$value = trim($value);
	}

 function beforeFilter() {
   if($_POST['language']) {
    //Configure::write('Config.language', $_POST['language']);
	Configure::write('Config.language', $_POST['language']);
	 }
 	 //$this->_setLanguage();  
 	if(!empty($this->data))
	 array_walk_recursive($this->data, array($this, 'whitespace'));
	 setlocale(LC_TIME,array('fr_CH.UTF-8', 'fr_CH', 'fr_FR.UTF-8', 'fr_FR'));
	 $this->Auth->authError="Vous ne pouvez pas accéder à cet espace sans être enregistré";
	 $this->Auth->loginError="Login / mot de passe incorrect";
	}


}

//out of main class
/*
 * check if the logged user is an admin or not
*/
function eject_non_admin() {
	if($_SESSION['Auth']['User']['role']!="administrator") { 	//non admin eject
		echo "<h1>Action not allowed!</h1>";
		exit;
	}
}

?>
