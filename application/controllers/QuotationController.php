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
        $this->load->model('admin/QuotationHasPricingModel');
        $this->load->model('admin/ProductListModel');
        $this->load->model('admin/TimeSlotsModel','TimeSlots');
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
        $userSession = userSession();
        if (!empty($userSession)) {
            $user_details = $userSession;
        }else{
            $user_details = '';
        }
        if($this->input->post()){
            if(empty($userSession['uid'])){
                $this->session->set_flashdata('Error', 'Please Login to  send your quote');
                $data = $this->commonQuotationField();
                $data['userDetails'] = $user_details;
                $this->frontendLayout($data);
            }else{
                $post = $this->input->post();
                if(!empty($post['send'])){
                    $this->form_validation->set_rules('fullname', 'Full Name', 'trim|required');
                    $this->form_validation->set_rules('mobile_no', 'Mobile Number', 'trim|required|numeric|regex_match[/^[0-9]{10}$/]');
                    $this->form_validation->set_rules('email_id', 'Email', 'trim|required|valid_email');
                    $this->form_validation->set_rules('starting_location', 'Starting Address', 'trim|required');
                    $this->form_validation->set_rules('delivery_location', 'Delivery Address', 'trim|required');
                    $this->form_validation->set_rules('vehicle_id', 'Vechicle', 'trim|required');
                    $this->form_validation->set_rules('shifting_date', 'Shifiting Date', 'trim|required');
                    $this->form_validation->set_rules('time_slots_id', 'Shifiting Date', 'trim|required');
                    $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
                    if($this->form_validation->run() == TRUE){
                        $details = $post;
                        unset($details['send']);
                        unset($details['ProductListName']);
                        unset($details['ProductListQuantity']);
                        $details['shifting_date'] = date("Y-m-d", strtotime($details['shifting_date']));
                        $details['user_id'] = $userSession['uid'];
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
                                              'user_id' => $userSession['uid'],
                                              'created_at' => date('Y-m-d H:i:s'),
                                              'updated_at' => date('Y-m-d H:i:s'),
                                        );
                        $this->EnquiryModel->insert($enquiry_data);
                        if ($result) {
                            $this->session->set_flashdata('Message', 'Your Quotation data has been send succesfully.Our support team will contact soon...!');
                            return redirect('quote', 'refresh');
                        } else {
                            $this->session->set_flashdata('Error', 'Failed to send quotation details');
                            $data = $this->commonQuotationField();
                            $data['userDetails'] = $user_details;
                            $this->frontendLayout($data);
                        }
                    }else{
                        $data = $this->commonQuotationField();
                        $data['userDetails'] = $user_details;
                        $this->frontendLayout($data);
                    }
                }else{
                    $data = $this->commonQuotationField();
                    $data['userDetails'] = $user_details;
                    $data['pick_point'] = $post['pickupPoint'];
                    $data['drop_point'] = $post['dropPoint'];
                    $this->frontendLayout($data);
                }
            }
        }else{
            $data = $this->commonQuotationField();
            $data['userDetails'] = $user_details;
            $this->frontendLayout($data);
        }
        
    }
    public function commonQuotationField(){
        $data['metadata'] = "Quotation";
        $data['title'] = "Quotation";
        $data['view'] = "createQuotation";
        $data['name'] = "Vehicle";
        $data['slider'] = true;
        $data['slider_details'] = true;
        $data['slider_heading'] = 'REQUEST A QUICK QUOTE';
        $data['slider_description'] = '<strong>ShiftMe</strong> expert will shortly contact you to assess your needs and provide you with a customized and competitive quote.';
        $data['vehicle_services_list'] = $this->Admin_model->getVehicleServices();
        $data['product_list'] = $this->ProductListModel->getProductsList();
        $data['timeslots_list'] = $this->TimeSlots->getTimeSlots();
        return $data;
    }

    public function view(){
        $get = $this->input->get();
        $data['quotation'] = $this->QuotationModel->getQuotationByIdWithPrice($get['id']);
        $data['quotation_product_data'] = $this->QuotationHasProductModel->getQuotationsHasProductByQuotationId($get['id']);   
        $data['product_list'] = $this->ProductListModel->getProductsList();
        $data['name'] = "View Quotation";
        $data['template'] = "viewQuotation";
        $this->layout($data);
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
