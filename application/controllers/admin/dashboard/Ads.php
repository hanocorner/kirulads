<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Ads extends Admin_Controller
{
    /**
     * Account Constructor
     * 
     */
    public function __construct()
    {
        parent::__construct();
        $this->check_login_status();      
        $this->lang->load('message_lang', 'english');  
    }

    /** */
    public function index()
    {
        $this->layout->title = 'All Ads';
        $this->layout->view('admin/dashboard/ads');
    }

    /** */
    public function fetch_all()
    {
        $page = $this->input->get('page');
        $rows_per_page = $this->input->get('rows');
        $sort = $this->input->get('sort');

        if ($page == 0) $page = 1;
        $start = ($page - 1) * $rows_per_page;

        $this->load->model('admin/dashboard/ads_model');

        $this->_data['results'] = $this->ads_model->fetch_ads($rows_per_page, $start, $sort);
        $total_rows = $this->ads_model->_result_count;

        $this->_data['links'] = $this->html_pagination($rows_per_page, $total_rows);

        $this->load->view('admin/dashboard/all_ads', $this->_data);
    }

    /**
     * CI HTML Pagination library
     *
     * @param $start
     * @param $length
     */
    public function html_pagination($rows_per_page, $total_rows)
    {
        $this->load->library('pagination');

        $config['base_url'] = '/'.uri_string(); 
        $config["total_rows"] = $total_rows;
        $config["per_page"] = $rows_per_page;
        $config["use_page_numbers"] = TRUE;
		$config['page_query_string'] = TRUE;
		$config['query_string_segment'] = 'page';
        $config["full_tag_open"] = '<ul class="pagination justify-content-end">';
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
        $config['attributes'] = array('class' => 'page-link', 'data-action'=>'pagination', 'data-rows'=>$rows_per_page);
        $this->pagination->initialize($config);

        return $this->pagination->create_links();
    }

    /** */
    public function view()
    {
        $id = $this->uri->segment(4);
        $this->layout->assets('assets/vendors/lightbox/perfundo.min.css');
        $this->layout->assets('assets/vendors/lightbox/perfundo.with-icons.min.css');

        $this->layout->title = 'All Ads';
        $this->load->model('admin/dashboard/ads_model');
        $this->_data['results'] = $this->ads_model->get_ad($id);

        $this->layout->view('admin/ads/view', $this->_data); 
    }

    /*** */
    public function add_rejection_comment()
    {
        $data = array('comment'=>$this->input->post('comment'), 'status'=>2);

        $this->form_validation->set_rules('comment', 'Comment', 'trim|required');
        if($this->form_validation->run() == FALSE) return $this->json_output(false,  validation_errors());

        $this->load->model('admin/dashboard/ads_model');
        if(!$this->ads_model->insert_comment($data, $this->input->post('id')))
        {
            return $this->json_output(false, $this->lang->line('error_adm_rcomment'));
        }

        return $this->json_output(true, $this->lang->line('success_adm_rcomment'));
    }

    /** */
    public function approve()
    {
        $data = array('status'=>1);

        $this->load->model('admin/dashboard/ads_model');
        if($this->ads_model->approve_ad($data, $this->input->get('id')) == FALSE)
        {
            return $this->json_output(false, $this->lang->line('error_adm_adapprove'));
        }

        return $this->json_output(true, 'Successful');
    }
}
?>