<?php defined('SYSPATH') or die('No direct access allowed.');

return array(

	/*
	 * The Authentication library to use
	 * Make sure that the library supports:
	 * 1) A get_user method that returns FALSE when no user is logged in
	 *	  and a user object that implements Acl_Role_Interface when a user is logged in
	 * 2) A static instance method to instantiate a Authentication object
	 *
	 * array(CLASS_NAME,array $arguments)
	 */
	'lib' => array(
        'class'  => 'AUTH', // (or AUTH)
        'params' => array('auth')
    ),

	'exception' => FALSE,

	/*
	 * The ACL Roles (String IDs are fine, use of ACL_Role_Interface objects also possible)
	 * Use: ROLE => PARENT(S) (make sure parent is defined as role itself before you use it as a parent)
	 */
	'roles' => array
	(
	    'login' => 'guest',
        'temp'  => 'guest',
		'admin'  => 'login',
	),

	/*
	 * The name of the guest role 
	 * Used when no user is logged in.
	 */
	'guest_role' => 'guest',

	/*
	 * The ACL Resources (String IDs are fine, use of ACL_Resource_Interface objects also possible)
	 * Use: ROLE => PARENT (make sure parent is defined as resource itself before you use it as a parent)
	 */
	'resources' => array
	(
        'user'     => NULL,
        'good'     => NULL,
        'shop'     => NULL,
        'address'  => NULL,
        'page'     => NULL,
        'order'    => NULL,
	),

	/*
	 * The ACL Rules (Again, string IDs are fine, use of ACL_Role/Resource_Interface objects also possible)
	 * Split in allow rules and deny rules, one sub-array per rule:
	     array( ROLES, RESOURCES, PRIVILEGES, ASSERTION)
	 *
	 * Assertions are defined as follows :
			array(CLASS_NAME,$argument) // (only assertion objects that support (at most) 1 argument are supported
			                            //  if you need to give your assertion object several arguments, use an array)
	 */
	'rules' => array
	(
		'allow' => array
		(
            'guest' => array(
                'role'      => 'guest',
                'resource'  => array('good', 'page'),
                'privilege' => 'show'
            ),
            
            'temp' => array(
                'role'      => 'temp',
                'resource'  => array('good', 'order'),
                'privilege' => 'show'
            ),

            'temp2' => array(
                'role'      => 'temp',
                'resource'  => array('order'),
                'privilege' => array('add', 'edit')
            ),
            
			// authors can add blogs
			'author_add' => array(
				'role'      => 'login',
				'resource'  => array('good', 'page', 'order'),
				'privilege' => 'add'
			),

			// administrators can delete and edit everything 
			'admin' => array(
				'role'      => 'admin',
				'resource'  => array('good', 'page', 'order'),
				'privilege' => NULL
			),
		),
		'deny' => array
		(
			  // no deny rules in this example
		)
	)
);