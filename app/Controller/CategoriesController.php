<?php
App::uses('AppController', 'Controller');
/**
 * Categories Controller
 *
 * @property Category $Category
 * @property PaginatorComponent $Paginator
 */
class CategoriesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

public function index() {
		$conditions = $this->Category->buildConditions($this->request->query);
		$q = isset($this->request->query['q']) ? $this->request->query['q'] : "";
		$this->set("q",$q);
		$this->Category->recursive = 0;
		$this->Paginator->settings = array('order'=>array('Category.modified'=>'DESC'));
		$categories = $this->Paginator->paginate(null, $conditions);
		$this->set(compact('categories'));
	}

	public function view($id = null) {
		if (!$this->Category->exists($id)) {
			throw new NotFoundException(__('Página no encontrada'));
		}
		$this->Category->recursive = 0;
		$conditions = array('Category.' . $this->Category->primaryKey => $id);
		$this->set('category', $this->Category->find('first', compact('conditions')));
	}


	public function add() {
		if ($this->request->is('post')) {
			$this->Category->create();
			if ($this->Category->save($this->request->data)) {
				$this->Session->setFlash(__('Los datos se han guardado correctamente'), 'flash_success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Error al guardar, por favor inténtelo más tarde'), 'flash_error');
			}
		}
	}


	public function edit($id = null) {
      	$this->Category->id = $id;
		if (!$this->Category->exists($id)) {
			throw new NotFoundException(__('Página no encontrada'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Category->save($this->request->data)) {
				$this->Session->setFlash(__('Los datos se han guardado correctamente'), 'flash_success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Error al guardar, por favor inténtelo más tarde'), 'flash_error');
			}
		} else {
			$conditions = array('Category.' . $this->Category->primaryKey => $id);
			$this->request->data = $this->Category->find('first', compact('conditions'));
		}
	}}
