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

    public function fetch_sub_categories($category_id)
    {
        $this->db->select('t2.catid AS id, t2.name');
        $this->db->from('tbl_category AS t1 ');
        $this->db->join(' tbl_category AS t2 ', 't1.catid = t2.parent', 'left');
        $this->db->where('t1.catid', $category_id);
        $query = $this->db->get();

        return $query->result('array');
    }
}