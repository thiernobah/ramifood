<?php

App::uses('AppController', 'Controller');

/**
 * Announces Controller
 *
 * @property Announce $Announce
 */
class AnnouncesController extends AppController {

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Announce->recursive = 0;
        $this->set('announces', $this->paginate());
    }

    /**
     * my_announces
     * 
     * @return void
     */
    public function my_announces() {
        $users_id = $this->Session->read('Auth.User.id');
        $this->Announce->recursive = -1;

        $this->paginate = 
                array(
                    'conditions' => array('Announce.users_id' => (int) $users_id),
                    'limit' => 25
                );
        $announces = $this->paginate('Announce');
        $this->set(compact('announces'));
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Announce->exists($id)) {
            throw new NotFoundException(__('Invalid announce'));
        }
        $options = array('conditions' => array('Announce.' . $this->Announce->primaryKey => $id));
        $this->loadModel('Subscriber');
        $count = $this->Subscriber->find('count', array('conditions' => 
                 array('Subscriber.announces_id' => $id, 
                     'Subscriber.users_id' => (int)$this->Session->read('Auth.User.id'))));
        $this->set('announce', $this->Announce->find('first', $options));
        $this->set('count', $count);
        $this->set('id', $id);
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Announce->create();
            
            $this->request->data['Announce']['cities_id'] = $this->request->data['cities_id'];
            debug($this->request->data);
            
            if ($this->Announce->save($this->request->data)) {
                $this->Session->setFlash(__('The announce has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The announce could not be saved. Please, try again.'));
            }
        }
        $recipes = $this->Announce->Recipe->find('list');
        $regions = $this->Announce->Region->find('list');
        $this->set(compact('recipes','regions'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Announce->exists($id)) {
            throw new NotFoundException(__('Invalid announce'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Announce->save($this->request->data)) {
                $this->Session->setFlash(__('The announce has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The announce could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Announce.' . $this->Announce->primaryKey => $id));
            $this->request->data = $this->Announce->find('first', $options);
        }
        $recipes = $this->Announce->Recipe->find('list');
        $this->set(compact('recipes'));
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
        $this->Announce->id = $id;
        if (!$this->Announce->exists()) {
            throw new NotFoundException(__('Invalid announce'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Announce->delete()) {
            $this->Session->setFlash(__('Announce deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Announce was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

}
