<?php
App::uses('AppController', 'Controller');
/**
 * OrderProducts Controller
 *
 * @property OrderProduct $OrderProduct
 * @property PaginatorComponent $Paginator
 */
class OrderProductsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

public function index() {
		$conditions = $this->OrderProduct->buildConditions($this->request->query);
		$q = isset($this->request->query['q']) ? $this->request->query['q'] : "";
		$this->set("q",$q);
		$this->OrderProduct->recursive = 0;
		$this->Paginator->settings = array('order'=>array('OrderProduct.modified'=>'DESC'));
		$orderProducts = $this->Paginator->paginate(null, $conditions);
		$this->set(compact('orderProducts'));
	}

	public function view($id = null) {
		if (!$this->OrderProduct->exists($id)) {
			throw new NotFoundException(__('Página no encontrada'));
		}
		$this->OrderProduct->recursive = 0;
		$conditions = array('OrderProduct.' . $this->OrderProduct->primaryKey => $id);
		$this->set('orderProduct', $this->OrderProduct->find('first', compact('conditions')));
	}


	public function add() {
		if ($this->request->is('post')) {
			$this->OrderProduct->create();
			if ($this->OrderProduct->save($this->request->data)) {
				$this->Session->setFlash(__('Los datos se han guardado correctamente'), 'flash_success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Error al guardar, por favor inténtelo más tarde'), 'flash_error');
			}
		}
		$orders = $this->OrderProduct->Order->find('list');
		$products = $this->OrderProduct->Product->find('list');
		$this->set(compact('orders', 'products'));
	}


	public function edit($id = null) {
      	$this->OrderProduct->id = $id;
		if (!$this->OrderProduct->exists($id)) {
			throw new NotFoundException(__('Página no encontrada'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->OrderProduct->save($this->request->data)) {
				$this->Session->setFlash(__('Los datos se han guardado correctamente'), 'flash_success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Error al guardar, por favor inténtelo más tarde'), 'flash_error');
			}
		} else {
			$conditions = array('OrderProduct.' . $this->OrderProduct->primaryKey => $id);
			$this->request->data = $this->OrderProduct->find('first', compact('conditions'));
		}
		$orders = $this->OrderProduct->Order->find('list');
		$products = $this->OrderProduct->Product->find('list');
		$this->set(compact('orders', 'products'));
	}}
