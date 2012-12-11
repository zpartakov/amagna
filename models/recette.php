<?php
class Recette extends AppModel {
	var $name = 'Recette';
	var $displayField = 'titre';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Country' => array(
			'className' => 'Country',
			'foreignKey' => 'country_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Type' => array(
			'className' => 'Type',
			'foreignKey' => 'type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasMany = array(
		'Menu' => array(
			'className' => 'Menu',
			'foreignKey' => 'recette_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Stat' => array(
			'className' => 'Stat',
			'foreignKey' => 'recette_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);


	var $hasAndBelongsToMany = array(
		'Etape' => array(
			'className' => 'Etape',
			'joinTable' => 'etapes_recettes',
			'foreignKey' => 'recette_id',
			'associationForeignKey' => 'etape_id',
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
			'joinTable' => 'ingredients_recettes',
			'foreignKey' => 'recette_id',
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
		'Modecuisson' => array(
			'className' => 'Modecuisson',
			'joinTable' => 'modecuissons_recettes',
			'foreignKey' => 'recette_id',
			'associationForeignKey' => 'modecuisson_id',
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
		'Orthographe' => array(
			'className' => 'Orthographe',
			'joinTable' => 'recettes_orthographe',
			'foreignKey' => 'recette_id',
			'associationForeignKey' => 'orthographe_id',
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
		'Saison' => array(
			'className' => 'Saison',
			'joinTable' => 'recettes_saisons',
			'foreignKey' => 'recette_id',
			'associationForeignKey' => 'saison_id',
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
