<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class SearchResults extends MY_controller{
	
	private $header = "header/header";
	private $categroysorts;

	function __construct()
	{
		parent::__construct();
		$this->load->model('requests_model');
		$this->load->model('accounts_model');
        $this->load->model('blogs_model');
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
    
    	function searchResult() {
		$keyword    =   $this->input->post('keyword');
		$data['results']    =   $this->products_model->searchResult($keyword);
		$this->load->view($this->header, ['categroysorts'=>$this->categroysorts]);
		$this->load->view('searchresults.php', $data);
		$this->load->view('footer');
	}
} ?>