<?php defined('SYSPATH') OR die('No direct access allowed.');     

abstract class Controller_Website extends Controller_Template 
{    

    protected $theme = 'default';       
             
	public function before( ) 
	{	
        $redirect_to = URL::base( 'http' ) . 'home/ulogin';
//        $redirect_to = URL::base( 'http' );
        $this->ulogin = new Ulogin(
            array('redirect_uri' => $redirect_to)
        );

        
		$this->a2   = A2::instance( 'a2' );
		$this->a1   = $this->a2->a1;
		$this->user = $this->a2->get_user( );    
        
        if ($this->user) {
            $this->u_user = $this->user->ulogins->find();
        }

	
		$this->template = 'smarty:'.$this->request->controller( ).'.'.$this->request->action( ); 
        		
		parent::before( );	
		
		$this->template->site = Kohana::$config->load( 'site' );
	
		$this->template->path_web = rtrim( URL::base( 'http' ), '/' );
		 
		$this->template->path_theme = URL::base( 'http' ) . 'themes/'.$this->theme;
        
        $this->template->theme = $this->theme;

		$this->template->js = Kohana::$config->load( 'jslibs' );
		
		$this->template->uri = Request::detect_uri( );

		$this->template->pjax = (isset($_SERVER['HTTP_X_PJAX']));
		
 		$this->template->bind( 'this', $this ); 		
 		
 		if ( Kohana::$environment === Kohana::DEVELOPMENT ) {
 			$this->template->profile = View::factory('profiler/stats');
		} else {
		 	$this->template->profile = '';
		}
        
        $this->template->now_year = date( 'Y' ); 
       	
       	$smarty = Render_Smarty::get_smarty( );         	

       	$smarty->setCSSUrl( URL::base( 'http' ) . 'themes/'.$this->theme.'/' ); 
		$smarty->setScriptUrl (URL::base( 'http' ).'js/' );        

        $this->template->ulogin = $this->ulogin; 
		

	
	}

}

?>