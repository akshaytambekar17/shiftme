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
    public function getQuotationById($id) {
        $this->db->where('id',$id);
        return $this->db->get('trans_quotation')->row_array();
    }
    
    public function add($data){
        $this->db->insert('trans_quotation', $data);
        return $this->db->insert_id();
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
