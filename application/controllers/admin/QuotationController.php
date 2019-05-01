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
        $this->load->model('admin/OrderModel','Order');
        $this->load->model('admin/InvoiceModel','Invoice');
        $this->load->model('admin/QuotationModel','Quotation');
        $this->load->model('admin/QuotationHasProductModel','QuotationHasProduct');
        $this->load->model('admin/QuotationHasPricingModel','QuotationHasPricing');
        $this->load->model('admin/ProductListModel','ProductList');
        $this->load->library('form_validation');
        $this->load->helper('message');
        $this->load->model('site_model');
        $this->load->model('User_model');
        $this->load->helper(array('url', 'form','email'));
        $this->load->library('session');
        $this->data['filters'] = $this->session->userdata('filters');
    }
    public function index(){
        $this->data['quotation_list'] = $this->Quotation->getQuotations();
        $update_details = array('is_read' => 1);
        $this->Quotation->update($update_details);
        $this->data['template'] = "Quotation/list";
        $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => '#', 'page' => "Quotation"));
        $this->admin_layout($this->data);
    }
    public function add(){
        
        if($this->input->post()){
            $post = $this->input->post();
            $this->form_validation->set_rules('fullname', 'Full Name', 'trim|required');
            $this->form_validation->set_rules('mobile_no', 'Mobile Number', 'trim|required|numeric|regex_match[/^[0-9]{10}$/]');
            $this->form_validation->set_rules('email_id', 'Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('user_id', 'User', 'trim|required');
            $this->form_validation->set_rules('starting_address', 'Starting Address', 'trim|required');
            $this->form_validation->set_rules('starting_location', 'Starting Location', 'trim|required');
            $this->form_validation->set_rules('starting_landmark','Starting Landmark', 'required');
            $this->form_validation->set_rules('starting_pincode', 'Starting Pincode', 'trim|required|numeric|regex_match[/^[0-9]{6}$/]');
            $this->form_validation->set_rules('delivery_address', 'Delivery Address', 'trim|required');
            $this->form_validation->set_rules('delivery_location', 'Delivery Location', 'trim|required');
            $this->form_validation->set_rules('delivery_landmark','Delivery Landmark', 'required');
            $this->form_validation->set_rules('delivery_pincode', 'Delivery Pincode', 'trim|required|numeric|regex_match[/^[0-9]{6}$/]');
            $this->form_validation->set_rules('vehicle_id', 'Vechicle', 'trim|required');
            $this->form_validation->set_rules('shifting_date', 'Shifting Date', 'trim|required');
            $this->form_validation->set_rules('products_total_amount', 'Product List Amount', 'trim|required');
            $this->form_validation->set_rules('distance_amount', 'Distance Amount', 'trim|required');
            $this->form_validation->set_rules('vehicle_amount', 'Vechicle Amount', 'trim|required');
            $this->form_validation->set_rules('discount', 'Discount', 'trim|required');
            $this->form_validation->set_rules('total_amount', 'Total Amount', 'trim|required');
            
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            if($this->form_validation->run() == TRUE){
                $details = $post;
                unset($details['ProductListName']);
                unset($details['ProductListQuantity']);
                unset($details['products_total_amount']);
                unset($details['distance_amount']);
                unset($details['vehicle_amount']);
                unset($details['discount']);
                unset($details['total_amount']);
                $details['shifting_date'] = date("Y-m-d", strtotime($details['shifting_date']));
                $details['is_send_user'] = 1;
                $details['updated_at'] = date('Y-m-d H:i:s');
                $details['created_at'] = date('Y-m-d H:i:s');
                $result = $this->Quotation->add($details);
                foreach($post['ProductListName'] as $key_name => $val_name){
                    foreach($post['ProductListQuantity'] as $key_qty => $val_qty){
                        if($key_name == $key_qty){
                            $data_product = array('quotation_id' => $result,
                                                  'product_id' => $val_name,
                                                  'quantity' => !empty($val_qty)?$val_qty:0,
                                                  'created_at' => date('Y-m-d H:i:s')
                                            );
                            $this->QuotationHasProduct->insert($data_product);
                        }
                    }
                }
                foreach($post as $key=>$value){
                    if($key == 'products_total_amount' || $key == 'distance_amount' || $key == 'vehicle_amount' || $key == 'discount' || $key == 'total_amount'){
                        $pricing[$key] = $value;
                    }
                }
                $pricing['quotation_id'] = $result;
                $result_pricing = $this->QuotationHasPricing->insert($pricing);
                if ($result) {
                    $this->session->set_flashdata('Message', 'Quotation Added Succesfully');
                    return redirect('quotation', 'refresh');
                } else {
                    $this->session->set_flashdata('Error', 'Failed to add employee');
                    $this->data['product_list'] = $this->ProductList->getProductsList();
                    $this->data['user_list'] = $this->User_model->getUsers();
                    $this->data['vehicle_services_list'] = $this->Admin_model->getVehicleServices();
                    $this->data['template'] = "Quotation/form_data";
                    $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => site_url('quotation'), 'page' => "Quotation"),array('link' => '#', 'page' => "Add Quotation"));
                    $this->admin_layout($this->data);
                }
            }else{
                $this->data['product_list'] = $this->ProductList->getProductsList();
                $this->data['user_list'] = $this->User_model->getUsers();
                $this->data['vehicle_services_list'] = $this->Admin_model->getVehicleServices();
                $this->data['template'] = "Quotation/form_data";
                $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => site_url('quotation'), 'page' => "Quotation"),array('link' => '#', 'page' => "Add Quotation"));
                $this->admin_layout($this->data);
            }
        }else{
            $this->data['product_list'] = $this->ProductList->getProductsList();
            $this->data['user_list'] = $this->User_model->getUsers();
            $this->data['vehicle_services_list'] = $this->Admin_model->getVehicleServices();
            $this->data['template'] = "Quotation/form_data";
            $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => site_url('quotation'), 'page' => "Quotation"),array('link' => '#', 'page' => "Add Quotation"));
            $this->admin_layout($this->data);
        }
        
    }
    public function update(){
        $get = $this->input->get();
        if($this->input->post()){
            $post = $this->input->post();
            $this->form_validation->set_rules('fullname', 'Full Name', 'trim|required');
            $this->form_validation->set_rules('mobile_no', 'Mobile Number', 'trim|required|numeric|regex_match[/^[0-9]{10}$/]');
            $this->form_validation->set_rules('email_id', 'Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('user_id', 'User', 'trim|required');
            $this->form_validation->set_rules('starting_address', 'Starting Address', 'trim|required');
            $this->form_validation->set_rules('starting_location', 'Starting Location', 'trim|required');
            $this->form_validation->set_rules('starting_landmark','Starting Landmark', 'required');
            $this->form_validation->set_rules('starting_pincode', 'Starting Pincode', 'trim|required|numeric|regex_match[/^[0-9]{6}$/]');
            $this->form_validation->set_rules('delivery_address', 'Delivery Address', 'trim|required');
            $this->form_validation->set_rules('delivery_location', 'Delivery Location', 'trim|required');
            $this->form_validation->set_rules('delivery_landmark','Delivery Landmark', 'required');
            $this->form_validation->set_rules('delivery_pincode', 'Delivery Pincode', 'trim|required|numeric|regex_match[/^[0-9]{6}$/]');
            $this->form_validation->set_rules('vehicle_id', 'Vechicle', 'trim|required');
            $this->form_validation->set_rules('shifting_date', 'Shifting Date', 'trim|required');
            $this->form_validation->set_rules('products_total_amount', 'Product List Amount', 'trim|required');
            $this->form_validation->set_rules('distance_amount', 'Distance Amount', 'trim|required');
            $this->form_validation->set_rules('vehicle_amount', 'Vechicle Amount', 'trim|required');
            $this->form_validation->set_rules('discount', 'Discount', 'trim|required');
            $this->form_validation->set_rules('total_amount', 'Total Amount', 'trim|required');
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            if($this->form_validation->run() == TRUE){
                $details = $post;
                unset($details['ProductListName']);
                unset($details['ProductListQuantity']);
                unset($details['products_total_amount']);
                unset($details['distance_amount']);
                unset($details['vehicle_amount']);
                unset($details['discount']);
                unset($details['total_amount']);
                $details['shifting_date'] = date("Y-m-d", strtotime($details['shifting_date']));
                $details['updated_at'] = date('Y-m-d H:i:s');
                $result = $this->Quotation->update($details);
                $this->QuotationHasProduct->deleteByQuotationId($post['id']);
                foreach($post['ProductListName'] as $key_name => $val_name){
                    foreach($post['ProductListQuantity'] as $key_qty => $val_qty){
                        if($key_name == $key_qty){
                            $data_product = array('quotation_id' => $post['id'],
                                                  'product_id' => $val_name,
                                                  'quantity' => !empty($val_qty)?$val_qty:0,
                                                  'created_at' => date('Y-m-d H:i:s')
                                            );
                            $this->QuotationHasProduct->insert($data_product);
                        }
                    }
                }
                foreach($post as $key=>$value){
                    if($key == 'products_total_amount' || $key == 'distance_amount' || $key == 'vehicle_amount' || $key == 'discount' || $key == 'total_amount'){
                        $pricing[$key] = $value;
                    }
                }
                $pricing['quotation_id'] = $post['id'];
                $this->QuotationHasPricing->deleteByQuotationId($post['id']);
                $result_pricing = $this->QuotationHasPricing->insert($pricing);
                if ($result) {
                    if(!empty($post['is_send_user']) && $post['is_send_user'] ==1 ){
                        $quotation_data = $this->Quotation->getQuotationByIdWithPrice($get['id']);  
                        $quotation_details['quotation_details'] = $quotation_data;
                        $to = $details['email_id'];
                        $subject = "New Quotation for that you enquired. Quotation number ".$quotation_data['quotation_no'];
                        $message = $this->load->view('admin/Email/enquiry_quotation',$quotation_details,TRUE);
                        $result = $this->sendEmail($to, $subject, $message);
                        if($result['success']){
                            $this->session->set_flashdata('Message', 'Quotation updated succesfully and send email to user');
                        }else{
                            $this->session->set_flashdata('Error', 'Quotation updated succesfully but mail cannot send something went wrong');
                        }
                    }else{
                        $this->session->set_flashdata('Message', 'Quotation Updated Succesfully');
                    }
                    return redirect('quotation', 'refresh');
                } else {
                    $quotation_data = $this->Quotation->getQuotationByIdWithPrice($get['id']);  
                    if(empty($quotation_data)){
                        $quotation_data = $this->Quotation->getQuotationById($get['id']);  
                    }
                    $this->data['quotation_data'] = $quotation_data;  
                    $this->data['quotation_product_data'] = $this->QuotationHasProduct->getQuotationsHasProductByQuotationId($post['id']);   
                    $this->data['product_list'] = $this->ProductList->getProductsList();
                    $this->data['user_list'] = $this->User_model->getUsers();
                    $this->data['vehicle_services_list'] = $this->Admin_model->getVehicleServices();
                    $this->data['template'] = "Quotation/form_data";
                    $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => site_url('quotation'), 'page' => "Quotation"),array('link' => '#', 'page' => "Update Quotation"));
                    $this->admin_layout($this->data);
                }
            }else{
                $quotation_data = $this->Quotation->getQuotationByIdWithPrice($get['id']);  
                if(empty($quotation_data)){
                    $quotation_data = $this->Quotation->getQuotationById($get['id']);  
                }
                $this->data['quotation_data'] = $quotation_data;  
                $this->data['quotation_product_data'] = $this->QuotationHasProduct->getQuotationsHasProductByQuotationId($get['id']);   
                $this->data['product_list'] = $this->ProductList->getProductsList();
                $this->data['user_list'] = $this->User_model->getUsers();
                $this->data['vehicle_services_list'] = $this->Admin_model->getVehicleServices();
                $this->data['template'] = "Quotation/form_data";
                $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => site_url('quotation'), 'page' => "Quotation"),array('link' => '#', 'page' => "Update Quotation"));
                $this->admin_layout($this->data);
            }
        }else{
            $quotation_data = $this->Quotation->getQuotationByIdWithPrice($get['id']);  
            if(empty($quotation_data)){
                $quotation_data = $this->Quotation->getQuotationById($get['id']);  
            }
            $this->data['quotation_data'] = $quotation_data;  
            $this->data['quotation_product_data'] = $this->QuotationHasProduct->getQuotationsHasProductByQuotationId($get['id']);   
            $this->data['product_list'] = $this->ProductList->getProductsList();
            $this->data['user_list'] = $this->User_model->getUsers();
            $this->data['vehicle_services_list'] = $this->Admin_model->getVehicleServices();
            $this->data['template'] = "Quotation/form_data";
            $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => site_url('quotation'), 'page' => "Quotation"),array('link' => '#', 'page' => "Update Quotation"));
            $this->admin_layout($this->data);
        }
        
    }
    public function view(){
        $get = $this->input->get();
        $this->data['quotation'] = $this->Quotation->getQuotationByIdWithPrice($get['id']);
        $this->data['quotation_product_data'] = $this->QuotationHasProduct->getQuotationsHasProductByQuotationId($get['id']);   
        $this->data['product_list'] = $this->ProductList->getProductsList();
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
