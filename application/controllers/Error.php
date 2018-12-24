<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Error extends Public_Controller 
{
    /*** */
	public function  __construct()
	{
		parent::__construct();
    }
    
    /*** */
	public function index()
	{	
		$this->layout->view('layouts/error_404');
	}
}
