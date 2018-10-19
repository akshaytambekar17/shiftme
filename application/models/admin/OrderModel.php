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
        $this->db->select('to.id as order_id,to.*,tu.*,tq.*');
        $this->db->from('trans_order to');
        $this->db->join('trans_user_login tu','tu.user_id = to.user_id');
        $this->db->join('trans_quotation tq','tq.id = to.quotation_id');
        $this->db->order_by('to.id','DESC');
        $query=$this->db->get();
        $data= $query->result_array();
        return $data;
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
