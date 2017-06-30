<?php
App::uses('AppController', 'Controller');
/**
 * Customers Controller
 *
 * @property Customer $Customer
 * @property PaginatorComponent $Paginator
 */
class CustomersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

public function index() {
		$conditions = $this->Customer->buildConditions($this->request->query);
		$q = isset($this->request->query['q']) ? $this->request->query['q'] : "";
		$this->set("q",$q);
		$this->Customer->recursive = 0;
		$this->Paginator->settings = array('order'=>array('Customer.modified'=>'DESC'));
		$customers = $this->Paginator->paginate(null, $conditions);
		$this->set(compact('customers'));
	}

	public function view($id = null) {
		if (!$this->Customer->exists($id)) {
			throw new NotFoundException(__('Página no encontrada'));
		}
		$this->Customer->recursive = 0;
		$conditions = array('Customer.' . $this->Customer->primaryKey => $id);
		$this->set('customer', $this->Customer->find('first', compact('conditions')));
	}


	public function add() {
		if ($this->request->is('post')) {
			$this->Customer->create();
			if ($this->Customer->save($this->request->data)) {
				$this->Session->setFlash(__('Los datos se han guardado correctamente'), 'flash_success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Error al guardar, por favor inténtelo más tarde'), 'flash_error');
			}
		}
	}


	public function edit($id = null) {
      	$this->Customer->id = $id;
		if (!$this->Customer->exists($id)) {
			throw new NotFoundException(__('Página no encontrada'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Customer->save($this->request->data)) {
				$this->Session->setFlash(__('Los datos se han guardado correctamente'), 'flash_success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Error al guardar, por favor inténtelo más tarde'), 'flash_error');
			}
		} else {
			$conditions = array('Customer.' . $this->Customer->primaryKey => $id);
			$this->request->data = $this->Customer->find('first', compact('conditions'));
		}
	}}
