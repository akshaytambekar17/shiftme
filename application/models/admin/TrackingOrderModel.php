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
class TrackingOrderModel extends MY_Model {

    //put your code here
    public function __construct() {
        parent::__construct();
    }
    
    public function getTrackingOrders() {
        $this->db->select('tto.id as track_id,tto.*, to.*,tu.*');
        $this->db->from('trans_tracking_order tto');
        $this->db->join('trans_user_login tu','tu.user_id = tto.user_id','left');
        $this->db->join('trans_order to','to.id = tto.order_id','left');
        $this->db->order_by('tto.id','DESC');
        $result = $this->db->get()->result_array();
        return $result;
    }
    public function getTrackingOrderById($id) {
        $this->db->select('tto.id as track_id,tto.*, to.*,tu.*');
        $this->db->from('trans_tracking_order tto');
        $this->db->join('trans_user_login tu','tu.user_id = tto.user_id','left');
        $this->db->join('trans_order to','to.id = tto.order_id','left');
        $this->db->where('tto.id',$id);
        return $this->db->get()->row_array();
    }
    public function getTrackingOrderByOrderId($order_id){
        $this->db->where('order_id',$order_id);
        return $this->db->get('trans_tracking_order')->row_array();
    }
    public function insert($data){
        $this->db->insert('trans_tracking_order', $data);
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
    public function update($updateData){
        $this->db->where('id',$updateData['id']);
        $this->db->update('trans_tracking_order',$updateData);
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
    public function delete($id) {
        $this->db->where('id',$id);
        $this->db->delete('trans_tracking_order'); 
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
}
