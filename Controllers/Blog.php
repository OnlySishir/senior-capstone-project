<?php 
defined('BASEPATH') or exit('No direct script access allowed');

class Starter extends MY_controller{
	
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

function blog($start = 0)
    {
		$data['posts'] = $this->blogs_model->get_posts(5, $start);
		
		$config['base_url'] = base_url() . 'starter/blog';//url to set pagination
        $config['total_rows'] = $this->blogs_model->get_post_count();
        $config['per_page'] = 5;

		$this->pagination->initialize($config);
		$data["pages"] = $this->pagination->create_links();

        $this->load->view($this->header, ['categroysorts'=>$this->categroysorts]);
        $this->load->view('blog', $data);
        $this->load->view('footer');
    }

	
    function post($post_id=0)//single post page
    {
    	if($post_id <= 0) redirect('blog');

        $this->load->model('comments_model');
        $data['comments'] = $this->comments_model->get_comment($post_id);
	    $data['post'] = $this->blogs_model->get_post($post_id);
	
		$this->load->view($this->header, ['categroysorts'=>$this->categroysorts]);	
		$this->load->view('v_single_post', $data);
		$this->load->view('footer');
	}
	
	function new_post()
	{
	   if ((!$this->session->myRole =='member,basic_artist,author') || (!$this->session->myRole == 'member,basic_business,author')|| ($this->session->myRole == "member,pro_artist,author") || ($this->session->myRole == "member,pro_business,author") )
        {
            redirect(base_url() . 'login');
        }
	$this->load->view($this->header, ['categroysorts'=>$this->categroysorts]);
	$this->load->view('v_new_post');
	$this->load->view('footer');
	}


    function new_post_proc()//Creating new blog page
    {

        //when the user is not an admin and author
        if ((!$this->session->myRole =='member,basic_artist,author') || (!$this->session->myRole == 'member,basic_business,author')|| ($this->session->myRole == "member,pro_artist,author") || ($this->session->myRole == "member,pro_business,author") )
        {
            redirect(base_url() . 'login');
        }

        if( !empty($this->input->post('post_title')) ) {
			
			$data['post_title'] 			=  $this->input->post('post_title');
			$data['post'] 			        =  $this->input->post('post');
			$data['active'] 			    =  1;
			$data['account_id'] = $this->session->myId;

			/* >> file attach */
			$main_img = $this->upload_files("main", $_FILES["main_img"]);
			if (empty($main_img)) {
                $this->session->set_flashdata('error_msg', 'Image has not uploaded, please use only below 1500 * 1500 pixel imgs');
                redirect('starter/new_post');
            }
            else{
			$data['image'] = $main_img ? $main_img[0] : "";

					$this->blogs_model->insert_post($data);
					$this->session->set_flashdata('msg', 'Blog has submitted Successfuly');				
				}
				redirect('blog');				
			}
	}
		



    function editpost($post_id="0")//Edit post page
    {

        if ((!$this->session->myRole =='member,basic_artist,author') || (!$this->session->myRole == 'member,basic_business,author')|| ($this->session->myRole == "member,pro_artist,author") || ($this->session->myRole == "member,pro_business,author"))
        {
            redirect(base_url() . 'login');
        }
        if($post_id <= 0) redirect('blog');


        if( !empty($this->input->post('post_title')) ) {
			$data['post_title'] 			=  $this->input->post('post_title');
			$data['post'] 			        =  $this->input->post('post');
			$data['active'] 			    =  1;
			/* >> file attach */
			$main_img = $this->upload_files("main", $_FILES["main_img"]);
			$data['image'] = $main_img ? $main_img[0] : "";
									
            $this->blogs_model->update_post($post_id, $data);
            redirect(base_url() . 'blog');

        }
		$data['post'] = $this->blogs_model->get_post($post_id);
		$this->load->view($this->header, ['categroysorts'=>$this->categroysorts]);
        $this->load->view('v_edit_post', $data);
        $this->load->view('footer');

	}




    function deletepost($post_id)//delete post page
    {

		if ((!$this->session->myRole =='member,basic_artist,author') || (!$this->session->myRole == 'member,basic_business,author')|| ($this->session->myRole == "member,pro_artist,author") || ($this->session->myRole == "member,pro_business,author"))
        {
            redirect(base_url() . 'login');
        }
        $this->blogs_model->delete_post($post_id);
        redirect(base_url() . 'starter/blog/');
	}
	

	
	function add_comment($postID)
    {

        if(!$this->input->post())
        {
            redirect(base_url().'starter/post'.$postID);
        }
        
        $is_user = $this->session->userdata('is_user');
        if(!$is_user)
        {
            redirect(base_url().'login');
        }
        
        $this->load->model('comments_model');
        $data['post_id'] = $postID;
		$data['account_id'] = $this->session->myId;
		$data['comment'] = $this->input->post('comment');
		
        $this->comments_model->add_comment($data);
        redirect(base_url().'starter/post/'.$postID);
	
	}
} ?>