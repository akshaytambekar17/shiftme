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
class VendorOrderAssignModel extends MY_Model {

    //put your code here
    public function __construct() {
        parent::__construct();
    }
    
    public function getOrderAssigns() {
        $this->db->select('tvo.*,tv.*,tu.*');
        $this->db->from('trans_vendor_order_assign tvo');
        $this->db->join('trans_vendor tv','tv.uid = tvo.user_id');
        $this->db->join('trans_user_login tu','tu.user_id = tv.uid');
        $this->db->where('tu.role',2);
        $this->db->order_by('tvo.id','DESC');
        $query=$this->db->get();
        $data= $query->result_array();
        return $data;
    }
    public function getOrderAssignById($id) {
        $this->db->select('tvo.*,tv.*,tu.*');
        $this->db->from('trans_vendor_order_assign tvo');
        $this->db->join('trans_vendor tv','tv.uid = tvo.user_id');
        $this->db->join('trans_user_login tu','tu.user_id = tv.uid');
        $this->db->where('tu.role',2);
        $this->db->where('tvo.id',$id);
        return $this->db->get('trans_vendor')->row_array();
    }
    public function getOrderAssignByUserId($user_id) {
        $this->db->select('tvo.*,tv.*,tu.*');
        $this->db->from('trans_vendor_order_assign tvo');
        $this->db->join('trans_vendor tv','tv.uid = tvo.user_id');
        $this->db->join('trans_user_login tu','tu.user_id = tv.uid');
        $this->db->where('tu.role',2);
        $this->db->where('tvo.user_id',$user_id);
        return $this->db->get()->result_array();
    }
    public function getOrderAssignByOrderId($order_id) {
        $this->db->select('tvo.*,tv.*,tu.*');
        $this->db->from('trans_vendor_order_assign tvo');
        $this->db->join('trans_vendor tv','tv.uid = tvo.user_id');
        $this->db->join('trans_user_login tu','tu.user_id = tv.uid');
        $this->db->where('tu.role',2);
        $this->db->where('tvo.order_id',$order_id);
        return $this->db->get()->result_array();
    }
    
    public function insert($data){
        $this->db->insert('trans_vendor_order_assign', $data);
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
    public function update($updateData){
        $this->db->where('id',$updateData['id']);
        $this->db->update('trans_vendor_order_assign',$updateData);
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
    public function delete($id) {
        $this->db->where('id',$id);
        $this->db->delete('trans_vendor_order_assign'); 
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
}
