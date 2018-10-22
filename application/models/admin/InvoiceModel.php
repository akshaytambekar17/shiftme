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
class InvoiceModel extends MY_Model {

    //put your code here
    public function __construct() {
        parent::__construct();
    }
    
    public function getInvoices() {
        $this->db->select('ti.id as invoice_id,to.*,tq.*');
        $this->db->from('trans_invoice ti');
        $this->db->join('trans_order to','to.id = ti.order_id');
        $this->db->join('trans_quotation tq','tq.id = to.quotation_id');
        $this->db->order_by('ti.id','DESC');
        $query=$this->db->get();
        $data= $query->result_array();
        return $data;
    }
    public function insert($data){
        $this->db->trans_start();
        $this->db->insert('trans_invoice', $data);
        $this->db->trans_complete();
        return true;
    }
    public function delete($id) {
        $this->db->where('id',$id);
        $this->db->delete('trans_invoice'); 
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
}
