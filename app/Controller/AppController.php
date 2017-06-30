<?php


App::uses('Controller', 'Controller');

class AppController extends Controller {

	public $components = array('Auth','Session','Cookie');
	
	public $helpers = array('Time','Utilidades',
								'Html' => array('className' => 'DefaultHtml'),
                          		'Form' => array('className' => 'DefaultForm')
                          	);

	public function delete($id){
		$action 					= 	$this->uses[0];
		$this->loadModel($action);
		$this->$action->recursive 	= 	-1;
		$item 						=   $this->$action->findById($id);

		if(empty($item)){
		   $this->Session->setFlash(__('El cambio de estado no fue realizado, el elemento seleccionado no existe.'), 'flash_error');
		}else{

			$item[$action]["state"]		=   $item[$action]["state"] == 1 ? 0 : 1;
			$this->$action->id 			=	$id;
			unset($item[$action]["file"]);
			if($this->$action->save($item)){
				$this->Session->setFlash(__('Cambio de estado realizado correctamente'), 'flash_success');
			}else{
				$this->Session->setFlash(__('El cambio de estado no fue realizado'), 'flash_error');
			}
		}
		if($this->request->params["controller"] == "sectors" && !is_null($this->Session->read("sub_sector")))		
			$this->redirect(array("controller" => $this->request->params["controller"],'action' => 'index',$this->Session->read("sub_sector")));
		else
			$this->redirect(array('action' => 'index',"controller" => $this->request->params["controller"]));
	}

	public function beforeFilter()
  	{  		
  		$this->Cookie->time = '30 Days';  // or '1 hour'
	    $this->Cookie->key = 'AS()XA(S*D)AS8dA(Sd80A(SDA*SDAS%D4$AS#SD@ASDtyASGH)_AS0dAoIASNKAshgaFA$#S21d24a3s45dAS$3d#A@$SDASCHVASCa4s33%$ˆ$OAASNH#)(Q)SASIASJ$%$#s253$AS5#Â$%s645$#AS@%#AˆS6%A&*SÂ%S$';
	    $this->Cookie->httpOnly = true;
	    $this->Auth->authenticate = array('Form');
	    $this->Auth->loginRedirect = array('controller'=>'orders','action'=>'create');
	    $this->Auth->redirectUrl = array('controller'=>'orders','action'=>'create');
	    $this->Auth->logoutRedirect = array('action' => 'login', 'controller' => 'users');
	    $this->Auth->authError = 'You are not allowed to see that.';
	    if (!$this->Session->check('Config.language')){

	        $this->Session->write('Config.language', "esp");
	    }

	    if(!$this->Auth->loggedIn() && $this->Cookie->check('Auth.User'))
	    {
	      $cookie = $this->Cookie->read('Auth.User');

	      $user = $this->User->find('first', array(
	        'conditions' => array(
	          'User.username' => $cookie['username'],
	          'User.password' => $cookie['password']
	          )
	        )
	      );

	      if( $this->Auth->login($user['User']) ){
	        $this->redirect(array('controller'=>'orders','action'=>'create'));
	      }

	      if($this->Auth->loggedIn() && $this->params->controller == 'users' && $this->params->action == 'login')
	        $this->redirect(array('controller'=>'orders','action'=>'create'));
	      }

		  if( $this->params->params['controller'] == 'users' && $this->params->params['action'] == 'login' && AuthComponent::user('id'))
		  {
			  $this->redirect(array('controller'=>'orders','action'=>'create'));
		  }

		  if( $this->params->params['controller'] == 'users' && $this->params->params['action'] == 'login'){
			  $this->dbIsConnected();
		  }
  	}

	public function object_to_array($data) {

	  	if (is_array($data) || is_object($data))
	  	{
	      	$result = array();
	      	foreach ($data as $key => $value)
	      	{
	          	$result[$key] = $this->object_to_array($value);
	      	}
	      	return $result;
	  	}
	  	return $data;
	}

	public function sendMail($template,$receive,$subject,$vars){

	    $email = new CakeEmail();
	    $email->template($template, 'default')
	            ->config('gmail')
	            ->emailFormat('html')
	            ->subject(__($subject))
	            ->to($receive)
	            ->from(Configure::read('Email.from_email'))
	            ->viewVars($vars)
	            ->send();
	}


	public function beforeRender() {
	    $this->set(array(
	      'base_url'  => Router::url('/',true),
	    ));
	    parent::beforeRender();
	}

	public function setFlashAndReturn($message = "", $type = "flash_success",$return = array()){		
		$this->Session->setFlash(__($message), $type);
		$this->redirect($return);
	}

}
