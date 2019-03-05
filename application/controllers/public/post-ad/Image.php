<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Image extends Public_Controller 
{
    /*** */
    private $_dir_path = '';

    /**
     * Image name (includes ame & extension)
     * 
     * @var string
     */
    private $_image_name = '';

    /**
     * 
     */
    private $_extension = null;

    /**
     * 
     */
    private $_validation = null;

    /** 
     * 
     * 
    */
    public $_message = '';
    

    /** */
	public function  __construct()
	{
        parent::__construct();

        $this->load->library('image_lib');
        $this->config->load('settings');
    }

    /** */
    public function index()
    {
        if (!$this->session->has_userdata('logged_in') && $this->session->logged_in != true) 
        { 
            return $this->jason_output(true, 'Session expired', 'user/login');
        }

        $path_string = $this->input->post('path_string');
        $this->_dir_path = $this->config->item('temp_path').'/'.$path_string;
        $image = $_FILES;

        $this->rename($image['adimg']['name']);

        $directory = $this->_dir_path.'/thumb';
        if(!file_exists($directory)) mkdir($directory, 0777, true);

        $upload = $this->upload_image('adimg');

        $this->output->set_content_type('application/json', 'utf-8');
        if($this->_validation == false) 
        {
            return $this->output->set_output(json_encode(array('message'=>$this->_message, 'status'=>FALSE)));
        }
        else {
            return $this->output->set_output(json_encode(array('message'=>$this->_message, 'base_uri'=>$this->_dir_path, 'data_id'=>$path_string, 'image_name'=>$this->_image_name, 'status'=>TRUE)));
        }
        
    }

    /** */
    public function rename($image_name)
    {
        $this->load->helper('string');
        $new_name = 'kirulads_'.random_string('alnum', 8);

        $this->_extension = pathinfo($image_name, PATHINFO_EXTENSION);
        $this->_image_name = $new_name.".".$this->_extension;
    }

    /*** */
    public function upload_image($field)
    {
        $config = array();

        $config['file_name'] = $this->_image_name;
        $config['upload_path'] = $this->_dir_path;
        $config['allowed_types'] = $this->config->item('allowed_types');
        $config['max_size'] = $this->config->item('max_size');
        $config['max_width'] = 0;
        $config['max_height'] = 0;

        $this->load->library('upload', $config);
        if($this->upload->do_upload($field))
        {
            $this->resize_image();
            $this->create_thumbnail();
            return $this->_validation = true;
        }
        $this->_validation = false;
        $this->_message = $this->upload->display_errors();
        return FALSE;
    }
    
    /*** */
    public function create_thumbnail()
    {
        $config['image_library'] = 'gd2';
        $config['source_image'] = $this->_dir_path.'/'.$this->_image_name;
        $config['create_thumb'] = FALSE;
        $config['maintain_ratio'] = TRUE;
        $config['master_dim'] = 'auto';
        $config['new_image'] = $this->_dir_path.'/'.'thumb'.'/'.$this->_image_name;
        $config['width'] = 200;
        $config['height'] = 160;
        $config['quality'] = '55%';
        
        $this->image_lib->initialize($config);

        $this->image_lib->resize();
        
    }

    /** */
    public function resize_image()
    {
        $config['image_library'] = 'gd2';
        $config['source_image'] = $this->_dir_path.'/'.$this->_image_name;
        $config['create_thumb'] = FALSE;
        $config['maintain_ratio'] = TRUE;
        $config['width'] = 640;
        $config['height'] = 480;
        
        $this->image_lib->initialize($config);
        $this->image_lib->resize();
    }

    /** */
    public function delete()
    {
        $this->_image_name = $this->input->post('image');
        $path_string =  $this->input->post('path_string');
        $this->_dir_path = $this->config->item('temp_path').'/'.$path_string;

        if (file_exists($this->_dir_path.'/'.$this->_image_name)) unlink($this->_dir_path.'/'.$this->_image_name);

        if (file_exists($this->_dir_path.'/'.'thumb'.'/'.$this->_image_name)) unlink($this->_dir_path.'/'.'thumb'.'/'.$this->_image_name);

        $this->output->set_content_type('application/json', 'utf-8');
        $this->output->set_output(json_encode(array('status'=>TRUE, 'message'=>'success')));
    }

    /** */
    public function featured()
    {
        $this->session->set_userdata('main_image', $this->input->post('image'));
        $this->output->set_content_type('application/json', 'utf-8');
        $this->output->set_output(json_encode(array('status'=>TRUE, 'message'=>'success')));
    }
}
?>