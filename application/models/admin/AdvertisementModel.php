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
class AdvertisementModel extends MY_Model {

    //put your code here
    public function __construct() {
        parent::__construct();
    }
    
    public function getAdvertisements() {
        $this->db->order_by('id','DESC');
        return $this->db->get('trans_advertisement')->result_array();
    }
    
    public function getAdvertisementById( $id ) {
        $this->db->where('id',$id);
        return $this->db->get('trans_advertisement')->row_array();
    }
    
    public function getLatestActiveAdvertisement() {
        $this->db->where('status',2);
        $this->db->order_by('id','desc');
        return $this->db->get('trans_advertisement')->row_array();
    }
    
    public function add( $data ){
        
        $this->db->insert('trans_advertisement', $data);
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
    public function update( $updateData ){
        $this->db->where('id',$updateData['id']);
        $this->db->update('trans_advertisement',$updateData);
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
    public function delete( $id ) {
        $this->db->where('id',$id);
        $this->db->delete('trans_advertisement'); 
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
}
