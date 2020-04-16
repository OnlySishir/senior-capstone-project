<?php
class Blogs_model extends CI_Model
{
    function get_posts($number = 10, $start = 0)
    {
        $this->db->select();
        $this->db->from('v_posts');
        $this->db->where('active',1);
        $this->db->order_by('date_added','desc');
        $this->db->limit($number, $start);
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_post_count()
    {
        $this->db->select()->from('v_posts')->where('active',1);
        $query = $this->db->get();
        return $query->num_rows;
    }
    function get_post($post_id)
    {
        // $this->db->select();
        // $this->db->from('posts');
        $this->db->where('post_id', $post_id);
        $this->db->where('active', 1);
        // $this->db->where(array('active'=>1,'id'=>$id));
        // $this->db->order_by('date_added','desc');
        return  $this->db->get('v_posts')->row_array();
    }
    function insert_post($data)
    {
        $this->db->insert('posts',$data);
        return $this->db->insert_id();
    }


    function update_post($post_id, $data)
    {
        $this->db->where('post_id',$post_id);
        $this->db->update('posts',$data);
    }

    
    function delete_post($post_id)
    {
        $this->db->where('post_id',$post_id);
        $this->db->delete('posts');
    }

}
 ?> 