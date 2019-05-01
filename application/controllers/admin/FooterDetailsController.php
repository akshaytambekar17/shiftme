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
class FooterDetailsController extends MY_Controller {

    //put your code here
    function __construct() {
        parent::__construct();
        $this->load->helper('message');
    }
    public function index(){
        $this->data['footerDetailsList'] = $this->FooterDetails->getFooterDetails();
        $this->data['template'] = "FooterDetails/list";
        $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => '#', 'page' => "Footer Details"));
        $this->admin_layout($this->data);
    }
    public function add(){
        $this->data['template'] = "FooterDetails/form_data";
        $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' =>  site_url('admin/footer-details'), 'page' => "Footer Details"),array('link' => '#', 'page' => 'Add Footer Details'));
        if($this->input->post()){
            $post = $this->input->post();
            $this->form_validation->set_rules('company_address', 'Company Address', 'trim|required');
            $this->form_validation->set_rules('company_phone_number', 'Company Phone Number', 'trim|required');
            $this->form_validation->set_rules('company_email_id', 'Company Email Id', 'trim|required');
            $this->form_validation->set_rules('company_facebook_link', 'Facebook Link', 'trim|required');
            $this->form_validation->set_rules('company_twitter_link', 'Twitter Link', 'trim|required');
            $this->form_validation->set_rules('company_instagram_link', 'Instagram Link', 'trim|required');
            $this->form_validation->set_rules('company_google_plus_link', 'Google Plus Link', 'trim|required');
            $this->form_validation->set_rules('company_linkedin_link', 'LinkedIn Link', 'trim|required');
            
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            
            if($this->form_validation->run() == TRUE){
                $details = $post;
                $details['created_at'] = date('Y-m-d H:i:s');
                $details['updated_at'] = date('Y-m-d H:i:s');
                $result = $this->FooterDetails->add($details);
                if($result){
                    $this->session->set_flashdata('Message', 'Footer Details has been added Succesfully');
                    return redirect('admin/footer-details', 'refresh');
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
        $this->data['template'] = "FooterDetails/form_data";
        $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' =>  site_url('admin/footer-details'), 'page' => "Footer Details"),array('link' => '#', 'page' => 'Update Footer Details'));
        
        if($this->input->post()){
            $post = $this->input->post();
            
            $this->form_validation->set_rules('company_address', 'Company Address', 'trim|required');
            $this->form_validation->set_rules('company_phone_number', 'Company Phone Number', 'trim|required');
            $this->form_validation->set_rules('company_email_id', 'Company Email Id', 'trim|required');
            $this->form_validation->set_rules('company_facebook_link', 'Facebook Link', 'trim|required');
            $this->form_validation->set_rules('company_twitter_link', 'Twitter Link', 'trim|required');
            $this->form_validation->set_rules('company_instagram_link', 'Instagram Link', 'trim|required');
            $this->form_validation->set_rules('company_google_plus_link', 'Google Plus Link', 'trim|required');
            $this->form_validation->set_rules('company_linkedin_link', 'LinkedIn Link', 'trim|required');
            
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            if($this->form_validation->run() == TRUE){
                $details = $post;
                    
                $details['updated_at'] = date('Y-m-d H:i:s');
                $result = $this->FooterDetails->update($details);
                
                if($result){
                    $this->session->set_flashdata('Message', 'Footer Details has been updated Succesfully');
                    return redirect('admin/footer-details', 'refresh');
                }else{
                    $this->session->set_flashdata('Error', 'Something went wrong, Please try again');
                    $footerDetails = $this->FooterDetails->getFooterDetailsById($post['id']);
                    $this->data['footerDetails'] = $footerDetails;
                    $this->admin_layout($this->data);
                }
                
            }else{
                $footerDetails = $this->FooterDetails->getFooterDetailsById($post['id']);
                $this->data['footerDetails'] = $footerDetails;
                $this->admin_layout($this->data);
            }
        }else{
            $footerDetails = $this->FooterDetails->getFooterDetailsById($get['id']);
            $this->data['footerDetails'] = $footerDetails;
            $this->admin_layout($this->data);
        }
    }
    
    public function delete(){
        $post = $this->input->post();
        $result = $this->CMSPageModel->delete($post['id']);
        if($result){
            echo true;
        }else{
            echo false;
        }
   }
}
