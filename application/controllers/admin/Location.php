<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Location extends Admin_Controller
{
    /**
     * Constructor
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
        $this->layout->title = 'Location';
        $this->layout->assets('assets/vendors/hullabaloo.css');
        $this->layout->assets(base_url('assets/vendors/hullabaloo.js'), 'footer');
        $this->layout->assets(base_url('assets/admin/js/location.js'), 'footer');
        $this->layout->view('admin/location/index');
    }

    /*** */
    public function populate_parent()
    {
        if($this->input->get('subcat') != true) return false;

        $this->load->model('admin/Location_model', 'locmodel');
        $results = $this->locmodel->populate_parent_category(); 

        $this->output->set_content_type('application/json', 'utf-8');
        $this->output->set_output(json_encode($results));
    }

    /** */
    public function populate_table()
    {
        $page = $this->input->get('page');
        $rows_per_page = $this->input->get('rows');

        if ($page == 0) $page = 1;
        $start = ($page - 1) * $rows_per_page;

        $this->load->model('admin/Location_model', 'locmodel');

        $this->_data['results'] =  $this->locmodel->populate_table_data($rows_per_page, $start);
        $total_rows = $this->locmodel->_result_count;

        $this->_data['links'] = $this->html_pagination($rows_per_page, $total_rows);

        $this->load->view('admin/location/data_table', $this->_data);
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
    
    /**
     * 
     */
    public function add()
    {
        $cat_name = $this->input->post('name');
        $this->_data['name'] = $cat_name;
        $this->_data['parent'] = $this->input->post('parent');
        $this->_data['slug'] = $this->create_slug($cat_name); 

        $this->form_validation->set_rules('name', 'Sub Category', 'trim|required|min_length[3]|max_length[80]');
        if($this->form_validation->run() == FALSE) return $this->json_output(false,  validation_errors());

        $this->load->model('admin/Location_model', 'locmodel');
        
        if(!$this->locmodel->add_data($this->_data))
        {
            return $this->json_output(false, 'Process Unsuccessful');
        }

        return $this->json_output(true, 'Added Sucessfully');
    }

    /** */
    public function create_slug($url)
    {
        // replace non letter or digits by -
        $url = preg_replace('~[^\pL\d]+~u', '-', $url);

        // transliterate
        $url = iconv('utf-8', 'us-ascii//TRANSLIT', $url);

        // remove unwanted characters
        $url = preg_replace('~[^-\w]+~', '', $url);

        // trim
        $url = trim($url, '-');

        // remove duplicate -
        $url = preg_replace('~-+~', '-', $url);

        // lowercase
        $url = strtolower($url);

        if (empty($url)) return 'n-a';

        return $url;
    }

}
?>
