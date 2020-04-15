<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Accounts extends MY_controller{
	
	private $header = "header/header";
	private $categroysorts;

	function __construct()
	{
		parent::__construct();
		$this->load->model('requests_model');
		$this->load->model('accounts_model');
		$this->load->model('products_model');
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

	
	/*home page..*/
	function index(){
		if(!empty($this->session->is_user)) redirect('main');

		$this->load->view($this->header, ['categroysorts'=>$this->categroysorts]);
		$this->load->view('index');
		$this->load->view('footer');
	}
    
    
    // signup system for each type of users. 

	function signup($sort = 'basart' ){
		$pay_plan = !empty($this->input->get('plan')) ? $this->input->get('plan') : 'free';

		$this->load->view($this->header, ['categroysorts'=>$this->categroysorts]);
		$this->load->view('signup/signup'.'_'.$sort, ['plan'=>$pay_plan]);
		$this->load->view('footer');
	}

	function regproc($sort = 'basart'){

		if( !empty($_POST['firstname']) ){

			switch ($sort) {
				case 'basart': $role = 'member,basic_artist';   $_type = 'ARTIST/DESIGNER'; break;
				case 'basart_author': $role = 'member,basic_artist,author';   $_type = 'ARTIST/DESIGNER'; break;
				case 'proart_author': $role = 'member,pro_artist,author';   $_type = 'ARTIST/DESIGNER'; break;
				case 'basbus': $role = 'member,basic_business'; $_type = 'BUSINESS/TRADE'; break;
				case 'basbus_author': $role = 'member,basic_business,author'; $_type = 'BUSINESS/TRADE'; break;
				case 'probus_author': $role = 'member,pro_business,author'; $_type = 'BUSINESS/TRADE'; break;
				case 'proart': $role = 'member,pro_artist';		$_type = 'ARTIST/DESIGNER'; break;
				case 'probus': $role = 'member,pro_business';   $_type = 'BUSINESS/TRADE'; break;			
				
			}

			$params = [
				'firstname'			=> $this->input->post('firstname'),
				'lastname'			=> $this->input->post('lastname'),
				'businessname'		=> $this->input->post('businessname'),
				'email'				=> $this->input->post('email'),
				'password'			=> $this->passwordhash->HashPassword($this->input->post('password')),
				'confirmpassword'	=> $this->input->post('confirmpassword'),
				'postalcode'		=> $this->input->post('postalcode'),
				'link'				=> $this->input->post('link'),
				'info'				=> $this->input->post('info'),
				'role'				=> $role,
				'type'				=> $_type,
				'pay_plan'			=> $this->input->post('pay_plan'),
			];

			/*>> check account*/
			$cc = $this->requests_model->checkExistAccount($this->input->post('email'));
			if($cc > 0){
				$this->session->set_flashdata('msg', " That Email is already registered, please try with another Email Address. ");
				redirect('signup/'.$sort);
			}

			/* >> file attach */
			if( !empty($_FILES["myfile"]["name"]) ){

				$config['upload_path']          = './upload/';
                $config['allowed_types']        = 'gif|jpg|png|pdf|bmp|psd';
                $config['max_size']             = 5000;
                $config['max_width']            = 1500;
                $config['max_height']           = 1500;

                $this->load->library('upload', $config);

                if ( !$this->upload->do_upload('myfile') ){

                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata(['fileupload' => false, 'reason'=>$error]);
                }
                else{

					$data = array('upload_data' => $this->upload->data());
                	$params['file_upload'] = $data['upload_data']['file_name'];

                    $this->session->set_flashdata('fileupload', true);
                }
			}

			$res = $this->emailchecker($this->input->post('email'));

			if($res['res']){//Valid email

				//Request insert
				$id = $this->requests_model->addRequests($params);

				//Generate Activate uri
				$set = '123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
				$code = substr(str_shuffle($set), 0, 12);
				$activate_url = base_url('starter/activate/'.$id.'/'.$code);
				$_data['activate_url'] = $activate_url;
				$_data['code'] = $code;
				$this->requests_model->updateUrlByid($id, $_data);

				/*Email send to Admin*/
				$this->emailToAdmin($params);

				$this->session->set_flashdata('msg', 'Register was requested successfully! We will notify via your email');

				redirect('login');

			}
			else{//invalid email

				$this->session->set_flashdata('msg', $res['msg']);
				redirect('signup/'.$sort);
			}
			
		}
	}
    
    // about page 
    
    	function about(){
		$this->load->view($this->header, ['categroysorts'=>$this->categroysorts]);
		$this->load->view('about');
		$this->load->view('footer');
	}

    // contact page 
    
	function contact(){

		$this->load->view($this->header, ['categroysorts'=>$this->categroysorts]);
		$this->load->view('contact');
		$this->load->view('footer');
	}

    //ambassador page
    
	function ambassador(){

		$this->load->view($this->header, ['categroysorts'=>$this->categroysorts]);
		$this->load->view('ambassador');
		$this->load->view('footer');
	}

    // terms and conditions
    
	function termandcondition(){

		$this->load->view($this->header, ['categroysorts'=>$this->categroysorts]);
		$this->load->view('termandcondition');		
		$this->load->view('footer');
	}
    
    //community guidlines

	function communityguidline(){

		$this->load->view($this->header, ['categroysorts'=>$this->categroysorts]);
		$this->load->view('communityguidline');
		$this->load->view('footer');
	}


    // function to login 
	function login(){
		$this->load->view($this->header, ['categroysorts'=>$this->categroysorts]);
		$this->load->view('login');
		$this->load->view('footer');
	}

	function login_proc(){

		$email = $this->input->post('email');
		$password = $this->input->post('password');


		$person = $this->accounts_model->getCheckUser($email);

		$check = $this->passwordhash->CheckPassword($password, $person['password']);

		//check the payment plan
		$res = $this->checkAccount($person);
		
		if( $check ){

			$this->session->set_userdata('is_user', $person['type']);
			$this->session->set_userdata('myName', 	$person['firstname']." ".$person['lastname']);
			$this->session->set_userdata('myEmail', $person['email']);
			$this->session->set_userdata('myId', 	$person['id']);
			$this->session->set_userdata('myRole', 	$person['role']);
			$this->session->set_userdata('certified', $person['file_ok']);

			$this->session->set_flashdata('msg', 'Login Success!');

			redirect('main');
		}
		else{

			$this->session->set_flashdata('error_msg', 'Email or Password is incorrect');
			redirect('login');
		}
	}
    
    // logout function 
    
        function logout(){
    	$this->session->unset_userdata('is_user');
    	$this->session->unset_userdata('myName');
    	$this->session->unset_userdata('myEmail');
    	$this->session->unset_userdata('myId');
    	$this->session->unset_userdata('myRole');
    	$this->session->unset_userdata('id');
    	$this->cart->destroy();
    	redirect('/');
    }


    // checking account for paid date for professional artist/business users. 
	function checkAccount($person){

		$pay_plan = $this->accounts_model->checkAccountPlan($person['id']);

		if(!empty($pay_plan) && count($pay_plan) > 0 ){

			$hrs = abs(strtotime( date('Y-m-d h:i:s') ) - strtotime($pay_plan['last_paid_date']))/(60*60);
			$hrs = (int)$hrs;

			if(strpos($person['role'], 'pro_')){

				if($person['pay_plan']=="annually"){

					if($hrs < 365*24)
						return true;
				}
				else{//monthly

					if($hrs < 31*24)
						return true;					
				}
				redirect('payplan/'.$person['id']);
			}
		}
		else{

			$hrs = abs(strtotime(date('Y-m-d h:i:s')) - strtotime($person['regdate']))/(60*60);
			$hrs = (int)$hrs;

			if(strpos($person['role'], 'pro_')){
				
				if($hrs < 14*24){
					return true;
				}
				else{
					redirect('payplan/'.$person['id']);
				}
			}
		}
		
		//common users
		return true;
	}

    // setting up payplan for professional users. (monthly/yearly)
    
	function payplan($id=0){
		$row = $this->accounts_model->getAccountById($id);

		if(count($row) <= 0){
			$this->session->set_flashdata('error_msg', 'Account info incorrect');
			redirect('/');
		}

		if (strpos($row['role'], 'pro_artist')) {
			$price = $row['pay_plan'] == 'annually' ? 12*12 : 18;//us$
		}
		else{
			$price = $row['pay_plan'] == 'annually' ? 25*12 : 32;//us$	
		}

		$this->load->view('header/header');
		$this->load->view('payplan_view', ['row'=>$row, 'price'=>$price]);
		$this->load->view('footer');
	}

	function main(){
		if(empty($this->session->is_user)) redirect('logout');	

		$this->load->view($this->header, ['categroysorts'=>$this->categroysorts]);	

		$this->session->is_user == "BUSINESS/TRADE" ? $this->load->view('business_home') : $this->load->view('artist_home');
		
		$this->load->view('footer');
	}

    
    	/*>> password reset*/
	function password_reset($admin='myemail@wsuspec.site')
	{

	    if( !valid_email($this->input->post('email')) ) {

	        $this->session->set_flashdata('error_msg', 'Please use your valid Email Address');
	        redirect('login');
	    }else{

	        $email = $this->input->post('email');  
	        $email = $this->security->xss_clean($email);
	        $userInfo = $this->accounts_model->getCheckUser($email);

	        if( empty($userInfo) ){
	            $this->session->set_flashdata('error_msg', 'We cant find your email address');
	            redirect('login');
	        }   
	        
	        if($userInfo['activate'] == 0){ //Account is not activated
	            $this->session->set_flashdata('error_msg', 'Your account is not in approved status');
	            redirect('login');
	        }
	        
	        //build token 
	        $token = $this->accounts_model->insertToken($userInfo['id']);                    
	        $link = base_url() . 'starter/reset_password/token/' . $token;
	        
	        $message = 'A password reset has been requested for this email account'."\n";
	        $message .= 'Please click: ' . $link;             

	        $this->email->from($admin);
	        $this->email->to($email);
	        $this->email->subject('Reset Your Password!');

	        $this->email->message($message);

	        $res = $this->email->send();

	        if($res){
	        	$this->session->set_flashdata('msg', 'We sent the reset password link, please confirm via your Email.');
	            redirect('login');
	        }	        
	    }
	    
	}

	function reset_password(){

        $token = $this->uri->segment(4);         
        $cleanToken = $this->security->xss_clean($token);
        
        $user_info = $this->accounts_model->isTokenValid($cleanToken); //either false or array();               
        
        if(empty($user_info)){
            $this->session->set_flashdata('error_msg', 'Token is invalid or expired');
            redirect(base_url('login'));
        }    

        $data = array(
            'firstName'=> $user_info['firstname'], 
            'email'=>$user_info['email'],        
            'token'=>$token
        );

        $this->load->view($this->header, ['categroysorts'=>$this->categroysorts]);
        $this->load->view('reset_password', ['user_id'=>$user_info['id']]);
        $this->load->view('footer');        
    }

    function reset_password_proc(){

    	if( empty($this->input->post('user_id')) ) redirect( base_url('login') );

    	$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
    	$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');              
    	
    	if ( $this->form_validation->run() == FALSE ) { 

    		$this->session->set_flashdata('error_msg', 'Please confirm the same password!');  

    	    $this->load->view($this->header, ['categroysorts'=>$this->categroysorts]);
    	    $this->load->view('reset_password', ['user_id'=>$this->input->post('user_id')]);
    	    $this->load->view('footer');
    	}else{

    	    $password = $this->security->xss_clean( $this->input->post('password') );
    	    $hashed = $this->passwordhash->HashPassword($password);
    	    
    	    $res = $this->accounts_model->updatePasswordById($hashed, $this->input->post('user_id'));
    	    if($res){
    	        $this->session->set_flashdata('msg', 'Your password has been updated. You may now login');
    	    }else{
    	        $this->session->set_flashdata('error_msg', 'There was a problem updating your password');
    	    }
    	    redirect( base_url('login') );                
    	}
    }
    
    
    // members page display
    
    	function members(){

		$business_accounts = $this->accounts_model->findAllBusiness();
		$artist_accounts = $this->accounts_model->findAllArtist();

		$this->load->view($this->header, ['categroysorts'=>$this->categroysorts]);
		$this->load->view('members', ['business_accounts'=>$business_accounts, 'artist_accounts'=>$artist_accounts]);
		$this->load->view('footer');
	}
    
    
    // whenver a new member registers admin should get an email notification 
    
    function emailToAdmin($params, $admin='phptesting02@gmail.com'){

    	$this->email->from($params['email'], $params['firstname'].' '.$params['lastname']);
    	$this->email->to($admin);
    	$this->email->cc('another@another-example.com');
    	$this->email->bcc('them@their-example.com');
    	$this->email->subject('A new member has registered');

    	$message =  "Name: ".$params['firstname'].' '.$params['lastname']."\n";
    	$message .= "Business Name: ".$params['businessname']."\n";
    	$message .= "Email: ".$params['email']."\n";
    	$message .= "Zip Code: ".$params['postalcode']."\n";
    	$message .= "Link: ".$params['link']."\n";
    	$message .= "Info: ".$params['info']."\n";
    	$message .= "Role: ".$params['role']."\n";

    	$this->email->message($message);

    	$res = $this->email->send();
    }

    
    // user needs to activate their account after admin approval to login to their account.  
    
    public function activate(){
		$id   =  $this->uri->segment(3);
		$code =  $this->uri->segment(4);

		//fetch requests details
		$request = $this->requests_model->getRequestById($id);
 

		//if code matches
		if($request['code'] == $code){
			//update user active status
			// $data['activate'] = true;
			$query = $this->accounts_model->updateActivate($id);

			if($query){

				$row = $this->accounts_model->getCheckUser($request['email']);

				$this->session->set_userdata('is_user', $row['type']);
				$this->session->set_userdata('myName', 	$row['firstname']." ".$row['lastname']);
				$this->session->set_userdata('myEmail', $row['email']);
				$this->session->set_userdata('myId', 	$row['id']);
				$this->session->set_userdata('myRole', 	$row['role']);

				$this->session->set_flashdata('msg', 'User activated successfully');
				redirect('main');

			}
			else{

				$this->session->set_flashdata('error_msg', 'Something went wrong in activating account');
				redirect('login'); 
			}
		}
		else{			
			$this->session->set_flashdata('error_msg', 'Cannot activate account. Code didnt match');
			redirect('login'); 
		}
 
	}

} ?>
    
