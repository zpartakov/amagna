<?php
class Saison extends AppModel {
	var $name = 'Saison';
	var $displayField = 'saison';
	var $validate = array(
		'saison' => array(
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
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $hasAndBelongsToMany = array(
		'Recette' => array(
			'className' => 'Recette',
			'joinTable' => 'recettes_saisons',
			'foreignKey' => 'saison_id',
			'associationForeignKey' => 'recette_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);

}
