<?php

class SlugHelper extends AppHelper{
    
    function slug($id = null, $title = null){
        App::uses('Inflector', 'Helper');
        
        $title = strtolower($title);
        $slug = Inflector::slug($title, '-');
        
        return $id.'-'.$slug;
    }
    
}