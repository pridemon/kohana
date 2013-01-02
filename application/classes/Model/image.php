<?php defined('SYSPATH') or die('No direct access allowed.');     

class Model_Image extends ORM
{

    protected $_table_columns = array(
        'id'=>'', 'width'=> '', 'height'=>'', 'mime'=>'', 'size'=>'', 'slug' => '',
        'created' => '',
    );
    
    public function get_extention() {
        return str_replace('jpeg', 'jpg', image_type_to_extension ($this->mime, false));
    }
            
    public function get_src( $size = "files" ) {
        $path = URL::base('http'). 'media/'. $size .'/';
        
        return $path . $this->slug.'.'.$this->get_extention();
    }  
    
    public function get_image( $size = "files" ) {
        return '<img src="'.$this->get_src($size).'" />';
    }   
    
    public function get_file() {
        $path = 'media/files/';
        
        return $path . $this->slug.'.'.$this->get_extention();       
    }
    

}