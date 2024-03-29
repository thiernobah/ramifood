<?php

/*
 * Helper to get users meta
 */

class UsersHelper extends AppHelper {

    /**
     * Load session helper
     */
    public $helpers = array('Session');

    /**
     * getAvatar method 
     * 
     * @param int $user_id Current user_id
     * @return string Avatar name
     */
    function getAvatar($user_id = null) {

        App::import('Model', 'Profile');
        $profile_model = new Profile();

        $avatar = $profile_model->find('first', array(
            'conditions' => array('Profile.users_id' => (int) $user_id),
            'fields' => array('avatar')
        ));

        if (!empty($avatar['Profile']['avatar'])) {
            return '<img src="/img/avatars/'.$avatar['Profile']['avatar'].'" title="Photo profil">';
        } else {
            return '<img src="http://lorempixum.com/g/80/80/nature" class="img-rounded">';
        }
    }

    /**
     * getUsername method
     * 
     * 
     * @param int $user_id Current user id
     * @return string User name
     */
    function getUsername($user_id = null) {

        App::import('Model', 'User');

        $user_model = new User();

        $user = $user_model->find('first', array(
            'conditions' => array('User.id' => (int) $user_id),
            'fields' => array('User.username')
                )
        );

        return '<a href="/users/view/' .$user['User']['username'] . '" title="Voir le profil de ' . $user['User']['username'] . '">' . $user['User']['username'] . '</a>';
    }

    /**
     * voted method
     * 
     * @param int $recipe_id the recipe id
     * @return int number of vote
     */
    function voted($recipe_id = null) {

        App::import('Model', 'RecipesLike');

        $recipe_like = new RecipesLike();

        $count = $recipe_like->find('count', array(
            'conditions' => array('RecipesLike.recipes_id' => (int) $recipe_id,
                'RecipesLike.users_id' => (int) $this->Session->read('Auth.User.id'))
        ));

        return $count;
    }

}

?>
