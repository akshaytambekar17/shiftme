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
class InvoiceController extends MY_Controller {

//put your code here
    function __construct() {
        parent::__construct();
        $this->load->model('admin/Admin_model');
        $this->load->model('admin/OrderModel');
        $this->load->model('admin/InvoiceModel');
        $this->load->model('User_model');
        $this->load->library('form_validation');
        $this->load->helper('message');
        $this->load->model('site_model');
        $this->load->model('User_model');
        $this->load->helper(array('url', 'form','email'));
        $this->load->library('session');
        $this->data['filters'] = $this->session->userdata('filters');
    }
    public function index(){
        $this->data['invoice_list'] = $this->InvoiceModel->getInvoices();
        $this->data['template'] = "Invoice/list";
        $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => '#', 'page' => "Invoices"));
        $this->admin_layout($this->data);
    }
    public function create(){
        if($this->input->post()){
            $post = $this->input->post();
            $details = $post;
            $details['created_at'] = date('Y-m-d H:i:s');
            $details['updated_at'] = date('Y-m-d H:i:s');
            $result = $this->InvoiceModel->insert($details);
            if($result){
                $this->session->set_flashdata('Message', 'Inovice has been generated  Succesfully');
                return redirect('invoice', 'refresh');
            }else{
                $this->session->set_flashdata('Error', 'Something went wrong, Invoice not generated');
                $this->data['order_list'] = $this->OrderModel->getOrders();
                $this->data['template'] = "Invoice/form_data";
                $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' =>  site_url('invoice'), 'page' => "Invoices"),array('link' => '#', 'page' => 'Create'));
                $this->admin_layout($this->data);
            }
        }else{
            $this->data['order_list'] = $this->OrderModel->getOrders();
            $this->data['template'] = "Invoice/form_data";
            $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' =>  site_url('invoice'), 'page' => "Invoices"),array('link' => '#', 'page' => 'Create'));
            $this->admin_layout($this->data);
        }
    }
    public function getorderDetails(){
        $post = $this->input->post();
        $data['order_details'] = $this->OrderModel->getOrderByIdWithQuotation($post['id']);
        $this->load->view('admin/Invoice/order_details',$data);
    }
    public function sendInvoice(){
        $get = $this->input->get();
        if($this->input->post()){
            $post = $this->input->post();
            $user_details = $this->User_model->getUsersById($post['user_id']);
            $this->load->library('email');
            $config = array();
            $config['protocol'] = 'smtp';
            $config['smtp_host'] = 'ssl://smtp.gmail.com';
            $config['smtp_user'] = 'akshaytambekar17@gmail.com';
            $config['smtp_pass'] = '@kshay_1793';
            $config['smtp_port'] = 465;
            $config['charset']   = 'utf-8';
            $config['newline']   = "\r\n";
            $config['mailtype'] = 'text';
            $config['wordwrap'] = TRUE;
            $this->email->initialize($config);
            $this->email->from('akshaytambekar17@gmail.com', 'Shift Me');
            $this->email->to($user_details['email']);
            
            $this->email->subject('Email Test');
            $this->email->message('Testing the email class.');

            if($this->email->send()){
                printDie($user_details);
            }else{
                printDie($this->email->print_debugger());
            }
            
            $this->session->set_flashdata('Message', 'Invoice has been send through Mail and SMS Succesfully');
            return redirect('invoice','refresh');
        }
        $invoice_details = $this->InvoiceModel->getInvoiceByIdWithQuotationOrder($get['id']);
        $this->data['invoice_details'] = $invoice_details;
        $this->data['template'] = "Invoice/send_invoice";
        $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' =>  site_url('invoice'), 'page' => "Invoices"),array('link' => '#', 'page' => $invoice_details['invoice_no']));
        $this->admin_layout($this->data);
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
