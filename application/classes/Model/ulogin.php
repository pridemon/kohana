<?php defined('SYSPATH') or die('No direct script access.');

class Model_Ulogin extends Model_Kohana_Ulogin {
    
    protected $_table_columns = array('id'=>'', 'user_id'=>'', 'network'=>'',
        'identity'=>'',  'photo' =>'' , 'photo_big' => '');
    
    public function get_avatar() {
        return '<img src="'.$this->photo.'" />';
    }
    
    public function get_uri() {
        return $this->identity;
    }
    
    public function get_link() {
        
    }
    
}