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
class SliderModel extends MY_Model {

    //put your code here
    public function __construct() {
        parent::__construct();
    }
    
    public function getSliders() {
        return $this->db->get('trans_home_slider')->result_array();
    }
    public function getSliderById($id) {
        $this->db->where('id',$id);
        return $this->db->get('trans_home_slider')->row_array();
    }
    public function insert($data){
        $this->db->insert('trans_home_slider', $data);
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
    public function update($updateData){
        $this->db->where('id',$updateData['id']);
        $this->db->update('trans_home_slider',$updateData);
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
    public function delete($id) {
        $this->db->where('id',$id);
        $this->db->delete('trans_home_slider'); 
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
}
