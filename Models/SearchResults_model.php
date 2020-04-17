<?php

class SearchResults_model extends CI_Model
{
    function __construct(){        
        parent::__construct();
    }
    
    
function searchResult($keyword)
    {

    $this->db->select($this->db->escape('v_grants') .  " AS source, id, Title, summary, 'grant' as type ");
    $this->db->from('v_grants');
    $this->db->like('title', $keyword);
    $this->db->or_like('open_to', $keyword);
    $this->db->or_like('tag', $keyword);
    $vGrantsQuery = $this->db->get_compiled_select();


    $this->db->select($this->db->escape('v_art_call') . ", id, Title, description, 'art' as type ");
    $this->db->from('v_art_call');
    $this->db->like('title', $keyword);
    $this->db->or_like('open_type', $keyword);
    $artQuery = $this->db->get_compiled_select();


    $this->db->select($this->db->escape('v_pd_products','s') . ", id, pro_title, pro_description,  'pro' as type ");
    $this->db->from('v_pd_products');
    $this->db->like('pro_title', $keyword);
    $this->db->or_like('category_sort', $keyword);
    $this->db->or_like('category_name', $keyword);
    $proQuery = $this->db->get_compiled_select();

return $this->db->query($vGrantsQuery . ' UNION ALL ' . $artQuery . ' UNION ALL ' . $proQuery)->result();

    }
} ?>
