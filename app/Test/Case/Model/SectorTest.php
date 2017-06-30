<?php
App::uses('Sector', 'Model');

/**
 * Sector Test Case
 *
 */
class SectorTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.sector',
		'app.additional_service',
		'app.expedient',
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
		$this->Sector = ClassRegistry::init('Sector');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Sector);

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
