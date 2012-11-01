<?php
class Ustensile extends AppModel {
	var $name = 'Ustensile';
	var $displayField = 'lib';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $hasAndBelongsToMany = array(
		'Recette' => array(
			'className' => 'Recette',
			'joinTable' => 'recettes_ustensiles',
			'foreignKey' => 'ustensile_id',
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
