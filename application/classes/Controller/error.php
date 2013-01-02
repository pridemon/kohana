<?php defined('SYSPATH') or die('No direct script access.'); 
 
class Controller_Error extends Controller_Website 
{ 
     
    /**
     * @var string
     */ 
    protected $_message; 
    
    protected $_requested_page;
 
    /**
     * Pre determine error display logic
     */ 
    public function before() 
    { 
    	parent::before();
	 
	    // Internal request only!
	    if (Request::initial() !== Request::current())
	    {
	        if ($this->_message = rawurldecode($this->request->param('message')))
	        {
	            $this->_message = $message;
	        }
	        
	        if ($requested_page = rawurldecode($this->request->param('origuri'))) 
            { 
                $this->_requested_page = $requested_page; 
            } 
	    }
	    else
	    {
	        $this->request->action(404);
	        
	        $this->_requested_page = Arr::get($_SERVER, 'REQUEST_URI'); 
	    }
	 
	    $this->response->status((int) $this->request->action());
    } 
 
    /**
     * Serves HTTP 404 error page
     */ 
    public function action_404() 
    { 

        $this->template->description = 'The requested page not found'; 
        $this->template->keywords = 'not found, 404'; 
		$this->template->title = '404 Not Found';
		$this->template->message = $this->_message;
        $this->template->requested_page = $this->_requested_page;   
		
		// Here we check to see if a 404 came from our website. This allows the
		// webmaster to find broken links and update them in a shorter amount of time.
		if (isset ($_SERVER['HTTP_REFERER']) AND strstr($_SERVER['HTTP_REFERER'], $_SERVER['SERVER_NAME']) !== FALSE)
		{
		    // Set a local flag so we can display different messages in our template.
		    $this->template->local = TRUE;
		}
		 
		// HTTP Status code.
		$this->response->status(404);
    } 
 
    /**
     * Serves HTTP 500 error page
     */ 
    public function action_500() 
    { 

        $this->template->description = 'Internal server error occured'; 
        $this->template->keywords = 'server error, 500, internal error, error'; 
        $this->template->title = 'Internal server error occured'; 
 
        //$this->view = View::factory('error/500'); 
    } 
}