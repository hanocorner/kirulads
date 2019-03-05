<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Base_model extends CI_Model 
{   
    /*** */
    public $_result_count = null;

    /** */
    private $_keywords = false;

    /** */
    public function __construct()
    {
        parent::__construct();
    }

    /*** */
    public function populate($param)
    {
        $sql = '';

        $sql .= "SELECT SQL_CALC_FOUND_ROWS * FROM all_ads";
        
        $sql .= " WHERE";

        $sql .= " status = 1";

        if(isset($param['location']))
        {
            if($param['location'] == 'srilanka')
            {
                $sql .= " AND NOT location ='".$param['location']."'";
            }
            else
            {
                $sql .= " AND '".$param['location']."' IN(loc_parent_slug, loc_child_slug)";   
            }
        }

        if(isset($param['category'])) 
        {
            $sql .= " AND '".$param['category']."' IN(cat_parent_slug, cat_child_slug)";
        } 
        
        if(isset($param['query']))
        {
            $sql .= " AND (subcategory LIKE '".$param['query']."%' OR category LIKE '".$param['query']."%' OR sublocation LIKE '".$param['query']."%' OR location LIKE '".$param['query']."%' OR title LIKE '".$param['query']."%') ";
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

        $sql .= " LIMIT ".$param['start'].", ".$param['rows']." ";

        $query = $this->db->query($sql);
        $result_count = $this->db->query('SELECT FOUND_ROWS() AS total_rows');
        $result_count = $result_count->result('object');
        $this->_result_count = (int) $result_count[0]->total_rows;

        return $query->result('array');
    }
}
?>