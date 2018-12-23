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
class EnquiryModel extends MY_Model {

    //put your code here
    public function __construct() {
        parent::__construct();
    }
    
    public function getEnquires() {
        $this->db->select('te.id as enquiry_id,tq.*');
        $this->db->from('trans_enquiry te');
        $this->db->join('trans_quotation tq','tq.id = te.quotation_id');
        $this->db->order_by('te.id','DESC');
        $query=$this->db->get();
        $data= $query->result_array();
        return $data;
    }
    public function getEnquiresByNotRead() {
        $this->db->select('te.id as enquiry_id,tq.*');
        $this->db->from('trans_enquiry te');
        $this->db->join('trans_quotation tq','tq.id = te.quotation_id');
        $this->db->where('te.is_read',0);
        $this->db->order_by('te.id','DESC');
        $query=$this->db->get();
        $data= $query->result_array();
        return $data;
    }
    public function getEnquiryByUserId($user_id) {
        $this->db->select('te.id as enquiry_id,tq.*');
        $this->db->from('trans_enquiry te');
        $this->db->join('trans_quotation tq','tq.id = te.quotation_id');
        $this->db->where('te.user_id',$user_id);
        $this->db->order_by('te.id','DESC');
        $query=$this->db->get();
        $data= $query->result_array();
        return $data;
    }
    public function insert($data){
        $this->db->trans_start();
        $this->db->insert('trans_enquiry', $data);
        $this->db->trans_complete();
        return true;
    }
    public function update($data){
        if(!empty($data['id'])){
            $this->db->where('id',$data['id']);
        }
        $this->db->update('trans_enquiry',$data);
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
    public function delete($id) {
        $this->db->where('id',$id);
        $this->db->delete('trans_enquiry'); 
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
}
