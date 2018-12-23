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
class VendorController extends MY_Controller {

//put your code here
    function __construct() {
        parent::__construct();
        $this->load->model('admin/Admin_model');
        $this->load->model('admin/OrderModel');
        $this->load->model('site_model');
        $this->load->model('User_model','User');
        $this->load->library('form_validation');
        $this->load->helper('message');
        $this->load->helper(array('url', 'form','email'));
        $this->load->library('session');
        $this->data['filters'] = $this->session->userdata('filters');
    }
    public function index(){
        $this->data['vendor_list'] = $this->Vendor->getVendors();
        $this->data['template'] = "Vendor/list";
        $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => '#', 'page' => "Vendors"));
        $this->admin_layout($this->data);
    }
    public function create(){
        if($this->session->userdata('uid') == ''){
            $this->session->set_flashdata('Error', 'Please Login');
            return redirect('', 'refresh');
        }else{
            $post = $this->input->post();
            $quotation_data = $this->QuotationModel->getQuotationByIdWithPrice($post['quotation_id']);
            $order_data = array('quotation_id' => $post['quotation_id'],
                                'user_id' => $this->session->userdata('uid'),
                                'status' => 1,
                                'total_amount' => $quotation_data['total_amount'],
                                'vehicle_id' => $quotation_data['vehicle_id'],
                                'created_at' => date('Y-m-d H:i:s'),
                                'updated_at' => date('Y-m-d H:i:s'),
                            );
            $result = $this->OrderModel->add($order_data);
            $quotation_update = array('is_order' => 1,
                                    'id' => $post['quotation_id']
                            );
            $this->QuotationModel->update($quotation_update);
            if($result){
                echo true;
            }else{
                echo false;
            }
            //$this->session->set_flashdata('insert_msg', 'Your order has been placed successfully. Our support team will contact soon for order confirmation.');
        }
    }
    public function update(){
        $get = $this->input->get(); 
        if($this->input->post()){
            $post = $this->input->post();
            $this->form_validation->set_rules('status', 'Status', 'trim|required');            
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            if($this->form_validation->run() == TRUE){
                $result = $this->OrderModel->update($post);
                if ($result){
                    $this->session->set_flashdata('Message', 'Order Updated Succesfully');
                    return redirect('order', 'refresh');
                } else {
                    $order_data = $this->OrderModel->getOrderByIdWithQuotation($post['id']);
                    $this->data['order_data'] = $order_data;
                    $this->data['template'] = "Order/update";
                    $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => site_url('order'), 'page' => "Orders"),array('link' => '#', 'page' => $order_data['order_no']));
                    $this->admin_layout($this->data);
                }
            }else{
                $order_data = $this->OrderModel->getOrderByIdWithQuotation($post['id']);
                $this->data['order_data'] = $order_data;
                $this->data['template'] = "Order/update";
                $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => site_url('order'), 'page' => "Orders"),array('link' => '#', 'page' => $order_data['order_no']));
                $this->admin_layout($this->data);
            }
        }else{
            $order_data = $this->OrderModel->getOrderByIdWithQuotation($get['id']);
            $this->data['order_data'] = $order_data;
            $this->data['template'] = "Order/update";
            $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => site_url('order'), 'page' => "Orders"),array('link' => '#', 'page' => $order_data['order_no']));
            $this->admin_layout($this->data);
        }
    }
    public function delete(){
        $post = $this->input->post();
        $result = $this->OrderModel->delete($post['id']);
        if($result){
            echo true;
        }else{
            echo false;
        }
   }
    public function AssignOrder(){
        $get = $this->input->get(); 
        if($this->input->post()){
            $post = $this->input->post();
            $this->form_validation->set_rules('order_id', 'Order', 'trim|required');            
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            if($this->form_validation->run() == TRUE){
                $details = $post;
                unset($details['id']);
                $details['created_at'] = date('Y-m-d H:i:s');
                $details['updated_at'] = date('Y-m-d H:i:s');
                $result = $this->VendorOrderAssign->insert($details);
                $vendor_details = $this->Vendor->getVendorById($post['id']);
                if ($result){
                    $order_details = $this->OrderModel->getOrderByIdWithQuotation($details['order_id']);
                    $template_data['order_details'] = $order_details;
                    $to = $vendor_details['email'];
                    $subject = "New Order number ".$order_details['order_no']." has been assign to you";
                    $message = $this->load->view('admin/Email/order_assign',$template_data,TRUE);
                    $result = $this->sendEmail($to, $subject, $message);
                    
                    $this->session->set_flashdata('Message', 'Order has been assign to '.$vendor_details['fullname'].' succesfully');
                    return redirect('admin/vendor', 'refresh');
                } else {
                    $this->session->set_flashdata('Error', 'Something went wrong');
                    $vendor_details = $this->Vendor->getVendorById($get['id']);
                    $order_assign_list = $this->VendorOrderAssign->getOrderAssigns();
                    $order_list = $this->OrderModel->getOrders();
                    $this->data['order_list'] = $order_list;
                    $this->data['vendor_details'] = $vendor_details;
                    $this->data['order_assign_list'] = $order_assign_list;
                    $this->data['template'] = "Vendor/assign_order";
                    $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => site_url('admin/vendor'), 'page' => "Vendors"),array('link' => '#', 'page' => $vendor_details['fullname']));
                    $this->admin_layout($this->data);
                }
            }else{
                $vendor_details = $this->Vendor->getVendorById($post['id']);
                $order_assign_list = $this->VendorOrderAssign->getOrderAssigns();
                $order_list = $this->OrderModel->getOrders();
                $this->data['order_list'] = $order_list;
                $this->data['vendor_details'] = $vendor_details;
                $this->data['order_assign_list'] = $order_assign_list;
                $this->data['template'] = "Vendor/assign_order";
                $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => site_url('admin/vendor'), 'page' => "adminVendors"),array('link' => '#', 'page' => $vendor_details['fullname']));
                $this->admin_layout($this->data);
            }
        }else{
            $vendor_details = $this->Vendor->getVendorById($get['id']);
            $order_assign_list = $this->VendorOrderAssign->getOrderAssigns();
            $order_list = $this->OrderModel->getOrders();
            $this->data['order_list'] = $order_list;
            $this->data['vendor_details'] = $vendor_details;
            $this->data['order_assign_list'] = $order_assign_list;
            $this->data['template'] = "Vendor/assign_order";
            $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => site_url('admin/vendor'), 'page' => "Vendors"),array('link' => '#', 'page' => $vendor_details['fullname']));
            $this->admin_layout($this->data);
        }
    }
    public function AssignOrderList(){
        $get = $this->input->get();
        $vendor_details = $this->Vendor->getVendorByUserId($get['uid']);
        $assign_order_list = $this->VendorOrderAssign->getOrderAssignByUserId($get['uid']);
        $this->data['assign_order_list'] = $assign_order_list;
        $this->data['template'] = "Vendor/assign_order_list";
        $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => site_url('admin/vendor'), 'page' => "Vendors"),array('link' => '#', 'page' => $vendor_details['fullname']));
        $this->admin_layout($this->data);
    }
    public function AssignOrderDelete(){
        $post = $this->input->post();
        $result = $this->VendorOrderAssign->delete($post['id']);
        if($result){
            echo true;
        }else{
            echo false;
        }
   }
}
