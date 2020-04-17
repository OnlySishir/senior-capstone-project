<?php

class Products_model extends CI_Model
{
    function __construct(){        
        parent::__construct();
    }

    function findAll(){

        $this->db->where('is_del', 0);
        return  $this->db->get('v_pd_products')->result_array();
    }

    function getCategorySorts(){
        $this->db->where('is_del', 0);
        $this->db->group_by('category_sort');
        return $this->db->get('pd_category')->result_array();
    }

    function getCategoryNames($categorySort){

        $this->db->where('is_del', 0);
        $this->db->where('category_sort', $categorySort);
        return $this->db->get('pd_category')->result_array();
    }

    function insertProduct($data){
        $this->db->insert('pd_products', $data);
        return $this->db->insert_id();
    }


    function getProductById($id){

        $this->db->where('id', $id);
        $this->db->where('is_del', 0);
        return $this->db->get('v_pd_products')->row_array();
    }
    

    function getAllCollections(){
        $this->db->where('is_del', 0);
        return $this->db->get('pd_collections')->result_array();
    }

    function addNewCollection($name, $accountID){
        $this->db->insert('pd_collections', ['name'=>$name, 'creator_id'=>$accountID]);
        return $this->db->insert_id();
    }

    function getProductLists($ids){
        if(count($ids) <= 0) return [];
        $this->db->where('is_del', 0);
        $this->db->where_in('id', $ids);
        return $this->db->get('v_pd_products')->result_array();
    }

    function findProductsBySortId($cid){
        if($cid=="") return $this->findAll(); 
        //Get the sortname
        $this->db->where('id', $cid);
        $category_sort = $this->db->get('v_pd_products')->row_array()['category_sort'];

        $this->db->where('is_del', 0);
        $this->db->where('category_sort', $category_sort);
        return $this->db->get('v_pd_products')->result_array();
    }

    function findProductsByColId($col_id, $u_id){
        if($col_id=="" || $u_id=="") return $this->findAll(); 

        $this->db->where('is_del', 0);
        $this->db->where('pro_collection', $col_id);
        $this->db->where('accounts_id', $u_id);
        return $this->db->get('v_pd_products')->result_array();   
    }

    function findProductsByUserID($user_id){
        $this->db->where('is_del', 0);
        $this->db->where('accounts_id', $user_id);
        return $this->db->get('v_pd_products')->result_array();   
    }

    function findCollectionByUserID($user_id){
        $this->db->where('is_del', 0);
        $this->db->where('accounts_id', $user_id);
        $this->db->group_by('pro_collection');
        return $this->db->get('v_pd_products')->result_array();
    }

}
?>
