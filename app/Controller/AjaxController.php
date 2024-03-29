<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class AjaxController extends AppController {
    
    
    function autocomplete()
    {
        $this->loadModel('User');
        $user = new User();
        $users = $user->find('all', 
                array('fields' => array('User.id', 'User.username'),
                    'conditions'=> array('User.username LIKE' => "%".$_GET['term']."%")));
        $data = array();
        
        foreach ($users as $u):
            $data[] = array('id' => $u['User']['id'],'label' => $u['User']['username'], 'value' => $u['User']['username']);
        endforeach;
        echo json_encode($data);
        $this->autoRender = false;
    }

    public function confirmed() {
        if ($this->request->is('post')) {
            $t = array();


            $this->loadModel('Subscriber');

            $this->Subscriber->id = (int) $this->request->d;

            if($this->Subscriber->updateAll(
                    array('Subscriber.status' => 1), 
                    array('Subscriber.users_id' => $this->request->data['user_id'],
                          'Subscriber.announces_id' => $this->request->data['an_id']
                        )
            )){
                $t['confirmed'] = 'ok';
                echo json_encode($t);
            }
            $this->autoRender = false;
        }
    }

    public function like() {

        if ($this->request->is('post')) {
            $t = array();
            $this->layout = false;
            $id = $this->request->data['id'];

            $this->loadModel('RecipesLike');
            $user_id = $this->Session->read('Auth.User.id');

            $count = $this->RecipesLike->find('count', array(
                'conditions' => array('RecipesLike.recipes_id' => (int) $id,
                    'RecipesLike.users_id' => (int) $user_id)
                    )
            );



            $this->loadModel('Recipe');

            if ($count <= 0) {

                $like = $this->Recipe->find('first', array(
                    'conditions' => array('Recipe.id' => (int) $id),
                    'fields' => array('Recipe.like')
                ));


                $new_like = $like['Recipe']['like'] + 1;

                $this->Recipe->read(null, $id);
                $this->Recipe->set('like', $new_like);
                $this->Recipe->save();

                $this->loadModel('RecipesLike');

                $this->RecipesLike->save(array(
                    'recipes_id' => (int) $id,
                    'users_id' => (int) $user_id
                ));

                $like = $this->Recipe->find('count', array(
                    'conditions' => array('Recipe.id' => (int) $id),
                    'fields' => array('Recipe.like')
                ));

                $t['like'] = $new_like;
            }
            echo json_encode($t);
            $this->autoRender = false;
        }
    }

    function upload() {
        
        if(isset($_FILES))
        {   
        
            debug($_FILES);
            
            /*$filename = $_SERVER['HTTP_X_FILE_NAME'];
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            $file = uniqid('ramifood').'.'.$ext;
            $in = fopen('php://input','r');
            
            $path = APP.DS.WEBROOT_DIR.'img'.DS.'avatars'.$file.'.'.$ext;
            if(move_uploaded_file($in, $path)){
                echo 'ok';
            }  else {
                echo $in['tmp_name'];     
            }*/
        }
        
       $this->autoRender = false;
    }

    public function message_reply() {
        if ($this->request->is('post')) {
            $t = array();

            $this->loadModel('Message');

            /* if($this->Message->save($this->request->data))
              {
              $t['status'] = 'ok';
              }  else {
              $t['status'] = 'no';
              } */

            echo json_encode($t);

            $this->autoRender = false;
        }
    }
    
    function department()
    {
        $t = array();
        if($this->request->is('post'))
        {
            $this->loadModel('Department');
            $list = $this->Department->find('list', array('conditions' => array('Department.regions_id' => $this->request->data['region_id']) ));
            
            $t[] = array('id' => 0, 'name' => 'Choisir un departement');
            foreach ($list as $key => $value) {
                $t[] = array('id' => $key, 'name' => $value);
            }
            
            echo json_encode($t);
        }
        $this->autoRender = false;
    }
    
    function cities()
    {
        if($this->request->is('post'))
        {
            $this->loadModel('City');
            $list = $this->City->find('all', array('limit' =>10,'fields' => array('City.id','City.name', 'City.postalcode'),'conditions' => array('City.departments_id' => $this->request->data['department'],
                'OR' => array(
    array('City.postalcode LIKE' => "%{$this->request->data['name_startsWith']}%"),
    array('City.name LIKE' => "%{$this->request->data['name_startsWith']}%") ))));
            echo json_encode($list);
        }
        $this->autoRender = false;
    }

}

?>
