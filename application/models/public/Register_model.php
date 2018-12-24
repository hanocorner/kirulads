
<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Register_model extends CI_Model 
{
    /** */
    public function __construct()
    {
        parent::__construct();
    }

    /** */
    public function user($data)
    {
        $query = $this->db->query('CALL register_user(
            "'.$data['name'].'",
            "'.$data['email'].'",
            "'.$data['number'].'",
            "'.$data['password'].'",
            "'.$data['regDate'].'",
            "'.$data['lastlogin'].'",
            "'.$data['ipAddress'].'",
            "'.$data['os'].'",
            "'.$data['user_agent'].'",
            @user_created,
            @users_id )'
        );

        $result = $query->result();

        $query->next_result(); 
        $query->free_result();  

        return $result;
    }

    /*** */
    public function mail_availability($mail)
    {
        $this->db->select('email');
        $this->db->from('tbl_users');
        $this->db->where('email', $mail);
        $this->db->get();

        return $this->db->affected_rows();
    }

}

?>