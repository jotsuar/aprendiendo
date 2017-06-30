<?php
App::uses('AppModel', 'Model');

class OrderProduct extends AppModel {

	public $validate = array(
		'order_id' => array('numeric' => array('rule' => array('numeric'),'message' => 'order_id'),
		),
		'product_id' => array('numeric' => array('rule' => array('numeric'),'message' => 'product_id'),
		),
		'unit_value' => array('numeric' => array('rule' => array('numeric'),'message' => 'unit_value'),
		),
		'quantity' => array('numeric' => array('rule' => array('numeric'),'message' => 'quantity'),
		),
	);


	public $belongsTo = array(
		'Order' => array('className' => 'Order','foreignKey' => 'order_id',),
		'Product' => array('className' => 'Product','foreignKey' => 'product_id',)
	);

	public function buildConditions($params=array()) {
		$conditions = array();
		if(!empty($params['q'])) {
			$params['q'] = trim(strtolower($params['q']));
			$conditions['OR'] = array(
				'LOWER(OrderProduct.name) LIKE'=>"%{$params['q']}%",
			);
		}
		return $conditions;
	}

}
