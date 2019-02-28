<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Base extends Public_Controller {

	/** */
	public $_html = '';
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
		

		$this->load->model('public/home/Base_model', 'base');
	}

	/*** */
	public function index()
	{	
		$this->layout->title = 'kirulads.lk - Electronics, Cars, Property and Jobs in Sri Lanka';
		$this->_data['category_modal'] = $this->load->view('public/layouts/category_modal', '', TRUE);
		$this->_data['location_modal'] = $this->load->view('public/layouts/location_modal', '', TRUE);
		$this->_data['wildcard'] = $this->load->view('public/layouts/wildcard', '', TRUE);
		$this->layout->view('public/home/index', $this->_data);
	}

	/*** */
    public function populate_sub_location()
    {
        $this->load->model('public/post_ad/location_model');
        $results = $this->location_model->get_sub_location($this->input->get('locationid'));
		$cateory = $this->input->get('category');
		$query = $this->input->get('query');

		$this->_html .= '<div class="all-ad-category">';
		$this->_html .= '<ul>';
        foreach ($results as $result) 
        {
			if($cateory != '' || $cateory != null )
			{
				$this->_html .= '<li><a href="/ads/'.$result['name'].'/'.$cateory.'">'.$result['name'].'</a></li>';
			}
            else {
				$this->_html .= '<li><a href="/ads/'.$result['name'].'">'.$result['name'].'</a></li>';
			}
		}

		$this->_html .= '</ul>';
        $this->_html .= '</div>';
        
        echo $this->_html; 
	}

	/*** */
	public function populate_sub_category()
	{
		$this->load->model('public/post_ad/category_model');
		$results = $this->category_model->fetch_sub_categories($this->input->get('categoryid'));
		$location = $this->input->get('location');
		$query = $this->input->get('query');

		$this->_html .= '<div class="all-ad-category">';
		$this->_html .= '<ul>';
		foreach ($results as $result) 
		{
			if($location != '' || $location != null )
			{
				$this->_html .= '<li><a href="/ads/'.$location.'/'.$result['name'].$query.'">'.$result['name'].'</a></li>';
			}
            else {
				$this->_html .= '<li><a href="/ads/srilanka/'.$result['name'].$query.'">'.$result['name'].'</a></li>';
			}
		}
		$this->_html .= '</ul>';
        $this->_html .= '</div>';
		
		echo $this->_html; 
	}

	
}
