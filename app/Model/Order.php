<?php
App::uses('AppModel', 'Model');

class Order extends AppModel {

	public $validate = array(
		'date' => array('date' => array('rule' => array('date'),'message' => 'date'),
		),
		'total' => array('date' => array('rule' => array('date'),'message' => 'total'),
		),
		'user_id' => array('numeric' => array('rule' => array('numeric'),'message' => 'user_id'),
		),
		'customer_id' => array('numeric' => array('rule' => array('numeric'),'message' => 'customer_id'),
		),
	);


	public $belongsTo = array(
		'User' => array('className' => 'User','foreignKey' => 'user_id',),
		'Customer' => array('className' => 'Customer','foreignKey' => 'customer_id',)
	);

	public $hasMany = array(
		'OrderProduct' => array('className' => 'OrderProduct','foreignKey' => 'order_id','dependent' => false,)
	);


	public function buildConditions($params=array()) {
		$conditions = array();
		if(!empty($params['q'])) {
			$params['q'] = trim(strtolower($params['q']));
			$conditions['OR'] = array(
				'LOWER(Order.name) LIKE'=>"%{$params['q']}%",
			);
		}
		return $conditions;
	}

}
