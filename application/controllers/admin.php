<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*	
 *	@author : Jitendra
 *	date	: 01 December, 2019
 *	https://github.com/softjeetu/ecom_ci_angular
 */

class Admin extends CI_Controller
{
    
    
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('date');
        /*cache control*/
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }
    
    /***default functin, redirects to login page if no admin logged in yet***/
    public function index()
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'index.php?login', 'refresh');
        if ($this->session->userdata('admin_login') == 1)
            redirect(base_url() . 'index.php?admin/dashboard', 'refresh');
    }
    
    /***ADMIN DASHBOARD***/
    function dashboard()
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'dashboard';
        $page_data['page_title'] = get_phrase('admin_dashboard');
        $this->load->view('index', $page_data);
    }
    
    
    
    /****MANAGE category*****/
    function category($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {
            $data['name']  = $this->input->post('name');
            $data['about'] = $this->input->post('about');
            $this->db->insert('category', $data);
            redirect(base_url() . 'index.php?admin/category/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['name']  = $this->input->post('name');
            $data['about'] = $this->input->post('about');
            $this->db->where('category_id', $param2);
            $this->db->update('category', $data);
            redirect(base_url() . 'index.php?admin/category/', 'refresh');
        } else if ($param1 == 'personal_profile') {
            $page_data['personal_profile']    = true;
            $page_data['current_category_id'] = $param2;
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('category', array(
                'category_id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('category_id', $param2);
            $this->db->delete('category');
            redirect(base_url() . 'index.php?admin/category/', 'refresh');
        }
        $page_data['category']   = $this->db->get('category')->result_array();
        $page_data['page_name']  = 'category';
        $page_data['page_title'] = get_phrase('manage_category');
        $this->load->view('index', $page_data);
    }
    
    
    /****MANAGE client*****/
    function client($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {
            $data['email']           = $this->input->post('email');
            $data['password']        = $this->input->post('password');
            $data['name']            = $this->input->post('name');
            $data['creation_date']   = $this->input->post('creation_date');            
            $data['phone']           = $this->input->post('phone');            
            $this->db->insert('client', $data);
            
            $this->email_model->account_opening_email('client', $data['email']);
            redirect(base_url() . 'index.php?admin/client/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['email']           = $this->input->post('email');
            $data['password']        = $this->input->post('password');
            $data['name']            = $this->input->post('name');
            $data['creation_date']   = $this->input->post('creation_date');           
            $data['phone']           = $this->input->post('phone');           
            $this->db->where('client_id', $param2);
            $this->db->update('client', $data);
            redirect(base_url() . 'index.php?admin/client/', 'refresh');
        } else if ($param1 == 'personal_profile') {
            $page_data['personal_profile']  = true;
            $page_data['current_client_id'] = $param2;
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('client', array(
                'client_id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('client_id', $param2);
            $this->db->delete('client');
            redirect(base_url() . 'index.php?admin/client/', 'refresh');
        }
        $page_data['client']     = $this->db->get('client')->result_array();
        $page_data['page_name']  = 'client';
        $page_data['page_title'] = get_phrase('manage_client');
        $this->load->view('index', $page_data);
    }
    
    
    
    
    
    
    
    
    
    /****MANAGE order*****/
    function order($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'personal_profile') {
            $page_data['personal_profile'] = true;
            $page_data['current_order_id'] = $param2;
        } 
        if ($param1 == 'delete') {
            $this->db->where('order_id', $param2);
            $this->db->delete('order');

            $this->db->where('order_master_id', $param2);
            $this->db->delete('order_slave');
            redirect(base_url() . 'index.php?admin/order/', 'refresh');
        }
        $page_data['order']      = $this->db->get('order')->result_array();
        $page_data['page_name']  = 'order';
        $page_data['page_title'] = get_phrase('manage_order');
        $this->load->view('index', $page_data);
    }
    
    
    /****MANAGE product*****/
    function product($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        if ($param1 == 'create') {
			
			# product image
            if(sizeof($_FILES['product_image']) > 0 && $_FILES['product_image']['error'] == 0){
                $this->load->library('upload');
                $config['upload_path']      = 'uploads/product_image';
                $config['allowed_types']    = 'gif|jpg|jpeg|png';
                /*$config['max_size'] = '1024';
                $config['max_width'] = '200';
                $config['max_height'] = '30';*/
                $config['overwrite'] = true;
                $this->upload->initialize($config);
                if(!$this->upload->do_upload('product_image')){
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('message', $error);
                    redirect(base_url() . 'index.php?admin/product/', 'refresh');
                }
                # data product image
                $data['product_image'] = str_replace('index.php?/','',site_url($config['upload_path'].'/'.$this->upload->file_name));
            }
			
            $data['category']      = $this->input->post('category');
            $data['name']          = $this->input->post('name');            
            $data['description']   = $this->input->post('description');
            $data['creation_date'] = $this->input->post('creation_date');
            $data['quantity']      = $this->input->post('quantity');
            $data['quantity_unit'] = $this->input->post('quantity_unit');
            $data['price']         = $this->input->post('price');
            $this->db->insert('product', $data);
            redirect(base_url() . 'index.php?admin/product/', 'refresh');
        }
        if ($param1 == 'do_update') {
			# product image
            if(sizeof($_FILES['product_image']) > 0 && $_FILES['product_image']['error'] == 0){
				
				$_pdata = $this->db->limit(1)->get('product', array('product_id' => $param2))->row_array();
				
				if(isset($_pdata['product_image']) && !empty($_pdata['product_image'])){
					unlink('./uploads/product_image/'.basename($_pdata['product_image']));
				}
				
                $this->load->library('upload');
                $config['upload_path']      = 'uploads/product_image';
                $config['allowed_types']    = 'gif|jpg|jpeg|png';
                /*$config['max_size'] = '1024';
                $config['max_width'] = '200';
                $config['max_height'] = '30';*/
                $config['overwrite'] = true;
                $this->upload->initialize($config);
                if(!$this->upload->do_upload('product_image')){
                    $error = $this->upload->display_errors();
                    $this->session->set_flashdata('message', $error);
                    redirect(base_url() . 'index.php?admin/product/', 'refresh');
                }
                # data product image
                $data['product_image'] = str_replace('index.php?/','',site_url($config['upload_path'].'/'.$this->upload->file_name));
            }
			
			
            $data['category']      = $this->input->post('category');
            $data['name']          = $this->input->post('name');            
            $data['description']   = $this->input->post('description');
            $data['creation_date'] = $this->input->post('creation_date');
            $data['quantity']      = $this->input->post('quantity');
            $data['quantity_unit'] = $this->input->post('quantity_unit');
            $data['price']         = $this->input->post('price');
            $this->db->where('product_id', $param2);
            $this->db->update('product', $data);
            redirect(base_url() . 'index.php?admin/product/', 'refresh');
        } else if ($param1 == 'personal_profile') {
            $page_data['personal_profile']   = true;
            $page_data['current_product_id'] = $param2;
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('product', array(
                'product_id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('product_id', $param2);
            $this->db->delete('product');
            redirect(base_url() . 'index.php?admin/product/', 'refresh');
        }
        $page_data['product']    = $this->db->get('product')->result_array();
        $page_data['page_name']  = 'product';
        $page_data['page_title'] = get_phrase('manage_product');
        $this->load->view('index', $page_data);
    }
    
    
    
    
    
    /*****SITE/SYSTEM SETTINGS*********/
    function system_settings($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'index.php?login', 'refresh');
        
        if ($param2 == 'do_update') {
            $this->db->where('type', $param1);
            $this->db->update('settings', array(
                'description' => $this->input->post('description')
            ));
            $this->session->set_flashdata('flash_message', get_phrase('settings_updated'));
            redirect(base_url() . 'index.php?admin/system_settings/', 'refresh');
        }
        if ($param1 == 'upload_logo') {
            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/logo.png');
            $this->session->set_flashdata('flash_message', get_phrase('settings_updated'));
            redirect(base_url() . 'index.php?admin/system_settings/', 'refresh');
        }
        $page_data['page_name']  = 'system_settings';
        $page_data['page_title'] = get_phrase('system_settings');
        $page_data['settings']   = $this->db->get('settings')->result_array();
        $this->load->view('index', $page_data);
    }
    
    
    
    /******MANAGE OWN PROFILE AND CHANGE PASSWORD***/
    function manage_profile($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'index.php?login', 'refresh');
        if ($param1 == 'update_profile_info') {
            $data['email'] = $this->input->post('email');
            
            $this->db->where('admin_id', $this->session->userdata('admin_id'));
            $this->db->update('admin', $data);
            $this->session->set_flashdata('flash_message', get_phrase('account_updated'));
            redirect(base_url() . 'index.php?admin/manage_profile/', 'refresh');
        }
        if ($param1 == 'change_password') {
            $data['password']             = $this->input->post('password');
            $data['new_password']         = $this->input->post('new_password');
            $data['confirm_new_password'] = $this->input->post('confirm_new_password');
            
            $current_password = $this->db->get_where('admin', array(
                'admin_id' => $this->session->userdata('admin_id')
            ))->row()->password;
            if ($current_password == $data['password'] && $data['new_password'] == $data['confirm_new_password']) {
                $this->db->where('admin_id', $this->session->userdata('admin_id'));
                $this->db->update('admin', array(
                    'password' => $data['new_password']
                ));
                $this->session->set_flashdata('flash_message', get_phrase('password_updated'));
            } else {
                $this->session->set_flashdata('flash_message', get_phrase('password_mismatch'));
            }
            redirect(base_url() . 'index.php?admin/manage_profile/', 'refresh');
        }
        $page_data['page_name']  = 'manage_profile';
        $page_data['page_title'] = get_phrase('manage_profile');
        $page_data['edit_data']  = $this->db->get_where('admin', array(
            'admin_id' => $this->session->userdata('admin_id')
        ))->result_array();
        $this->load->view('index', $page_data);
    }
    
}
