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
    
    /***default functin, redirects to login page if no client logged in yet***/
    public function index()
    {		
        $page_data['page_name']  = 'home';
        $page_data['page_title'] = get_phrase('home');
        $this->load->view('front', $page_data);
    }
    
    /***CLIENT DASHBOARD***/
    function home()
    {
        $page_data['page_name']  = 'home';
        $page_data['page_title'] = get_phrase('home');
        $this->load->view('front', $page_data);
    }

	/***CLIENT DASHBOARD***/
    function trending_items()
    {
		$this->db->where(array('quantity_unit > ' => 0, 'price > ' => 0));
        $products = $this->db->get('product')->result_array();		
		exit(json_encode($products));
    } 
	
}
