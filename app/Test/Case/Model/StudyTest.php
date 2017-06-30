<?php
App::uses('Study', 'Model');

/**
 * Study Test Case
 *
 */
class StudyTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.study',
		'app.sector',
		'app.additional_service',
		'app.expedient',
		'app.infographic',
		'app.map',
		'app.motiongraphic',
		'app.statistic'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Study = ClassRegistry::init('Study');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Study);

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
