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
        //$this->layout->view('public/user/my_account');
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
