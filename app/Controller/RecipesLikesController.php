<?php
App::uses('AppController', 'Controller');
/**
 * RecipesLikes Controller
 *
 * @property RecipesLike $RecipesLike
 */
class RecipesLikesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->RecipesLike->recursive = 0;
		$this->set('recipesLikes', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->RecipesLike->exists($id)) {
			throw new NotFoundException(__('Invalid recipes like'));
		}
		$options = array('conditions' => array('RecipesLike.' . $this->RecipesLike->primaryKey => $id));
		$this->set('recipesLike', $this->RecipesLike->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->RecipesLike->create();
			if ($this->RecipesLike->save($this->request->data)) {
				$this->Session->setFlash(__('The recipes like has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The recipes like could not be saved. Please, try again.'));
			}
		}
		$recipes = $this->RecipesLike->Recipe->find('list');
		$users = $this->RecipesLike->User->find('list');
		$this->set(compact('recipes', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->RecipesLike->exists($id)) {
			throw new NotFoundException(__('Invalid recipes like'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->RecipesLike->save($this->request->data)) {
				$this->Session->setFlash(__('The recipes like has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The recipes like could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('RecipesLike.' . $this->RecipesLike->primaryKey => $id));
			$this->request->data = $this->RecipesLike->find('first', $options);
		}
		$recipes = $this->RecipesLike->Recipe->find('list');
		$users = $this->RecipesLike->User->find('list');
		$this->set(compact('recipes', 'users'));
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
		$this->RecipesLike->id = $id;
		if (!$this->RecipesLike->exists()) {
			throw new NotFoundException(__('Invalid recipes like'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->RecipesLike->delete()) {
			$this->Session->setFlash(__('Recipes like deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Recipes like was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
