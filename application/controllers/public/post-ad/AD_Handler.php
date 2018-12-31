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

    /**
     * 
     */
    public function location()
    {
        $this->layout->title = 'Choose Location - Posting an ad';
        $this->layout->view('public/post-ad/location');
    }

    public function details()
    {
        $this->layout->title = 'Posting an ad - Kirulads.lk';

        $uri_array = $this->uri->uri_to_assoc(3);

        $this->_data['categoryid'] = $uri_array['category'];
        $this->_data['locationid'] = $uri_array['location'];

        $this->load->model('public/post_ad/AD_model', 'admodel');

        $this->_data['category'] = $this->admodel->fetch_category($this->_data['categoryid']);
        $this->_data['location'] = $this->admodel->fetch_location($this->_data['locationid']);
        $this->_data['userinfo'] = $this->admodel->fetch_user_by_id($this->session->userid);

        $this->layout->view('public/post-ad/details', $this->_data);
    }

    public function ad_complete()
    {
        $this->layout->title = 'Posting an ad';
        $this->layout->view('public/post-ad/ad_complete');
    }

    /** */
    public function submit_ad()
    {
        $this->_data['title'] = $this->input->post('title');
        $this->_data['condition'] = $this->input->post('condition');
        $this->_data['description'] = $this->input->post('description');
        $this->_data['price'] = $this->input->post('price');
        $this->_data['negotiable'] = $this->input->post('negotiable');
        $this->_data['created_date'] = $this->_datetime;
        $this->_data['user_id'] = $this->session->userid;
        $this->_data['category_id'] = $this->input->post('category');
        $this->_data['location_id'] = $this->input->post('location'); 

        if($this->form_validation->run('submit_ad') == FALSE) return $this->json_output(false, validation_errors());

        $this->load->model('public/post_ad/AD_model', 'admodel');
        $last_id = $this->admodel->get_last_id();
        $next_id = $this->id($last_id);
        $this->_data['id'] = $next_id;

        $this->config->load('settings');
        $base_path = $this->config->item('img_basepath');
        $file_path = $base_path.'/'.$next_id;
        if(!file_exists($file_path))
        {
            mkdir($file_path, 0777, true);
        }
        
        $this->load->library('image');
        $this->image->img_path($file_path);
        $this->_data['image_1'] = $this->image->img_name($_FILES['adimg']['name'], $next_id);

        $db_response = $this->admodel->insert_ad($this->_data);

        if($db_response == 0) return $this->json_output(false, $this->lang->line('error_db_submit'));

        $upload = $this->image->img_upload('adimg');
        if($upload == false) return $this->json_output(false, $this->image->errors);

        //$this->send_ad_mail($address);
        return $this->json_output(true, $this->lang->line('success_submit_ad'), 'post-ad/complete');
    }

     /**
     *  Ad posted mail
     * 
     */
    public function send_ad_mail($address)
    {   
        $this->load->library('email');

        $this->email->from('no-reply@kirulads.lk', 'no-reply@kirulads.lk');
        $this->email->to($address);

        $this->email->subject('Test Mail');
        $this->email->message('Testing the email class.');

        if ( ! $this->email->send())    
        {
            log_message('error', 'Unable to send the registeration mail');
        }
    }

    /**** */
    public function image_exists()
    {
       if(!isset($_FILES['adimg']['name']) || $_FILES['adimg']['size'] == 0)
       {
           return false;
       }

       return true;
    }

    /**
    * Setting id according to report type selected by user
    *
    * @param null
    * @return mixed
    */
    private function id($lastid)
    {
        $this->load->library('id');
        $format = array('separator'=>'-');

        $this->id->set_lastid($lastid);
        $this->id->set_format($format);
        return $this->id->create_id();
    }
}
?>