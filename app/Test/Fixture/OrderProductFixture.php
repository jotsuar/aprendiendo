<?php
/**
 * OrderProductFixture
 *
 */
class OrderProductFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'order_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'product_id' => array('type' => 'integer', 'null' => false, 'default' => null),
		'unit_value' => array('type' => 'integer', 'null' => false, 'default' => null),
		'quantity' => array('type' => 'integer', 'null' => false, 'default' => null),
		'total' => array('type' => 'float', 'null' => false, 'default' => null),
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
			'order_id' => 1,
			'product_id' => 1,
			'unit_value' => 1,
			'quantity' => 1,
			'total' => 1,
			'state' => 1,
			'created' => '2017-06-30 15:06:26',
			'modified' => '2017-06-30 15:06:26'
		),
	);

}
