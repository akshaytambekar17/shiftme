<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Admin_controller
 *
 * @author Pravinkumar
 */
class EnquiryController extends MY_Controller {

//put your code here
    function __construct() {
        parent::__construct();
        $this->load->model('admin/Admin_model');
        $this->load->model('admin/OrderModel','Order');
        $this->load->model('admin/InvoiceModel','Invoice');
        $this->load->model('admin/EnquiryModel','Enquiry');
        $this->load->library('form_validation');
        $this->load->helper('message');
        $this->load->model('site_model');
        $this->load->model('User_model');
        $this->load->helper(array('url', 'form','email'));
        $this->load->library('session');
        $this->data['filters'] = $this->session->userdata('filters');
    }
    public function index(){
        $this->data['enquiry_list'] = $this->Enquiry->getEnquires();
        $update_details = array('is_read' => 1);
        $this->Enquiry->update($update_details);
        $this->data['template'] = "Enquires/list";
        $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => '#', 'page' => "Enquries"));
        $this->admin_layout($this->data);
    }
    public function delete(){
        $post = $this->input->post();
        $result = $this->Enquiry->delete($post['id']);
        if($result){
            echo true;
        }else{
            echo false;
        }
   }
}
