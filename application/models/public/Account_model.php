<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Account_model extends CI_Model 
{
    /** */
    public function __construct()
    {
        parent::__construct();
    }

    /*** */
    public function fetch_myads($userid)
    {
        $this->db->select('t1.adid, t1.title, t1.status, t1.price, t1.Comment, t1.slug, t1.category_id, t1.location_id, t1.user_id AS userid, t2.main_image, t2.path_string, t3.name AS subcategory, t4.name AS category, t5.name AS sublocation, t6.name AS location');
        $this->db->from('tbl_adverts AS t1 ');
        $this->db->join(' tbl_adimage AS t2 ', 't1.adid = t2.ad_id', 'left');
        $this->db->join(' tbl_category AS t3 ', 't1.category_id = t3.catid', 'left');
        $this->db->join(' tbl_category AS t4 ', 't3.parent = t4.catid', 'left');
        $this->db->join(' tbl_location AS t5 ', 't1.location_id = t5.locid', 'left');
        $this->db->join(' tbl_location AS t6 ', 't5.parent = t6.locid', 'left');
        $this->db->where('t1.user_id', $userid);
        $this->db->order_by('t1.adid', 'DESC');
        $query = $this->db->get();

        return $query->result('array');
    }

    /*** */
    public function acc_data($id)
    {
        $this->db->select('fullname, email');
        $this->db->from('tbl_users');
        $this->db->where('userid', $id);

        $query = $this->db->get();

        return $query->result('object');

    }

    public function total_ad_count($id)
    {
        $this->db->select('count(*) AS total');
        $this->db->from('tbl_adverts');
        $this->db->where('user_id', $id);

        $query = $this->db->get();

        return $query->result('object');
    }
}
?>