<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Account extends Public_Controller 
{
    /** */
	public function  __construct()
	{
        parent::__construct();

        $this->check_login_status();

        $this->load->model('public/account_model', 'acc');
    }

    /**
     * 
     */
    public function index()
    {
        $this->_data['results'] = $this->acc->fetch_myads($this->session->userid);
        $this->layout->view('public/user/my_account', $this->_data);
    }

     /**
     * 
     */
    public function logout()
    {
        $session_data = $this->session->all_userdata();
        foreach ($session_data as $key => $value) 
        {
            if($key == 'session_id' || $key == 'logged_in' || $key == 'userid') 
            {
                $this->session->unset_userdata($key);
            }
        }
        $this->session->sess_destroy();

        redirect('base');
    }

     /**
     * 
     */
    public function settings()
    {
        $this->layout->view('public/user/account_settings');
    }

    /**
     * 
     */
    public function my_ads()
    {
        $this->_data['results'] = $this->acc->fetch_myads($this->session->userid);
        $this->layout->view('public/user/my_ads', $this->_data);
    }


}
?>
