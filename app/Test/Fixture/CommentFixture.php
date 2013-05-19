<?php
/**
 * CommentFixture
 *
 */
class CommentFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'comment' => array('type' => 'text', 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'recipes_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'users_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'level' => array('type' => 'integer', 'null' => false, 'default' => '0', 'length' => 4),
		'status' => array('type' => 'integer', 'null' => false, 'default' => '1', 'length' => 4),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'fk_fo_comments_fo_recipes1' => array('column' => 'recipes_id', 'unique' => 0),
			'fk_fo_comments_fo_users1' => array('column' => 'users_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'comment' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'recipes_id' => 1,
			'users_id' => 1,
			'level' => 1,
			'status' => 1,
			'created' => '2013-03-21 10:08:48',
			'modified' => '2013-03-21 10:08:48'
		),
	);

}
