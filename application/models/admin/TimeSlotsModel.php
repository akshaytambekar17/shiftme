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
class TimeSlotsModel extends MY_Model {

    //put your code here
    public function __construct() {
        parent::__construct();
    }
    
    public function getTimeSlots() {
        return $this->db->get('trans_time_slots')->result_array();
    }
    public function insert($data){
        $this->db->trans_start();
        $this->db->insert('trans_invoice', $data);
        $this->db->trans_complete();
        return true;
    }
    public function delete($id) {
        $this->db->where('id',$id);
        $this->db->delete('trans_invoice'); 
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
}
