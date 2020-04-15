<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Artcalls extends MY_controller{
	
	private $header = "header/header";
	private $categroysorts;

	function __construct()
	{
		parent::__construct();
		$this->load->model('requests_model');
		$this->load->model('accounts_model');
		$this->load->model('ArtCalls_model');
		$this->load->helper('email');
		$this->load->library('passwordhash', [8]);
		$this->load->library('form_validation');
		$this->load->library("pagination");

		if($this->session->is_user == "BUSINESS/TRADE"){
			$this->header = "header/business_header";
		}
		elseif ($this->session->is_user == "ARTIST/DESIGNER") {
			$this->header = "header/artist_header";
		}
		$this->categroysorts = $this->products_model->getCategorySorts();


	}

    function artcalls(){//Only business account 
// 		if(empty($this->session->is_user)) redirect('logout');

// 		if($this->session->is_user != "BUSINESS/TRADE"){
			
// 			$this->session->set_flashdata('error_msg', "Your account is not Business account"); 
// 			redirect('main'); 
// 		} 
		$artcalls = $this->products_model->getArtCalls();
		$nArtcalls = [];
		//artcalls filtering
		foreach ($artcalls as $key => $row) {
			$lOption = explode(',', $row['listing_option']);

			if($lOption[0] > 0){
				$current_date = strtotime(date("Y-m-d"));
				$start_date = strtotime( date("Y-m-d", strtotime($row['event_start_date'])) );

				$dd = ($current_date - $start_date)/60/60/24;//days

				if($dd < $lOption[1]){
					array_push($nArtcalls, $row);
				}
				else{
					$this->products_model->delArtCalls($row['id']);
				}

			}
			else{
				array_push($nArtcalls, $row);
			}			 
		}

		$this->load->view($this->header, ['categroysorts'=>$this->categroysorts]);
		$this->load->view('artcalls', ['artcalls'=>$nArtcalls]);
		$this->load->view('footer');
	}

	function artcallsubmission(){//Only business account
		if(empty($this->session->is_user)) redirect('logout');

		if($this->session->is_user != "BUSINESS/TRADE"){

			$this->session->set_flashdata('error_msg', "Your account is not Business account"); 
			redirect('main'); 
		} 
		$countries = config_item('country_list');
		$this->load->view($this->header, ['categroysorts'=>$this->categroysorts]);
		$this->load->view('art-call-submission', ['countries'=>$countries]); 
		$this->load->view('footer');		
	}

	function artcall_proc(){

		if(!empty($this->input->post('country'))){

			$data['country_name'] = $this->input->post('country');
			$data['state_name'] = $this->input->post('state-name');
			$data['city_name'] = $this->input->post('city-name');
			$data['call_type'] = $this->input->post('call_type');
			$data['open_type'] = $this->input->post('open_type');
            $data['medium_industry'] = join(',', $this->input->post('medium_industry'));
			$data['title'] = $this->input->post('title');
			$data['description'] = $this->input->post('description');
			$data['deadline'] = date('Y-m-d h:i:s', strtotime($this->input->post('deadline')));
			$data['fee'] = $this->input->post('fee');
			$data['eligibility'] = $this->input->post('eligibility');
			$data['event_start_date'] = date('Y-m-d h:i:s', strtotime($this->input->post('event_start_date')));
			$data['event_end_date'] = date('Y-m-d h:i:s', strtotime($this->input->post('event_end_date')));
			$data['awards'] = $this->input->post('awards');
			$data['website'] = $this->input->post('website');
			$data['how_apply'] = $this->input->post('how_apply');
			$data['listing_option'] = $this->input->post('listing_option');			
			$data['account_id'] = $this->session->myId;
			
			/* >> file attach */
			$main_img = $this->upload_files("main", $_FILES["img_file"]);

			if (empty($main_img)) {
				$this->session->set_flashdata('error_msg', 'Image has not uploaded, please use only below 1500 * 1500 pixel imgs');
				redirect('starter/artcallsubmission');
			}
			else{				
				$data['img'] = $main_img ? $main_img[0] : "";

				//check the listing_option
				$list_option = explode(',', $data['listing_option']);
				if( !empty(trim($list_option[1])) ){	
					$id = rand(100,1000);
					$this->addToCart($id, $data['title'], $list_option[1], 1, "art_call", $data['img'], 1);
					redirect('product/cart');
				}

				$res = $this->products_model->checkArtCall($data);

				if($res >= 1){
					$this->session->set_flashdata('error_msg', 'Art call title is aleady exist, please try with another name!');	
				}
				else{
					$this->products_model->insertArtcall($data);
					$this->session->set_flashdata('msg', 'Art call has submitted Successfuly');				
				}
				redirect('artcalls');				
			}
		}
	}