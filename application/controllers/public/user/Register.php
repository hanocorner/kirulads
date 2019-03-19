<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Register extends Public_Controller 
{
    /** */
	public function  __construct()
	{
        parent::__construct();

        if ($this->session->has_userdata('logged_in') && $this->session->logged_in == TRUE) 
        {
            redirect('user/myAccount');
        }

        $this->load->model('public/Register_model', 'register');
        $this->lang->load('message_lang', 'english');
    }

    /** */
	public function index()
	{	
        $this->layout->title = 'Register';
        $this->layout->view('public/user/register');
    }

    /*** */
    public function create_user()
    {
        $this->load->library(array('encryption', 'user_agent'));

        $this->encryption->initialize(array('driver' => 'mcrypt'));

        if($this->form_validation->run('user_register') == FALSE) return $this->json_output(false, validation_errors('<p>','</p>'));

        $this->_data['name'] = $this->input->post('fullname');
        $this->_data['email'] = $this->input->post('usermail');
        $this->_data['number'] = $this->input->post('number');
        $this->_data['password'] = $this->encryption->encrypt($this->input->post('password'));
        $this->_data['regDate'] = date('Y-m-d');
        $this->_data['lastlogin'] = $this->_datetime;
        $this->_data['ipAddress'] = $this->input->ip_address();
        $this->_data['os'] = $this->agent->platform();
        $this->_data['user_agent'] = $this->agent->browser();

        $user = $this->register->user($this->_data);

        //$this->send_registration_mail($this->_data['email']);

        $session_data = array('userid' => $user[0]->users_id, 'logged_in' => TRUE);

        $this->session->set_userdata($session_data);

        if($user[0]->user_created == 1) return $this->json_output(true, $this->lang->line('success_register'), 'user/account/myads');

    }
    
     /**
     *  Registration mail
     * 
     */
    public function send_registration_mail($address)
    {   
        $this->load->library('email');

        $this->email->from('no-reply@kirulads.lk', 'no-reply@kirulads.lk');
        $this->email->to($address);

        $this->email->subject('Test Mail');
        $this->email->message('Testing the email class.');

        if ( ! $this->email->send())    
        {
            log_message('error', 'Unable to send the registeration mail');
        }
    }

    /*** */
    public function check_email()
    {
        $mail = $this->input->get('mail');

        $result = $this->register->mail_availability($mail);

        if($result > 0 )
        {
            return $this->json_output(false, 'Email already exists, Please try a new one');
        }

        return $this->json_output(true);
    }
}

?>