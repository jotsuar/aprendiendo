<?php
App::uses('AppModel', 'Model');

class Category extends AppModel {



	public $hasMany = array(
		'Product' => array('className' => 'Product','foreignKey' => 'category_id','dependent' => false,)
	);


	public function buildConditions($params=array()) {
		$conditions = array();
		if(!empty($params['q'])) {
			$params['q'] = trim(strtolower($params['q']));
			$conditions['OR'] = array(
				'LOWER(Category.name) LIKE'=>"%{$params['q']}%",
			);
		}
		return $conditions;
	}

}
