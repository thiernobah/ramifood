<?php

App::uses('AppController', 'Controller');

/**
 * Users Controller
 *
 * @property User $User
 */
class UsersController extends AppController {

    public function beforeFilter() {
        parent::beforeFilter();
    }

    function facebook() {
        App::import('Lib', 'Facebook/facebook');

        if (!$this->Session->started()) {
            session_save_path('/var/www/vhosts/ramifood.com/httpdocs/app/tmp/sessions');
        }

        $facebook = new Facebook(
                array(
            'appId' => '602999063061173',
            'secret' => '50ea7efd50a2f9ebcf70f58941c66262'
                )
        );
        $user = $facebook->getUser();

        if ($user) {
            try {
                $data = $facebook->api('/me');

                $this->User->recursive = -1;
                $ismember = $this->User->find('first', array('conditions' => array('User.fbid' => $data['id'])
                ));
                if (!empty($ismember)) {
                    $this->Auth->login($ismember['User']);
                    $this->redirect(array('controller' => 'profile', 'action' => 'index'));
                } else {

                    if ($this->request->is('post')) {
                        //debug($data);
                        $this->request->data['User']['firstname'] = $data['first_name'];
                        $this->request->data['User']['lastname'] = $data['last_name'];
                        $this->request->data['User']['email'] = $data['email'];
                        $this->request->data['User']['birthday'] = $data['birthday'];
                        $this->request->data['User']['role'] = 'author';
                        $this->request->data['User']['fbid'] = $data['id'];
                        $this->request->data['User']['accepted'] = 1;
                        $this->request->data['User']['online'] = 1;
                        $this->request->data['User']['gender'] = $data['gender'];

                        if ($this->User->signup_user($this->request->data)) {
                            $u = $this->User->read();
                            $this->Auth->login($u['User']);
                            $this->redirect(array('controller' => 'profile', 'action' => 'index'));
                        } else {
                            $this->Session->setFlash('Attention vous n\'êtes pas connecter', array('class' => 'alert alert-error'));
                        }
                    }
                }
            } catch (FacebookApiException $e) {
                debug($e);
            }
        } else {
            $this->Session->setFlash('Erreur de connexion avec facebook', null, array('class' => 'alert alert-error'));
            $this->redirect(array('controllers' => 'users', 'action' => 'login'));
        }
    }

    function twitter() {
        
    }

    /**
     * set_username
     * 
     * @return void 
     */
    function set_username() {

        if ($this->request->is('post')) {

            $this->User->id = (int) $this->Session->read('Auth.User.id');
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash('mise à jour effectuée avec succès.');
                $this->redirect($this->referer());
            } else {
                $this->Session->setFlash('Attention la mise à jours n\'a pu être effectuée.');
            }
        }
    }

    /**
     * set_password method
     * 
     * @return void
     */
    function set_password() {
        if ($this->request->is('post')) {

            $password = $this->User->find('first', array('conditions' => array('User.id' => $this->Session->read('Auth.User.id'))));

            $oldnew = AuthComponent::password($this->request->data['User']['oldpassword']);

            if ($oldnew === $password['User']['password']) {

                $this->User->id = (int) $this->Session->read('Auth.User.id');

                if ($this->User->save($this->request->data)) {
                    $this->Session->setFlash('Votre mot de passe a été modifier avec succès');
                    $this->redirect($this->referer());
                } else {
                    $this->Session->setFlash(__('Attention le mot de passe n\'a pu être changé.'));
                    $this->redirect($this->referer());
                }
            } else {
                $this->Session->setFlash('L\'ancien mot de passe n\'est pas correct');
                $this->redirect($this->referer());
            }
        }
    }

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($username = null) {
        $this->User->recursive = 0;
        if (!$this->User->username_exist($username)) {
            throw new NotFoundException(__('Invalid user'));
        }
        $options = array('conditions' => array('User.username' => $username));
        $this->set('user', $this->User->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function signup() {
        if ($this->request->is('post')) {
            $this->User->create();

            if ($this->User->signup_user($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        }

        $this->layout = 'home';
    }

    /**
     * Login method
     * 
     * @return void
     */
    public function login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $id = $this->Session->read('Auth.User.id');
                if ($this->User->updateAll(array('User.online' => 1), array('User.id' => (int) $id))) {
                    $this->redirect($this->Auth->redirect());
                }
            } else {
                $this->Session->setFlash(__('Invalid username or password, try again'));
            }
        }
    }

    /**
     * logout method
     * 
     * @return void
     */
    public function logout() {

        $id = $this->Session->read('Auth.User.id');
        if ($this->User->updateAll(array('User.online' => 0), array('User.id' => (int) $id))) {
            $this->redirect($this->Auth->logout());
        }
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->User->exists($id)) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Session->setFlash(__('The user has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The user could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
            $this->request->data = $this->User->find('first', $options);
        }
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
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->User->delete()) {
            $this->Session->setFlash(__('User deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('User was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

}

