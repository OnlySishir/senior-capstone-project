<?php

class Grants_model extends CI_Model
{
    function __construct(){        
        parent::__construct();
    }
    
    // inserting grants
    
   function insertGrants($data){
        $this->db->insert('grants', $data);
        return $this->db->insert_id();      
    }

    // checking grants if they already exists
    function checkGrants($data){
        $this->db->where('is_del', 0);        
        $this->db->where('title', $data['title']);
        $recoders = $this->db->get('grants')->result_array();
        return count($recoders);
    }
    
    // update function 
    
     function updateGrantsById($id, $params){
        $params = [
            'title'         => $params->title,
            'summary'       => $params->summary,
            'deadline'      => $params->deadline,
            'fee'           => $params->fee,
            'website'       => $params->website,
            'tag'           => $params->tag,
        ];
        $this->db->where('id', $id);
        $this->db->set($params);
        $this->db->update('grants');
    }
    
    // deleting grants
    function delGrants($id){
        $this->db->where('id', $id);
        $this->db->set('is_del', 1);
        $this->db->update('grants');
    }

    // get grant lists
    function getGrants($email=""){
        $this->db->where('is_del', 0);
        if($email!="") $this->db->where('email', $email);
        $this->db->order_by("regdate", "desc");          
        return  $this->db->get('v_grants')->result_array();
    }
    
    // get individual grant
    
    function getGrantById($id){
        $this->db->where('id', $id);
        $this->db->where('is_del', 0);
        return  $this->db->get('v_grants')->row_array();
    }
} ?>
