<?php
App::uses('Expedient', 'Model');

/**
 * Expedient Test Case
 *
 */
class ExpedientTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.expedient',
		'app.sector',
		'app.additional_service',
		'app.infographic',
		'app.map',
		'app.motiongraphic',
		'app.statistic',
		'app.study'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Expedient = ClassRegistry::init('Expedient');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Expedient);

		parent::tearDown();
	}

/**
 * testBuildConditions method
 *
 * @return void
 */
	public function testBuildConditions() {
	}

}
