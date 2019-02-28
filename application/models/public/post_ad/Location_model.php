<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Location_model extends CI_Model 
{
    /** */
    public function __construct()
    {
        parent::__construct();
    }

    /** */
    public function get_sub_location($locationid)
    {
        $this->db->select('t2.locid AS id, t2.name, t2.slug');
        $this->db->from('tbl_location AS t1 ');
        $this->db->join(' tbl_location AS t2 ', 't1.locid = t2.parent', 'left');
        $this->db->where('t1.locid', $locationid);
        $query = $this->db->get();

        return $query->result('array');
    }
}