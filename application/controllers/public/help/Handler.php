<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Handler extends Public_Controller 
{
    /** */
	public function  __construct()
	{
        parent::__construct();
    }

    /** */
    public function index()
    {
        $this->layout->title = 'Electronics, Cars, Property and Services in Sri Lanka | kirulads.lk';
        $this->layout->view('public/help/index');
    }
}