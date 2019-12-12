<?php

class Crud_model_test extends TestCase
{
    public function setUp()
    {
        $this->resetInstance();        
        $this->CI->load->model('crud_model');
        $this->obj = $this->CI->crud_model;
        /*echo "<pre>";
        print_r($this->obj);die;*/
    }

    public function test_get_admin()
    {
        $expected = [
            1 => 'Administrator'
        ];
        $list = $this->obj->get_admin();
        
        foreach ($list as $admins) {
            //print_r($admins);die;
            $this->assertSame($expected[$admins['admin_id']], (string)$admins['name']);
        }
    }

    public function test_get_admin_name()
    {
        $actual = $this->obj->get_admin_info(1)[0];        
        $expected = 'Administrator';
        $this->assertSame($expected, (string)$actual['name']);
    }

}