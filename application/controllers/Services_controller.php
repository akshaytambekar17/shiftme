<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Services_controller extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Services_model', 'services');
        $this->load->model('User_model', 'user');
        $this->load->model('admin/CMSPageModel', 'CMSPage');
//        $this->load->model('Event_model', 'event');
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
//        $data['test'] = $this->user->getTestimonials();
//        $data['slider'] = $this->user->getslider();
//        $data['metadata'] = "Home";
//        $data['template'] = "Home";
//        $data['name'] = "Home";
//        $data['vehicle'] = $this->user->vehicle_list();
//
//        $this->layout($data);
    }
    public function shifting() {
        $data['metadata'] = "Shifting";
        $data['template'] = "shifting";
        $data['name'] = "Shifting";
        $data['services'] = $this->services->getShiftingServices();

        $this->layout($data);
    }
    public function labour() {
        $data['metadata'] = "Labour";
        $data['template'] = "labour";
        $data['name'] = "Labour";
        $data['services'] = $this->services->getLabourServices();
        $this->layout($data);
    }

    public function vehicle() {
        $data['metadata'] = "Vehicle";
        $data['title'] = "Vehicle";
        $data['template'] = "vehicle";
        $data['name'] = "Vehicle";
        $data['services'] = $this->services->getVehicleServices();
        $data['vehicle'] = $this->user->vehicle_list();
        $this->layout($data);
    }
//    public function aboutus() {
//        $data['metadata'] = "Aboutus";
//        $data['template'] = "aboutus";
//        $data['name'] = "About us";
//        $data['result'] = $this->services->getabout();
//        $data['staff'] = $this->services->getstaff();
//        $data['clients'] = $this->services->getClients();
//        $this->layout($data);
//    }

    public function cost() {
        $data['metadata'] = "Cost";
        $data['template'] = "vehicle";
        $data['name'] = "cost";
//        $data['result'] = $this->services->getabout();
//        $data['staff'] = $this->services->getstaff();
//        $data['clients'] = $this->services->getClients();
        $data['services'] = $this->services->getVehicleServices();
        $data['vehicle'] = $this->user->vehicle_list();
        $this->layout($data);
    }
    
//    public function faq() {
//        $data['metadata'] = "faq";
//        $data['template'] = "faq";
//        $data['name'] = "FAQ";
//        $data['faq'] = $this->services->getfaq();
//        $this->layout($data);
//    }
//
//    public function privacy_policy() {
//        $data['metadata'] = "privacy_policy";
//        $data['template'] = "privacy_policy";
//        $data['name'] = "Privacy Policy";
//        $data['policy'] = $this->services->get_privacy_policy();
//        $this->layout($data);
//    }
    public function services() {
        $data['title'] = "Shifting Service";
        $data['services'] = $this->services->getShiftingServices();
        $data['slider'] = true;
        $data['slider_details'] = true;
        $data['slider_heading'] = 'Shifting Service';
        $data['slider_description'] = 'The ShiftMe.in selects the most suitable means of transport according to strict criteria based on cost, reliability and the minimization of damage to the environment. These Shifting services are available across India. We provide PAN India solution.';
        $data['services'] = $this->services->getShiftingServices();
        $data['view'] = "shifting";
        $this->frontendLayout($data);
        
    }
    public function vehicles() {
        $data['metadata'] = "Vehicle";
        $data['title'] = "Vehicle Services";
        $data['view'] = "vehicle";
        $data['name'] = "Vehicle";
        $data['slider'] = true;
        $data['slider_details'] = true;
        $data['slider_heading'] = 'Vehicle Service';
        $data['slider_description'] = 'We offer customized logistics solutions for individuals and enterprises to suit their
                                requirements. We have different sized vehicles from Tata ace, Piaggio Ape, Pick-up, Tata 407, Mahindra Champion, Eicher 14 feet, 17 feet and 19 feet trucks and many more as per the
                                requirements of our customers with a standardized and economical pricing. Our customers do not need to haggle for the rates with the drivers anymore.';
        $data['services'] = $this->services->getVehicleServices();
        $data['vehicle'] = $this->user->vehicle_list();
        $this->frontendLayout($data);
    }
    public function aboutus() {
        $data['metadata'] = "About us";
        $data['title'] = "About us";
        $data['view'] = "aboutus";
        $data['name'] = "About us";
        $data['slider'] = true;
        $data['slider_details'] = true;
        $data['slider_heading'] = 'About us';
        $data['slider_description'] = '';
        $data['result'] = $this->services->getabout();
        $data['staff'] = $this->services->getstaff();
        $data['clients'] = $this->services->getClients();
        $this->frontendLayout($data);
    }
    public function faq() {
        $data['metadata'] = "FAQ";
        $data['title'] = "FAQ";
        $data['view'] = "faq";
        $data['name'] = "FAQ";
        $data['slider'] = true;
        $data['slider_details'] = true;
        $data['slider_heading'] = 'FAQ';
        $data['slider_description'] = '';
        $data['faq'] = $this->services->getfaq();
        $this->frontendLayout($data);
    }

    public function privacy_policy() {
        $data['metadata'] = "Privacy Policy";
        $data['title'] = "Privacy Policy";
        $data['view'] = "privacy_policy";
        $data['name'] = "Privacy Policy";
        $data['slider'] = true;
        $data['slider_details'] = true;
        $data['slider_heading'] = 'Privacy Policy';
        $data['slider_description'] = '';
        $data['policy'] = $this->services->get_privacy_policy();
        $this->frontendLayout($data);
    }
    
    public function cms() {
        $segment = $this->uri->segment(2);
        $cmsDetails = $this->CMSPage->getCMSPageBySlug($segment);
        if(!empty($cmsDetails)){
            $data['cmsDetails'] = $cmsDetails;
        }else{
            $data['cmsDetails'] = '';
        }
        $data['title'] = !empty($cmsDetails)?$cmsDetails['title']:'';
        $data['view'] = "cms_page";
        $data['name'] = !empty($cmsDetails)?$cmsDetails['title']:'';
        $data['slider'] = true;
        $data['slider_details'] = true;
        $data['slider_heading'] = !empty($cmsDetails)?$cmsDetails['title']:'';
        $data['slider_description'] = !empty($cmsDetails)?$cmsDetails['title']:'';
        $this->frontendLayout($data);
    }
    
}
