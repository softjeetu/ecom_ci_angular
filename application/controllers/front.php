<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*	
 *	@author : Jitendra
 *	date	: 01 December, 2019
 *	https://github.com/softjeetu/ecom_ci_angular
 */

class Front extends CI_Controller
{
    
    
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        /*cache control*/
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
		if(!defined('AUTHOR'))
			define('AUTHOR', 'Jitendra Kumar');
		
		if(!defined('SYSTEM_TITLE'))
			define('SYSTEM_TITLE', 'Ecom in Angular');
		
		$system_settings = $this->db->get('settings')->result_array();
		
		if(sizeof($system_settings) > 0){
			foreach($system_settings as $setting){
				$type = strtoupper($setting['type']);
				if(!defined($type))
					define($type, $setting['description']);
			}
		}

    }
    
    /***default functin***/
    public function index()
    {		
        $page_data['page_name']  = 'home';
        $page_data['page_title'] = get_phrase('home');
        $this->load->view('front', $page_data);
    }
    
    /***home***/
    function home()
    {
        $page_data['page_name']  = 'home';
        $page_data['page_title'] = get_phrase('home');
        $this->load->view('front', $page_data);
    }

	/***trending_items***/
    function trending_items()
    {
		$this->db->where(array('quantity_unit > ' => 0, 'price > ' => 0));
        $products = $this->db->get('product')->result_array();		
		exit(json_encode($products));
    }

	/***add_to_cart***/
    function add_to_cart()
    {
		$product_data = json_decode(file_get_contents("php://input"));
		
		if(empty($product_data)){
			exit(json_encode(array('error' => 'Product data is empty')));
		}
		
		$this->load->library('cart');
		
		$product_id = $product_data->product_id;
		$product_name = $product_data->name;
		$product_price = $product_data->price;
		$product_image = $product_data->product_image;
		
		
		if(!empty($this->cart->contents()))
		{
			$is_available = 0;			
			foreach($this->cart->contents() as $keys => $values)
			{
				
				if($values['id'] == $product_id)
				{
					$is_available++;
					$__data = array('qty' => $values['qty'] + 1, 'rowid' => $values['rowid']);	
					#updating cart
					$this->cart->update($__data); 
				}
			}
			
			if($is_available == 0)
			{
				$item_array = array(
				   'id'               =>     $product_id,  
				   'name'             =>     $product_name,  
				   'price'            =>     $product_price,  
				   'qty'         	  =>     1,
				   'image' 			  => 	 $product_image
				);
				// This function add items into cart.
				$this->cart->insert($item_array);			  
			}
		}
		else
		{
			$item_array = array(
				'id'               =>     $product_id,  
				'name'             =>     $product_name,  
				'price'            =>     $product_price,  
				'qty'         	   =>     1,
				'image' 		   => 	 $product_image
			);
			
			// This function add items into cart.
			$this->cart->insert($item_array);
		 
		}
		exit();
		//print_r($this->cart->contents());
    }
	
	/***fetch_cart***/
	function fetch_cart(){
		$this->load->library('cart');		
		exit(json_encode(array_values($this->cart->contents())));
	}
	
	/***remove_cart***/
	function remove_cart(){
		$this->load->library('cart');	
		$_data = json_decode(file_get_contents("php://input"));
		if(empty($_data)){
			exit(json_encode(array('error' => 'Please choose an item to delete from your cart')));
		}
		$row_id = $_data->rowid;
		$data = array(
			'rowid'   => $row_id,
			'qty'     => 0
		);
		$this->cart->update($data); 
		exit();
	}
	
	/***search_items***/
	function search_items(){
		
		$_data = json_decode(file_get_contents("php://input"));
		if(empty($_data)){
			exit(json_encode(array('error' => 'Please enter query string')));
		}
		$_term = $_data->search_query;
		$this->db->where(array('quantity_unit > ' => 0, 'price > ' => 0));
		$this->db->like('name', $_term, 'before');
		$this->db->or_like('description', $_term);
        $products = $this->db->get('product')->result_array();		
		exit(json_encode($products)); 		
	}
	
	/***category_products***/
	function category_products(){
		
		$_data = json_decode(file_get_contents("php://input"));
		if(empty($_data)){
			exit(json_encode(array('error' => 'Please choose a category')));
		}		
		$this->db->where(array('quantity_unit > ' => 0, 'price > ' => 0));
		$this->db->where('category', $_data->category);
		
        $products = $this->db->get('product')->result_array();		
		exit(json_encode($products)); 		
	}
	
	/***category_products***/
	function checkout(){
		
		$_data = json_decode(file_get_contents("php://input"));
		
		if ($this->session->userdata('client_login') != 1){
			exit(json_encode(array('error' => 'not_logged_in')));
		}
		else{
			exit(json_encode(array('error' => 'logged_in')));
		}			
	}
	
}
