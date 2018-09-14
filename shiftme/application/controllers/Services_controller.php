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

}
