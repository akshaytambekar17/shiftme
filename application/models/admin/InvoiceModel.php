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
        $this->db->select('ti.id as invoice_id,ti.*,to.*,tq.*');
        $this->db->from('trans_invoice ti');
        $this->db->join('trans_order to','to.id = ti.order_id');
        $this->db->join('trans_quotation tq','tq.id = to.quotation_id');
        $this->db->order_by('ti.id','DESC');
        $query=$this->db->get();
        $data= $query->result_array();
        return $data;
    }
    public function getInvoiceById($id) {
        $this->db->where('id',$id);
        return $this->db->get('trans_invoice')->row_array();
    }
    public function getInvoiceByIdWithQuotationOrder($id) {
        $this->db->select('ti.id as invoice_id,ti.*,to.*,tq.*');
        $this->db->from('trans_invoice ti');
        $this->db->join('trans_order to','to.id = ti.order_id');
        $this->db->join('trans_quotation tq','tq.id = to.quotation_id');
        $this->db->where('ti.id',$id);
        return $this->db->get()->row_array();
    }
    public function insert($data){
        $this->db->insert('trans_invoice', $data);
        $last_id = $this->db->insert_id();
        $invoice_no = "INVOICE00".$last_id;
        $data_update = array('id' => $last_id,
                             'invoice_no' => $invoice_no
                            );
        $this->update($data_update);
        return $last_id;
    }
    public function update($updateData){
        $this->db->where('id',$updateData['id']);
        $this->db->update('trans_invoice',$updateData);
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
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
