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
class FooterCmsContentModel extends MY_Model {

    //put your code here
    public function __construct() {
        parent::__construct();
    }
    
    public function getFooterCmsContents() {
        $this->db->select('tfcc.id as footer_cms_content_id,tfcc.*,tcp.*');
        $this->db->from('trans_footer_cms_content tfcc');
        $this->db->join('trans_cms_page tcp','tcp.id = tfcc.cms_id');
        $this->db->order_by('tfcc.id','DESC');
        return $this->db->get()->result_array();
    }
    public function getFooterCmsContentById($id) {
        $this->db->select('tfcc.id as footer_cms_content_id,tfcc.*,tcp.*');
        $this->db->from('trans_footer_cms_content tfcc');
        $this->db->join('trans_cms_page tcp','tcp.id = tfcc.cms_id');
        $this->db->where('tfcc.id',$id);
        return $this->db->get()->row_array();
    }
    public function getFooterCmsContentByCmsId($cmsId) {
        $this->db->select('tfcc.id as footer_cms_content_id,tfcc.*,tcp.*');
        $this->db->from('trans_footer_cms_content tfcc');
        $this->db->join('trans_cms_page tcp','tcp.id = tfcc.cms_id');
        $this->db->where('tfcc.cms_id',$cmsId);
        return $this->db->get()->row_array();
    }
    
    public function add($data){
        $this->db->insert('trans_footer_cms_content', $data);
        $last_id = $this->db->insert_id();
        return $last_id;
    }
    public function update($updateData){
        if(!empty($updateData['id'])){
            $this->db->where('id',$updateData['id']);
        }
        $this->db->update('trans_footer_cms_content',$updateData);
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }

    public function delete($id) {
        $this->db->where('id',$id);
        $this->db->delete('trans_footer_cms_content'); 
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
}
