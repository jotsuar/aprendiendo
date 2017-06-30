<?php
App::uses('AppController', 'Controller');
/**
 * Orders Controller
 *
 * @property Order $Order
 * @property PaginatorComponent $Paginator
 */
class OrdersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

public function index() {
		$conditions = $this->Order->buildConditions($this->request->query);
		$q = isset($this->request->query['q']) ? $this->request->query['q'] : "";
		$this->set("q",$q);
		$this->Order->recursive = 0;
		$this->Paginator->settings = array('order'=>array('Order.modified'=>'DESC'));
		$orders = $this->Paginator->paginate(null, $conditions);
		$this->set(compact('orders'));
	}

	public function view($id = null) {
		if (!$this->Order->exists($id)) {
			throw new NotFoundException(__('Página no encontrada'));
		}
		$this->Order->recursive = 0;
		$conditions = array('Order.' . $this->Order->primaryKey => $id);
		$this->set('order', $this->Order->find('first', compact('conditions')));
	}


	public function add() {
		if ($this->request->is('post')) {
			$this->Order->create();
			if ($this->Order->save($this->request->data)) {
				$this->Session->setFlash(__('Los datos se han guardado correctamente'), 'flash_success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Error al guardar, por favor inténtelo más tarde'), 'flash_error');
			}
		}
		$users = $this->Order->User->find('list');
		$customers = $this->Order->Customer->find('list');
		$this->set(compact('users', 'customers'));
	}


	public function edit($id = null) {
      	$this->Order->id = $id;
		if (!$this->Order->exists($id)) {
			throw new NotFoundException(__('Página no encontrada'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Order->save($this->request->data)) {
				$this->Session->setFlash(__('Los datos se han guardado correctamente'), 'flash_success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Error al guardar, por favor inténtelo más tarde'), 'flash_error');
			}
		} else {
			$conditions = array('Order.' . $this->Order->primaryKey => $id);
			$this->request->data = $this->Order->find('first', compact('conditions'));
		}
		$users = $this->Order->User->find('list');
		$customers = $this->Order->Customer->find('list');
		$this->set(compact('users', 'customers'));
	}}
