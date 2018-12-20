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
        $query = $this->db->query('CALL authenticate_user(
            "'.$data['email'].'",
            @user_exists,
            @users_id,
            @u_pass)'
        );
        
        $result = $query->result();

        $query->next_result(); 
        $query->free_result();  

        return $result;
    }

    /*** */
    public function log($data, $userid)
    {
        $this->db->where('users_id', $userid);
        $query = $this->db->update('tbl_users_log', $data);

        return $query;
    }


}
?>