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
class SliderController extends MY_Controller {

//put your code here
    function __construct() {
        parent::__construct();
        $this->load->model('admin/Admin_model');
        $this->load->model('admin/OrderModel');
        $this->load->model('admin/InvoiceModel');
        $this->load->model('admin/SliderModel');
        $this->load->library('form_validation');
        $this->load->helper('message');
        $this->load->model('site_model');
        $this->load->model('User_model');
        $this->load->helper(array('url', 'form','email'));
        $this->load->library('session');
        $this->data['filters'] = $this->session->userdata('filters');
    }
    public function index(){
        $this->data['slider_list'] = $this->SliderModel->getSliders();
        $this->data['template'] = "SliderImages/list";
        $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => '#', 'page' => "Slider Images"));
        $this->admin_layout($this->data);
    }
    public function add(){
        if($this->input->post()){
            $post = $this->input->post();
            $this->form_validation->set_rules('title', 'Title', 'trim|required');
            $this->form_validation->set_rules('status', 'Select Status', 'trim|required');
            if(empty($_FILES['images']['name'])){
                $this->form_validation->set_rules('images', 'Image', 'trim|required');
            }
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            if($this->form_validation->run() == TRUE){
                $details = $post;
                
                $config['upload_path']          = './assets/images/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 2048;
                $config['max_width']            = 0;
                $config['max_height']           = 0;

                $this->load->library('upload', $config);
                if($this->upload->do_upload('images')){
                    $uploadData = $this->upload->data();
                    $image_name = $uploadData['file_name'];
                    $error = '';
                }else{
                    $error = $this->upload->display_errors();
                    $image_name = '';
                }
                if(empty($error)){
                    $details['images'] = $image_name;
                    $details['created_at'] = date('Y-m-d H:i:s');
                    $details['updated_at'] = date('Y-m-d H:i:s');
                    $result = $this->SliderModel->insert($details);
                    if($result){
                        $this->session->set_flashdata('Message', 'Slider Image has been uploaded Succesfully');
                        return redirect('slider', 'refresh');
                    }else{
                        $this->session->set_flashdata('Error', 'Something went wrong, Please try again');
                        $this->data['template'] = "SliderImages/form_data";
                        $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' =>  site_url('slider'), 'page' => "Slider Images"),array('link' => '#', 'page' => 'Add Slider Images'));
                        $this->admin_layout($this->data);
                    }
                }else{
                    $this->session->set_flashdata('Error', $error);
                    $this->data['template'] = "SliderImages/form_data";
                    $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' =>  site_url('slider'), 'page' => "Slider Images"),array('link' => '#', 'page' => 'Add Slider Images'));
                    $this->admin_layout($this->data);
                }
            }else{
                $this->data['template'] = "SliderImages/form_data";
                $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' =>  site_url('slider'), 'page' => "Slider Images"),array('link' => '#', 'page' => 'Add Slider Images'));
                $this->admin_layout($this->data);
            }
            
        }else{
            $this->data['template'] = "SliderImages/form_data";
            $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' =>  site_url('slider'), 'page' => "Slider Images"),array('link' => '#', 'page' => 'Add Slider Images'));
            $this->admin_layout($this->data);
        }
    }
    public function update(){
        $get = $this->input->get();
        if($this->input->post()){
            $post = $this->input->post();
            $this->form_validation->set_rules('title', 'Title', 'trim|required');
            $this->form_validation->set_rules('status', 'Select Status', 'trim|required');
            
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            if($this->form_validation->run() == TRUE){
                $details = $post;
                if(!empty($_FILES['images']['name'])){
                    $config['upload_path']          = './assets/images/';
                    $config['allowed_types']        = 'gif|jpg|png|jpeg';
                    $config['max_size']             = 2048;
                    $config['max_width']            = 0;
                    $config['max_height']           = 0;

                    $this->load->library('upload', $config);
                    if($this->upload->do_upload('images')){
                        $uploadData = $this->upload->data();
                        $image_name = $uploadData['file_name'];
                        $error = '';
                    }else{
                        $error = $this->upload->display_errors();
                        $image_name = '';
                    }
                }else{
                    $error = '';
                    $image_name = $post['images_hidden'];
                }
                if(empty($error)){
                    unset($details['images_hidden']);
                    $details['images'] = $image_name;
                    $details['created_at'] = date('Y-m-d H:i:s');
                    $details['updated_at'] = date('Y-m-d H:i:s');
                    $result = $this->SliderModel->update($details);
                    if($result){
                        $this->session->set_flashdata('Message', 'Slider Image has been uploaded Succesfully');
                        return redirect('slider', 'refresh');
                    }else{
                        $this->session->set_flashdata('Error', 'Something went wrong, Please try again');
                        $slider_details = $this->SliderModel->getSliderById($post['id']);
                        $this->data['template'] = "SliderImages/form_data";
                        $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' =>  site_url('slider'), 'page' => "Slider Images"),array('link' => '#', 'page' => 'Add Slider Images'));
                        $this->admin_layout($this->data);
                    }
                }else{
                    $this->session->set_flashdata('Error', $error);
                    $slider_details = $this->SliderModel->getSliderById($post['id']);
                    $this->data['template'] = "SliderImages/form_data";
                    $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' =>  site_url('slider'), 'page' => "Slider Images"),array('link' => '#', 'page' => 'Add Slider Images'));
                    $this->admin_layout($this->data);
                }
            }else{
                $slider_details = $this->SliderModel->getSliderById($post['id']);
                $this->data['template'] = "SliderImages/form_data";
                $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' =>  site_url('slider'), 'page' => "Slider Images"),array('link' => '#', 'page' => 'Add Slider Images'));
                $this->admin_layout($this->data);
            }
            
        }else{
            $slider_details = $this->SliderModel->getSliderById($get['id']);
            $this->data['slider_details'] = $slider_details;
            $this->data['template'] = "SliderImages/form_data";
            $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' =>  site_url('slider'), 'page' => "Slider Images"),array('link' => '#', 'page' => $slider_details['title']));
            $this->admin_layout($this->data);
        }
    }
    
    public function delete(){
        $post = $this->input->post();
        $result = $this->SliderModel->delete($post['id']);
        if($result){
            echo true;
        }else{
            echo false;
        }
   }
}
