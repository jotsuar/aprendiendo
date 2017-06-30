<?php
App::uses('AppController', 'Controller');
/**
 * Products Controller
 *
 * @property Product $Product
 * @property PaginatorComponent $Paginator
 */
class ProductsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

public function index() {
		$conditions = $this->Product->buildConditions($this->request->query);
		$q = isset($this->request->query['q']) ? $this->request->query['q'] : "";
		$this->set("q",$q);
		$this->Product->recursive = 0;
		$this->Paginator->settings = array('order'=>array('Product.modified'=>'DESC'));
		$products = $this->Paginator->paginate(null, $conditions);
		$this->set(compact('products'));
	}

	public function view($id = null) {
		if (!$this->Product->exists($id)) {
			throw new NotFoundException(__('Página no encontrada'));
		}
		$this->Product->recursive = 0;
		$conditions = array('Product.' . $this->Product->primaryKey => $id);
		$this->set('product', $this->Product->find('first', compact('conditions')));
	}


	public function add() {
		if ($this->request->is('post')) {
			$this->Product->create();
			if ($this->Product->save($this->request->data)) {
				$this->Session->setFlash(__('Los datos se han guardado correctamente'), 'flash_success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Error al guardar, por favor inténtelo más tarde'), 'flash_error');
			}
		}
		$categories = $this->Product->Category->find('list');
		$this->set(compact('categories'));
	}


	public function edit($id = null) {
      	$this->Product->id = $id;
		if (!$this->Product->exists($id)) {
			throw new NotFoundException(__('Página no encontrada'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Product->save($this->request->data)) {
				$this->Session->setFlash(__('Los datos se han guardado correctamente'), 'flash_success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Error al guardar, por favor inténtelo más tarde'), 'flash_error');
			}
		} else {
			$conditions = array('Product.' . $this->Product->primaryKey => $id);
			$this->request->data = $this->Product->find('first', compact('conditions'));
		}
		$categories = $this->Product->Category->find('list');
		$this->set(compact('categories'));
	}}
