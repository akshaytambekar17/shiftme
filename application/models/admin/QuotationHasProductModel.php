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
class QuotationHasProductModel extends MY_Model {

    //put your code here
    public function __construct() {
        parent::__construct();
    }
    
    public function getQuotationsHasProduct() {
        $this->db->order_by('id','DESC');
        return $this->db->get('trans_quotation_has_product')->result_array();
    }
    public function getQuotationsHasProductById($id) {
        $this->db->where('id',$id);
        return $this->db->get('trans_quotation_has_product')->row_array();
    }
    public function getQuotationsHasProductByQuotationId($id) {
        $this->db->where('quotation_id',$id);
        return $this->db->get('trans_quotation_has_product')->result_array();
    }
    public function getQuotationsHasProductByProductId($id) {
        $this->db->where('product_id',$id);
        return $this->db->get('trans_quotation_has_product')->result_array();
    }
    
    public function insert($data){
        $this->db->trans_start();
        $this->db->insert('trans_quotation_has_product', $data);
        $this->db->trans_complete();
        return true;
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
