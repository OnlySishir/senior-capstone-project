  <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Control extends MY_controller{

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
    
    
    
    function view_shop($cid=""){

        if(!empty($this->input->get('col_id'))){
            $productLists = $this->products_model->findProductsByColId($this->input->get('col_id'));
        }
        else{
            $productLists = $this->products_model->findProductsBySortId($cid);
        }

    	$this->load->view($this->header, ['categroysorts'=>$this->categroysorts]);
    	$this->load->view('view_shop', ['productLists' => $productLists]);
    	$this->load->view('footer');	
    }
    
            function artcallindividual($id=""){
        if(empty($this->session->is_user)) redirect('login');

        if( $id=="" ) redirect('starter/artcalls');

        $single = $this->products_model->getArtcallById($id);

        $this->load->view($this->header, ['categroysorts'=>$this->categroysorts]);
        $this->load->view('singleartcall', ['single'=>$single]);
        $this->load->view('footer');    
    }
    
    function view_product($id=""){

		if( $id=="" ) redirect('product/shop');

		$single = $this->products_model->getProductById($id);

    	$this->load->view($this->header, ['categroysorts'=>$this->categroysorts]);
    	$this->load->view('view_product', ['single'=>$single]);
    	$this->load->view('footer');	
    }
    
    
} ?>
