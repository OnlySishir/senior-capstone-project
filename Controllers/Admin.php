<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * Admin Page for this controller.
	 * 
	 */
	function __construct(){        
	    parent::__construct();
	    $this->load->model('requests_model');
	    $this->load->model('accounts_model');
	    $this->load->model('products_model');
	    $this->load->library('passwordhash', [8]);
	}

	public function index()
	{
		$this->load->view('admin/header');
		$this->load->view('admin/index');
		$this->load->view('admin/footer');
	}

	public function login(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$row = $this->accounts_model->getCheckAdmin($email);

		$check = $this->passwordhash->CheckPassword($password, $row['password']);

		if($check){

			$this->session->set_userdata('is_admin', true);
			$this->session->set_userdata('userName', $row['firstname']." ".$row['lastname']);
			$this->session->set_userdata('userEmail', $row['email']);
			$this->session->set_userdata('userId', $row['id']);

			redirect('admin/dashboard');
		}
		else{

			$this->session->set_flashdata('msg', 'Email or Password is incorrect');
			redirect('admin/');
		}
	}

	public function dashboard(){

		if(empty($this->session->is_admin)) redirect('admin/logout');

		$requests = $this->requests_model->findAll();

		$this->load->view('admin/header_main', ['nav'=>'User-Requests']);
		$this->load->view('admin/dashboard', ['requests'=>$requests]);
		$this->load->view('admin/footer');
	}

	public function dashproc(){

		if(empty($this->session->is_admin)) redirect('admin/logout');

		if(!empty($_GET['rqid']) && !empty($_GET['act'])){

			$this->requests_model->updateById($_GET['rqid'], $_GET['act']);
			$individual	  = $this->requests_model->getRequestById($_GET['rqid']);

			$res['type'] = $_GET['act'] == 'accept' ? 'Accepted' : 'Rejected';
			$this->session->set_flashdata(['content' => $individual, 'rType' => $res['type']]);

			/*Email Notify*/
			$this->emailToUser($individual, $res['type']);
		}
		
		if(!empty($_GET['rqid']) && !empty($_GET['fileok'])){

			$this->requests_model->updateFileFieldById($_GET['rqid'], $_GET['fileok']);


			if($_GET['fileok'] == 'ok'){
				$this->session->set_flashdata('msg', " Business Resaler Approved! ");
			}
			else{
				$this->session->set_flashdata('error_msg', 'Not Business Resaler!');
			}

		}

		redirect(base_url('admin/dashboard'));
	}

	public function usermanage(){
		if(empty($this->session->is_admin)) redirect('admin/logout');

		$accounts = $this->accounts_model->findAll();

		$this->load->view('admin/header_main', ['nav'=>'All-Users']);
		$this->load->view('admin/usermanage', ['accounts'=>$accounts]);
		$this->load->view('admin/footer');
	}

	public function usermanproc(){

		if(empty($this->session->is_admin)) redirect('admin/logout');

		if( !empty($_GET['params']) && ($_GET['act']=='update') ){

			$params = json_decode($_GET['params']);
			$this->accounts_model->updateById($params->id, $params);
			$this->session->set_flashdata(['account_id'=>$params->id, 'action'=>'update']);
		}
		elseif( !empty($_GET['rqid']) && ($_GET['act']=='del') ) {

			$this->accounts_model->removeById($_GET['rqid']);
			$this->session->set_flashdata(['account_id'=>$_GET['rqid'], 'action'=>'del']);
		}

		redirect('admin/usermanage');
	}

	public function artcall_manage(){
		if(empty($this->session->is_admin)) redirect('admin/logout');

		$artcalls = $this->products_model->getArtCalls();

		$this->load->view('admin/header_main', ['nav'=>'ArtCalls']);
		$this->load->view('admin/artcall_manage', ['artcalls'=>$artcalls]);
		$this->load->view('admin/footer');
	}

	public function artcallmanproc(){

		if(empty($this->session->is_admin)) redirect('admin/logout');

		if( !empty($_GET['params']) && ($_GET['act']=='update') ){

			$params = json_decode($_GET['params']);
			$this->products_model->updateArtcallById($params->id, $params);

			$this->session->set_flashdata(['artcall_id'=>$params->id, 'action'=>'update']);
		}
		elseif( !empty($_GET['rqid']) && ($_GET['act']=='del') ) {

			$this->products_model->delArtCalls($_GET['rqid']);
			$this->session->set_flashdata(['artcall_id'=>$_GET['rqid'], 'action'=>'del']);
		}

		redirect('admin/artcall_manage');
	}

	public function grant_manage(){
		if(empty($this->session->is_admin)) redirect('admin/logout');

		$grants = $this->products_model->getGrants();

		$this->load->view('admin/header_main', ['nav'=>'Grants']);
		$this->load->view('admin/grant_manage', ['grants'=>$grants]);
		$this->load->view('admin/footer');	
	}

	public function grantsmanproc(){

		if(empty($this->session->is_admin)) redirect('admin/logout');

		if( !empty($_GET['params']) && ($_GET['act']=='update') ){

			$params = json_decode($_GET['params']);
						
			$this->products_model->updateGrantsById($params->id, $params);

			$this->session->set_flashdata(['grants_id'=>$params->id, 'action'=>'update']);
		}
		elseif( !empty($_GET['rqid']) && ($_GET['act']=='del') ) {

			$this->products_model->delGrants($_GET['rqid']);
			$this->session->set_flashdata(['grants_id'=>$_GET['rqid'], 'action'=>'del']);
		}

		redirect('admin/grant_manage');
	}

	public function logout(){

		$this->session->unset_userdata('userId');
		$this->session->unset_userdata('userName');
		$this->session->unset_userdata('userEmail');
		$this->session->unset_userdata('is_admin');

		redirect(base_url('admin'));
	}

	public function emailToUser($params, $type){

		if(empty($this->session->is_admin)) redirect('admin/logout');

    	$subject = $type == "Accepted" ? 'Your account Approved!' : "'Your account Rejected...'";

    	$this->email->from($this->session->userEmail, $this->session->userName);
    	$this->email->to($params['email']);
    	$this->email->cc('another@another-example.com');
    	$this->email->bcc('them@their-example.com');
    	$this->email->subject($subject);

    	$message =  "Name: ".$params['firstname'].' '.$params['lastname']."\n";
    	$message .= "Business Name: ".$params['businessname']."\n";
    	$message .= "Email: ".$params['email']."\n";
    	$message .= "Zip Code: ".$params['postalcode']."\n";
    	$message .= "Link: ".$params['link']."\n";
    	$message .= "Info: ".$params['info']."\n";
    	$message .= "Role: ".$params['role']."\n";

    	if($type == "Accepted"){
    		$message .= "Activate Url: ".$params['activate_url'];
    	}
    	else{
    		$message.=" Sorry, We cannot approve your Account. If you have more questions, please contact us. Thanks.";
    	}


    	$this->email->message($message);

    	$res = $this->email->send();
    }

}
