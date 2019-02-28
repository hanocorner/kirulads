<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Detail extends Public_Controller 
{
    /** */
    public function  __construct()
	{
		parent::__construct();
		$this->load->model('public/home/Base_model', 'base');
	}

	/** */
	public function urlt()
	{
		$uri_seg = $this->uri->uri_to_assoc(1);
		$uri_str = $this->input->get();

	}
    /** */
	public function ad()
	{
		$this->layout->assets('assets/vendors/flexslider/flexslider.css');
		$this->layout->assets(base_url('assets/vendors/flexslider/jquery.flexslider.js'), 'footer');
		$custom_script = "$('.flexslider').flexslider({
			animation: 'slide',
			controlNav: 'thumbnails'
		});";
		$this->layout->script($custom_script, 'footer');
		$slug = $this->uri->segment(2);

		$this->load->model('public/ad/Detail_model');
		$results = $this->Detail_model->fetch_ad($slug);

		if($results == null)
		{
			show_404();
		} 
		else
		{
			$this->_data['results'] = $results;
			$this->layout->title = 'Electronics, Cars, Property and Services in Sri Lanka | kirulads.lk';
			$this->layout->view('public/home/detail_ad', $this->_data);
		}
		
	}

	/** */
	public function ads()
	{	
		$this->layout->title = 'Electronics, Cars, Property and Services in Sri Lanka | kirulads.lk';

		$page = $this->input->get('page');
		$this->_data['cat'] = $this->uri->segment(3);
		if ($page == 0) $page = 1;
		$rows_per_page = 20;

		$start = ($page - 1) * $rows_per_page;

		$param['start'] = $start;
		$param['rows'] = $rows_per_page;
		$param['location'] = $this->uri->segment(2);
		$param['category'] = $this->uri->segment(3);
		$param['sortdate'] = $this->input->get('sortdate');
		$param['sortprice'] = $this->input->get('sortprice');
		$param['query'] = $this->input->get('query');
		
		$this->_data['results'] = $this->base->populate($param);	
		
		$this->_data['result_count'] = $this->base->_result_count;
		$this->_data['category_modal'] = $this->load->view('public/layouts/category_modal', '', TRUE);
		$this->_data['location_modal'] = $this->load->view('public/layouts/location_modal', '', TRUE);
		$this->_data['wildcard'] = $this->load->view('public/layouts/wildcard', '', TRUE);
		
		$total_rows = $this->base->_result_count;
		
		$this->_data['links'] = $this->pagination($rows_per_page, $total_rows);
	
		$this->layout->view('public/home/all_ads', $this->_data);
	}
	
	/*** */
	public function pagination($rows_per_page, $total_rows)
	{
		$this->load->library('pagination');

		$config['base_url'] = '/'.uri_string(); 
		$config["total_rows"] = $total_rows;
		$config["per_page"] = $rows_per_page;
		$config["use_page_numbers"] = TRUE;
		$config['page_query_string'] = TRUE;
		$config['query_string_segment']= 'page';
		$config["full_tag_open"] = '<ul class="pagination justify-content-center">';
		$config["full_tag_close"] = '</ul>';
		$config["first_tag_open"] = '<li class="page-item">';
		$config["first_tag_close"] = '</li>';
		$config['next_link'] = 'Next';
		$config["next_tag_open"] = '<li class="page-item">';
		$config["next_tag_close"] = '</li>';
		$config["prev_link"] = "Previous";
		$config["prev_tag_open"] = "<li class='page-item'>";
		$config["prev_tag_close"] = "</li>";
		$config["cur_tag_open"] = "<li class='page-item active'><a href='#' class='page-link'>";
		$config["cur_tag_close"] = "</a></li>";
		$config["num_tag_open"] = "<li class='page-item'>";
		$config["num_tag_close"] = "</li>";
		$config["num_links"] = 2;
		$config['attributes'] = array('class' => 'page-link');

		$this->pagination->initialize($config);

		return $this->pagination->create_links();
	}
    
    
}
?>