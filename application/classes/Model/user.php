<?php defined('SYSPATH') or die('No direct access allowed.');     

class Model_User extends Model_Auth_User implements Acl_Role_Interface, Acl_Resource_Interface 
{
     protected $_has_many = array(
        'ulogins' => array(),
        'user_tokens' => array('model' => 'user_token'),
        'roles'       => array('model' => 'role', 'through' => 'roles_users'),

     );
     
    public function get_role_id() {
        $roles = array();  
        $my_roles = $this->roles->find_all();
        foreach ($my_roles as $role) {                                                             
            $roles[] = $role->name;
        }      
        return $roles;
    }  
    
    public function get_resource_id(){
        return 'user';
    }  
        
}