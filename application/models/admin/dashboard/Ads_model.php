<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Ads_model extends CI_Model
{   
    /** */
    public $_result_count = null;

    /** */
    public function __construct()
    {
        parent::__construct();
    }

    /*** */
    public function fetch_ads($rows_per_page, $start, $sort)
    {
        $sql = '';

        $sql .= 'SELECT SQL_CALC_FOUND_ROWS * FROM admin_all_ads ';

        $sql .= 'WHERE ';

        $sort = (int) $sort;
        switch ($sort) {
            case 1:
                $sql .= 'status = 1 ';
                break;
                
            case 2: 
                $sql .= 'status = 2 ';
                break;

            case 3: 
                $sql .= 'status = 3 ';
                break;

            default:
                $sql .= 'status = 0 ';
                break;
        }

        $sql .= 'LIMIT '.$start.', '.$rows_per_page.' ';

        $query = $this->db->query($sql);

        $result_count = $this->db->query('SELECT FOUND_ROWS() AS total_rows');
        $result_count = $result_count->result('object');
        $this->_result_count = (int) $result_count[0]->total_rows;

        return $query->result('array');
    }

    /** */
    public function insert_comment($data, $id)
    {
        $this->db->where('adid', $id);
        return $this->db->update('tbl_adverts', $data);
    }

    /** */
    public function approve_ad($data, $id)
    {
        $this->db->where('adid', $id);
        return $this->db->update('tbl_adverts', $data);
    }

    /*** */
    public function get_ad($id)
    {
        $this->db->select('*');
        $this->db->from('admin_ad');
        $this->db->where('adid', $id);
        $result = $this->db->get();
        return $result->result('object');

    }
}   
?>