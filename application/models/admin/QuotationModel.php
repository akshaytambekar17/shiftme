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
class QuotationModel extends MY_Model {

    //put your code here
    public function __construct() {
        parent::__construct();
    }
    
    public function getQuotations() {
        $this->db->order_by('id','DESC');
        return $this->db->get('trans_quotation')->result_array();
    }
    public function getQuotationByIdWithPrice($id) {
        $this->db->select('tq.*,tqp.quotation_id,tqp.quotation_id,tqp.products_total_amount,tqp.distance_amount,tqp.vehicle_amount,tqp.discount,tqp.total_amount');
        $this->db->from('trans_quotation tq');
        $this->db->join('trans_quotation_pricing tqp','tqp.quotation_id=tq.id');
        $this->db->where('tq.id',$id);
        return $this->db->get()->row_array();
    }
    public function getQuotationById($id) {
        $this->db->where('id',$id);
        return $this->db->get('trans_quotation')->row_array();
    }
    public function getQuotationByUserId($user_id) {
        $this->db->where('user_id',$user_id);
        $this->db->where('is_send_user',1);
        return $this->db->get('trans_quotation')->result_array();
    }
    
    public function add($data){
        $this->db->insert('trans_quotation', $data);
        $last_id = $this->db->insert_id();
        $result = $this->getQuotationById($last_id);
        $quotation_no = "QUOTE00".$result['id'];
        $data_update = array('id' => $result['id'],
                             'quotation_no' => $quotation_no
                            );
        $this->update($data_update);
        return $last_id;
    }
    public function update($data){
        $this->db->where('id',$data['id']);
        $this->db->update('trans_quotation',$data);
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }

    public function delete($id) {
        $this->db->where('id',$id);
        $this->db->delete('trans_quotation'); 
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
}
