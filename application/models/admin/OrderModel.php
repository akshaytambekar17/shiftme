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
class OrderModel extends MY_Model {

    //put your code here
    public function __construct() {
        parent::__construct();
    }
    
    public function getOrders() {
        $this->db->select('to.id as order_id,to.*,tu.*,tq.*,to.status as order_status');
        $this->db->from('trans_order to');
        $this->db->join('trans_user_login tu','tu.user_id = to.user_id');
        $this->db->join('trans_quotation tq','tq.id = to.quotation_id');
        $this->db->order_by('to.id','DESC');
        $query=$this->db->get();
        $data= $query->result_array();
        return $data;
    }
    public function getOrdersByUserId($user_id) {
        $this->db->select('to.id as order_id,to.*,tu.*,tq.*,to.status as order_status');
        $this->db->from('trans_order to');
        $this->db->join('trans_user_login tu','tu.user_id = to.user_id');
        $this->db->join('trans_quotation tq','tq.id = to.quotation_id');
        $this->db->where('to.user_id',$user_id);
        $this->db->order_by('to.id','DESC');
        $query=$this->db->get();
        $data= $query->result_array();
        return $data;
    }
    public function getOrderById($id) {
        $this->db->where('id',$id);
        return $this->db->get('trans_order')->row_array();
    }
    public function getOrderByIdWithQuotation($id) {
        $this->db->select('to.id as order_id,to.*,tu.*,tq.*,to.status as order_status');
        $this->db->from('trans_order to');
        $this->db->join('trans_user_login tu','tu.user_id = to.user_id');
        $this->db->join('trans_quotation tq','tq.id = to.quotation_id');
        $this->db->where('to.id',$id);
        return $this->db->get()->row_array();
    }
    public function getOrderCompleted() {
        $this->db->where('status',2);
        return $this->db->get('trans_order')->result_array();
    }
    public function getOrderPending() {
        $this->db->where('status',1);
        return $this->db->get('trans_order')->result_array();
    }
    
    public function add($data){
        $this->db->insert('trans_order', $data);
        $last_id = $this->db->insert_id();
        $order_no = "ORDER00".$last_id;
        $data_update = array('id' => $last_id,
                             'order_no' => $order_no
                            );
        $this->update($data_update);
        return $last_id;
    }
    public function update($data){
        $this->db->where('id',$data['id']);
        $this->db->update('trans_order',$data);
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
    public function delete($id) {
        $this->db->where('id',$id);
        $this->db->delete('trans_order'); 
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
}
