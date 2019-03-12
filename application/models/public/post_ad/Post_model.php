<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
class Post_model extends CI_Model 
{
    /** */
    public function __construct()
    {
        parent::__construct();
    }

    /** */
    public function insert_ad($data)
    {
        $query = $this->db->query('CALL submit_ad(
            "'.$data['title'].'",
            "'.$data['condition'].'",
            "'.$data['description'].'",
            "'.$data['price'].'",
            "'.$data['negotiable'].'",
            "'.$data['slug'].'",
            "'.$data['user_id'].'",
            "'.$data['location'].'",
            "'.$data['category'].'",
            "'.$data['main_image'].'",
            "'.$data['sub_images'].'",
            "'.$data['token'].'",
            "'.$data['path_string'].'"
            )'
        );

        return $query;
    }

    /*** */
    public function get_last_id()
    {
        $query = $this->db->query('SELECT MAX(adid) AS id FROM tbl_adverts');

        $result = $query->result();
        return $result[0]->id;
    }

    /*** */
    public function fetch_category($category_id)
    {
        $this->db->select('t1.name AS subcategory, t2.name AS category');
        $this->db->from('tbl_category AS t1 ');
        $this->db->join(' tbl_category AS t2 ', 't1.parent = t2.catid', 'left');
        $this->db->where('t1.catid', $category_id);
        $query = $this->db->get();

        return $query->row();
    }

    /*** */
    public function fetch_location($location_id)
    {
        $this->db->select('t1.name AS sublocation, t2.name AS location');
        $this->db->from('tbl_location AS t1 ');
        $this->db->join(' tbl_location AS t2 ', 't1.parent = t2.locid', 'left');
        $this->db->where('t1.locid', $location_id);
        $query = $this->db->get();

        return $query->row();
    }

    /*** */
    public function fetch_user_by_id($user_id)
    {
        $this->db->select('fullname, email, phone_number');
        $this->db->from('tbl_users');
        $this->db->where('userid', $user_id);
        $query = $this->db->get();

        return $query->row();
    }

    /** */
    public function count_slug($slug)
    {
         $this->db->select('COUNT(slug) as slug_count');
         $this->db->from('tbl_adverts');
         $this->db->like('slug', $slug);
         $query = $this->db->get();
         $count = $query->row();
 
         return $count->slug_count;
    }

    /**
     * 
     */
    public function populate_edit($slug)
    {
        $this->db->select('*');
        $this->db->from('fetch_ad');
        $this->db->where('slug', $slug);
        $query = $this->db->get();

        return $query->row();
    }

    /** */
    public function update_ad($data)
    {
        $query = $this->db->query('CALL update_ad(
            "'.$data['id'].'",
            "'.$data['title'].'",
            "'.$data['condition'].'",
            "'.$data['description'].'",
            "'.$data['price'].'",
            "'.$data['negotiable'].'",
            "'.$data['slug'].'",
            "'.$data['location'].'",
            "'.$data['category'].'",
            "'.$data['token'].'"
            )'
        );

        return $query;
    }

    /*** */
    public function get_token($token)
    {
        $this->db->select('token');
        $this->db->from('tbl_adverts');
        $this->db->where('token', $token);
        $query = $this->db->get();

        return $query->row();
    }

    /*** */
    public function update_status($slug)
    {
        $this->db->set('status', 3);
        $this->db->where('slug', $slug);
        return $this->db->update('tbl_adverts'); 
    }
}
?>