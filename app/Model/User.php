<?php
App::uses('AppModel', 'Model');

class User extends AppModel {

	public function beforeSave($options = array())
	{
		if (isset($this->data[$this->alias]['password']) && !empty($this->data[$this->alias]['password']))
	{
	  $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
	}
		return true;
	}

	public $validate = array(
		'name' => array('notBlank' => array('rule' => array('notBlank'),'message' => 'name'),
		),
		'email' => array('email' => array('rule' => array('email'),'message' => 'email'),
		),
		'password' => array('notBlank' => array('rule' => array('notBlank'),'message' => 'password','on' => "create"),
		),
		'document' => array('notBlank' => array('rule' => array('notBlank'),'message' => 'document'),
		),
		'role' => array('notBlank' => array('rule' => array('notBlank'),'message' => 'role'),
		),
		'image' => array('notBlank' => array('rule' => array('notBlank'),'message' => 'image'),
		),
	);


	public $hasMany = array(
		'Order' => array('className' => 'Order','foreignKey' => 'user_id','dependent' => false,)
	);


	public function buildConditions($params=array()) {
		$conditions = array();
		if(!empty($params['q'])) {
			$params['q'] = trim(strtolower($params['q']));
			$conditions['OR'] = array(
				'LOWER(User.name) LIKE'=>"%{$params['q']}%",
			);
		}
		return $conditions;
	}

	public function generateHashChangePassword()
	{
	    $salt = Configure::read('Security.salt');
	    $salt_v2 = Configure::read('Security.cipherSeed');
	    $rand = mt_rand(1,999999999);
	    $rand_v2 = mt_rand(1,999999999);

	    $hash = hash('sha256',$salt.$rand.$salt_v2.$rand_v2);

	    return $hash;
	}

	public function getUsername($email)
	{
	    $username = $this->findByEmail($email,'username');
	    if(empty($username)){
	      throw new InternalErrorException(__('El usuario o la contraseña no son correctos, inténtalo de nuevo'));
	    }
	    return $username['User']['username'];
	}

}
