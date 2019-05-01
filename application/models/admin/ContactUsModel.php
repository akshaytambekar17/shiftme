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
class ContactUsModel extends MY_Model {

    //put your code here
    public function __construct() {
        parent::__construct();
    }
    
    public function getContacts() {
        $this->db->order_by('id','DESC');
        $query=$this->db->get('trans_contactus');
        $data= $query->result_array();
        return $data;
    }
    public function getContactsByNotRead() {
        $this->db->where('is_read',0);
        $this->db->order_by('id','DESC');
        $query=$this->db->get('trans_contactus');
        $data= $query->result_array();
        return $data;
    }
    public function insert($data){
        $this->db->trans_start();
        $this->db->insert('trans_contactus', $data);
        $this->db->trans_complete();
        return true;
    }
    public function update($data){
        if(!empty($data['id'])){
            $this->db->where('id',$data['id']);
        }
        $this->db->update('trans_contactus',$data);
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
    public function delete($id) {
        $this->db->where('id',$id);
        $this->db->delete('trans_contactus'); 
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
}
