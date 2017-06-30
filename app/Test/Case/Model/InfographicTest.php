<?php
App::uses('Infographic', 'Model');

/**
 * Infographic Test Case
 *
 */
class InfographicTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.infographic',
		'app.sector',
		'app.additional_service',
		'app.expedient',
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
		$this->Infographic = ClassRegistry::init('Infographic');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Infographic);

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
