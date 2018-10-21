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
        $this->load->model('admin/EnquiryModel');
        $this->load->model('admin/QuotationModel');
        $this->load->model('admin/QuotationHasProductModel');
        $this->load->model('admin/ProductListModel');
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
    public function create(){
        
        if($this->input->post()){
            if($this->session->userdata('uid') == ''){
                $this->session->set_flashdata('Error', 'Please Login to  send your quote');
                $data['metadata'] = "Quotation";
                $data['template'] = "createQuotation";
                $data['name'] = "Quotation";
                $data['vehicle_services_list'] = $this->Admin_model->getVehicleServices();
                $data['product_list'] = $this->ProductListModel->getProductsList();
                $this->layout($data);
            }else{
                $post = $this->input->post();
                $this->form_validation->set_rules('fullname', 'Full Name', 'trim|required');
                $this->form_validation->set_rules('mobile_no', 'Mobile Number', 'trim|required|numeric|regex_match[/^[0-9]{10}$/]');
                $this->form_validation->set_rules('email_id', 'Email', 'trim|required|valid_email');
                $this->form_validation->set_rules('starting_location', 'Starting Address', 'trim|required');
                $this->form_validation->set_rules('delivery_location', 'Delivery Address', 'trim|required');
                $this->form_validation->set_rules('vehicle_id', 'Vechicle', 'trim|required');
                $this->form_validation->set_rules('shifting_date', 'Shifiting Date', 'trim|required');
                $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
                if($this->form_validation->run() == TRUE){
                    
                    $details = $post;
                    unset($details['ProductListName']);
                    unset($details['ProductListQuantity']);
                    $details['shifting_date'] = date("Y-m-d", strtotime($details['shifting_date']));
                    $details['user_id'] = $this->session->userdata('uid');
                    $details['created_at'] = date('Y-m-d H:i:s');
                    $details['updated_at'] = date('Y-m-d H:i:s');
                    $result = $this->QuotationModel->add($details);
                    
                    foreach($post['ProductListName'] as $key_name => $val_name){
                        foreach($post['ProductListQuantity'] as $key_qty => $val_qty){
                            if($key_name == $key_qty){
                                $data_product = array('quotation_id' => $result,
                                                      'product_id' => $val_name,
                                                      'quantity' => !empty($val_qty)?$val_qty:0,
                                                      'created_at' => date('Y-m-d H:i:s')
                                                );
                                $this->QuotationHasProductModel->insert($data_product);
                            }
                        }
                    }
                    
                    $enquiry_data = array('quotation_id' => $result,
                                          'user_id' => $this->session->userdata('uid'),
                                          'created_at' => date('Y-m-d H:i:s'),
                                          'updated_at' => date('Y-m-d H:i:s'),
                                    );
                    $this->EnquiryModel->insert($enquiry_data);
                    if ($result) {
                        $this->session->set_flashdata('Message', 'Your Quotation data has been send to Succesfully.Support team will contact soon...!');
                        return redirect('quote', 'refresh');
                    } else {
                        $this->session->set_flashdata('Error', 'Failed to send quotation details');
                        $data['metadata'] = "Quotation";
                        $data['template'] = "createQuotation";
                        $data['name'] = "Quotation";
                        $data['vehicle_services_list'] = $this->Admin_model->getVehicleServices();
                        $data['product_list'] = $this->ProductListModel->getProductsList();
                        $this->layout($data);
                    }
                }else{
                    $data['metadata'] = "Quotation";
                    $data['template'] = "createQuotation";
                    $data['name'] = "Quotation";
                    $data['vehicle_services_list'] = $this->Admin_model->getVehicleServices();
                    $data['product_list'] = $this->ProductListModel->getProductsList();
                    $this->layout($data);
                }
            }
        }else{
            $data['metadata'] = "Quotation";
            $data['template'] = "createQuotation";
            $data['name'] = "Quotation";
            $data['vehicle_services_list'] = $this->Admin_model->getVehicleServices();
            $data['product_list'] = $this->ProductListModel->getProductsList();
            $this->layout($data);
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
