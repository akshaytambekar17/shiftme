<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Services_model', 'services');
        $this->load->model('User_model', 'user');
        $this->load->model('admin/Admin_model');
        $this->load->model('admin/OrderModel','Order');
        $this->load->model('admin/VendorModel','Vendor');
        $this->load->model('admin/InvoiceModel','Invoice');
        $this->load->model('admin/EnquiryModel','Enquiry');
        $this->load->model('admin/QuotationModel','Quotation');
        $this->load->model('admin/QuotationHasProductModel','QuotationHasProduct');
        $this->load->model('admin/QuotationHasPricingModel','QuotationHasPricing');
        $this->load->model('admin/ProductListModel','ProductList');
        $this->load->model('admin/TimeSlotsModel','TimeSlots');
        $this->load->helper('message');
    }
    public function index() {
        $data['test'] = $this->user->getTestimonials();
        $data['slider'] = $this->user->getslider();
        $data['title'] = "Home";
        $data['metadata'] = "Home";
        $data['view'] = "home";
        $data['slider'] = true;
        $data['slider_details'] = false;
        $data['vehicle_list'] = $this->user->vehicle_list();
        $this->frontendLayout($data);

    }
    
    
}
