<?php

class ArtCalls_model extends CI_Model
{
    function __construct(){        
        parent::__construct();
    }
    
        function getArtcallById($id){
        $this->db->where('id', $id);
        $this->db->where('is_del', 0);
        return  $this->db->get('v_art_call')->row_array();
    }
    
    function insertArtcall($data){
        $this->db->insert('art_call', $data);
        return $this->db->insert_id();   
    }

    function checkArtCall($data){
        $this->db->where('is_del', 0);        
        $this->db->where('title', $data['title']);
        $recoders = $this->db->get('art_call')->result_array();
        return count($recoders);
    }
    
    function getArtCalls($email=""){
        $this->db->where('is_del', 0);
        if($email!="") $this->db->where('email', $email);        
        $this->db->order_by("regdate", "desc");
        return  $this->db->get('v_art_call')->result_array();
    }
    
    

    function updateArtcallById($id, $params){
        $params = [
            'title'         => $params->title,
            'description'   => $params->description,
            'deadline'      => $params->deadline,
            'fee'           => $params->fee,
            'website'       => $params->website,
            'awards'        => $params->awards,
        ];
        $this->db->where('id', $id);
        $this->db->set($params);
        $this->db->update('art_call');
    }

    function delArtCalls($id){
        $this->db->where('id', $id);
        $this->db->set('is_del', 1);
        $this->db->update('art_call');
    }
} ?>
    