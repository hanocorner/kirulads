<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Account extends Public_Controller 
{
    /** */
	public function  __construct()
	{
        parent::__construct();

        $this->check_login_status();

        //$this->lang->load('message_lang', 'english');

    }

    /**
     * 
     */
    public function index()
    {
        $this->layout->view('public/user/my_account');
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
        
        $this->load->helper('cookie');
        delete_cookie("k_ads");

        redirect('base');
    }

     /**
     * 
     */
    public function settings()
    {
        $this->layout->view('public/user/account_settings');
    }


}
?>
