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
		$rows_per_page = 20;

		$total_rows = $this->base->get_total_rows();
		
		$this->_data['links'] = $this->pagination($page, $rows_per_page, $total_rows);
	
		if ($page == 0) $page = 1;
		$start = ($page - 1) * $rows_per_page;

		if($this->input->get('query') == true)
		{
			$this->_data['results'] = $this->base->search($this->input->get('query'));
		}
		elseif($this->input->get('sortdate') == true)
		{
			$this->_data['results'] = $this->base->sort_date($this->input->get('sortdate'));
		}
		elseif($this->input->get('sortprice') == true)
		{
			$this->_data['results'] = $this->base->sort_price($this->input->get('sortprice'));
		}
		else
		{
			$this->_data['results'] = $this->base->fetch_all_ads($rows_per_page, $start);	
		}
		
		$this->_data['result_count'] = $this->base->_result_count;
		$this->layout->view('public/home/all_ads', $this->_data);
	}
	
	/*** */
	public function pagination($page, $rows_per_page, $total_rows)
	{
		$this->load->library('pagination');

		$config['base_url'] = current_url('ads');
		$config["total_rows"] = $total_rows;
		$config["per_page"] = $rows_per_page;
		$config["uri_segment"] = 3;
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