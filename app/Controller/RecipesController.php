<?php

App::uses('AppController', 'Controller');

/**
 * Recipes Controller
 *
 * @property Recipe $Recipe
 */
class RecipesController extends AppController {

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Recipe->recursive = -1;
        
        $this->paginate = array(
            'fields' => array('Recipe.title','Recipe.created','Recipe.id', 'Recipe.recipe', 
                'Recipe.users_id', '(select username from fo_users where fo_users.id = Recipe.users_id) as username')
        );
        
        $recipes = $this->paginate('Recipe');
        $this->set(compact('recipes'));
    }

    /**
     * 
     * 
     */
    public function set_imageupload() {
        if ($this->request->is('post')) {
            $image = new Imagick($this->request->data['avatar']);
        }
    }

    function my_recipes() {

        $users_id = $this->Session->read('Auth.User.id');

        $this->Recipe->recursive = -1;
        $this->paginate = array(
            'conditions' => array('Recipe.users_id' => (int) $users_id),
            'limit' => 15
        );

        $recipes = $this->paginate('Recipe');
        $this->set(compact('recipes'));
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {

        if (!$this->Recipe->exists($id)) {
            throw new NotFoundException(__('Invalid recipe'));
        }

        $options = array('conditions' => array('Recipe.' . $this->Recipe->primaryKey => $id));
        $this->loadModel('Comment');

        $this->Comment->recursive = -1;

        $this->paginate = array(
            'fields' => array('Comment.comment', 'Comment.created', 'Comment.users_id',
                '(select username from fo_users where Comment.users_id = fo_users.id) as username',
                '(select avatar from fo_profiles where Comment.users_id = fo_profiles.id) as avatar'
            ),
            'conditions' => array('Comment.recipes_id'),
            'limit' => 20
        );

        $comments = $this->paginate('Comment');

        $this->set('commments', $comments);
        $this->set('recipe', $this->Recipe->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Recipe->create();
            if ($this->Recipe->save($this->request->data)) {
                $this->Session->setFlash(__('The recipe has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The recipe could not be saved. Please, try again.'));
            }
        }
        $users_id = $this->Session->read('Auth.User.id');
        $users = $this->Recipe->User->find('list');
        //$likes = $this->Recipe->Like->find('list');
        $this->set(compact('users', 'likes', 'users_id'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Recipe->exists($id)) {
            throw new NotFoundException(__('Invalid recipe'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Recipe->save($this->request->data)) {
                $this->Session->setFlash(__('The recipe has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The recipe could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Recipe.' . $this->Recipe->primaryKey => $id));
            $this->request->data = $this->Recipe->find('first', $options);
        }
        $users = $this->Recipe->User->find('list');
        $likes = $this->Recipe->Like->find('list');
        $this->set(compact('users', 'likes'));
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
        $this->Recipe->id = $id;
        if (!$this->Recipe->exists()) {
            throw new NotFoundException(__('Invalid recipe'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Recipe->delete()) {
            $this->Session->setFlash(__('Recipe deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Recipe was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

}
