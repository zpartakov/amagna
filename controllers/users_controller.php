<?php
#http://book.cakephp.org/view/1250/Authentication

class UsersController extends AppController {
	var $name = 'Users';
	var $helpers = array('Form', 'Alaxos.AlaxosForm', 'Alaxos.AlaxosHtml');
	var $components = array('Alaxos.AlaxosFilter','Auth');
	
	var $paginate = array(
        'limit' => 30,
        'order' => array(
            'User.email' => 'asc'
        )
    );

  function beforeFilter() {
		$this->Auth->allow('login','logout','passwordreminder', 'renvoiemail', 'confirmation');
		
	 }

	function index()
	{
		eject_non_admin(); //on autorise pas les non-administrateurs
		$this->User->recursive = 0;
		
			if($this->data['User']['q']) {
			$input = $this->data['User']['q'];
			# sanitize the query
			App::import('Sanitize');
			$q = Sanitize::escape($input);
			$options = array(
					"User.email LIKE '%" .$q ."%' OR pseudo LIKE '%" .$q ."%' OR username LIKE '%" .$q ."%'"
			);
			$this->set(array('users' => $this->paginate('User', $options)));
		} else {
		
		$this->set('users', $this->paginate($this->User, $this->AlaxosFilter->get_filter()));
		}
		
	}

	function view($id = null) {
		$this->_set_user($id);
	}

	function add() {
		eject_non_admin();
		if (!empty($this->data))
		{
			$this->User->create();
			if ($this->User->save($this->data))
			{
				$this->Session->setFlash(___('the user has been saved', true), 'flash_message');
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the user could not be saved. Please, try again.', true), 'flash_error');
			}
		}
		
	}

	function edit($id = null) {
		eject_non_admin();
		if (!$id && empty($this->data))
		{
			$this->Session->setFlash(___('invalid user', true), 'flash_error');
			$this->redirect(array('action' => 'index'));
		}
		
		if (!empty($this->data))
		{
			if ($this->User->save($this->data))
			{
				$this->Session->setFlash(___('the user has been saved', true), 'flash_message');
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the user could not be saved. Please, try again.', true), 'flash_error');
			}
		}
		
		$this->_set_user($id);
		
	}

	function delete($id = null) {
		eject_non_admin();
		if (!$id)
		{
			$this->Session->setFlash(___('invalid id for user', true), 'flash_error');
			$this->redirect(array('action'=>'index'));
		}
		
		if ($this->User->delete($id))
		{
			$this->Session->setFlash(___('user deleted', true), 'flash_message');
			$this->redirect(array('action'=>'index'));
		}
			
		$this->Session->setFlash(___('user was not deleted', true), 'flash_error');
		$this->redirect(array('action' => 'index'));
	}
	
	function actionAll()
	{
	    if(!empty($this->data['_Tech']['action']))
	    {
            if(isset($this->Acl) && $this->Acl->check($this->Auth->user(), 'Users/' . $this->data['_Tech']['action']))
	        {
	            $this->setAction($this->data['_Tech']['action']);
	        }
	        elseif(!isset($this->Acl))
	        {
                $this->setAction($this->data['_Tech']['action']);
	        }
	        else
	        {
	        	if(isset($this->Auth))
	        	{
	            	$this->Session->setFlash($this->Auth->authError, $this->Auth->flashElement, array(), 'auth');
	            }
	            else
	            {
	            	$this->Session->setFlash(___d('alaxos', 'not authorized', true), 'flash_error');
	            }
	            
	            $this->redirect($this->referer());
	        }
	    }
	    else
	    {
	        $this->Session->setFlash(___d('alaxos', 'the action to perform is not defined', true), 'flash_error');
	        $this->redirect($this->referer());
	    }
	}
	
	function deleteAll() {
		eject_non_admin();
	    $ids = Set :: extract('/User/id[id > 0]', $this->data);
	    if(count($ids) > 0)
	    {
    	    if($this->User->deleteAll(array('User.id' => $ids), false, true))
    	    {
    	        $this->Session->setFlash(__('Users deleted', true), 'flash_message');
    			$this->redirect(array('action'=>'index'));
    	    }
    	    else
    	    {
    	        $this->Session->setFlash(__('Users were not deleted', true), 'flash_error');
    	        $this->redirect(array('action' => 'index'));
    	    }
	    }
	    else
	    {
	        $this->Session->setFlash(__('No user to delete was found', true), 'flash_error');
    	    $this->redirect(array('action' => 'index'));
	    }
	}
	
	function _set_user($id)
	{
		if(empty($this->data))
	    {
    	    $this->data = $this->User->read(null, $id);
            if($this->data === false)
            {
                $this->Session->setFlash(___('invalid id for User', true), 'flash_error');
                $this->redirect(array('action' => 'index'));
            }
	    }
	    
	    $this->set('user', $this->data);
	}
	
	function login() {
		$this->Session->setFlash("Vous êtes maintenant connecté.");
	}

    function logout()
    {
	#destroy session language
	$this->Session->setFlash("Vous êtes maintenant déconnecté.");
	$this->redirect($this->Auth->logout());
    } 


/*
 * new users
 */
	function ajouter()
	{
		/*
		 * registration of a new user
		 */
		if (!empty($this->data))
		{
			$this->User->create();
			$this->data['User']['username']=$this->data['User']['email'];
			if ($this->User->save($this->data))
			{
				/*
				 * send email notification
				 */
					$Destinataire = "fradeff@akademia.ch";
					$Sujet = "Nouvel utilisateur atable";
					 
					$From  = "From: " .$this->data['User']['email'] ."\n";
					$From .= "MIME-version: 1.0\n";
					$From .= "Content-type: text/html; charset= UTF-8\n";
					 
					$Message = "Nouvel utilisateur enregistré à confirmer: " .$this->data['User']['email'] ."
					
					Pour confirmer: http://www.picadametles.ch/amagna/users/confirmer?email=" .$this->data['User']['email'] ."
					----
					Ne pas répondre à cet email
					Message automatique du script http://www.picadametles.ch/amagna/users/ajouter
					";
					$envoie=mail($Destinataire,$Sujet,$Message,$From);
					if(!$envoie) { echo "Problem sending email!"; }
				
$this->Session->setFlash(___('the user has been saved', true), 'flash_message');
				$this->redirect(array('action' => 'index'));
				
			}
			else
			{
				$this->Session->setFlash(___('the user could not be saved. Please, try again.', true), 'flash_error');
			}
		}
		
	}

	function confirmer() {
		/*
		 * confirm new user registration after function ajouter()
		 */
		$this->layout = 'admin';
				
			if($_GET['email']) {
			$input = $_GET['email'];
			# sanitize the query
			App::import('Sanitize');
			$q = Sanitize::escape($input);
			$options = array(
					"User.email LIKE '" .$q ."'"
			);
			$this->set(array('user' => $this->paginate('User', $options)));
						
				}	
				
			if (!empty($this->data))
		{
//			echo "yo"; exit;
			if ($this->User->save($this->data))
			{
				/*
				 * user saved, send an email
				 * 
				 */
					$Destinataire=$this->data['User']['email'];
					$Sujet = "Vos informations de connexion à \"a magna'!\"";
					 
					$From  = "From: atable@picadametles.ch\n";
					$From .= "MIME-version: 1.0\n";
					$From .= "Content-type: text/html; charset= UTF-8\n";
					 
					$Message = "Bonjour, " .$this->data['User']['email'] ."
					
					Voici vos informations de connexion à \"a magna'!\":
					
					Identifiant (login):     " .$this->data['User']['username'] ."
					Mot de passe (password): " .$this->data['User']['text'] ."
					
					Pour vous enregistrer: http://www.picadametles.ch/amagna/users/login
					
					Nous vous souhaitons un bon accueil à \"a magna'!\"
					----
					Ne pas répondre à cet email, généré par un script automatique
					";
					$Message=nl2br($Message);
					$envoie=mail($Destinataire,$Sujet,$Message,$From);
					if(!$envoie) { echo "Problem sending email!"; }
			
				$this->Session->setFlash(___('the user has been saved', true), 'flash_message');
				$this->redirect(array('action' => 'index'));
			}
			else
			{
				$this->Session->setFlash(___('the user could not be saved. Please, try again.', true), 'flash_error');
			}
		}
				/*else {

					echo "Bug, no email for new user!"; exit;
				}*/
		}

		
/*
 * user's function to get a new password etc.
 */

function passwordreminder() {
	/*
	 * reset & send password to users 
	 */
}

function renvoiemail() {
	/*
	 * resent password
	 */
	$email=$_GET['email'];
	if(!$email) {
		echo "<h1>Merci de fournir votre email!";
		echo '<br /><a href="javascript:history.go(-1)">Retour</a></h1>';
		exit;
	}
	$confirm="SELECT * FROM users WHERE email LIKE '" .$email ."'";
		//echo "<br>" .$confirm ."<br>"; //tests
		
		//compte demo
		if($email=="testatable@picadametles.ch") {
					error_reporting(0);
		echo "Vous ne pouvez pas vous faire renvoyer un mot de passe pour le compte démo!";
		echo "<br />Votre adresse IP " .$_SERVER["REMOTE_ADDR"] ." a été enregistrée";
		exit;
		}
		
	$confirm=mysql_query($confirm);
	if(!$confirm) {
		echo "SQL error: " .mysql_error(); exit;
	}
	if(mysql_num_rows($confirm)=="1") { //user email ok
	$login=mysql_result($confirm,0,'username');
	#génère password
		$pass=""; $length=8;
		$vowels = array("a",  "e",  "i",  "o",  "u",  "ae",  "ou",  "io",  
                     "ea",  "ou",  "ia",  "ai"); 
		 // A List of Consonants and Consonant sounds that we can insert
		 // into the password string
		 $consonants = array("b",  "c",  "d",  "g",  "h",  "j",  "k",  "l",  "m",
							 "n",  "p",  "r",  "s",  "t",  "u",  "v",  "w",  
							 "tr",  "cr",  "fr",  "dr",  "wr",  "pr",  "th",
							 "ch",  "ph",  "st",  "sl",  "cl");
		 // For the call to rand(), saves a call to the count() function
		 // on each iteration of the for loop
		 $vowel_count = count($vowels);
		 $consonant_count = count($consonants);
		 // From $i .. $length, fill the string with alternating consonant
		 // vowel pairs.
		 for ($i = 0; $i < $length; ++$i) {
			 $pass .= $consonants[rand(0,  $consonant_count - 1)] .
					  $vowels[rand(0,  $vowel_count - 1)];
		 }
		 
		 // Since some of our consonants and vowels are more than one
		 // character, our string can be longer than $length, use substr()
		 // to truncate the string
			$password=substr($pass,  0,  $length);
	//echo "L'utilisateur avec le mail " .$email ." existe, voici son nouveau mdp: " .$password; //tests
	#$hpassword = Security::hash($password);
	
//hashed mao123=b997ab87506787144928a87c3040f316bbebb937
	//echo "<br>Hashed password = " .$hpassword ."<br>"; //tests
		#$hpassword = Security::hash("mao123");
		$hash=Configure::read('Security.salt');
		$hpassword=sha1($hash.$password);
#echo $hpassword; exit;

	$confirm="UPDATE users SET password = '" .$hpassword ."' WHERE email LIKE '" .$email ."'";
	//echo "<br>".$confirm."<br>"; //tests
	
	$confirm=mysql_query($confirm);
	if(!$confirm) {
		echo "SQL error: " .mysql_error(); exit;
	}
	$textemail="
	Vous - ou quelqu'un se faisant passer pour vous - a demandé à se faire renvoyer à cet email un mot de passe;
	
	Votre identifiant: " .$login ."
	
	Votre nouveau mot de passe: " .$password;
	$textemail.='
	
	Se connecter à "a magna\'!": <a href="http://www.picadametles.ch/amagna/users/login">http://www.picadametles.ch/amagna/users/login</a>
	
	----
	Message automatique généré par un script
	';
	$textemail=nl2br($textemail);
	$Destinataire = $email;
$Sujet = "Nouveau mot de passe \"a magna'!\"";
 
$From  = "From: webmaster@picadametles.ch\n";
$From .= "MIME-version: 1.0\n";
$From .= "Content-type: text/html; charset= UTF-8\n";
 
$Message = $textemail;
 
$envoie=mail($Destinataire,$Sujet,$Message,$From);
if(!$envoie) { echo "Problem sending email!"; }

			echo '<meta http-equiv="refresh" content="0;URL=/amagna/users/confirmation">';

	
	} else { //user email not registered, potential hack
	// Désactiver le rapport d'erreurs
		error_reporting(0);
		#echo phpinfo();
		echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\" />";
		echo "L'email " .$email ." n'est pas enregistr&eacute; dans notre base de données, votre adresse IP " .$_SERVER["REMOTE_ADDR"] ." a été enregistrée";
		exit;
	}
	}

function confirmation() { 
	/*
	 * //page to redirect after new password
	 */
}	
}
?>
