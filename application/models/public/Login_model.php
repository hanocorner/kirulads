<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Login_model extends CI_Model 
{
    /** */
    public function __construct()
    {
        parent::__construct();
    }

    /** */
    public function validate_credentials($data)
    {
        $query = $this->db->query('CALL auth_user(
            "'.$data['email'].'"
            )');
      
        return $query->result_array();
    }

    /*** */
    public function log($data, $userid)
    {
        $this->db->where('user_id', $userid);
        $query = $this->db->update('tbl_users_log', $data);

        return $query;
    }


}
?>