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
class ProductListModel extends MY_Model {

    //put your code here
    public function __construct() {
        parent::__construct();
    }
    
    public function getProductsList() {
        $this->db->order_by('id','DESC');
        return $this->db->get('trans_product_list')->result_array();
    }
    public function getProductListById($id) {
        $this->db->where('id',$id);
        return $this->db->get('trans_product_list')->row_array();
    }
    
    public function add($data){
        $this->db->trans_start();
        $this->db->insert('trans_product_list', $data);
        $this->db->trans_complete();
        return true;
    }
    public function update($data){
        $this->db->where('id',$data['id']);
        $this->db->update('trans_product_list', $data);
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
    public function delete($id) {
        $this->db->where('id',$id);
        $this->db->delete('trans_product_list'); 
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
}
