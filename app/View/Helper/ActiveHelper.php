<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

class ActiveHelper extends AppHelper{
    
    
    function is_active($name){
        return ($this->params['controller'] === $name) ? 'active':null;
    }
    
    
}


?>
