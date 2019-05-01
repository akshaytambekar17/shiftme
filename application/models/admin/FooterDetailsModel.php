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
class FooterDetailsModel extends MY_Model {

    //put your code here
    public function __construct() {
        parent::__construct();
    }
    
    public function getFooterDetails() {
        $this->db->order_by('id','DESC');
        return $this->db->get('trans_footer_details')->row_array();
    }
    public function getFooterDetailsById($id) {
        $this->db->where('id',$id);
        return $this->db->get('trans_footer_details')->row_array();
    }
    
    public function add($data){
        $this->db->insert('trans_footer_details', $data);
        $last_id = $this->db->insert_id();
        return $last_id;
    }
    public function update($updateData){
        if(!empty($updateData['id'])){
            $this->db->where('id',$updateData['id']);
        }
        $this->db->update('trans_footer_details',$updateData);
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }

    public function delete($id) {
        $this->db->where('id',$id);
        $this->db->delete('trans_footer_details'); 
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
}
