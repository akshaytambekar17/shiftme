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
class CMSPageModel extends MY_Model {

    //put your code here
    public function __construct() {
        parent::__construct();
    }
    
    public function getCMSPages() {
        return $this->db->get('trans_cms_page')->result_array();
    }
    public function getCMSPageById($id) {
        $this->db->where('id',$id);
        return $this->db->get('trans_cms_page')->row_array();
    }
    public function insert($data){
        $this->db->insert('trans_cms_page', $data);
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
    public function update($updateData){
        $this->db->where('id',$updateData['id']);
        $this->db->update('trans_cms_page',$updateData);
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
    public function delete($id) {
        $this->db->where('id',$id);
        $this->db->delete('trans_cms_page'); 
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
}
