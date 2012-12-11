<?php
class Menu extends AppModel {
	var $name = 'Menu';
	var $displayField = 'libelle';
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'Saison' => array(
			'className' => 'Saison',
			'foreignKey' => 'saison_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasAndBelongsToMany = array(
		'Recette' => array(
			'className' => 'Recette',
			'joinTable' => 'menus_recettes',
			'foreignKey' => 'menu_id',
			'associationForeignKey' => 'recette_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => 'type_id',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);

}
