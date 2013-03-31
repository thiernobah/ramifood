<?php
App::uses('AppModel', 'Model');
/**
 * Announce Model
 *
 * @property Recipes $Recipes
 */
class Announce extends AppModel {
    
/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Recipe' => array(
			'className' => 'Recipe',
			'foreignKey' => 'recipes_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
