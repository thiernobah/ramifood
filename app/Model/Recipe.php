<?php
App::uses('AppModel', 'Model');
/**
 * Recipe Model
 *
 * @property Users $Users
 * @property Like $Like
 */
class Recipe extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'users_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
                 'title' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Ce champs est obligatoire, vous devez le compléter',
				'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
                 'recipe' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Ce champs est obligatoire, vous devez le compléter',
				'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'User' => array(
			'className' => 'User',
			'foreignKey' => 'users_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasAndBelongsToMany associations
 *
 * @var array
 */
	/*public $hasAndBelongsToMany = array(
		'Like' => array(
			'className' => 'Like',
			'joinTable' => 'recipes_likes',
			'foreignKey' => 'recipes_id',
			'associationForeignKey' => 'likes_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);*/

}
