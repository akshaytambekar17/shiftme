<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Admin_model
 *
 * @author comc
 */
class QuickEnquiryModel extends MY_Model {

    //put your code here
    public function __construct() {
        parent::__construct();
    }
    public function getQuickEnquires() {
        $result = $this->db->get('trans_quick_enquiry')->result_array();
        return $result;
    }
    public function getQuickEnquiryById($id) {
        $this->db->where('id',$id);
        $result = $this->db->get('trans_quick_enquiry')->row_array();
        return $result;
    }
    public function getQuickEnquiresByNotView() {
        $this->db->where('is_view',0);
        $result = $this->db->get('trans_quick_enquiry')->result_array();
        return $result;
    }
    public function insert($data){
        $this->db->trans_start();
        $this->db->insert('trans_quick_enquiry', $data);
        $this->db->trans_complete();
        return true;
    }
    public function update($data){
        if(!empty($data['id'])){
            $this->db->where('id',$data['id']);
        }
        $this->db->update('trans_quick_enquiry',$data);
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
    public function delete($id) {
        $this->db->where('id',$id);
        $this->db->delete('trans_quick_enquiry'); 
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
}
