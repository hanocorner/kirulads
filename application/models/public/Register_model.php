
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
    public function create($data)
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
            @user_created )'
        );

        return $query->result_array();

    }

}

?>