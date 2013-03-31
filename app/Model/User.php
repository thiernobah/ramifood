<?php

App::uses('AppModel', 'Model');

/**
 * User Model
 *
 */
App::uses('AuthComponent', 'Controller/Component');

class User extends AppModel {

    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password'])) {
            $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
        }
        return true;
    }

    function username_exist($username = null) {
        $num = $this->find('count', array('conditions' => array('User.username' => $username)));
        
        if ($num > 0) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * table liaison
     * 
     * @var array
     */
    //public $hasOne = array('Profile');

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'online' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'role' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'username' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Ce champs est vide, vous devez le remplir',
            ),
            'isunique' => array(
                'rule' => array('isunique'),
                'message' => 'Ce nom d\'utilisateur est déja utilisé, veuillez choisir un autre',
            ),
            'between' => array(
                'rule' => array('between', 4, 12),
                'message' => 'Le nom d\'utilisateur doit contenir entre 4 et 12 caractères',
            ),
            'alphanumeric' => array(
                'rule' => array('alphanumeric'),
                'message' => 'Le nom d\'utilisateur ne peut contenir que des chiffres et des lettres',
            )
        ),
        'email' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Ce champs est vide, vous devez le remplir',
            ),
            'email' => array(
                'rule' => array('email'),
                'message' => 'Adresse email invalide',
            ),
            'isunique' => array(
                'rule' => array('isunique'),
                'message' => 'Cette adresse email est déja utilisée, veuillez choisir une autre',
            ),
        ),
        'firstname' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Ce champs est vide, vous devez le remplir',
            ),
            'alphanumeric' => array(
                'rule' => array('alphanumeric'),
                'message' => 'Ce champs ne peut contenir que des lettres',
            ),
        ),
        'lastname' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Ce champs est vide, vous devez le remplir',
            ),
            'alphanumeric' => array(
                'rule' => array('alphanumeric'),
                'message' => 'Ce champs ne peut contenir que des lettres',
            ),
        ),
        'birthday' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Ce champs est vide, vous devez le remplir',
            ),
        ),
        'password' => array(
            'notempty' => array(
                'rule' => array('notempty'),
                'message' => 'Ce champs est vide, vous devez le remplir',
            ),
            'between' => array(
                'rule' => array('between', 5, 15),
                'message' => 'Ce champs est vide, vous devez le remplir',
            ),
        ),
    );

    public function signup_user($data = null) {

        $db = $this->getDataSource();
        App::import('model', 'Profile');
        $profile = new Profile();

        $db->begin();

        $flag = false;

        if ($this->save($data)) {
            $users_id = $this->getLastInsertID();
            debug($users_id);
            if ($profile->save(array('users_id' => (int) $users_id))) {
                $flag = true;
            }
        }

        if ($flag) {
            $db->commit();
            return true;
        } else {
            $db->rollback();
            return false;
        }
    }

}
