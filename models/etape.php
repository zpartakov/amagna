<?php
class Etape extends AppModel {
	var $name = 'Etape';
	var $displayField = 'text';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $hasAndBelongsToMany = array(
		'Recette' => array(
			'className' => 'Recette',
			'joinTable' => 'etapes_recettes',
			'foreignKey' => 'etape_id',
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
		),
		'Ingredient' => array(
					'className' => 'Ingredient',
					'joinTable' => 'etapes_ingredients',
					'foreignKey' => 'etape_id',
					'associationForeignKey' => 'ingredient_id',
					'unique' => true,
					'conditions' => '',
					'fields' => '',
					'order' => '',
					'limit' => '',
					'offset' => '',
					'finderQuery' => '',
					'deleteQuery' => '',
					'insertQuery' => ''
			),
	);
	
	
	var $belongsTo = 'Modecuisson';
}
