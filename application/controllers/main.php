<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Main extends CI_Controller {


    public function __construct(){
        parent::__construct();
        $this->load->model('model_main');
    }

	public function index()
	{
		$this->load->view('login');
	}

	public function login()
	{
		// echo $this->input->post('username');
		$is_valid = $this->model_main->validate_login( $this->input->post('username') , $this->input->post('password') );
		if($is_valid){
			echo json_encode(array('stat' => 1 , 'msg' => 'Success Login.' , 'cust_id' => $is_valid , 'url' => base_url()."main/profile/".$is_valid ) );
		}else{
			echo json_encode(array('stat' => 0 , 'msg' => 'Invalid Username/Password.'));
		}
	}

	public function profile($cust_id='')
	{
		$data['cust_id'] = $cust_id;
		$data['categories'] = $this->model_main->get_categories();
		$this->load->view('profile', $data);
	}

	// get products per category
	public function get_prods($cat_id='')
	{
		$data['products'] = $this->model_main->get_products($cat_id);
		$html = $this->load->view('product_per_category' , $data , true);
		echo $html;
	}

	public function add_to_order()
	{
		$data['product'] = $this->model_main->get_product($this->input->post('price_id'));
		$data['qty'] = $this->input->post('qty');
		$html = $this->load->view('per_order_template', $data);
		echo $html;
	}


} //@end main
