<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Guard extends Public_Controller 
{
    /** */
	public function  __construct()
	{
        parent::__construct();

        $this->lang->load('message_lang', 'english');

        $this->load->model('public/Login_model', 'login');

        $this->load->library(array('encryption', 'user_agent'));

        $this->encryption->initialize(array('driver' => 'mcrypt'));

    }

    public function authenticate()
    {
        $this->_data['email'] = $this->input->post('email');
        $this->_data['password'] = ($this->input->post('password'));
        

        $date = mdate($datestring, $time);

        if($this->form_validation->run('user_auth') == FALSE) return $this->json_output(false, validation_errors());

        // DB stored data 
        $credentials = $this->login->validate_credentials($this->_data);

        if($credentials['user_exists'] == 0)
        {
            return $this->json_output(false, $this->lang->line('error_invalid_email'));
        }

        if ($credentials['password'] == $this->encryption->decrypt($this->_data['password'])) 
        {
            $this->_data['date'] = $this->_datetime;
            $this->_data['ipAddress'] = $this->input->ip_address();
            $this->_data['os'] = $this->agent->platform();
            $this->_data['user_agent'] = $this->agent->browser();

            $logged = $this->login->log($this->_data, $credentials['userid']);

            if(!$logged) log_message('error', 'Problem when updating user log data');

            $session_data = array('userid' => $credentials['userid'], 'logged_in' => TRUE);

            $this->session->set_userdata($session_data);

            return $this->json_output(true, $this->lang->line('success_auth'), 'public/myaccount');
            
        }
        else 
        {
            return $this->json_output(false, $this->lang->line('error_invalid_pass'));
        }
    }
} 
?>