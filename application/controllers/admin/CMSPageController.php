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
class CMSPageController extends MY_Controller {

//put your code here
    function __construct() {
        parent::__construct();
        $this->load->model('admin/Admin_model');
        $this->load->model('admin/OrderModel');
        $this->load->model('admin/InvoiceModel');
        $this->load->model('admin/SliderModel');
        $this->load->model('admin/CMSPageModel');
        $this->load->library('form_validation');
        $this->load->helper('message');
        $this->load->model('site_model');
        $this->load->model('User_model');
        $this->load->helper(array('url', 'form','email'));
        $this->load->library('session');
        $this->data['filters'] = $this->session->userdata('filters');
    }
    public function index(){
        $this->data['cms_list'] = $this->CMSPageModel->getCMSPages();
        $this->data['template'] = "CMSPages/list";
        $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => '#', 'page' => "CMS Pages"));
        $this->admin_layout($this->data);
    }
    public function add(){
        if($this->input->post()){
            $post = $this->input->post();
            $this->form_validation->set_rules('title', 'Title', 'trim|required');
            $this->form_validation->set_rules('slug', 'Slug', 'trim|required');
            $this->form_validation->set_rules('description', 'Description', 'trim|required');
            $this->form_validation->set_rules('status', 'Select Status', 'trim|required');
            if(empty($_FILES['main_image']['name'])){
                $this->form_validation->set_rules('main_image', 'Main Image', 'trim|required');
            }
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            if($this->form_validation->run() == TRUE){
                $details = $post;
                
                $config['upload_path']          = './assets/cms-images/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 2048;
                $config['max_width']            = 0;
                $config['max_height']           = 0;

                $this->load->library('upload', $config);
                if($this->upload->do_upload('main_image')){
                    $uploadData = $this->upload->data();
                    $main_image = $uploadData['file_name'];
                    $error = '';
                }else{
                    $error = $this->upload->display_errors();
                    $main_image = '';
                }
                for($i=1;$i<=3;$i++){
                    if($this->upload->do_upload('slider'.$i)){
                        $uploadData = $this->upload->data();
                        $slider['slider'.$i] = $uploadData['file_name'];
                        //$error = '';
                    }else{
                        //$error = $this->upload->display_errors();
                        $slider['slider'.$i] = '';
                    }
                }
                if(empty($error)){
                    foreach($slider as $key => $value){
                        $details[$key] = $value;
                    }
                    $details['main_image'] = $main_image;
                    $details['created_at'] = date('Y-m-d H:i:s');
                    $details['updated_at'] = date('Y-m-d H:i:s');
                    $result = $this->CMSPageModel->insert($details);
                    if($result){
                        $this->session->set_flashdata('Message', 'CMS Page has been created Succesfully');
                        return redirect('cms-page', 'refresh');
                    }else{
                        $this->session->set_flashdata('Error', 'Something went wrong, Please try again');
                        $this->data['template'] = "CMSPages/form_data";
                        $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' =>  site_url('cms-page'), 'page' => "CMS Pages"),array('link' => '#', 'page' => 'Create CMS Page'));
                        $this->admin_layout($this->data);
                    }
                }else{
                    $this->session->set_flashdata('Error', $error);
                    $this->data['template'] = "CMSPages/form_data";
                    $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' =>  site_url('cms-page'), 'page' => "CMS Pages"),array('link' => '#', 'page' => 'Create CMS Page'));
                    $this->admin_layout($this->data);
                }
            }else{
                $this->data['template'] = "CMSPages/form_data";
                $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' =>  site_url('cms-page'), 'page' => "CMS Pages"),array('link' => '#', 'page' => 'Create CMS Page'));
                $this->admin_layout($this->data);
            }
            
        }else{
            $this->data['template'] = "CMSPages/form_data";
            $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' =>  site_url('cms-page'), 'page' => "CMS Pages"),array('link' => '#', 'page' => 'Create CMS Page'));
            $this->admin_layout($this->data);
        }
    }
    public function update(){
        $get = $this->input->get();
        if($this->input->post()){
            $post = $this->input->post();
            $this->form_validation->set_rules('title', 'Title', 'trim|required');
            $this->form_validation->set_rules('description', 'Description', 'trim|required');
            $this->form_validation->set_rules('status', 'Select Status', 'trim|required');
            
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            if($this->form_validation->run() == TRUE){
                $details = $post;
                
                $config['upload_path']          = './assets/cms-images/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 2048;
                $config['max_width']            = 0;
                $config['max_height']           = 0;

                $this->load->library('upload', $config);
                if(!empty($_FILES['main_image']['name'])){
                    if($this->upload->do_upload('main_image')){
                        $uploadData = $this->upload->data();
                        $main_image = $uploadData['file_name'];
                        $error = '';
                    }else{
                        $error = $this->upload->display_errors();
                        $main_image = '';
                    }
                }else{
                    $main_image = $details['main_image_hidden'];
                }
                for($i=1;$i<=3;$i++){
                    if(!empty($_FILES['slider'.$i]['name'])){
                        if($this->upload->do_upload('slider'.$i)){
                            $uploadData = $this->upload->data();
                            $slider['slider'.$i] = $uploadData['file_name'];
                            //$error = '';
                        }else{
                            //$error = $this->upload->display_errors();
                            $slider['slider'.$i] = '';
                        }
                    }else{
                        $slider['slider'.$i] = $post['slider'.$i.'_hidden'];
                    }
                }
                if(empty($error)){
                    foreach($slider as $key => $value){
                        $details[$key] = $value;
                    }
                    unset($details['main_image_hidden']);
                    for($i=1;$i<=3;$i++){
                        unset($details['slider'.$i.'_hidden']);
                    }
                    $details['main_image'] = $main_image;
                    $details['updated_at'] = date('Y-m-d H:i:s');
                    //printDie($details);
                    $result = $this->CMSPageModel->update($details);
                    if($result){
                        $this->session->set_flashdata('Message', 'CMS Page has been updated Succesfully');
                        return redirect('cms-page', 'refresh');
                    }else{
                        $this->session->set_flashdata('Error', 'Something went wrong, Please try again');
                        $cms_details = $this->CMSPageModel->getCMSPageById($post['id']);
                        $this->data['cms_details'] = $cms_details;
                        $this->data['template'] = "CMSPages/form_data";
                        $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' =>  site_url('cms-page'), 'page' => "CMS Pages"),array('link' => '#', 'page' => $cms_details['title']));
                        $this->admin_layout($this->data);
                    }
                }else{
                    $this->session->set_flashdata('Error', $error);
                    $cms_details = $this->CMSPageModel->getCMSPageById($post['id']);
                    $this->data['cms_details'] = $cms_details;
                    $this->data['template'] = "CMSPages/form_data";
                    $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' =>  site_url('cms-page'), 'page' => "CMS Pages"),array('link' => '#', 'page' => $cms_details['title']));
                    $this->admin_layout($this->data);
                }
            }else{
                $cms_details = $this->CMSPageModel->getCMSPageById($post['id']);
                $this->data['cms_details'] = $cms_details;
                $this->data['template'] = "CMSPages/form_data";
                $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' =>  site_url('cms-page'), 'page' => "CMS Pages"),array('link' => '#', 'page' => $cms_details['title']));
                $this->admin_layout($this->data);
            }
        }else{
            $cms_details = $this->CMSPageModel->getCMSPageById($get['id']);
            $this->data['cms_details'] = $cms_details;
            $this->data['template'] = "CMSPages/form_data";
            $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' =>  site_url('cms-page'), 'page' => "CMS Pages"),array('link' => '#', 'page' => $cms_details['title']));
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
