<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Detail_model extends CI_Model 
{
    /** */
    public function __construct()
    {
        parent::__construct();
    }

    /** */
    public function fetch_ad($slug)
    {
        $this->db->select('*');
        $this->db->from('fetch_ad');
        $this->db->where('slug', $slug);
        $query = $this->db->get();

        return $query->row();
    }
}
?>