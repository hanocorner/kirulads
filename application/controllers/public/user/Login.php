<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends Public_Controller 
{
    /** */
	public function  __construct()
	{
        parent::__construct();

        if ($this->session->has_userdata('logged_in') && $this->session->logged_in == TRUE) 
        {
            redirect('user/account');
        }
        
        $this->lang->load('message_lang', 'english');

        $this->load->model('public/Login_model', 'login');

        $this->load->library(array('encryption', 'user_agent'));

        $this->encryption->initialize(array('driver' => 'mcrypt'));
        
    }

    /** */
	public function index()
	{	
        $this->layout->title = 'Account log in - kirulads.lk';  
        $this->layout->view('public/user/login');
    }

    /*** */
    public function authenticate()
    {
        $this->_data['email'] = $this->input->post('mail');
        $this->_data['password'] = $this->input->post('password');

        if($this->form_validation->run('user_auth') == FALSE) return $this->json_output(false, validation_errors());

        // DB stored data 
        $credentials = $this->login->validate_credentials($this->_data);

        if($credentials[0]->user_exists == 0)
        {
            return $this->json_output(false, $this->lang->line('error_invalid_email'));
        }

        if ($this->_data['password'] == $this->encryption->decrypt($credentials[0]->u_pass)) 
        {
            $session_data = array('userid' => $credentials[0]->users_id, 'logged_in' => TRUE);

            $this->session->set_userdata($session_data);

            return $this->json_output(true, $this->lang->line('success_auth'), 'user/account');
            
        }
        else 
        {
            return $this->json_output(false, $this->lang->line('error_invalid_pass'));
        }
    }

}
?>