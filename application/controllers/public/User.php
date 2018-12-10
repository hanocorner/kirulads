<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends Public_Controller 
{
    /** */
	public function  __construct()
	{
		parent::__construct();
    }
    
    /** */
	public function index()
	{	
		
		//$this->benchmark->mark('code_start');
        $this->layout->assets('assets/public/dist/css/app.css');
        $this->layout->assets('assets/public/dist/js/app.js', 'footer');
		$this->layout->view('welcome_message');
		//$this->benchmark->mark('code_end');

		//echo $this->benchmark->elapsed_time('code_start', 'code_end');

		//echo $this->benchmark->memory_usage();
		//$this->output->enable_profiler(TRUE);
    }
    
    /** */
    public function login()
    {
        //$this->benchmark->mark('code_start');
       
        $this->layout->view('public/user/login');
        /*$this->benchmark->mark('code_end');
        echo $this->benchmark->memory_usage();
		$this->output->enable_profiler(TRUE);*/
    }

    /** */
    public function authenticate()
    {
        # code...
    }

    /** */
    public function register()
    {
        $this->layout->view('public/user/register');
    }

    /*** */
    public function create_user()
    {
        
    }

    /*** */
    public function my_account()
    {
        $this->layout->view('public/user/profile');
    }

    /** */
    public function forgot_password()
    {
        $this->layout->view('public/user/forgot_password');
    }

    /** */
    public function reset_password()
    {
        $this->layout->view('public/user/reset_password');
    }

    /** */
    public function reset()
    {
        $this->layout->view('public/user/reset');
    }

    /**** */
    public function account_settings()
    {
        $this->layout->view('public/user/account_settings');
    }
}

?>