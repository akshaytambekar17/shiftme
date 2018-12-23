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
class OrderController extends MY_Controller {

//put your code here
    function __construct() {
        parent::__construct();
        $this->load->model('admin/Admin_model');
        $this->load->model('admin/OrderModel');
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
        $this->data['orders_list'] = $this->OrderModel->getOrders();
        $this->data['template'] = "Order/list";
        $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => '#', 'page' => "Orders"));
        $this->admin_layout($this->data);
    }
    public function make(){
        $userSession = userSession();
        if(empty($userSession['uid'])){
            $this->session->set_flashdata('Error', 'Please Login');
            return redirect('', 'refresh');
        }else{
            
            $post = $this->input->post();
            $quotation_data = $this->QuotationModel->getQuotationByIdWithPrice($post['quotation_id']);
            $order_data = array('quotation_id' => $post['quotation_id'],
                                'user_id' => $userSession['uid'],
                                'status' => 1,
                                'total_amount' => $quotation_data['total_amount'],
                                'vehicle_id' => $quotation_data['vehicle_id'],
                                'created_at' => date('Y-m-d H:i:s'),
                                'updated_at' => date('Y-m-d H:i:s'),
                            );
            $result = $this->OrderModel->add($order_data);
            $quotation_data = array('is_order' => 1,
                                    'id' => $post['quotation_id']
                            );
            $this->QuotationModel->update($quotation_data);
            if($result){
                $order_details = $this->OrderModel->getOrderByIdWithQuotation($result);
                $data['order_details'] = $order_details;
                $to = $order_details['email_id'];
                $subject = "New Order ".$order_details['order_no']." has been placed against quotation number ".$order_details['quotation_no'];
                $message = $this->load->view('admin/Email/order',$data,TRUE);
                $result = $this->sendEmail($to, $subject, $message);
                echo true;
            }else{
                echo false;
            }
            //$this->session->set_flashdata('insert_msg', 'Your order has been placed successfully. Our support team will contact soon for order confirmation.');
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
}
