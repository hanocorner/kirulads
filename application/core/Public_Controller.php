<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Public_Controller extends AP_Controller
{
  /**
   * Default Controller
   *
   * @param null
   * @return void
   */
  public function __construct()
  {
    parent::__construct();

    $this->set_layout('public');

    $this->layout->assets('assets/public/dist/css/app.css');
    $this->layout->assets('assets/public/dist/js/app.js', 'footer');
  }
}
?>
