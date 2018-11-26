<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Services_controller extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Services_model', 'services');
        $this->load->model('User_model', 'user');
//        $this->load->model('Event_model', 'event');
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
    public function aboutus() {
        $data['metadata'] = "Aboutus";
        $data['template'] = "aboutus";
        $data['name'] = "About us";
        $data['result'] = $this->services->getabout();
        $data['staff'] = $this->services->getstaff();
        $data['clients'] = $this->services->getClients();
        $this->layout($data);
    }

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
    
    public function faq() {
        $data['metadata'] = "faq";
        $data['template'] = "faq";
        $data['name'] = "FAQ";
        $data['faq'] = $this->services->getfaq();
        $this->layout($data);
    }

    public function privacy_policy() {
        $data['metadata'] = "privacy_policy";
        $data['template'] = "privacy_policy";
        $data['name'] = "Privacy Policy";
        $data['policy'] = $this->services->get_privacy_policy();
        $this->layout($data);
    }
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
    
}
