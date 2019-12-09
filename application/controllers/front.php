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
	
	
	
	/***login***/
    function login()
    {
		if ($this->session->userdata('client_login') == 1){
			redirect(base_url(), 'refresh');
		}
		else{
			$page_data['page_name']  = 'login';
			$page_data['page_title'] = "Login";
			$this->load->view('front', $page_data); 
		}
    }
	
	
	/***register***/
    function register()
    {
		if ($this->session->userdata('client_login') == 1){
			redirect(base_url(), 'refresh');
		}
		else{
			$page_data['page_name']  = 'register';
			$page_data['page_title'] = "Register";
			$this->load->view('front', $page_data); 
		}
    }
	
	
	
	function registration(){
		$_data = json_decode(file_get_contents("php://input"));
		
		if(empty($_data) || empty($_data->email) || empty($_data->password)){
			exit(json_encode(array('error' => 'Invalid data')));
		}		
		
		if (!filter_var($_data->email, FILTER_VALIDATE_EMAIL)) {			
			exit(json_encode(array('error' => $_data->email. " is not a valid email address")));
		}
		
		if($_data->password != $_data->cofirm_password){
			exit(json_encode(array('error' => "Password & Confirm Password did not match.")));
		}
		
		if(empty($_data->name)){
			exit(json_encode(array('error' => "Please enter full name.")));
		}
		
		if(empty($_data->phone)){
			exit(json_encode(array('error' => "Please enter phone.")));
		}
		
		$email 		= $_data->email;
		$password 	= $_data->password;
		$name 		= $_data->name;
		$phone 		= $_data->phone;
		
		
		
		$query = $this->db->get_where('client', array(
			'email' => $email
		));
		#echo $this->db->last_query();die;
		if ($query->num_rows() == 0) {
			
			$data = array(
				'name' => $name,
				'email' => $email,
				'password' => $password,
				'phone' => $phone
			);
			
			$this->db->insert('client', $data);
			$id = $this->db->insert_id();
			
			$q = $this->db->get_where('client', array(
				'client_id' => $id
			));
			
			
			$row = $q->row_array();
			$this->session->set_userdata('client_login', '1');
			$this->session->set_userdata('login_type', 'client');
			$this->session->set_userdata($row);		
			exit(json_encode(array('error' => '', 'userdata' => $row)));
		} 
		else {			
			exit(json_encode(array('error' => 'User already Exist.')));
		}
	}
	
	/*******LOGOUT FUNCTION *******/
	function logout()
	{
		$this->session->unset_userdata();
		$this->session->sess_destroy();		
		redirect(base_url());
	}
	
	/***auth***/
    function auth()
    {
		$auth_data = json_decode(file_get_contents("php://input"));
		
		if(empty($auth_data) || empty($auth_data->email) || empty($auth_data->password)){
			exit(json_encode(array('error' => 'Invalid Credentials')));
		}
		
		if (!filter_var($auth_data->email, FILTER_VALIDATE_EMAIL)) {			
			exit(json_encode(array('error' => $email. " is not a valid email address")));
		}
		
		$email = $auth_data->email;
		$password = $auth_data->password;
		
		
		
		$query = $this->db->get_where('client', array(
			'email' => $email,
			'password' => $password
		));
		#echo $this->db->last_query();die;
		if ($query->num_rows() > 0) {
			$row = $query->row_array();
			$this->session->set_userdata('client_login', '1');
			$this->session->set_userdata('login_type', 'client');
			$this->session->set_userdata($row);		
			exit(json_encode(array('error' => '', 'userdata' => $row)));
		} 
		else {			
			exit(json_encode(array('error' => 'Login Failed')));
		}					
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
	function checkouts(){
		
		$_data = json_decode(file_get_contents("php://input"));
		
		if ($this->session->userdata('client_login') != 1){
			exit(json_encode(array('error' => 'not_logged_in')));
		}
		else{
			exit(json_encode(array('error' => 'logged_in')));
		}			
	}
	
	/*******checkout *******/
	function checkout()
	{
		if (!$this->session->userdata('client_login')){
			redirect(base_url().'index.php?/front/login', 'refresh');
		}
		else{
			$page_data['page_name']  = 'checkout';
			$page_data['page_title'] = "Checkout";
			$this->load->view('front', $page_data);
		}
	}
	
	/***saveOrder***/
	function saveOrder(){
		$_data = json_decode(file_get_contents("php://input"));
		
		if(empty($_data) || sizeof($_data) == 0){
			exit(json_encode(array('error' => 'Invalid data')));
		}		
		
		$this->load->library('cart');
		
		$cart_data = $this->cart->contents();
		
		if(empty($cart_data)){
			exit(json_encode(array('error' => 'Cart Empty')));
		}
		
		$total_price = 0;
		foreach($cart_data as $cart){
			$total_price += $cart['subtotal'];
		}
		
		$order_master_data = [
			'client' => $this->session->userdata('client_id'),
			'total_price' => $total_price,
			'date'	=> date("Y-m-d H:i:s"),
			'status' => 'approved'
		];
		
					
		#echo $this->db->last_query();die;
		if (!empty($order_master_data)) {
			
					
			$this->db->insert('order', $order_master_data);
			$id = $this->db->insert_id();
			
			if($id){				
				foreach($cart_data as $cart){
					$order_slave_data = [];
					$order_slave_data['order_master_id'] = $id;
					$order_slave_data['product_id'] = $cart['id'];
					$order_slave_data['quantity'] = $cart['qty'];
					$order_slave_data['price'] = $cart['price'];
					$order_slave_data['date'] = date("Y-m-d H:i:s");
					$this->db->insert('order_slave', $order_slave_data);
				}
			}
			$this->cart->destroy();					
			exit(json_encode(array('error' => '', 'order_id' => $id)));
		} 
		else {			
			exit(json_encode(array('error' => 'Some internal error.')));
		}		
	}
	
}
