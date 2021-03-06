<?php
class Ilikerecipe extends AppModel {
	var $name = 'Ilikerecipe';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Recette' => array(
			'className' => 'Recette',
			'foreignKey' => 'recette_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
