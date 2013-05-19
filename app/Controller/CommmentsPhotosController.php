<?php
App::uses('AppController', 'Controller');
/**
 * CommmentsPhotos Controller
 *
 * @property CommmentsPhoto $CommmentsPhoto
 */
class CommmentsPhotosController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->CommmentsPhoto->recursive = 0;
		$this->set('commmentsPhotos', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->CommmentsPhoto->exists($id)) {
			throw new NotFoundException(__('Invalid commments photo'));
		}
		$options = array('conditions' => array('CommmentsPhoto.' . $this->CommmentsPhoto->primaryKey => $id));
		$this->set('commmentsPhoto', $this->CommmentsPhoto->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->CommmentsPhoto->create();
			if ($this->CommmentsPhoto->save($this->request->data)) {
				$this->Session->setFlash(__('The commments photo has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The commments photo could not be saved. Please, try again.'));
			}
		}
		$photos = $this->CommmentsPhoto->Photo->find('list');
		$this->set(compact('photos'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->CommmentsPhoto->exists($id)) {
			throw new NotFoundException(__('Invalid commments photo'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->CommmentsPhoto->save($this->request->data)) {
				$this->Session->setFlash(__('The commments photo has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The commments photo could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('CommmentsPhoto.' . $this->CommmentsPhoto->primaryKey => $id));
			$this->request->data = $this->CommmentsPhoto->find('first', $options);
		}
		$photos = $this->CommmentsPhoto->Photo->find('list');
		$this->set(compact('photos'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->CommmentsPhoto->id = $id;
		if (!$this->CommmentsPhoto->exists()) {
			throw new NotFoundException(__('Invalid commments photo'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->CommmentsPhoto->delete()) {
			$this->Session->setFlash(__('Commments photo deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Commments photo was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
