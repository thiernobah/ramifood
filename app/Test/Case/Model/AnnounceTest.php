<?php
App::uses('Announce', 'Model');

/**
 * Announce Test Case
 *
 */
class AnnounceTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.announce',
		'app.recipes'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Announce = ClassRegistry::init('Announce');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Announce);

		parent::tearDown();
	}

}
