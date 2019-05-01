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
class AdvertisementController extends MY_Controller {

//put your code here
    function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->helper('message');
        $this->load->helper(array('url', 'form','email'));
        $this->load->library('session');
        $this->data['filters'] = $this->session->userdata('filters');
    }
    public function index(){
        $this->data['advertisementList'] = $this->Advertisement->getAdvertisements();
        $this->data['template'] = "Advertisement/list";
        $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => '#', 'page' => "Advertisement"));
        $this->admin_layout($this->data);
    }
    public function add(){
        if($this->input->post()){
            $post = $this->input->post();
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
            $this->form_validation->set_rules('status', 'Select Status', 'trim|required');
            if( empty($_FILES['advertisement_image']['name'] ) ){
                $this->form_validation->set_rules('advertisement_image', 'Image', 'trim|required');
            }
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            if($this->form_validation->run() == TRUE){
                $details = $post;
                
                $config['upload_path']          = './assets/advertisement-image/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 2048;
                
                $this->load->library('upload', $config);
                if($this->upload->do_upload('advertisement_image')){
                    $uploadData = $this->upload->data();
                    $imageName = $uploadData['file_name'];
                    $error = '';
                }else{
                    $error = $this->upload->display_errors();
                    $imageName = '';
                }
                if(empty($error)){
                    
                    $details['advertisement_image'] = $imageName;
                    $details['updated_at'] = date('Y-m-d H:i:s');
                    $result = $this->Advertisement->add( $details );
                    
                    if($result){
                        $this->session->set_flashdata('Message', 'Adverstisement has been created succesfully');
                        return redirect('admin/advertisement', 'refresh');
                    }else{
                        $this->session->set_flashdata('Error', 'Something went wrong, Please try again');
                        $this->data['template'] = "Advertisement/form_data";
                        $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' =>  site_url('admin/advertisement'), 'page' => "Advertisement"),array('link' => '#', 'page' => 'Add Advertisement'));
                        $this->admin_layout($this->data);
                    }
                }else{
                    $this->session->set_flashdata('Error', $error);
                    $this->data['template'] = "Advertisement/form_data";
                    $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' =>  site_url('admin/advertisement'), 'page' => "Advertisement"),array('link' => '#', 'page' => 'Add Advertisement'));
                    $this->admin_layout($this->data);
                }
            }else{
                $this->data['template'] = "Advertisement/form_data";
                $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' =>  site_url('admin/advertisement'), 'page' => "Advertisement"),array('link' => '#', 'page' => 'Add Advertisement'));
                $this->admin_layout($this->data);
            }
            
        }else{
            $this->data['template'] = "Advertisement/form_data";
            $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' =>  site_url('admin/advertisement'), 'page' => "Advertisement"),array('link' => '#', 'page' => 'Add Advertisement'));
            $this->admin_layout($this->data);
        }
    }
    public function update(){
        $get = $this->input->get();
        if($this->input->post()){
            $post = $this->input->post();
            $this->form_validation->set_rules('name', 'Name', 'trim|required');
            $this->form_validation->set_rules('status', 'Select Status', 'trim|required');
            
            $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
            if($this->form_validation->run() == TRUE){
                $details = $post;
                if(!empty($_FILES['advertisement_image']['name'])){
                    
                    $config['upload_path']          = './assets/advertisement-image/';
                    $config['allowed_types']        = 'gif|jpg|png|jpeg';
                    $config['max_size']             = 2048;

                    $this->load->library('upload', $config);
                    if($this->upload->do_upload('advertisement_image')){
                        $uploadData = $this->upload->data();
                        $imageName = $uploadData['file_name'];
                        $error = '';
                    }else{
                        $error = $this->upload->display_errors();
                        $imageName = '';
                    }
                }else{
                    $error = '';
                    $imageName = !empty( $post['advertisement_image_hidden'] ) ? $post['advertisement_image_hidden'] : '';
                }
                if( empty( $error ) ){
                    unset( $details['advertisement_image_hidden'] );
                    $details['advertisement_image'] = $imageName;
                    $details['created_at'] = date('Y-m-d H:i:s');
                    $details['updated_at'] = date('Y-m-d H:i:s');
                    $result = $this->Advertisement->update($details);
                    if($result){
                        $this->session->set_flashdata('Message', $details['name']. ' has been uploaded Succesfully');
                        return redirect('admin/advertisement', 'refresh');
                    }else{
                        $this->session->set_flashdata('Error', 'Something went wrong, Please try again');
                        $advertisementDetails = $this->Advertisement->getAdvertisementById( $post['id'] );
                        $this->data['advertisementDetails'] = $advertisementDetails;
                        $this->data['template'] = "Advertisement/form_data";
                        $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' =>  site_url('admin/advertisement'), 'page' => "Advertisement"),array('link' => '#', 'page' => $advertisementDetails['name']));
                        $this->admin_layout($this->data);
                    }
                }else{
                    $this->session->set_flashdata('Error', $error);
                    $advertisementDetails = $this->Advertisement->getAdvertisementById( $post['id'] );
                    $this->data['advertisementDetails'] = $advertisementDetails;
                    $this->data['template'] = "Advertisement/form_data";
                    $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' =>  site_url('admin/advertisement'), 'page' => "Advertisement"),array('link' => '#', 'page' => $advertisementDetails['name']));
                    $this->admin_layout($this->data);
                }
            }else{
                $advertisementDetails = $this->Advertisement->getAdvertisementById( $post['id'] );
                $this->data['advertisementDetails'] = $advertisementDetails;
                $this->data['template'] = "Advertisement/form_data";
                $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' =>  site_url('admin/advertisement'), 'page' => "Advertisement"),array('link' => '#', 'page' => $advertisementDetails['name']));
                $this->admin_layout($this->data);
            }
            
        }else{
            $advertisementDetails = $this->Advertisement->getAdvertisementById( $get['id'] );
            $this->data['advertisementDetails'] = $advertisementDetails;
            $this->data['template'] = "Advertisement/form_data";
            $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' =>  site_url('admin/advertisement'), 'page' => "Advertisement"),array('link' => '#', 'page' => $advertisementDetails['name']));
            $this->admin_layout($this->data);
        }
    }
    
    public function delete(){
        $post = $this->input->post();
        $result = $this->Advertisement->delete( $post['id'] );
        if($result){
            echo true;
        }else{
            echo false;
        }
   }
}
