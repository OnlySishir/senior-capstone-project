<?php

class Accounts_model extends CI_Model
{
    function __construct(){        
        parent::__construct();
    }
    
    
    // finding the list of members from tables. 

    function findAll(){

		$this->db->where('type !=', 'ADMIN');
        $this->db->where('is_del', 0);
        return  $this->db->get('accounts')->result_array();
    }
    
    // function to populate business users 

    function findAllBusiness(){
        $this->db->where('type !=', 'ADMIN');
        $this->db->where('is_del', 0);
        $this->db->order_by("firstname", "asc");
        return  $this->db->get('v_business_accounts')->result_array();
    }
    
    // function to populate artist users. 
    
    function findAllArtist(){
        $this->db->where('type !=', 'ADMIN');
        $this->db->where('is_del', 0);
        $this->db->order_by("firstname", "asc");
        return  $this->db->get('v_artist_accounts')->result_array();
    }

    
    // Function to update user information. 
    function updateById($id, $params){
    	$params = [
    		'firstname' => $params->firstname,
    		'lastname'  => $params->lastname,
    		'email'	    => $params->email,
    // 		'type'	    => $params->type,
    		'postalcode'=> $params->postalcode,
    		'link'	    => $params->link,
    		'role'      => $params->role
    	];
    	$this->db->where('id', $id);
    	$this->db->set($params);
    	$this->db->update('accounts');
    }

    
    // removing user account. 
    
    function removeById($id){
    	
    	$this->db->where('id', $id);
    	$this->db->set('is_del', 1);
    	$this->db->update('accounts');
    }

    // checking if the user is an admin 
    
    function getCheckAdmin($email){

        $this->db->where('type', "ADMIN");
        $this->db->where('email', $email);
        return $this->db->get('accounts')->row_array();
    }
    
    // checking the registered users. 
    
    function getCheckUser($email, $type='artist'){

        $this->db->where('is_del', 0);
        $this->db->where('activate', 1);
        $this->db->where('email', $email);
        $check = $this->db->get('v_artist_accounts')->row_array();
                
        if( !empty($check) ){
            $this->db->where('is_del', 0);
            $this->db->where('activate', 1);
            $this->db->where('email', $email);
            return $this->db->get('v_artist_accounts')->row_array();
        }
        else{
            $this->db->where('is_del', 0);
            $this->db->where('activate', 1);
            $this->db->where('email', $email);
            return $this->db->get('v_business_accounts')->row_array();
        }

    }
    
    // function to activate user accounts after registration. 

    function updateActivate($id){

        $this->db->where('rid', $id);
        $this->db->set('activate', 1);
        $this->db->update('accounts');
        return $this->db->affected_rows();
    }   

    //email token for users to activate account. 
    
    function insertToken($account_id){

        $token = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 50);

        $this->db->where('id', $account_id);
        $this->db->set('token', $token);
        $this->db->update('accounts');

        return $token;
    } 
    
    // function to accounts if only the token is valid or activated.

    function isTokenValid($token){

        $this->db->where('is_del', 0);
        $this->db->where('activate', 1);
        $this->db->where('token', $token);
        return $this->db->get('accounts')->row_array();
    }

    
    // Updating passwords by id. 
    
    function updatePasswordById($hashed, $id){
        
        $this->db->where('id', $id);
        $this->db->set('password', $hashed);
        $this->db->update('accounts');
        return $this->db->affected_rows();
    }

    
    // account plan check for users that are professionals. 
       
    function checkAccountPlan($id){
        $this->db->where('is_del', 0);
        $this->db->where('account_id', $id);
        $this->db->order_by('regdate', 'DESC');
        return $this->db->get('account_plan')->row_array();
    }

    // Get individual account. 
    function getAccountById($id){

        $this->db->where('is_del', 0);
        $this->db->where('id', $id);
        return $this->db->get('accounts')->row_array();
    }
    
    // Adding payment plan for professional artist/business users. 
    
        function add_payment_plan($cart, $user, $state){
        if(empty($user)) redirect('/');

        $param['account_id'] = $user['id'];
        $param['pay_plan'] = $user['pay_plan'];
        $param['last_paid_date'] = date('Y-m-d h:i:s');
        $param['pay_state'] = $state;

        $this->db->insert('account_plan', $param);
        return $this->db->insert_id();
    }

}
?>
