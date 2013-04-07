<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class AjaxController extends AppController {

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

}

?>
