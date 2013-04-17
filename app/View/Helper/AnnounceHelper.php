<?php

/**
 * Description of AnnounceHelper
 *
 * @author Thierno
 */
class AnnounceHelper extends AppHelper{
    
    function getSubscriber($announce_id = null){
        App::import('Model', 'Subscriber');
        
        $subscriber = new Subscriber();
        
        $d = $subscriber->find('all', 
                array('conditions' => array('Subscriber.announces_id' => (int)$announce_id),
                       'fields' => array('Subscriber.users_id','Subscriber.status')
                    ));
        return $d;
    }
    
    function getSubscriberCount($announce_id = null)
    {
         App::import('Model', 'Subscriber');
        $subscriber = new Subscriber();
         $count = $subscriber->find('count', array('conditions' => array('announces_id' => (int)$announce_id)));
         return $count;
    }
    
}

?>
