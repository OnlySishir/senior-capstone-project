<?php

class ProductStock_model extends CI_Model
{
    function __construct(){        
        parent::__construct();
    }
  

    function update_stock($cart){
        if(empty($cart)) redirect('/');

        foreach ($this->cart->contents() as $key => $row) {
            
            $this->db->where('is_del', 0);
            $this->db->where('pro_title', $row['name']);
            $res = $this->db->get('pd_products')->row_array();

            $qty = $res['pro_quantity_stock']*1 - $row['qty']*1;
            $qty = $qty > 0 ? floor($qty) : 0;

            $this->db->where('is_del', 0);
            $this->db->where('pro_title', $res['pro_title']);
            $this->db->set(['pro_quantity_stock' => $qty]);
            $this->db->update('pd_products');
        }
    }
} ?>
    
