<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class AD_Handler extends Public_Controller 
{
    /** */
	public function  __construct()
	{
        parent::__construct();

        $this->check_login_status();
    }

    /**
     * 
     */
    public function index()
    {
        //$this->layout->view('public/user/my_account');
    }

    /**
     * 
     */
    public function category()
    {
        $this->layout->title = 'Choose category - Posting an ad';
        $this->layout->view('public/post-ad/category');
    }

    public function advert()
    {
        $this->layout->title = 'Posting an ad';
        $this->layout->view('public/post-ad/submit_ad');
    }

    public function ad_complete()
    {
        $this->layout->title = 'Posting an ad';
        $this->layout->view('public/post-ad/ad_complete');
    }
}
?>