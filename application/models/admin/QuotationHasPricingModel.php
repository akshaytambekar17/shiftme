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
class QuotationHasPricingModel extends MY_Model {

    //put your code here
    public function __construct() {
        parent::__construct();
    }
    
    public function getQuotationsHasPricing() {
        $this->db->order_by('id','DESC');
        return $this->db->get('trans_quotation_pricing')->result_array();
    }
    public function getQuotationsHasPricingById($id) {
        $this->db->where('id',$id);
        return $this->db->get('trans_quotation_pricing')->row_array();
    }
    public function getQuotationsHasPricingByQuotationId($id) {
        $this->db->where('quotation_id',$id);
        return $this->db->get('trans_quotation_pricing')->result_array();
    }
    
    public function insert($data){
        $this->db->trans_start();
        $this->db->insert('trans_quotation_pricing', $data);
        $this->db->trans_complete();
        return true;
    }
    public function delete($id) {
        $this->db->where('id',$id);
        $this->db->delete('trans_quotation_pricing'); 
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
    public function deleteByQuotationId($quotation_id) {
        $this->db->where('quotation_id',$quotation_id);
        $this->db->delete('trans_quotation_pricing'); 
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
}
