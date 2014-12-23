<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_main extends CI_Controller {


	public function validate_login( $username , $pass )
	{
		$q = $this->db->get_where('tbl_customer' , array('cust_username' => $username , 'cust_password' => $pass));
		if($q->num_rows > 0){
			return $q->row()->cust_id;
        }
        	return false;
	}

	public function get_categories()
	{
		// $this->db->select('cat_id, cat_name, cat_desc');
		$q = $this->db->get_where('tbl_category' , array('cat_stat' => 1));
		return $q->result_array();
	}

	// get products per category
	public function get_products($cat_id='')
	{
		// $this->db->select('prod_id, prod_name, prod_desc, prod_img');
		$q = $this->db->get_where('view_product_prices', array('cat_id_LINK' => $cat_id));
		return $q->result_array();
	}

	// get single product
	public function get_product($p_id='')
	{
		// $this->db->select('prod_name, size_name, price, price_id');
		$q = $this->db->get_where('view_product_prices', array('price_id' => $p_id));
		return $q->result_array();
	}

} //@end main