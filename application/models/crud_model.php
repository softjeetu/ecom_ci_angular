<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Crud_model extends CI_Model {
	
	function __construct()
	{
		parent::__construct();
	}
	
	function clear_cache()
	{
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
	}
	function get_type_name_by_id($type,$type_id='',$field='name')
	{
		return	$this->db->get_where($type,array($type.'_id'=>$type_id))->row()->$field;	
	}
	
	
	/////////ADMIN/////////////
	function get_admin()
	{
		$query	=	$this->db->get('admin' );
		return $query->result_array();
	}
	function get_admin_info($admin_id)
	{
		$query	=	$this->db->get_where('admin' , array('admin_id' => $admin_id));
		return $query->result_array();
	}
	
	/////////BULK_MAIL/////////////
	function get_bulk_mail()
	{
		$query	=	$this->db->get('bulk_mail' );
		return $query->result_array();
	}
	function get_bulk_mail_info($bulk_mail_id)
	{
		$query	=	$this->db->get_where('bulk_mail' , array('bulk_mail_id' => $bulk_mail_id));
		return $query->result_array();
	}
	
	/////////CATEGORY/////////////
	function get_category()
	{
		$query	=	$this->db->get('category' );
		return $query->result_array();
	}
	function get_category_info($category_id)
	{
		$query	=	$this->db->get_where('category' , array('category_id' => $category_id));
		return $query->result_array();
	}
	function get_category_name_by_id($category_id)
	{
		$query	=	$this->db->get_where('category' , array('category_id' => $category_id));
		return $query->result_array();
	}
	
	/////////CLIENT/////////////
	function get_client()
	{
		$query	=	$this->db->get('client' );
		return $query->result_array();
	}
	function get_client_info($client_id)
	{
		$query	=	$this->db->get_where('client' , array('client_id' => $client_id));
		return $query->result_array();
	}
	
	
	function get_orders_by_client($client_id)
	{
		$query	=	$this->db->get_where('order' , array('client' => $client_id));
		return $query->result_array();
	}
	function get_product_detail_by_order($order_id, $field = 'name', $product = 'product')
	{
		$product = $this->db->get_where('order',array('order_id'=>$order_id))->row()->$product;
		return	$this->db->get_where('product',array('product_id'=>$product))->row()->$field;
	}
	
	function get_order_amount($order_id, $field = 'total_price')
	{
		return	$this->db->get_where('order',array('order_id'=>$order_id))->row()->$field;
	}
	
	
	/////////ORDER/////////////
	function get_order()
	{
		$query	=	$this->db->get('order' );
		return $query->result_array();
	}
	function get_order_info($order_id)
	{
		$query	=	$this->db->get_where('order' , array('order_id' => $order_id));
		return $query->result_array();
	}
	
	function get_products_by_type($type_id)
	{
		$query	=	$this->db->get_where('product' , array('type' => $type_id));
		return $query->result_array();
	}
	
	
	function get_products_by_category($category_id)
	{
		$query	=	$this->db->get_where('product' , array('category' => $category_id));
		return $query->result_array();
	}
	
	
	
	/////////PRODUCT/////////////
	function get_product()
	{
		$query	=	$this->db->get('product' );
		return $query->result_array();
	}
	function get_product_info($product_id)
	{
		$query	=	$this->db->get_where('product' , array('product_id' => $product_id));
		return $query->result_array();
	}	
	
}

