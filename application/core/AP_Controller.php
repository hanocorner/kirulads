<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AP_Controller extends CI_Controller
{
  /**
   * Data from controller to view
   *
   * @var array
   */
  protected $_data = array();

  /**
   * Application datetime 
   * 
   * @var date
   */
  public $_datetime = null;

  /**
   * Default Controller
   *
   * @param null
   * @return void
   */
  public function __construct(){
    parent::__construct();

    $this->load->helper('date');
    $this->config->load('settings');
    $this->_datetime = mdate($this->config->item('date_format'), time());
  }

  /**
   * Set Layout
   *
   * @param string $layout default | admin | public
   * @return void
   */
  public function set_layout($layout = 'default')
  {
    $this->load->library('layout', array('layoutManager'=>$layout));
  }

}
?>