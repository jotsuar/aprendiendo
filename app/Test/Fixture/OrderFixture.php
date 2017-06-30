<?php
/**
 * OrderFixture
 *
 */
class OrderFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'date' => array('type' => 'date', 'null' => false, 'default' => null),
		'total' => array('type' => 'date', 'null' => false, 'default' => null),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'customer_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'state' => array('type' => 'integer', 'null' => true, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_bin', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'date' => '2017-06-30',
			'total' => '2017-06-30',
			'user_id' => 1,
			'customer_id' => 1,
			'state' => 1,
			'created' => '2017-06-30 15:06:35',
			'modified' => '2017-06-30 15:06:35'
		),
	);

}
