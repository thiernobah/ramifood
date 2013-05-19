<?php
App::uses('Subscriber', 'Model');

/**
 * Subscriber Test Case
 *
 */
class SubscriberTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.subscriber',
		'app.announces',
		'app.users'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Subscriber = ClassRegistry::init('Subscriber');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Subscriber);

		parent::tearDown();
	}

}
