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
                $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => site_url('admin/vendor'), 'page' => "Vendors"),array('link' => '#', 'page' => $vendor_details['fullname']));
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
   public function editLocation(){
        $get = $this->input->get();
        $order_details = $this->OrderModel->getOrderByIdWithQuotation($get['order_id']);
        $location_details = $this->VendorOrderLocation->getLocationByUserIdOrderId($get['user_id'],$get['order_id']);
        $vendor_details = $this->Vendor->getVendorByUserId($get['user_id']);
        $this->data['order_details'] = $order_details;
        $this->data['location_details'] = $location_details;
        $this->data['vendor_details'] = $vendor_details;
        $this->data['template'] = "Vendor/edit_location";
        $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => site_url('admin/vendor'), 'page' => "Vendors"),array('link' => site_url('admin/vendor/assign-order-list?uid='.$get['user_id']), 'page' => $vendor_details['fullname']),array('link' => '#', 'page' => "Location details for Order ".$order_details['order_no']));
        
        if($this->input->post()){
            $post = $this->input->post();
            $this->form_validation->set_rules('pickup_point_km', 'Pickup Point', 'trim|required|numeric|regex_match[/^[0-9]/]');
            $this->form_validation->set_rules('drop_point_km', 'Drop Point', 'trim|required|numeric|regex_match[/^[0-9]/]');
            $this->form_validation->set_rules('total_amount', 'Total Amount', 'trim|required|numeric|regex_match[/^[0-9]/]');
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            if($this->form_validation->run() == TRUE){
                if(!empty($_FILES['pickup_point_image']['name'])){
                    $config['upload_path']          = './assets/upload/location/';
                    $config['allowed_types']        = 'gif|jpg|png|jpeg';
                    $config['max_size']             = 2048;
                    $this->load->library('upload', $config);
                    if($this->upload->do_upload('pickup_point_image')){
                        $uploadData = $this->upload->data();
                        $pickup_point_image = $uploadData['file_name'];
                        $error = '';
                    }else{
                        $error = $this->upload->display_errors();
                        $pickup_point_image = '';
                    }
                }else{
                    $pickup_point_image = !empty($post['pickup_point_image_hidden'])?$post['pickup_point_image_hidden']:'';
                    $error = '';
                }
                if(!empty($_FILES['drop_point_image']['name'])){
                    $config['upload_path']          = './assets/upload/location/';
                    $config['allowed_types']        = 'gif|jpg|png|jpeg';
                    $config['max_size']             = 2048;
                    $this->load->library('upload', $config);
                    if($this->upload->do_upload('drop_point_image')){
                        $uploadData = $this->upload->data();
                        $drop_point_image = $uploadData['file_name'];
                        $error = '';
                    }else{
                        $error = $this->upload->display_errors();
                        $drop_point_image = '';
                    }
                }else{
                    $drop_point_image = !empty($post['drop_point_image_hidden'])?$post['drop_point_image_hidden']:'';
                    $error = '';
                }
                
                if(empty($error)){
                    $location_details = $post;
                    unset($location_details['pickup_point_image_hidden']);
                    unset($location_details['drop_point_image_hidden']);
                    $location_details['pickup_point_image'] = $pickup_point_image;
                    $location_details['drop_point_image'] = $drop_point_image;
                    $location_details['updated_at'] = date('Y-m-d H:i:s');
                    $result = $this->VendorOrderLocation->update($location_details);
                    if($result){
                        $this->session->set_flashdata('Message', 'Location Details has updated for order number '.$order_details['order_no']);
                        return redirect(site_url('admin/vendor/assign-order-list?uid='.$vendor_details['user_id']), 'refresh');
                    }else{
                        $this->session->set_flashdata('Error', 'Failed to update details');
                        $this->admin_layout($this->data);
                    }    
                }else{
                    $this->session->set_flashdata('Error', $error);
                    $this->admin_layout($this->data);
                }
            }else{
                $this->admin_layout($this->data);
            }
        }else{
            $this->admin_layout($this->data);
        }        
    }
}
