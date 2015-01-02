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
	//get order id
	public function getorderID($data='')
	{
		// insert order header
		$this->db->insert('tbl_order', $data);
		//return order id
		unset($data['order_id']);
		$q = $this->db->get_where('tbl_order', $data);
		$this->db->insert('tbl_priority', array('priority_no'=> NULL, 'order_id_link'=>$q->row()->order_id));
		return $q->row()->order_id;	
	}
	//submit per order
	public function submit_perorder($data='')
	{
		$this->db->insert('tbl_orderitem', $data);
	}
	//get prio
	public function get_prio($order_id='')
	{
		$q = $this->db->get_where('tbl_priority', $order_id);
		return $q->row()->priority_no;
	}
	//hold_order
	public function hold_order($order_id='')
	{
		$this->db->where('order_id', $order_id);
		$this->db->update('tbl_order', array('order_stat' => 'hold'));		
	}
	// /cancel_order
	public function cancel_order($order_id='')
	{
		$this->db->where('order_id', $order_id);
		$this->db->update('tbl_order', array('order_stat' => 'cancelled'));		
	}
	//remove_perorder
	public function remove_perorder($data='')
	{
		$this->db->delete('tbl_orderitem', array('order_id_LINK' => $data));
		//update status
		$this->db->where('order_id', $data);
		$this->db->update('tbl_order', array('order_stat' => 'new'));	
	}

} //@end main