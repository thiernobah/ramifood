<?php
App::uses('RecipesLike', 'Model');

/**
 * RecipesLike Test Case
 *
 */
class RecipesLikeTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.recipes_like',
		'app.recipes',
		'app.users'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->RecipesLike = ClassRegistry::init('RecipesLike');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->RecipesLike);

		parent::tearDown();
	}

}
