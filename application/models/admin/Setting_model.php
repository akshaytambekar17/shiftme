<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Setting_model
 *
 * @author isaq
 */
class Setting_model extends MY_Model {

    //put your code here
    public function __construct() {
        parent::__construct();
        $this->load->model('Ion_auth_model', 'ion');
    }
   
    public function saveShifting($data) {
        if ($this->db->insert('shifting', $data)) {
            return TRUE;
        } else {
            return false;
        }
    }
    
    public function getShiftingData() {
        
       return $this->getResult($this->db->get_where('shifting', array('status' => 'Active')));
    }
    
    public function getShiftingById($id) {
        return $this->getResult($this->db->get_where('shifting', array('id' => $id)));
    }
//    public function getTutorialById($id) {
//        return $this->getResult($this->db->get_where('tutorial', array('id' => $id)));
//    }
//    public function getSubByTopicId($topicId) {
//        return $this->getResult($this->db->get_where('sub_topics', array('topic_id' => $topicId)));
//    }
    
    public function updateshifting($data, $id) {
        if ($this->db->update('shifting', $data, array('id' => $id))) {
            return TRUE;
        } else {
            return false;
        }
    }
    public function getShiftingDetail($id) {
        $this->db->trans_begin();
        $rs = $this->getWhere('shifting', '*', array('id' => $id, 'status' => 'Active'));
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return FALSE;
        } else {
            $this->db->trans_commit();
            if ($rs) {
                $rs = $this->getJSONFilterd($rs->result());
               
                return $rs[0];
            } else {
                return false;
            }
        }
    }
    
    //labour
     public function saveLabour($data) {
        if ($this->db->insert('labour', $data)) {
            return TRUE;
        } else {
            return false;
        }
    }
    
    public function getLabourData() {
        
       return $this->getResult($this->db->get_where('labour', array('status' => 'Active')));
    }
    
    public function getLabourById($id) {
        return $this->getResult($this->db->get_where('labour', array('id' => $id)));
    }
    public function updateLabour($data, $id) {
        if ($this->db->update('labour', $data, array('id' => $id))) {
            return TRUE;
        } else {
            return false;
        }
    }
    
    //vehicle
    
    public function saveVehicle($data) {
        if ($this->db->insert('vehicle_services', $data)) {
            return TRUE;
        } else {
            return false;
        }
    }
    
    public function getVehicleDetailById($id) {
        return $this->getResult($this->db->get_where('vehicle_services', array('id' => $id)));
    }
    public function updateVehicle($data, $id) {
        if ($this->db->update('vehicle_services', $data, array('id' => $id))) {
            return TRUE;
        } else {
            return false;
        }
    }
    
    public function getEnquiryDetailById($id) {
        return $this->getResult($this->db->get_where('user_inquery', array('id' => $id)));
    }
    
    public function updateEnquiry($data, $id) {
        if ($this->db->update('user_inquery', $data, array('id' => $id))) {
            return TRUE;
        } else {
            return false;
        }
    }
    
    public function saveTestimonial($data) {
        if ($this->db->insert('testimonials', $data)) {
            return TRUE;
        } else {
            return false;
        }
    }
    
    public function gettestimonialsById($id) {
        return $this->getResult($this->db->get_where('testimonials', array('id' => $id)));
    }
    public function updateTestimonials($data, $id) {
        
        if ($this->db->update('testimonials', $data, array('id' => $id))) {
            return TRUE;
        } else {
            return false;
        }
    }
    public function updateFooterContent($data, $id) {
  
        if ($this->db->update('footer_content', $data, array('footer_id' => $id))) {
            return TRUE;
        } else {
            return false;
        }
    }
    
    public function getVehicles() {
        return $this->getResult($this->db->get_where('vehicle_services', array('status' => 'Active')));
    }
    public function getFooterContentById($id) {
        return $this->db->get_where('footer_content', array('footer_id' => $id))->Row();
    }
    public function getFooterContent() {
        return $this->db->get_where('footer_content')->Row();
    }
    public function Quote_delete($id) {
        $this->db->where('id', $id);
        return $this->db->delete('qoute');
    }
    public function getFAQById($id) {
        return $this->db->get_where('faq', array('faq_id' => $id))->Row();
    }
    public function updatefaq($data, $id) {
        if ($this->db->update('faq', $data, array('faq_id' => $id))) {
            return TRUE;
        } else {
            return false;
        }
    }
    public function getPrivacy_PolicyById($id) {
        return $this->db->get_where('privacy_policy', array('policy_id' => $id))->Row();
    }
    public function updatePrivacy_Policy($data, $id) {
        if ($this->db->update('privacy_policy', $data, array('policy_id' => $id))) {
            return TRUE;
        } else {
            return false;
        }
    }
    
    public function change_status(){
        if ($this->db->update('user_inquery', array('status' => $_POST['status_name']), array('id' => $_POST['id']))) {
            return TRUE;
        } else {
            return false;
        }
    }
}
