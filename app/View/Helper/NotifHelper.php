<?php

class NotifHelper extends AppHelper {

    public $helpers = array('Session');

    function message() {

        App::import('Model', 'Message');

        $message = new Message();
        $num = $message->find('count', array('conditions' => array('Message.to' => (int) $this->Session->read('Auth.User.id'),
                'Message.status' => 0)
                )
        );

        if ($num > 0) {
            return '<span class="badge badge-important">' . $num . '</span>';
        } else {
            return '';
        }
    }

}