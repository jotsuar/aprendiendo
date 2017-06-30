<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow( 'logout', 'change_password', 'remember_password', 'remember_password_step_2');
	}

	public function index() {
		$conditions = $this->User->buildConditions($this->request->query);
		$q = isset($this->request->query['q']) ? $this->request->query['q'] : "";
		$this->set("q",$q);
		$this->User->recursive = 0;
		$this->Paginator->settings = array('order'=>array('User.modified'=>'DESC'));
		$users = $this->Paginator->paginate(null, $conditions);
		$this->set(compact('users'));
	}

	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Página no encontrada'));
		}
		$this->User->recursive = 0;
		$conditions = array('User.' . $this->User->primaryKey => $id);
		$this->set('user', $this->User->find('first', compact('conditions')));
	}


	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			$this->request->data["User"]["username"] = $this->request->data["email"];
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('Los datos se han guardado correctamente'), 'flash_success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Error al guardar, por favor inténtelo más tarde'), 'flash_error');
			}
		}
	}


	public function edit($id = null) {

		$id = is_null($id) ? AuthComponent::user("id") : $id;

      	$this->User->id = $id;
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Página no encontrada'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {

			if($this->request->data["User"]["password"] == "")
				unset($this->request->data["User"]["password"]);

			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('Los datos se han guardado correctamente'), 'flash_success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Error al guardar, por favor inténtelo más tarde'), 'flash_error');
			}
		} else {
			$conditions = array('User.' . $this->User->primaryKey => $id);
			$this->request->data = $this->User->find('first', compact('conditions'));
		}
	}

	public function login() {

		if ($this->request->is('post')) {
			try {
				# Retrieve user username for auth
				$this->request->data['User']['username'] = $this->User->getUsername($this->request->data['User']['email']);
			} catch (Exception $e) {
				# In case that this email dont exists in database
				$this->Session->setFlash($e->getMessage(), 'flash_error');
				$this->redirect('/');
			}

			# Try to log in the user
			if ($this->Auth->login()) {
				if (!empty($this->request->data['User']['remember_me']) && $this->request->data['User']['remember_me'] == 'S') {
					$cookie = array();
					$cookie['username'] = $this->request->data['User']['username'];
					$cookie['password'] = $this->Auth->password($this->request->data['User']['password']);

					# Write cookie ( 30 Days )
					$this->Cookie->write('Auth.User', $cookie, true);
				}

				# Redirect to home
				$this->redirect($this->Auth->redirectUrl());
			} else {
				$this->Session->setFlash(__('Tu usuario o contraseña estan errados por favor intentalo de nuevo'), 'flash_error');
			}
		}
	}

	public function logout() {
		# Destroy the Cookie
		$this->Cookie->delete('Auth.User');

		# Destroy the session
		$this->redirect($this->Auth->logout());
	}

	public function remember_password() {
		if ($this->request->is('post')) {
			$user = $this->User->findByEmail($this->request->data['User']['email']);

			if (empty($user)) {
				$this->Session->setFlash('Este correo electrónico no existe en nuestra base de datos.', 'flash_fail');
				$this->redirect(array('action' => 'login'));
			}

			$hash = $this->User->generateHashChangePassword();

			$data = array(
				'User' => array(
					'id' => $user['User']['id'],
					'hash_change_password' => $hash
				)
			);

			$this->User->save($data);
			$this->sendMail("remember_password",$user['User']['email'],__('Reestablecer tu contraseña - ') . Configure::read('Application.name'),array('hash' => $hash));



			$this->Session->setFlash('Ahora debes verificar tu correo electrónico para seguir con el proceso.', 'flash_success');

		}
	}

	/**
	 * Step 2 to change the password.
	 * This step verifies that the hash is valid, if it is, show the form to the user to inform your new password
	 */
	public function remember_password_step_2($hash = null) {

		$user = $this->User->findByHashChangePassword($hash);

		if(empty($user)){
			$this->Session->setFlash('Este link es invalido.', 'flash_fail');
			return $this->redirect(array('action' => 'create',"controller"=>"orders"));
		}elseif($user['User']['hash_change_password'] != $hash){
			$this->Session->setFlash('Este link es invalido.', 'flash_fail');
			return $this->redirect(array('action' => 'create',"controller"=>"orders"));
		}else{

			$this->set('hash', $hash);

			$this->render('/Users/change_password');
		}


	}


	public function profile(){
	}

}
