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
class VendorModel extends MY_Model {

    //put your code here
    public function __construct() {
        parent::__construct();
    }
    
    public function getVendors() {
        $this->db->select('tv.*,tu.*');
        $this->db->from('trans_vendor tv');
        $this->db->join('trans_user_login tu','tu.user_id = tv.uid');
        $this->db->where('tu.role',2);
        $this->db->order_by('tv.id','DESC');
        $query=$this->db->get();
        $data= $query->result_array();
        return $data;
    }
    public function getVendorById($id) {
        $this->db->select('tv.*,tu.*');
        $this->db->from('trans_vendor tv');
        $this->db->join('trans_user_login tu','tu.user_id = tv.uid');
        $this->db->where('tv.id',$id);
        return $this->db->get('trans_vendor')->row_array();
    }
    public function getVendorByUserId($user_id) {
        $this->db->select('tv.*,tu.*');
        $this->db->from('trans_vendor tv');
        $this->db->join('trans_user_login tu','tu.user_id = tv.uid');
        $this->db->where('tv.uid',$user_id);
        return $this->db->get()->row_array();
    }
    
    public function insert($data){
        $this->db->insert('trans_vendor', $data);
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
    public function update($updateData){
        $this->db->where('id',$updateData['id']);
        $this->db->update('trans_vendor',$updateData);
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
    public function delete($id) {
        $this->db->where('id',$id);
        $this->db->delete('trans_vendor'); 
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
}
