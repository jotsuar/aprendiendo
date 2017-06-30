<?php
App::uses('AppModel', 'Model');

class Product extends AppModel {

	public $validate = array(
		'name' => array('notBlank' => array('rule' => array('notBlank'),'message' => 'name'),
		),
		'description' => array('notBlank' => array('rule' => array('notBlank'),'message' => 'description'),
		),
		'category_id' => array('numeric' => array('rule' => array('numeric'),'message' => 'category_id'),
		),
		'price' => array('numeric' => array('rule' => array('numeric'),'message' => 'price'),
		),
		'stock' => array('numeric' => array('rule' => array('numeric'),'message' => 'stock'),
		),
	);


	public $belongsTo = array(
		'Category' => array('className' => 'Category','foreignKey' => 'category_id',)
	);

	public function buildConditions($params=array()) {
		$conditions = array();
		if(!empty($params['q'])) {
			$params['q'] = trim(strtolower($params['q']));
			$conditions['OR'] = array(
				'LOWER(Product.name) LIKE'=>"%{$params['q']}%",
			);
		}
		return $conditions;
	}

}
