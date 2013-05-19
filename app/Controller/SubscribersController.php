<?php

App::uses('AppController', 'Controller');

/**
 * Subscribers Controller
 *
 * @property Subscriber $Subscriber
 */
class SubscribersController extends AppController {

    /**
     * index method
     *
     * @return void
     */
    public function index() {
        $this->Subscriber->recursive = 0;
        $this->set('subscribers', $this->paginate());
    }

    public function participate() {
        if ($this->request->is('post')) {
            debug($this->request->data);
            
            if($this->Subscriber->save($this->request->data))
            {
                $this->redirect($this->referer());
            }else{
                
            }
        }
    }

    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($id = null) {
        if (!$this->Subscriber->exists($id)) {
            throw new NotFoundException(__('Invalid subscriber'));
        }
        $options = array('conditions' => array('Subscriber.' . $this->Subscriber->primaryKey => $id));
        $this->set('subscriber', $this->Subscriber->find('first', $options));
    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        if ($this->request->is('post')) {
            $this->Subscriber->create();
            if ($this->Subscriber->save($this->request->data)) {
                $this->Session->setFlash(__('The subscriber has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The subscriber could not be saved. Please, try again.'));
            }
        }
        $announces = $this->Subscriber->Announce->find('list');
        $users = $this->Subscriber->User->find('list');
        $this->set(compact('announces', 'users'));
    }

    /**
     * edit method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function edit($id = null) {
        if (!$this->Subscriber->exists($id)) {
            throw new NotFoundException(__('Invalid subscriber'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Subscriber->save($this->request->data)) {
                $this->Session->setFlash(__('The subscriber has been saved'));
                $this->redirect(array('action' => 'index'));
            } else {
                $this->Session->setFlash(__('The subscriber could not be saved. Please, try again.'));
            }
        } else {
            $options = array('conditions' => array('Subscriber.' . $this->Subscriber->primaryKey => $id));
            $this->request->data = $this->Subscriber->find('first', $options);
        }
        $announces = $this->Subscriber->Announce->find('list');
        $users = $this->Subscriber->User->find('list');
        $this->set(compact('announces', 'users'));
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
        $this->Subscriber->id = $id;
        if (!$this->Subscriber->exists()) {
            throw new NotFoundException(__('Invalid subscriber'));
        }
        $this->request->onlyAllow('post', 'delete');
        if ($this->Subscriber->delete()) {
            $this->Session->setFlash(__('Subscriber deleted'));
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Subscriber was not deleted'));
        $this->redirect(array('action' => 'index'));
    }

}
