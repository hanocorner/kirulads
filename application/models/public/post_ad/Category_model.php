<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Category_model extends CI_Model 
{
    /** */
    public function __construct()
    {
        parent::__construct();
    }

    /** */
    public function fetch_all_categories()
    {
        $this->db->select('catid AS id, name, image');
        $this->db->from('tbl_category');
        $this->db->where('parent', 0);
        $query = $this->db->get();

        return $query->result('array');
    }
}