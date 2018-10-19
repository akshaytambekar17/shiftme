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
class QuotationController extends MY_Controller {

//put your code here
    function __construct() {
        parent::__construct();
        $this->load->model('admin/Admin_model');
        $this->load->model('admin/OrderModel');
        $this->load->model('admin/InvoiceModel');
        $this->load->model('admin/QuotationModel');
        $this->load->library('form_validation');
        $this->load->helper('message');
        $this->load->model('site_model');
        $this->load->model('User_model');
        $this->load->helper(array('url', 'form','email'));
        $this->load->library('session');
        $this->data['filters'] = $this->session->userdata('filters');
    }
    public function index(){
        $this->data['quotation_list'] = $this->QuotationModel->getQuotations();
        $this->data['template'] = "Quotation/list";
        $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => '#', 'page' => "Quotation"));
        $this->admin_layout($this->data);
    }
    public function add(){
        
        if($this->input->post()){
            $this->form_validation->set_rules('fullname', 'Full Name', 'trim|required');
            $this->form_validation->set_rules('mobile_no', 'Mobile Number', 'trim|required|numeric|regex_match[/^[0-9]{10}$/]');
            $this->form_validation->set_rules('email_id', 'Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('starting_address', 'Starting Address', 'trim|required');
            $this->form_validation->set_rules('starting_landmark','Starting Landmark', 'required');
            $this->form_validation->set_rules('starting_pincode', 'Starting Pincode', 'trim|required|numeric|regex_match[/^[0-9]{6}$/]');
            $this->form_validation->set_rules('delivery_address', 'Delivery Address', 'trim|required');
            $this->form_validation->set_rules('delivery_landmark','Delivery Landmark', 'required');
            $this->form_validation->set_rules('delivery_pincode', 'Delivery Pincode', 'trim|required|numeric|regex_match[/^[0-9]{6}$/]');
            $this->form_validation->set_rules('vehicle_id', 'Vechicle', 'trim|required');
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            if($this->form_validation->run() == TRUE){
                $details = $this->input->post();
                $details['created_at'] = date('Y-m-d H:i:s');
                $details['shifting_date'] = date('Y-m-d H:i:s');
                $result = $this->QuotationModel->add($details);
                if ($result) {
                    $this->session->set_flashdata('Message', 'Quotation Added Succesfully');
                    return redirect('quotation', 'refresh');
                } else {
                    $this->session->set_flashdata('Error', 'Failed to add employee');
                    $this->data['vehicle_services_list'] = $this->Admin_model->getVehicleServices();
                    $this->data['template'] = "Quotation/form_data";
                    $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => site_url('quotation'), 'page' => "Quotation"),array('link' => '#', 'page' => "Add Quotation"));
                    $this->admin_layout($this->data);
                }
            }else{
                $this->data['vehicle_services_list'] = $this->Admin_model->getVehicleServices();
                $this->data['template'] = "Quotation/form_data";
                $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => site_url('quotation'), 'page' => "Quotation"),array('link' => '#', 'page' => "Add Quotation"));
                $this->admin_layout($this->data);
            }
        }else{
            $this->data['vehicle_services_list'] = $this->Admin_model->getVehicleServices();
            $this->data['template'] = "Quotation/form_data";
            $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => site_url('quotation'), 'page' => "Quotation"),array('link' => '#', 'page' => "Add Quotation"));
            $this->admin_layout($this->data);
        }
        
    }
    public function view(){
        $get = $this->input->get();
        $this->data['quotation'] = $this->QuotationModel->getQuotationById($get['id']);
        $this->data['template'] = "Quotation/view_quotation";
        $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => site_url('quotation'), 'page' => "Quotation"),array('link' => '#', 'page' => "View Quotation"));
        $this->admin_layout($this->data);
        
        
    }
   public function delete(){
        $post = $this->input->post();
        $result = $this->Admin_model->deleteQuotation($post['id']);
        if($result){
            echo true;
        }else{
            echo false;
        }
   }
}
