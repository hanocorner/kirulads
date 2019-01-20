<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Base_model extends CI_Model 
{   
    /*** */
    public $_result_count = null;

    /** */
    public function __construct()
    {
        parent::__construct();
    }

    /*** */
    public function fetch_all_ads($rows_per_page, $start)
    {
        $query = $this->db->query("SELECT * FROM all_ads ORDER BY date DESC LIMIT $start, $rows_per_page");
        $this->_result_count = $query->num_rows();
        return $query->result('array');
    }

    /** */
    public function get_total_rows()
    {
       return $this->db->count_all('all_ads'); 
    }
    
    /** */
    public function search($string)
    {
        $this->db->select('*');
        $this->db->from('all_ads');
        $this->db->like('subcategory', $string);
        $this->db->limit(10);
        $query = $this->db->get();
        $this->_result_count = $query->num_rows();
        return $query->result('array');
    }

    /** */
    public function sort_date($date)
    {
        if($date == 'asc')
        {
            $date = 'ASC';
        } 
        else {
            $date = 'DESC';
        }

        $this->db->select('*');
        $this->db->from('all_ads');
        $this->db->order_by('date', $date);
        $this->db->limit(10);
        $query = $this->db->get();
        return $query->result('array');
    }

    /** */
    public function sort_price($price)
    {
        if($price == 'asc')
        {
            $price = 'ASC';
        } 
        else {
            $price = 'DESC';
        }
        
        $this->db->select('*');
        $this->db->from('all_ads');
        $this->db->order_by('price', $price);
        $this->db->limit(10);
        $query = $this->db->get();
        return $query->result('array');
    }
}
?>