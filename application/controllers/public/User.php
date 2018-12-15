<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class User extends Public_Controller 
{
    /** */
	public function  __construct()
	{
        parent::__construct();
        
        $this->lang->load('message_lang', 'english');
    }
    
    /** */
	public function index()
	{	
		//$this->benchmark->mark('code_start');
        $this->layout->assets('assets/public/dist/css/app.css');
        $this->layout->assets('assets/public/dist/js/app.js', 'footer');
		//$this->layout->view('welcome_message');
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
    public function register()
    {
        $this->layout->view('public/user/register');
    }

    /*** */
    public function create_user()
    {
        $this->load->model('public/Register_model', 'register');
        $this->load->library(array('encryption', 'user_agent'));

        $this->encryption->initialize(array('driver' => 'mcrypt'));

        if($this->form_validation->run('user_register') == FALSE) return $this->json_output(false, validation_errors());

        $this->_data['name'] = $this->input->post('fullname');
        $this->_data['email'] = $this->input->post('mail');
        $this->_data['number'] = $this->input->post('number');
        $this->_data['password'] = $this->input->post('password');
        $this->_data['regDate'] = date('Y-m-d');
        $this->_data['lastlogin'] = $this->_datetime;
        $this->_data['ipAddress'] = $this->input->ip_address();
        $this->_data['os'] = $this->agent->platform();
        $this->_data['user_agent'] = $this->agent->browser();

        $user = $this->register->create($this->_data);
        var_dump($user);

        if($user['user_created'] == 1) return $this->json_output(true, $this->lang->line('success_register'), 'public/myaccount');

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