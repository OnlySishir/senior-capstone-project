<?php

class Profiles_model extends CI_Model
{
    function __construct(){        
        parent::__construct();
    }
    
   function checkProfileBusi($id){
        $this->db->where('is_del', 0);
        $this->db->where('account_id', $id);
        return $this->db->get('business_profile')->row_array();
    }

    function updateProfileBusi($data){
        $this->db->where('is_del', 0);
        $this->db->where('account_id', $data['account_id']);
        $this->db->set($data);
        $this->db->update('business_profile');
    }

    function insertProfileBusi($data){
        $this->db->insert('business_profile', $data);
        return $this->db->insert_id();   
    }
    
    function checkProfileArt($id){
        $this->db->where('is_del', 0);
        $this->db->where('account_id', $id);
        return $this->db->get('artist_profile')->row_array();
    }

    function updateProfileArt($data){
        $this->db->where('is_del', 0);
        $this->db->where('account_id', $data['account_id']);
        $this->db->set($data);
        $this->db->update('artist_profile');
    }

    function insertProfileArt($data){
        $this->db->insert('artist_profile', $data);
        return $this->db->insert_id();   
    }

    function update_profile_img($profile_img){
        $this->db->where('is_del', 0);
        $this->db->where('id', $this->session->myId);
        $this->db->set(['profile_img' => $profile_img]);
        $this->db->update('accounts');
    }
    

} ?>
