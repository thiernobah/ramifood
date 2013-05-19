<?php
App::uses('CommmentsPhoto', 'Model');

/**
 * CommmentsPhoto Test Case
 *
 */
class CommmentsPhotoTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.commments_photo',
		'app.photos'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->CommmentsPhoto = ClassRegistry::init('CommmentsPhoto');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->CommmentsPhoto);

		parent::tearDown();
	}

}
