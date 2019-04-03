<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Handler extends Public_Controller 
{
    /*** */
    private $_html = '';

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

    /*** */
    public function fetch_modal()
    {
        $this->load->model('public/post_ad/category_model');
        $results = $this->category_model->fetch_sub_categories($this->input->get('categoryid'));
        
        $this->_html .= '<div class="d-flex flex-column">';
        foreach ($results as $result) 
        {
           $this->_html .= '<a class="my-0 py-1" href="'.base_url('post-ad/category/'.$result['id'].'/location').'">'.$result['name'].'</a>';
        }
        $this->_html .= '</div>';
        
        echo $this->_html; 
    }

    /*** */
    public function fetch_sub_location()
    {
        $this->load->model('public/post_ad/location_model');
        $results = $this->location_model->get_sub_location($this->input->get('locationid'));
        
        $this->_html .= '<div class="d-flex flex-column">';
        foreach ($results as $result) 
        {
           $this->_html .= '<a class="my-0 py-1" href="'.base_url('post-ad/details/category/'.$this->input->get('categoryid').'/location'.'/'.$result['id'].'').'">'.$result['name'].'</a>';
        }
        $this->_html .= '</div>';
        
        echo $this->_html; 
    }

    /**
     * 
     */
    public function location()
    {
        $this->layout->title = 'Choose Location - Posting an ad';
        $this->_data['categoryid'] = $this->uri->segment(3);
        $this->layout->view('public/post-ad/location', $this->_data);
    }

    public function details()
    {
        $this->layout->title = 'Posting an ad - Kirulads.lk';

        $uri_array = $this->uri->uri_to_assoc(3);

        $this->_data['categoryid'] = $uri_array['category'];
        $this->_data['locationid'] = $uri_array['location'];

        $this->load->model('public/post_ad/Post_model', 'admodel');

        $this->_data['path_string'] = rand(1000, 10000);
        $this->_data['category'] = $this->admodel->fetch_category($this->_data['categoryid']);
        $this->_data['location'] = $this->admodel->fetch_location($this->_data['locationid']);
        $this->_data['userinfo'] = $this->admodel->fetch_user_by_id($this->session->userid);

        $this->layout->assets('assets/vendors/quill/quill.snow.css');
        $this->layout->assets(base_url('assets/vendors/quill/quill.min.js'), 'footer');
        $this->layout->assets(base_url('assets/public/js/submit.js'), 'footer');
        $this->layout->view('public/post-ad/submit_form', $this->_data);
    }

    public function ad_complete()
    {
        $this->layout->title = 'Publish Successful';
        
        $this->load->model('public/post_ad/Post_model');
        $result = $this->Post_model->get_token($this->uri->segment(4));
        if($this->uri->segment(4) == $result->token) 
        {
            $this->layout->assets(base_url('assets/public/js/email.js'), 'footer');
            $custom_script = "mail('".$this->session->user_email."', '".$this->uri->segment(4)."'); ";
            $this->layout->script($custom_script, 'footer');
            
            return $this->layout->view('public/post-ad/ad_complete');
        }

        redirect('user/account/myads');
        
    }

    /** */
    public function submit_ad()
    {
        $this->lang->load('message_lang', 'english');
        

        if($this->form_validation->run('submit_ad') == FALSE) return $this->json_output(false, validation_errors());

        $title = $this->input->post('title');
        $temp_path_string = $this->input->post('temp_path_string');
        $perm_path_string = rand(1000, 10000);

        $this->_data = $_POST;
        $this->_data['user_id'] = $this->session->userid;
        $this->_data['description'] = $this->input->post('editor1');
        $this->_data['slug'] = $this->slug($title);
        $this->_data['negotiable'] = $this->input->post('negotiable') ? $this->input->post('negotiable') : 0;
        $main_img = $this->session->main_image;
        $sub_img_array = $this->move_to_dest($temp_path_string, $perm_path_string);

        $this->_data['main_image'] = $main_img;
        if(false !== $key = array_search($main_img, $sub_img_array))
        {
            unset($sub_img_array[$key]);
            $this->_data['sub_images'] = implode(',', $sub_img_array);
        }
        else
        {
            $this->_data['sub_images'] = '';
        }

        $this->load->helper('string');
        $string = random_string('alnum', 16);

        $this->_data['path_string'] = $perm_path_string;
        $this->_data['title'] = $title;
        $this->_data['token'] = $string;

        $this->load->model('public/post_ad/Post_model');
        $db_response = $this->Post_model->insert_ad($this->_data);

        if(!$db_response) return $this->json_output(false, $this->lang->line('error_submit'));

        
        return $this->json_output(true, $this->lang->line('success_submit'), 'post-ad/complete/token/'.$string);
    }

     /**
     *  Ad posted mail
     * 
     */
    public function send_ad_mail()
    {   
        //$address = ;
        $this->load->library('email');

        $this->email->from('no-reply@kirulads.lk', 'no-reply@kirulads.lk');
        $this->email->to($this->input->get('email'));

        $this->email->subject('Welcome to kirulads.lk');
        $this->email->message('Hello, ');

        if ( ! $this->email->send())    
        {
            log_message('error', 'Unable to send the registeration mail');
        }
    }

    /** */
    public function edit()
    {
        $this->layout->title = 'Edit Ad';
        $this->layout->assets('assets/vendors/quill/quill.snow.css');
        $this->layout->assets(base_url('assets/vendors/quill/quill.min.js'), 'footer');
        $this->layout->assets(base_url('assets/public/js/submit.js'), 'footer');
        $slug = $this->uri->segment(8);
        $this->load->model('public/post_ad/Post_model');
        $this->_data['results'] = $this->Post_model->populate_edit($slug);
        $this->layout->view('public/post-ad/edit_ad', $this->_data);
    }

    public function update_ad()
    {
        $this->lang->load('message_lang', 'english');

        if($this->form_validation->run('submit_ad') == FALSE) return $this->json_output(false, validation_errors());

        $title = $this->input->post('title');
        $temp_path_string = $this->input->post('path_string');
        $perm_path_string = $this->input->post('path_string');

        $this->_data = $_POST;
        $this->_data['id'] = $this->input->post('adid');
        $this->_data['description'] = $this->input->post('editor1');
        $this->_data['slug'] = $this->slug($title);
        $this->_data['negotiable'] = $this->input->post('negotiable') ? $this->input->post('negotiable') : 0;
        // $main_img = $this->session->main_image;
        // $sub_img_array = $this->move_to_dest($temp_path_string, $perm_path_string);

        // $this->_data['main_image'] = $main_img;
        // if(false !== $key = array_search($main_img, $sub_img_array))
        // {
        //     unset($sub_img_array[$key]);
        //     $this->_data['sub_images'] = implode(',', $sub_img_array);
        // }
        // else
        // {
        //     $this->_data['sub_images'] = '';
        // }
        $this->load->helper('string');
        $string = random_string('alnum', 16);

        $this->_data['title'] = $title;
        $this->_data['token'] = $string;
        
        $this->load->model('public/post_ad/Post_model');
        $db_response = $this->Post_model->update_ad($this->_data);

        if(!$db_response) return $this->json_output(false, $this->lang->line('error_submit'));

        return $this->json_output(true, $this->lang->line('success_submit'), 'post-ad/complete/token/'.$string);
    }

    /** */
    public function move_to_dest($temp_path_str, $perm_path_str)
    {
        $this->config->load('settings');

        $temp_path = $this->config->item('temp_path').'/'.$temp_path_str;

        $perm_path = $this->config->item('base_path').'/'.$perm_path_str;
        if(!file_exists($perm_path)) mkdir($perm_path, 0777, true);

        if(is_dir($temp_path. '/'. 'thumb')) 
        {
            $thumb_dir = scandir($temp_path. '/'. 'thumb');
            if(!file_exists($perm_path. '/'. 'thumb')) mkdir($perm_path. '/'. 'thumb', 0777, true);

            foreach ($thumb_dir as $thumb) 
            {
                if (in_array($thumb, array(".",".."))) continue;
                copy($temp_path.'/'.'thumb'.'/'.$thumb, $perm_path.'/'.'thumb'.'/'.$thumb);
                unlink($temp_path.'/'.'thumb'.'/'.$thumb);
            }
            
            rmdir($temp_path. '/'. 'thumb');
        }

        $files = scandir($temp_path);
        foreach ($files as $file) 
        {
            if (in_array($file, array(".",".."))) continue;

            if($file != 'thumb') copy($temp_path.'/'.$file, $perm_path.'/'.$file);
            $string[] = $file;
            unlink($temp_path.'/'.$file);

        } 

        rmdir($temp_path);
        return $string;
    }
    
    /** */
    public function delete()
    {
        $this->layout->title = 'Delete Ad';
        $this->layout->assets(base_url('assets/public/js/delete_ad.js'), 'footer');
        $this->layout->view('public/post-ad/delete_ad');
    }

    /** */
    public function delete_ad()
    {
        $this->load->model('public/post_ad/Post_model', 'admodel');
        $status = $this->admodel->update_status($this->input->get('slug'));

        if($status) 
        {
            return $this->json_output(true, 'Deleted Successfully', 'user/account/myads');
        }
       
        return $this->json_output(false, 'Unable to delete your ad');
    }

    /*** */
    private function create_slug($title, $ad_type = 'for-sale')
    {   
        $slug = $title.'-'.$ad_type;

        // replace non letter or digits by -
        $slug = preg_replace('~[^\pL\d]+~u', '-', $slug);

        // transliterate
        //$slug = iconv('utf-8', 'us-ascii//TRANSLIT', $slug);

        // remove unwanted characters
        $slug = preg_replace('~[^-\w]+~', '', $slug);

        // trim
        $slug = trim($slug, '-');

        // remove duplicate -
        $slug = preg_replace('~-+~', '-', $slug);

        // lowercase
        $slug = strtolower($slug);

        return $slug;
    }

    /** */
    private function slug($title)
    {
        $new_slug = $this->create_slug($title);

        $this->load->model('public/post_ad/Post_model');
        $slug_count = $this->Post_model->count_slug($new_slug);
        if($slug_count >= 1) 
        {
            $number = $slug_count +1;
            $new_slug = $this->create_slug($title);
            $new_slug = $new_slug.'-'.$number;
        }

        return $new_slug;
    }
}
?>