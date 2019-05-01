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
class TrackingOrderController extends MY_Controller {

//put your code here
    function __construct() {
        parent::__construct();
        $this->load->model('admin/Admin_model');
        $this->load->model('admin/OrderModel','Order');
        $this->load->library('form_validation');
        $this->load->helper('message');
        $this->load->model('site_model');
        $this->load->model('User_model');
        $this->load->helper(array('url', 'form','email'));
        $this->load->library('session');
        $this->data['filters'] = $this->session->userdata('filters');
    }
    public function index(){
        $this->data['track_order_list'] = $this->TrackingOrder->getTrackingOrders();
        $this->data['template'] = "TrackingOrder/list";
        $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => '#', 'page' => "Tracking Order"));
        $this->admin_layout($this->data);
    }
    public function add(){
        if($this->input->post()){
            $post = $this->input->post();
            $this->form_validation->set_rules('order_id', 'Order Number', 'trim|required');
            $this->form_validation->set_rules('shipping_status', 'Tracking Status', 'trim|required');
            
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            if($this->form_validation->run() == TRUE){
                $details = $post;
                $order_details = $this->Order->getOrderById($post['order_id']);
                $details['user_id'] = $order_details['user_id'];
                $details['shipping_date'] = date('Y-m-d');
                $result = $this->TrackingOrder->insert($details);
                if($result){
                    $this->session->set_flashdata('Message', 'New tracking status for order number '.$order_details['order_no'].' has been created succesfully');
                    return redirect('track-order', 'refresh');
                }else{
                    $this->session->set_flashdata('Error', 'Something went wrong, Please try again');
                    $this->data['track_order_list'] = $this->TrackingOrder->getTrackingOrders();
                    $this->data['template'] = "TrackingOrder/form_data";
                    $this->data['order_list'] = $this->Order->getOrderPending();
                    $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' =>  site_url('track-order'), 'page' => "Tracking Orders"),array('link' => '#', 'page' => 'Add Track Order'));
                    $this->admin_layout($this->data);
                }
                
            }else{
                $this->data['track_order_list'] = $this->TrackingOrder->getTrackingOrders();
                $this->data['template'] = "TrackingOrder/form_data";
                $this->data['order_list'] = $this->Order->getOrderPending();
                $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' =>  site_url('track-order'), 'page' => "Tracking Orders"),array('link' => '#', 'page' => 'Add Track Order'));
                $this->admin_layout($this->data);
            }
            
        }else{
            $this->data['track_order_list'] = $this->TrackingOrder->getTrackingOrders();
            $this->data['template'] = "TrackingOrder/form_data";
            $this->data['order_list'] = $this->Order->getOrderPending();
            $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' =>  site_url('track-order'), 'page' => "Tracking Orders"),array('link' => '#', 'page' => 'Add Track Order'));
            $this->admin_layout($this->data);
        }
    }
    public function update(){
        $get = $this->input->get();
        if($this->input->post()){
            $post = $this->input->post();
            $this->form_validation->set_rules('shipping_status', 'Tracking Status', 'trim|required');
            
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            if($this->form_validation->run() == TRUE){
                $details = $post;
                unset($details['order_no']);
                $details['updated_at'] = date('Y-m-d H:i:s');
                $result = $this->TrackingOrder->update($details);
                if($result){
                    $this->session->set_flashdata('Message', 'Tracking details has been updated for order number '.$post['order_no'].' succesfully');
                    return redirect('track-order', 'refresh');
                }else{
                    $this->session->set_flashdata('Error', 'Something went wrong, Please try again');
                    $track_order_details = $this->TrackingOrder->getTrackingOrderById($post['id']);
                    $this->data['track_order_details'] = $track_order_details;
                    $this->data['template'] = "TrackingOrder/form_data";
                    $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' =>  site_url('track-order'), 'page' => "Tracking Order"),array('link' => '#', 'page' => $track_order_details['order_no']));
                    $this->admin_layout($this->data);
                }
                
            }else{
                $track_order_details = $this->TrackingOrder->getTrackingOrderById($post['id']);
                $this->data['track_order_details'] = $track_order_details;
                $this->data['template'] = "TrackingOrder/form_data";
                $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' =>  site_url('track-order'), 'page' => "Tracking Order"),array('link' => '#', 'page' => $track_order_details['order_no']));
                $this->admin_layout($this->data);
            }
        }else{
            $track_order_details = $this->TrackingOrder->getTrackingOrderById($get['id']);
            $this->data['track_order_details'] = $track_order_details;
            $this->data['template'] = "TrackingOrder/form_data";
            $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' =>  site_url('track-order'), 'page' => "Tracking Order"),array('link' => '#', 'page' => $track_order_details['order_no']));
            $this->admin_layout($this->data);
        }
    }
    
    public function delete(){
        $post = $this->input->post();
        $result = $this->TrackingOrder->delete($post['id']);
        if($result){
            echo true;
        }else{
            echo false;
        }
   }
}
