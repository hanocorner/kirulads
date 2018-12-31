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
        $this->db->select('t1.adid, t1.title, t1.status, t1.user_id AS userid, t2.img_1, t3.name AS subcategory, t4.name AS category');
        $this->db->from('tbl_adverts AS t1 ');
        $this->db->join(' tbl_adimage AS t2 ', 't1.adid = t2.ad_id', 'left');
        $this->db->join(' tbl_category AS t3 ', 't1.category_id = t3.catid', 'left');
        $this->db->join(' tbl_category AS t4 ', 't3.parent = t4.catid', 'left');
        $this->db->where('t1.user_id', $userid);
        $this->db->order_by('t1.adid', 'DESC');
        $query = $this->db->get();

        return $query->result('array');
    }
}
?>