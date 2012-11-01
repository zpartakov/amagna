<?php
class Modecuisson extends AppModel {
	var $name = 'Modecuisson';
	var $displayField = 'lib';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $hasAndBelongsToMany = array(
		'Recette' => array(
			'className' => 'Recette',
			'joinTable' => 'modecuissons_recettes',
			'foreignKey' => 'modecuisson_id',
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
