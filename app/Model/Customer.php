<?php
App::uses('AppModel', 'Model');

class Customer extends AppModel {

	public $validate = array(
		'name' => array('notBlank' => array('rule' => array('notBlank'),'message' => 'name'),
		),
		'telephone' => array('notBlank' => array('rule' => array('notBlank'),'message' => 'telephone'),
		),
		'document' => array('notBlank' => array('rule' => array('notBlank'),'message' => 'document'),
		),
		'gender' => array('notBlank' => array('rule' => array('notBlank'),'message' => 'gender'),
		),
	);


	public $hasMany = array(
		'Order' => array('className' => 'Order','foreignKey' => 'customer_id','dependent' => false,)
	);


	public function buildConditions($params=array()) {
		$conditions = array();
		if(!empty($params['q'])) {
			$params['q'] = trim(strtolower($params['q']));
			$conditions['OR'] = array(
				'LOWER(Customer.name) LIKE'=>"%{$params['q']}%",
			);
		}
		return $conditions;
	}

}
