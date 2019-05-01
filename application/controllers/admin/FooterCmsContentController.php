<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Admin_controller
 *
 * @author Pravinkumar
 */
class FooterCmsContentController extends MY_Controller {

    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->helper('message');
        $this->load->model('admin/CMSPageModel','CMSPage');
    }
    public function index(){
        $this->data['footerCmsContentList'] = $this->FooterCmsContent->getFooterCmsContents();
        $this->data['template'] = "FooterCmsContent/list";
        $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => '#', 'page' => "Footer CMS Content"));
        $this->admin_layout($this->data);
    }
    public function add(){
        $this->data['footerCmsContentList'] = $this->FooterCmsContent->getFooterCmsContents();
        $this->data['cmsPageList'] = $this->CMSPage->getCMSPages();
        $this->data['template'] = "FooterCmsContent/form_data";
        $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' =>  site_url('admin/footer-cms-content'), 'page' => "Footer CMS Content"),array('link' => '#', 'page' => 'Add Footer CMS Content'));
        if($this->input->post()){
            $post = $this->input->post();
            $this->form_validation->set_rules('cms_id', 'CMS Page', 'trim|required');
            $this->form_validation->set_rules('name', 'Footer CMS Content Name', 'trim|required');
            
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            
            if($this->form_validation->run() == TRUE){
                $details = $post;
                $cmsPageDetails = $this->CMSPage->getCMSPageById($details['cms_id']);
                
                $details['cms_slug'] = $cmsPageDetails['slug'];
                $details['created_at'] = date('Y-m-d H:i:s');
                $details['updated_at'] = date('Y-m-d H:i:s');
                $result = $this->FooterCmsContent->add($details);
                if($result){
                    $this->session->set_flashdata('Message', 'Footer CMS Content has been added Succesfully');
                    return redirect('admin/footer-cms-content', 'refresh');
                }else{
                    $this->session->set_flashdata('Error', 'Something went wrong, Please try again');
                    $this->admin_layout($this->data);
                }
            }else{
                $this->admin_layout($this->data);
            }
        }else{
            $this->admin_layout($this->data);
        }
    }
    public function update(){
        $get = $this->input->get();
        
        $this->data['cmsPageList'] = $this->CMSPage->getCMSPages();
        if(!empty($get['id'])){
            $footerCmsContentDetails = $this->FooterCmsContent->getFooterCmsContentById($get['id']);
            $this->data['footerCmsContentDetails'] = $footerCmsContentDetails;
            $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' =>  site_url('admin/footer-cms-content'), 'page' => "Footer CMS Content"),array('link' => '#', 'page' => $footerCmsContentDetails['name']));
        }
        $this->data['footerCmsContentList'] = $this->FooterCmsContent->getFooterCmsContents();
        $this->data['template'] = "FooterCmsContent/form_data";
        
        if($this->input->post()){
            $post = $this->input->post();
            
            $this->form_validation->set_rules('cms_id', 'CMS Page', 'trim|required');
            $this->form_validation->set_rules('name', 'Footer CMS Content Name', 'trim|required');
            
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            if($this->form_validation->run() == TRUE){
                $details = $post;
                
                $cmsPageDetails = $this->CMSPage->getCMSPageById($details['cms_id']);
                
                $details['cms_slug'] = $cmsPageDetails['slug'];
                $details['updated_at'] = date('Y-m-d H:i:s');
                $result = $this->FooterCmsContent->update($details);
                
                if($result){
                    $this->session->set_flashdata('Message', 'Footer CMS Content has been updated Succesfully');
                    return redirect('admin/footer-cms-content', 'refresh');
                }else{
                    $this->session->set_flashdata('Error', 'Something went wrong, Please try again');
                    $footerCmsContentDetails = $this->FooterCmsContent->getFooterCmsContentById($details['id']);
                    $this->data['footerCmsContentDetails'] = $footerCmsContentDetails;
                    $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' =>  site_url('admin/footer-cms-content'), 'page' => "Footer CMS Content"),array('link' => '#', 'page' => $footerCmsContentDetails['name']));
                    $this->admin_layout($this->data);
                }
                
            }else{
                $footerCmsContentDetails = $this->FooterCmsContent->getFooterCmsContentById($details['id']);
                $this->data['footerCmsContentDetails'] = $footerCmsContentDetails;
                $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' =>  site_url('admin/footer-cms-content'), 'page' => "Footer CMS Content"),array('link' => '#', 'page' => $footerCmsContentDetails['name']));
                $this->admin_layout($this->data);
            }
        }else{
            $this->admin_layout($this->data);
        }
    }
    
    public function delete(){
        $post = $this->input->post();
        $result = $this->FooterCmsContent->delete($post['id']);
        if($result){
            echo true;
        }else{
            echo false;
        }
   }
}
