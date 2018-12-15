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
    
    $this->layout->assets('https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js', 'footer');
    $this->layout->assets('https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js', 'footer');
    $this->layout->assets(base_url('assets/public/dist/js/app.js'), 'footer');
  }

  /**
   * Regenerate CSRF token
   *
   * @param null
   * @return string
   */
  protected function regenerate_csrf()
  {
    return $this->security->get_csrf_hash();
  }

  /**
   * This will return json array with status message
   *
   * @param mixed $auth success | error | warning | info
   * @param string $message actual message string
   * @param mixed $url url to be redirected
   *
   * @return array json data
   */
  protected function json_output($auth = null, $message = '', $url = null)
  {
    if(is_null($auth)) return;

    $json_response = array();

    if($auth === false)
    {
      $json_response['auth'] = false;
      $json_response['csrf'] = $this->regenerate_csrf();
      $json_response['message'] = $message;
    }

    if($auth === true)
    {
      $json_response['auth'] = true;
      $json_response['message'] = $message;
      $json_response['url'] = base_url().$url;
    }
    echo json_encode($json_response);
  }
}
?>
