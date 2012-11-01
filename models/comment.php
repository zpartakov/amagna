<?php
class Comment extends AppModel {
	var $name = 'Comment';
	var $displayField = 'name';
	//The Associations below have been created with all possible keys, those that are not needed can be removed
	
		/**
		 * Disallowed words within the author and comment body.
		 *
		 * @access public
		 * @var array
		 */
	/*	public $blacklistKeywords = array(
				'levitra', 'viagra', 'casino', 'sex', 'loan', 'finance', 'slots', 'debt', 'free', 'stock', 'debt',
				'marketing', 'rates', 'ad', 'bankruptcy', 'homeowner', 'discreet', 'preapproved', 'unclaimed',
				'email', 'click', 'unsubscribe', 'buy', 'sell', 'sales', 'earn'
		);
		*/
		/**
		 * Disallowed words/chars within URLs.
		 *
		 * @access public
		 * @var array
		 */
//		public $blacklistCharacters = array('.html', '.info', '?', '&', '.de', '.pl', '.cn', '.ru', '.biz');
		
		//echo "yo antispam: " .$antispam; exit;
		
	
	
	function beforeSave() {
	
//print_r($this->data['Comment']);
//antispam($this->data['Comment']['text']);
		/*
		 * Array ( [post_id] => 1 
		 * [name] => data[Comment][name] 
		 * [email] => example@example.com 
		 * [text] => data[Comment][text] 
		 * [captcha] => 105a7 [created] => 2012-10-11 17:34:19 ) yo
		 */
	}
	
	var $validate = array(
			'text' => array(
					array(
							'rule' => array('notSpam'),
							'message' => 'This comment appears to be spam. Please contact us if the problem persists.',
							'required' => true,
					),
			),
			'name' => array(
					'notempty' => array(
							'rule' => array('notempty'),
							//'message' => 'Your custom message here',
							//'allowEmpty' => false,
							//'required' => false,
							//'last' => false, // Stop validation after this rule
							//'on' => 'create', // Limit validation to 'create' or 'update' operations
					),
					),
			'email' => array(
					'notempty' => array(
							'rule' => array('notempty'),
							//'message' => 'Your custom message here',
							//'allowEmpty' => false,
							//'required' => false,
							//'last' => false, // Stop validation after this rule
							//'on' => 'create', // Limit validation to 'create' or 'update' operations
					),
			),
			
			'email' => array(
					'rule' => array('email'),
					'message' => 'L\'email renseigné ne semble pas valide',
					//'allowEmpty' => false,
					//'required' => false,
					//'last' => false, // Stop validation after this rule
					//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'text' => array(
					'notempty' => array(
							'rule' => array('notempty'),
							//'message' => 'Your custom message here',
							//'allowEmpty' => false,
							//'required' => false,
							//'last' => false, // Stop validation after this rule
							//'on' => 'create', // Limit validation to 'create' or 'update' operations
					),
					),			
			);
	
	var $belongsTo = array(
		'Post' => array(
			'className' => 'Post',
			'foreignKey' => 'post_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	function notSpam($fields) {
		$akismet = ConnectionManager::getDataSource('akismet');
		return !$akismet->isSpam($this->data['Comment'], Post::url($this->data['Comment']['post_id']));
	}
}
