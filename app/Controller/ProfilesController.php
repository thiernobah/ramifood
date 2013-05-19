<?php

App::uses('AppController', 'Controller');

/**
 * Profiles Controller
 *
 * @property Profile $Profile
 */
class ProfilesController extends AppController {

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        
        $this->Profile->recursive = -1;
        $users_id = $this->Session->read('Auth.User.id');
        $profile = $this->Profile->find('first', array('conditions' => array('Profile.users_id' => (int) $users_id)));

        $this->loadModel('Message');
        $user = $this->Profile->User->find('first', array('conditions' => array('User.id' => (int) $users_id)));
        $mess_number = $this->Message->find('count', 
                array('conditions' => array('Message.to' => (int) $this->Session->read('Auth.User.id')) ));

        $this->set(compact('profile', 'user', 'message_number'));
    }

    /**
     * avatar method
     * 
     * @return void 
     */
    public function avatar() {

        if ($this->request->is('post')) {

            $d = $this->request->data['Profile']['avatar'];

            debug($d); 
            
            /*if (!empty($d['tmp_name'])) {

                $profile_id = $this->Profile->find('first', array(
                    'fields' => array('Profile.id'),
                    'conditions' => array('Profile.users_id' => (int) $this->Session->read('Auth.User.id'))
                ));

                $file_name = uniqid('avatars');
                $ext = strtolower(pathinfo($d['name'], PATHINFO_EXTENSION));

                $path = WWW_ROOT . 'img' . DS . 'avatars' . DS;


                $this->request->data['Profile']['avatar'] = $file_name . '.' . $ext;

                $image = new Imagick($d['tmp_name']);
                $imageprops = $image->getImageGeometry();
                if ($imageprops['width'] <= 300 && $imageprops['height'] <= 300) {
                    
                } else {
                    $image->resizeImage(500, 500, imagick::FILTER_LANCZOS, 0.9, true);
                }
                
                $image->writeImage($path . $file_name . '.' . $ext);

                $this->Profile->id = (int) $profile_id['Profile']['id'];
                if ($this->Profile->save($this->request->data)) {

                    $thumb = new Imagick($path . $file_name . '.' . $ext);
                    $thumb->cropthumbnailimage(200, 150);
                    $thumb->writeimage($path . $file_name . '_200.' . $ext);
                    
                    $micro = clone $thumb;
                    $micro->cropthumbnailimage(80, 70);
                    $micro->writeimage($path . $file_name . '_80.' . $ext);
                    
                    $this->redirect($this->referer());
                }
            }*/
        }

        $this->render(false);
    }

    /**
     * settings method
     * 
     * @return void
     */
    public function settings() {
        $users_id = $this->Session->read('Auth.User.id');
        $this->Profile->recursive = -1;
        $profile = $this->Profile->find('first', array('conditions' => array('Profile.users_id' => (int) $users_id)));

        $user = $this->Profile->User->find('first', array('conditions' => array('User.id' => (int) $this->Session->read('Auth.User.id'))));

        $this->set(compact('profile', 'user'));
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null, $username = null) {
        if (!$this->Profile->exists($id)) {
            throw new NotFoundException(__('Invalid profile'));
        }

        $options = array('conditions' => array('Profile.' . $this->Profile->primaryKey => $id));
        $this->set('profile', $this->Profile->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {

            $this->Profile->create();
            $profile_id = $this->Profile->find('first', array('fields' => array('Profile.id'),
                'conditions' => array('Profile.users_id' => $this->Session->read('Auth.User.id'))));

            $this->Profile->id = (int) $profile_id['Profile']['id'];
            if ($this->Profile->save($this->request->data)) {
                $this->Session->setFlash(__('The profile has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The profile could not be saved. Please, try again.'));
            }
        }
        $users = $this->Profile->User->find('list');
        $this->set(compact('users'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Profile->exists($id)) {
            throw new NotFoundException(__('Invalid profile'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Profile->save($this->request->data)) {
                $this->Session->setFlash(__('The profile has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The profile could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Profile.' . $this->Profile->primaryKey => $id));
            $this->request->data = $this->Profile->find('first', $options);
        }
        $users = $this->Profile->User->find('list');
        $this->set(compact('users'));
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
        $this->Profile->id = $id;
        if (!$this->Profile->exists()) {
            throw new NotFoundException(__('Invalid profile'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Profile->delete()) {
            $this->Session->setFlash(__('Profile deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Profile was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

}
