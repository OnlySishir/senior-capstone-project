<?php
class Comments_model extends CI_Model
{
    function add_comment($data)
    {
        $this->db->insert('comments',$data);
        return $this->db->insert_id();
    }
    
    function get_comment($post_id)
    {
        $this->db->select('comments.*,accounts.firstname,lastname');
        $this->db->from('comments');
        $this->db->join('accounts','accounts.id = comments.account_id', 'left');
        $this->db->where('post_id',$post_id);
        $this->db->order_by('date_added','asc');
        $query = $this->db->get();
        return $query->result_array();
    }

}
 ?> 
