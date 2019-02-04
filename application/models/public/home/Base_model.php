<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Base_model extends CI_Model 
{   
    /*** */
    public $_result_count = null;

    /*** */
    public $_num_rows = null;

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

    public function fetch_data($param)
    {
        $sql = '';

        $sql .= "SELECT * FROM all_ads";
        
        if(isset($param['location']))
        {
            if($param['location'] == 'srilanka')
            {
                $sql .= " WHERE NOT location ='".$param['location']."'";
            }
            else
            {
                $sql .= " WHERE location ='".$param['location']."'";   
            }
            
        }

        if(isset($param['category'])) 
        {
            $sql .= " AND cat_slug = '".$param['category']."'";
        }   

        if(isset($param['sortdate']) || isset($param['sortprice']))
        {
            $sql .= " ORDER BY";

            if(isset($param['sortdate']))
            {
                $sql .= " date ".$param['sortdate']."";
            }

            if(isset($param['sortdate']) && isset($param['sortprice']))
            {
                $sql .= ",";
            }

            if(isset($param['sortprice']))
            {
                $sql .= " price ".$param['sortprice']."";
            }
            
        }

        if(isset($param['query']))
        {
            $sql .= " WHERE subcategory LIKE '".$param['query']."%' OR category LIKE '".$param['query']."%' OR title LIKE '".$param['query']."%'";
        }

        $sql .= " LIMIT ".$param['start'].", ".$param['rows']." ";

        $query = $this->db->query($sql);
        $this->_num_rows = $query->num_rows();

        return $query->result('array');
    }
}
?>