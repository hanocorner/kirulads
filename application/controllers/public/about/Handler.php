<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Handler extends Public_Controller 
{
    /** */
	public function  __construct()
	{
        parent::__construct();
    }

    /**
     * About us page
     * 
     * @param none
     * @return none
     */
    public function index()
    {
        $this->layout->title = 'About us';
        $this->layout->canonical = current_url();
        $this->layout->description = 'Kirulads.lk main objective is to create a link between buyers and seller who are actively engage in our website.';
        
        $this->layout->view('public/about/index');
    }

    /**
     * Privacy policy page
     * 
     * @param none
     * @return none
     */
    public function privacy()
    {
        $this->layout->title = 'Privacy Policy';
        $this->layout->canonical = current_url();
        $this->layout->description = 'This page informs you of our policies regarding the collection, use and disclosure of Personal Information we receive from users of the Site.';
        
        $this->layout->view('public/about/privacy');
    }

    /**
     * Terms and conditions page
     * 
     * @param none
     * @return none
     */
    public function terms()
    {
        $this->layout->title = 'Terms and conditions';
        $this->layout->canonical = current_url();
        $this->layout->description = '';
        
        $this->layout->view('public/about/terms');
    }

    /**
     * sitemap
     * 
     * @param none
     * @return none
     */
    public function sitemap()
    {
        $this->layout->title = 'Sitemap';
        $this->layout->canonical = current_url();
        $this->layout->description = 'The kirulads.lk classifieds site is organised into several sections to help you buy and sell more easily. Here is a sitemap for you to find the main important pages across our site.';
        
        $this->layout->view('public/about/sitemap');
    }
}