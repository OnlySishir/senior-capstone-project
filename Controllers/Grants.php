<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grants extends MY_controller{

    private $header = "header/header";
    private $categroysorts;

    function __construct()
    {
        parent::__construct();
        $this->load->model('grants_model');
        $this->load->model('accounts_model');
        $this->load->helper('email');
        $this->load->library('passwordhash', [8]);
        $this->load->library('form_validation');

        if($this->session->is_user == "BUSINESS/TRADE"){
            $this->header = "header/business_header";
        }
        elseif ($this->session->is_user == "ARTIST/DESIGNER") {
            $this->header = "header/artist_header";
        }
        $this->categroysorts = $this->products_model->getCategorySorts();
    }

   function grants(){
        if(empty($this->session->is_user)) redirect('logout');
        $this->load->view($this->header, ['categroysorts'=>$this->categroysorts]);

        $countries = config_item('country_list');
        $this->load->view('nadia/grants', ['countries'=>$countries]);
        $this->load->view('footer');    
    }

    function grants_proc(){
        if(empty($this->session->is_user)) redirect('logout');        
        if(!empty($this->input->post('title'))){
            $data['type_funding'] = $this->input->post('type-funding');
            $data['country'] = $this->input->post('country');
            $data['open_to'] = $this->input->post('open_to');            
            $data['medium_industry'] = join(',', $this->input->post('medium_industry'));
            $data['title'] = $this->input->post('title');            
            $data['summary'] = $this->input->post('summary');
            $data['amount'] = $this->input->post('amount');            
            $data['deadline'] = date('Y-m-d h:i:s', strtotime($this->input->post('deadline')));            
            $data['fee'] = $this->input->post('fee');
            $data['who_apply'] = $this->input->post('who-apply');            
            $data['website'] = $this->input->post('website');
            $data['how_apply'] = $this->input->post('how-apply');
            $data['listing_option'] = $this->input->post('listing-option');

            $data['tag'] = $this->input->post('tag');

            $data['account_id'] = $this->session->myId;

            /* >> file attach */
            $main_img = $this->upload_files("main", $_FILES["img_file"]);

            if (empty($main_img)) {
                $this->session->set_flashdata('error_msg', 'Image has not uploaded, please use only below 1500 * 1500 pixel imgs');
                redirect('product/grants');
            }
            else{
                $data['image'] = $main_img ? $main_img[0] : "";

                //check the listing_option
                $list_option = explode(',', $data['listing_option']);
                if( !empty(trim($list_option[1])) ){
                    $id = rand(100,1000);
                    $this->addToCart($id, $data['title'], $list_option[1], 1, "grants", $data['image'], 1);
                    redirect('product/cart');
                }

                $res = $this->products_model->checkGrants($data);

                if($res >= 1){
                    $this->session->set_flashdata('error_msg', 'Grant title is aleady exist, please try with another name!');    
                }
                else{
                    $this->products_model->insertGrants($data);
                    $this->session->set_flashdata('msg', 'Grant has submitted Successfully');             
                }
                redirect('product/grant_lists');               
            }
        }
    }

    function grant_lists(){
        // if(empty($this->session->is_user)) redirect('logout');        
        $this->load->view($this->header, ['categroysorts'=>$this->categroysorts]);

        $grantlist = $this->products_model->getGrants();

        $nGrantlist = [];
        //artcalls filtering
        foreach ($grantlist as $key => $row) {
            $lOption = explode(',', $row['listing_option']);

            if($lOption[0] > 0){
                $current_date = strtotime(date("Y-m-d"));
                $start_date = strtotime( date("Y-m-d", strtotime($row['regdate'])) );

                $dd = ($current_date - $start_date)/60/60/24;//days

                if($dd < $lOption[1]){
                    array_push($nGrantlist, $row);
                }
                else{
                    $this->products_model->delGrants($row['id']);
                }

            }
            else{
                array_push($nGrantlist, $row);
            }            
        }

        $this->load->view('nadia/grantlist', ['grantlist'=>$nGrantlist]);
        $this->load->view('footer');
    }
    
    function grantindividual($id=""){
        if(empty($this->session->is_user)) redirect('login');

        if( $id=="" ) redirect('grant_lists');

        $single = $this->products_model->getGrantById($id);

        $this->load->view($this->header, ['categroysorts'=>$this->categroysorts]);
        $this->load->view('nadia/singlegrant', ['single'=>$single]);
        $this->load->view('footer');    
    }
    
} ?>
