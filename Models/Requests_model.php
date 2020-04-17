<?php

class Requests_model extends CI_Model
{
    function __construct(){        
        parent::__construct();
    }

    //Finding all requested users
    
    function findAll(){
        $this->db->where('approve', 0);
        return $this->db->get('requests')->result_array();
    }

    // Function that updates the requested users to accounts table when accepted. 
    
    function updateById($rqid, $act){
        $act = $act == 'accept' ? 1 : -1;

        $this->db->where('id', $rqid);
        $this->db->set('approve', $act);
        $this->db->update('requests');

        //insert the recode to accounts table
        if( $act == 1 ){//act == 1, -1 : Accept, Reject

            $row = $this->getRequestById($rqid);

            $data = [
                        'firstname' =>$row['firstname'], 
                        'lastname'  =>$row['lastname'], 
                        'email'     =>$row['email'], 
                        'password'  => $row['password'], 
                        'confirmpassword' => $row['confirmpassword'], 
                        'postalcode' => $row['postalcode'], 
                        'file_upload' => $row['file_upload'],
                        'file_ok'   => $row['file_ok'],
                        'type'      => $row['type'], 
                        'link'      => $row['link'], 
                        'info'      => $row['info'],
                        'role'      => $row['role'],
                        'type'      => $row['type'],
                        'rid'       => $row['id'],
                        'pay_plan'  => $row['pay_plan'],
                    ];

            $this->db->insert('accounts', $data);
        }

        //remove the requests row
        // $this->db->where('id', $rqid);
        // $this->db->delete('requests');

        return $this->findAll();
    }

    function updateUrlByid($id, $data){
        $this->db->where('id', $id);
        $this->db->set($data);
        $this->db->update('requests');
    }

    function updateFileFieldById($id, $file_ok){
        $this->db->where('id', $id);
        $this->db->set('file_ok', $file_ok);
        $this->db->update('requests');
    }

    // finding requested user by id. 
    function getRequestById($rqid){
        $this->db->where('id', $rqid);
        return $this->db->get('requests')->row_array();
    }

    // adding registration request.    
    function addRequests($param){
        $this->db->insert('requests', $param);
        return $this->db->insert_id();
    }

    /*set the online field*/
    function set_online(){
        $this->db->where('id', $this->session->userId);
        $this->db->set('online', 1);
        $this->db->update('user');
    }

    /*set the offline field*/
    function set_offline(){
        $this->db->where('id', $this->session->userId);
        $this->db->set('online', 0);
        $this->db->update('user');   
    }

    // checking if the user already exist in the database. 
    function checkExistAccount($email){
        $this->db->where('email', $email);
        $r_row = $this->db->get('requests')->row_array();

        $this->db->where('email', $email);
        $a_row = $this->db->get('accounts')->row_array();

        return count($r_row)+count($a_row);
    }
    
}
?>
