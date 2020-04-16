<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profiles extends MY_controller{

    private $header = "header/header";
    private $categroysorts;

    function __construct()
    {
        parent::__construct();
        $this->load->model('products_model');
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

    function profile(){
    	if(empty($this->session->is_user)) redirect('logout');
    	if($this->input->get('email')=="") redirect('members');

    	$this->load->view($this->header, ['categroysorts'=>$this->categroysorts]);

    	$user = $this->accounts_model->getCheckUser($this->input->get('email'));
    	
    	if($user['type']=='ARTIST/DESIGNER'){//Artist 

    		$productLists = $this->products_model->findProductsByUserID($user['id']);
    		$collectionLists = $this->products_model->findCollectionByUserID($user['id']);
    		$this->load->view('nadia/artist-profile', ['user'=>$user, 'productLists'=>$productLists, 'collectionLists'=>$collectionLists]);
    	}
    	else{//Business
    		$artcalls = $this->products_model->getArtCalls($this->input->get('email'));
    		$grants = $this->products_model->getGrants($this->input->get('email'));

    		$this->load->view('nadia/business-profile', 
    			['user'=>$user, 'artcalls'=>$artcalls, 'grants'=>$grants]);
    	}
    	$this->load->view('footer');
    }

    function edit_profile(){
    	if(empty($this->session->is_user)) redirect('logout');
    	if($this->input->get('email')=="") redirect('members');

    	$user = $this->accounts_model->getCheckUser($this->input->get('email'));

    	$this->load->view($this->header, ['categroysorts'=>$this->categroysorts]);

    	if($this->session->is_user == 'BUSINESS/TRADE'){
    		$profile = $this->accounts_model->checkProfileBusi($user['id']);
    		$this->load->view('nadia/edit-basic-business', ['user'=>$user, 'profile'=>$profile]);
    	}
    	else{
    		$profile = $this->accounts_model->checkProfileArt($user['id']);
    		$this->load->view('nadia/edit-basic-artist', ['user'=>$user, 'profile'=>$profile]);	
    	}
    	$this->load->view('footer');	
    }

    function profile_proc(){
		if(empty($this->session->is_user) || $this->input->get('email')=="") redirect('logout');

		if($this->input->post('fType') == 'business'){

			$data['business_name'] = $this->input->post('BusinessName');
			$data['title'] = $this->input->post('title');
			$data['country'] = $this->input->post('countries');
			$data['state'] = $this->input->post('state');
			$data['city'] = $this->input->post('city');
			$data['street1'] = $this->input->post('street1');
			$data['street2'] = $this->input->post('street2');
			$data['about'] = $this->input->post('about');
			$data['industry_listing'] = $this->input->post('industry_listing');
			$data['number_employees'] = $this->input->post('employee');
			$data['year_founded'] = $this->input->post('year_founded');
			$data['service_benefits'] = $this->input->post('service_benefits');
			$data['awards'] = $this->input->post('awards');
			$data['associations'] = $this->input->post('associations');
			$data['type_business_with'] = $this->input->post('type_business_with');
			$data['type_artist_with'] = $this->input->post('type_artist_with');
			$data['introduce_video'] = $this->input->post('introduce_video');
			$data['additional_info'] = $this->input->post('additional_info');
			$data['tags'] = $this->input->post('tags');
			$data['account_id'] = $this->session->myId;

			$res = $this->accounts_model->checkProfileBusi($this->session->myId);
			if(!empty($res) && count($res)){
				$this->accounts_model->updateProfileBusi($data);
			}
			else{
				$this->accounts_model->insertProfileBusi($data);
			}

		}elseif ($this->input->post('fType') == 'artist') {

			$data['business_name'] = $this->input->post('BusinessName');
			$data['country'] = $this->input->post('countries');
			$data['state'] = $this->input->post('state');
			$data['city'] = $this->input->post('city');
			$data['about'] = $this->input->post('about');
			$data['medium_industry'] = $this->input->post('medium_industry');
			$data['experience_level'] = $this->input->post('experience_level');
			$data['secondary_medium'] = $this->input->post('secondary_medium');
			$data['commissions'] = $this->input->post('commissions');
			$data['exhibition'] = $this->input->post('exhibition');
			$data['education'] = $this->input->post('education');
			$data['awards'] = $this->input->post('awards');
			$data['associations'] = $this->input->post('associations');
			$data['type_artist_with'] = $this->input->post('type_artist_with');
			$data['type_business_with'] = $this->input->post('type_business_with');
			$data['intro_video'] = $this->input->post('intro_video');
			$data['addtional_info'] = $this->input->post('addtional_info');
			$data['tags'] = $this->input->post('tags');
			$data['return_policy'] = $this->input->post('return_policy');
			$data['prefered_shipping_method'] = $this->input->post('prefered_shipping_method');
			$data['opening_order_min'] = $this->input->post('opening_order_min');
			$data['reorder_min'] = $this->input->post('reorder_min');
			$data['payment_terms'] = join(',', $this->input->post('payment_terms'));
			$data['return_exchange_policy'] = $this->input->post('return_exchange_policy');	
			$data['account_id'] = $this->session->myId;

			$res = $this->accounts_model->checkProfileArt($this->session->myId);
			if(!empty($res) && count($res)){
				$this->accounts_model->updateProfileArt($data);
			}
			else{
				$this->accounts_model->insertProfileArt($data);
			}
		}
		$this->session->set_flashdata('msg', 'Profile page was successfully updated!');
		redirect('profile?email='.$this->input->get('email'));
    }
    
        function getLnt($zip='98001'){//Test code
	    $url = "http://maps.googleapis.com/maps/api/geocode/json?address=".urlencode($zip)."&key=AIzaSyDYEvfsGd9quBzn_Mdex4cS-fXbT_d0IQg";
	    $result_string = file_get_contents($url);
	    $result = json_decode($result_string, true);
	    $result1[]=$result['results'][0];
	    $result2[]=$result1[0]['geometry'];
	    $result3[]=$result2[0]['location'];
	    return $result3[0];
    }
    	/*Ajax file upload*/
	function ajax_upload(){
		if(empty($this->session->is_user)) redirect('logout');

		/* Getting file name */
		// $filename = $_FILES['file']['name'];
		$filename = 'profile_'. $this->session->myName.'.png';

		$this->accounts_model->update_profile_img($filename);

		/* Location */
		$location = "upload/profile/".$filename;
		$uploadOk = 1;
		$imageFileType = pathinfo($location,PATHINFO_EXTENSION);

		/* Valid Extensions */
		$valid_extensions = array("jpg","jpeg","png");
		/* Check file extension */
		if( !in_array(strtolower($imageFileType),$valid_extensions) ) {
		   $uploadOk = 0;
		}

		if($uploadOk == 0){
		   echo 0;
		}else{
		   /* Upload file */
		   if(move_uploaded_file($_FILES['file']['tmp_name'],$location)){
		      echo $location;
		   }else{
		      echo 0;
		   }
		}
	}
} ?>