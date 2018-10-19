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
class ProductListController extends MY_Controller {

//put your code here
    function __construct() {
        parent::__construct();
        $this->load->model('admin/Admin_model');
        $this->load->model('admin/OrderModel');
        $this->load->model('admin/InvoiceModel');
        $this->load->model('admin/QuotationModel');
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
        $this->data['product_list'] = $this->ProductListModel->getProductsList();
        $this->data['template'] = "ProductList/list";
        $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => '#', 'page' => "ProductList"));
        $this->admin_layout($this->data);
    }
    public function add(){
        
        if($this->input->post()){
            $this->form_validation->set_rules('name', 'Product Name', 'trim|required');
            $this->form_validation->set_rules('price', 'Price', 'trim|required|numeric');
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            if($this->form_validation->run() == TRUE){
                $details = $this->input->post();
                $details['created_at'] = date('Y-m-d H:i:s');
                $details['updated_at'] = date('Y-m-d H:i:s');
                $result = $this->ProductListModel->add($details);
                if ($result) {
                    $this->session->set_flashdata('Message', 'Product List Added Succesfully');
                    return redirect('product-list', 'refresh');
                } else {
                    $this->session->set_flashdata('Error', 'Failed to add product list');
                    $this->data['template'] = "ProductList/form_data";
                    $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => site_url('product-list'), 'page' => "Product List"),array('link' => '#', 'page' => "Add Product List"));
                    $this->admin_layout($this->data);
                }
            }else{
                $this->data['template'] = "ProductList/form_data";
                $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => site_url('product-list'), 'page' => "Product List"),array('link' => '#', 'page' => "Add Product List"));
                $this->admin_layout($this->data);
            }
        }else{
            $this->data['template'] = "ProductList/form_data";
            $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => site_url('product-list'), 'page' => "Product List"),array('link' => '#', 'page' => "Add Product List"));
            $this->admin_layout($this->data);
        }
        
    }
    public function edit(){
        $get = $this->input->get();
        if($this->input->post()){
            $this->form_validation->set_rules('name', 'Product Name', 'trim|required');
            $this->form_validation->set_rules('price', 'Price', 'trim|required|numeric');
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            $details = $this->input->post();
            if($this->form_validation->run() == TRUE){
                $details['updated_at'] = date('Y-m-d H:i:s');
                $result = $this->ProductListModel->update($details);
                if ($result) {
                    $this->session->set_flashdata('Message', 'Product List Updated Succesfully');
                    return redirect('product-list', 'refresh');
                } else {
                    $this->session->set_flashdata('Error', 'Failed to update product list');
                    $data = $this->ProductListModel->getProductListById($details['id']);
                    $this->data['product_list_data'] = $data;
                    $this->data['template'] = "ProductList/form_data";
                    $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => site_url('product-list'), 'page' => "Product List"),array('link' => '#', 'page' => $data['name']));
                    $this->admin_layout($this->data);
                }
            }else{
                $data = $this->ProductListModel->getProductListById($details['id']);
                $this->data['product_list_data'] = $data;
                $this->data['template'] = "ProductList/form_data";
                $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => site_url('product-list'), 'page' => "Product List"),array('link' => '#', 'page' => $data['name']));
                $this->admin_layout($this->data);
            }
        }else{
            $data = $this->ProductListModel->getProductListById($get['id']);
            $this->data['product_list_data'] = $data;
            $this->data['template'] = "ProductList/form_data";
            $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => site_url('product-list'), 'page' => "Product List"),array('link' => '#', 'page' => $data['name']));
            $this->admin_layout($this->data);
        }
    }
   public function delete(){
        $post = $this->input->post();
        $result = $this->ProductListModel->delete($post['id']);
        if($result){
            echo true;
        }else{
            echo false;
        }
   }
}
