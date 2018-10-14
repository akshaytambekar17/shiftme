<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Services_model
 *
 * @author comc
 */
class Services_model extends MY_Model {
    //put your code here
     public function __construct() {
        parent::__construct();
    }

    public function getShiftingServices(){
        return $this->getResult($this->db->get_where('shifting', array('status' => 'Active')));
    }
    public function getLabourServices(){
        return $this->getResult($this->db->get_where('labour', array('status' => 'Active')));
    }
    
    public function getVehicleServices(){
        return $this->getResult($this->db->get_where('vehicle_services', array('status' => 'Active')));
    }
    
    public function getabout(){
        return $this->db->get('trans_aboutus')->result_array();
    }
    public function getstaff(){
        return $this->getResult($this->db->get_where('trans_our_stuff', array('status' => 'Active')));
    }
    public function getClients(){
        return $this->getResult($this->db->get_where('trans_clients', array('status' => 'Active')));
    }
    public function getfaq(){
        return $this->db->get('faq')->result_array();
    }
    public function get_privacy_policy(){
        return $this->db->get('privacy_policy')->result_array();
    }
}
