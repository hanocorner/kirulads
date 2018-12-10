<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Welcome extends Public_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	public function  __construct()
	{
		parent::__construct();
	}
	public function index()
	{	
		
		$this->benchmark->mark('code_start');

		$this->layout->view('welcome_message', $data = array());
		$this->benchmark->mark('code_end');

		//echo $this->benchmark->elapsed_time('code_start', 'code_end');

		//echo $this->benchmark->memory_usage();
		//$this->output->enable_profiler(TRUE);
	}
}
