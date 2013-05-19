<?php
App::uses('AppModel', 'Model');
/**
 * CommmentsPhoto Model
 *
 * @property Photos $Photos
 */
class CommmentsPhoto extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'photos_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'level' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
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
		'Photos' => array(
			'className' => 'Photos',
			'foreignKey' => 'photos_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
