<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Location_model extends CI_Model
{
    /** */
    public $_result_count = null;

    /** */
    public function __construct()
    {
        parent::__construct();
    }

    /** */
    public function populate_parent_category()
    {
        $this->db->select('t1.locid, t1.name');
        $this->db->from('tbl_location AS t1');
        $this->db->where('t1.parent', 0);
        $query = $this->db->get();

        return $query->result('array');
    }

    /*** */
    public function populate_table_data($rows_per_page, $start)
    {
        $sql = '';

        $sql .= 'SELECT SQL_CALC_FOUND_ROWS * FROM admin_location_data ';

        $sql .= 'LIMIT '.$start.', '.$rows_per_page.' ';

        $query = $this->db->query($sql);

        $result_count = $this->db->query('SELECT FOUND_ROWS() AS total_rows');
        $result_count = $result_count->result('object');
        $this->_result_count = (int) $result_count[0]->total_rows;

        return $query->result('array');
    }

    /** */
    public function add_data($data)
    {
       return $this->db->insert('tbl_location', $data);
    }
}
?>