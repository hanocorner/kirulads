<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Layout
{
  /**
   * CodeIgniter Instance
   * 
   * @var object
   */
  private $CI;

  /**
   * Default layout 
   * 
   * @var string 
   */
  public $name = 'layouts/index';

  /**
   * Page Title
   * 
   * @var string 
   */
  public $title = 'My page title';
  
  /**
   * Meta Description
   *
   * @var string 
   */
  public $description = 'My page description';
  
  /**
   * Meta Keywords
   * 
   * @var string 
   */
  public $keywords = 'my, keywords';

  /**
   * Meta Robot Txt
   * 
   * @var string 
   */
  public $robots = 'all';

  /**
   * Meta web artisan
   * 
   * @var string 
   */
  public $author = 'Bitbash Software';

  /**
   * A specific URL represents the master copy of a page | Meta tag
   * 
   * @var string 
   */
  public $canonical = '';

  /**
   * Css holder
   * 
   * @var array
   */
  public $css = array();

  /**
   * Javascript Header part
   * 
   * @var array
   */
  public $js_header = array();

  /**
   * Javascript footer part
   * 
   * @var array
   */
  public $js_footer = array();

  /**
   * Random Script header part
   * 
   * @var array
   */
  public $scr_header = array();

  /**
   * Random Script footer part
   * 
   * @var array
   */
  public $scr_footer = array();

  /**
   * Random Script header part
   * 
   * @var array
   */
  public $scr_ready = array();

  /**
   * SEO tags 
   * 
   * @var bool
   */
  public $seo_tags = null;

  /**
   * Setting layout manager to admin or public
   *
   * @var bool
   */
  private $layout_manager = null;

  /**
   * Constructor for this class & module initialization
   *
   * @param $config layoutManager must be admin or public | String
   * @return none
   */
  public function __construct($config)
  {
    $this->CI =& get_instance();

    $this->CI->load->helper('url');

    $this->layout_manager = $config['layoutManager'];

    $this->canonical = base_url();
    $this->keywords = 'land for sale, used cars sri lanka, mobile phones sri lanka, used phones for sale, cars for sale, laptop for sale, bikes for sale, kirulads, buy and sell, online advertising sri lanka';
    $this->description = 'Kirulads.lk is newly built advertising website for all your buy and selling needs. We will connect suitable buyer and sellers for your best deal.';

  }

  /**
   * Overriding codeigniter view to set a custom view
   *
   * @param $view_name name of the view in views folder | string
   * @param $params parameters to be passed as values | array
   * @param $params layout name of the layout | string
   * @return none
   */
  public function view($view_name, $data = array(), $layout = "default")
  { 
    $content = $this->CI->load->view($view_name, $data, TRUE);

    if ($this->layout_manager == 'admin')
    {
      if($layout == 'without')
      {
        $header = '';
        $footer = '';
        $this->seo_tags = FALSE;
      }
      else {
        $header = $this->CI->load->view('admin/layouts/header', '', TRUE);
        $footer = '';
        $this->seo_tags = FALSE;
      }
    }
    elseif ($this->layout_manager == 'public')
    {
      $header = $this->CI->load->view('public/layouts/header', '', TRUE);
      $footer = $this->CI->load->view('public/layouts/footer', '', TRUE);
      $this->seo_tags = TRUE;
    }

    $this->CI->load->view($this->name, array('header'=>$header, 'content'=>$content, 'footer'=>$footer));
  }

  /**** */
  public function script($custom_script, $position = 'footer')
  {
    if($position == 'header') $this->scr_header[] = $custom_script;
    
    if($position == 'footer') $this->scr_footer[] = $custom_script;
  }

  /**
    * Add new assets
    *
    * @param string $file
    * @param string $position
    *
    * @return void
    */
  public function assets($file, $position = 'header')
  {
    if (preg_match("/\.css/i", $file))
        {
          // css
          $this->css[] = $file;
        }
        elseif (preg_match("/\.js/i", $file))
        {
          // js
          if ($position == 'header')
            $this->js_header[] = $file;
          else
            $this->js_footer[] = $file;
        }
  }

  /** */
  public function css()
  {
    if(!empty($this->css))
    {
      foreach($this->css as $file)
      {
        echo '<link rel="stylesheet" type="text/css" href="' . base_url($file) . '" />' . "\n";
      }
    }
  }
  
  /** */
  public function js($position = 'footer')
  {
    if($position == 'header')
    {
      if(!empty($this->js_header))
      {
        foreach ($this->js_header as $file)
        {
          echo '<script type="text/javascript" src="' . $file . '"></script>' . "\n";
        }
      }
    }
    else {
      if(!empty($this->js_footer))
      {
        foreach ($this->js_footer as $file)
        {
          echo '<script type="text/javascript" src="' . $file . '"></script>' . "\n";
        }
      }
    }
  }

  /*** */
  public function custom_script($position = 'footer')
  {
    if($position == 'header')
    {
      if(!empty($this->scr_header)) 
      {
        foreach ($this->scr_header as $script) 
        {
          echo '<script type="text/javascript">' . $script . '</script>' . "\n";
        }
      }
    }
    elseif ($position == 'footer') 
    {
      if(!empty($this->scr_footer)) 
      {
        foreach ($this->scr_footer as $script) 
        {
          echo '<script type="text/javascript">' . $script . '</script>' . "\n";
        }
      }
    }
  }
}

?>