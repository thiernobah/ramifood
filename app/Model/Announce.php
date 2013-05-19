<?php
App::uses('AppModel', 'Model');
/**
 * Announce Model
 *
 * @property Recipes $Recipes
 */
class Announce extends AppModel {
    
public $validate = array(
    
    
    
);    
    
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
