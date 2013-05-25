<?php
App::uses('AppModel', 'Model');
/**
 * Announce Model
 *
 * @property Recipes $Recipes
 */
class Announce extends AppModel {
    
public $validate = array(
    
    'title' => array(
        'notempty' => array(
            'rule' => array('notempty'),
            'message' => 'Ce champs est obligatoire veuillez le compléter',
            'required' => true,
        )
    ),
    'place' => array(
        'notempty' => array(
            'rule' => array('notempty'),
            'message' => 'Ce champs est obligatoire veuillez le compléter',
            'required' => true,
        )
    ),
    'food_days' => array(
        'notempty' => array(
            'rule' => array('notempty'),
            'message' => 'Ce champs est obligatoire veuillez le compléter',
            'required' => true,
        )
    ),
    'cities_id' => array(
        'notempty' => array(
            'rule' => array('notempty'),
            'message' => 'Ce champs est obligatoire veuillez le compléter',
            'required' => true,
        )
    ),
     'departments_id' => array(
        'notempty' => array(
            'rule' => array('notempty'),
            'message' => 'Ce champs est obligatoire veuillez le compléter',
            'required' => true,
        )
    ),
    'regions_id' => array(
        'notempty' => array(
            'rule' => array('notempty'),
            'message' => 'Ce champs est obligatoire veuillez le compléter',
            'required' => true,
        )
    ),
    
    
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
		), 
                'Region' => array(
			'className' => 'Region',
			'foreignKey' => 'regions_id'),
                'Department' => array(
			'className' => 'Region',
			'foreignKey' => 'departments_id'),
                'City'  => array(
			'className' => 'Region',
			'foreignKey' => 'cities_id'),
	);
}
