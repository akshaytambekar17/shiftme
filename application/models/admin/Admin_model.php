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
class Admin_model extends MY_Model {

    //put your code here
    public function __construct() {
        parent::__construct();
    }

    public function getGroups() {
        return $this->getResult($this->db->select('id,name')->get('group'));
    }

    public function getUser($id) {
        return $this->getResult($this->db->get_where('admin_user', array('id' => $id)));
    }

    public function updateSystemUser($data, $id) {
        if ($this->db->update('admin_user', $data, array('id' => $id))) {
            return TRUE;
        } else {
            return false;
        }
    }

    public function getAdminMenus() {
        return $this->getResult($this->db->select('id,name')->get_where('admin_menu', array('parent_id' => 0)));
    }

    public function getAdminMenu($id) {
        return $this->getResult($this->db->get_where('admin_menu', array('id' => $id)));
    }

    public function updateAdminMenu($data, $id) {
        if ($this->db->update('admin_menu', $data, array('id' => $id))) {
            return TRUE;
        } else {
            return false;
        }
    }

    public function saveMenu($data) {
        if ($this->db->insert('admin_menu', $data)) {
            return TRUE;
        } else {
            return false;
        }
    }

    //    <-------country Start------->
    function saveServices($data) {

        $this->db->trans_start();

        $this->db->insert('services', $data);
        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return FALSE;
        } else {
            $this->db->trans_commit();
            return TRUE;
        }
    }

    public function getServices($id) {
        $this->db->select('*');
        $this->db->from('services');
        $this->db->where('id', $id);
        $query = $this->db->get()->row();
        return $query;
    }

    public function deleteServices($id) {
        $this->db->where('id', $id);
        return $this->db->delete('services');
    }

    function updateServices($data) {

        $this->db->trans_start();

        $this->db->where('id', $data['id']);
        unset($data['id']);
        $this->db->update('services', $data);

        if ($this->db->trans_status() === FALSE) {
            $this->db->trans_rollback();
            return FALSE;
        } else {
            $this->db->trans_commit();
            return TRUE;
        }
    }

    public function getAllservices() {
        return $this->getResult($this->db->select('id,name')->get_where('services'));
    }

    public function getAboutDetails() {
        return $this->db->get('trans_aboutus')->result_array();
    }

    public function updateabout($id) {
        $data = array(
            'title' => $this->input->post('title'),
            'about_details' => $this->input->post('long_desc'),
            'easy_booking' => $this->input->post('easy_booking'),
            'low_cost_shifting' => $this->input->post('lowCost_booking'),
            'door_to_door' => $this->input->post('doorToDoor'),
        );
        $this->db->where('about_id', $id);
        $r = $this->db->update('trans_aboutus', $data);
        if ($r) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function slider_add() {

        $data = array(
            'Description' => $this->input->post('description'),
            'status' => $this->input->post('status'),
        );
        if ($_FILES['image']['name'] != "") {
            $config['upload_path'] = FCPATH . 'upload/slider images/';
            $config['allowed_types'] = 'gif|jpg|png';
//            $config['max_size'] = 1000;
//            $config['max_width'] = 1024;
//            $config['max_height'] = 768;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('image')) {
                $error = array('error' => $this->upload->display_errors());
                return FALSE;
            } else {
                $imagedata = array('upload_data' => $this->upload->data());
                $data['images'] = $imagedata['upload_data']['file_name'];
            }
        }
        $r = $this->db->insert('trans_home_slider', $data);
        if ($r) {
            return TRUE;
        } else {
            RETURN FALSE;
        }
    }

    public function slider_data($id) {
        $this->db->where('id', $id);
        return $this->db->get('trans_home_slider')->result_array();
    }

    public function slider_update($id) {
        $data = array(
            'Description' => $this->input->post('description'),
            'status' => $this->input->post('status'),
        );
        if ($_FILES['image']['name'] != "") {
            $this->db->where('id', $id);
            $getimg = $this->db->get('trans_home_slider')->row();
            $getpath = FCPATH . "upload/slider images/" . $getimg->images;
            if (!empty($getimg->images)) {
                if (file_exists($getpath)) {
                    chmod($getpath, 777);
                    unlink($getpath);
                }
            }

            $config['upload_path'] = FCPATH . 'upload/slider images/';
            $config['allowed_types'] = 'gif|jpg|png';
//            $config['max_size'] = 1000;
//            $config['max_width'] = 1024;
//            $config['max_height'] = 768;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('image')) {
                $error = array('error' => $this->upload->display_errors());
                return FALSE;
            } else {
                $imagedata = array('upload_data' => $this->upload->data());
                $data['images'] = $imagedata['upload_data']['file_name'];
            }
        }
        $this->db->where('id', $id);
        $r = $this->db->update('trans_home_slider', $data);
        if ($r) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function slider_delete($id) {
        $this->db->where('id', $id);
        $r = $this->db->delete('trans_home_slider');
        if ($r) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function staff_save() {
        $data = array(
            'name' => $this->input->post('Name'),
            'designation' => $this->input->post('designation'),
            'about' => $this->input->post('about'),
            'facebook' => $this->input->post('fblink'),
            'twitter' => $this->input->post('twitterlink'),
            'linkedin' => $this->input->post('linkedinlink'),
            'status' => $this->input->post('status'),
        );
        if ($_FILES['image']['name'] != "") {
            $config['upload_path'] = FCPATH . 'upload/Staff/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 1000;
            $config['max_width'] = 360;
            $config['max_height'] = 360;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('image')) {
                $error = array('error' => $this->upload->display_errors());
                return FALSE;
            } else {
                $imagedata = array('upload_data' => $this->upload->data());
                $data['image'] = $imagedata['upload_data']['file_name'];
            }
        }
        $r = $this->db->insert('trans_our_stuff', $data);
        if ($r) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function staff_data($id) {
        $this->db->where('id', $id);
        return $this->db->get('trans_our_stuff')->result_array();
    }

    public function staff_update($id) {
        $data = array(
            'name' => $this->input->post('Name'),
            'designation' => $this->input->post('designation'),
            'about' => $this->input->post('about'),
            'facebook' => $this->input->post('fblink'),
            'twitter' => $this->input->post('twitterlink'),
            'linkedin' => $this->input->post('linkedinlink'),
            'status' => $this->input->post('status'),
        );
        if ($_FILES['image']['name'] != "") {
            $this->db->where('id', $id);
            $getimg = $this->db->get('trans_our_stuff')->row();
            $getpath = FCPATH . "upload/Staff/" . $getimg->image;
            if (!empty($getimg->images)) {
                if (file_exists($getpath)) {
                    chmod($getpath, 777);
                    unlink($getpath);
                }
            }

            $config['upload_path'] = FCPATH . 'upload/Staff/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 1000;
            $config['max_width'] = 360;
            $config['max_height'] = 360;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('image')) {
                $error = array('error' => $this->upload->display_errors());
                return FALSE;
            } else {
                $imagedata = array('upload_data' => $this->upload->data());
                $data['image'] = $imagedata['upload_data']['file_name'];
            }
        }
        $this->db->where('id', $id);
        $r = $this->db->update('trans_our_stuff', $data);
        if ($r) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function staff_delete($id) {
        $this->db->where('id', $id);
        $r = $this->db->delete('trans_our_stuff');
        if ($r) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function clients_save() {
        $data = array(
            'name' => $this->input->post('name'),
            'status' => $this->input->post('status'),
        );
        if ($_FILES['image']['name'] != "") {
            $config['upload_path'] = FCPATH . 'upload/clients/';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 1000;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('image')) {
                $error = array('error' => $this->upload->display_errors());
                return FALSE;
            } else {
                $imagedata = array('upload_data' => $this->upload->data());
                $data['Logo'] = $imagedata['upload_data']['file_name'];
            }
        }
        $r = $this->db->insert('trans_clients', $data);
        if ($r) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function clients_data($id) {
        $this->db->where('id', $id);
        return $this->db->get('trans_clients')->result_array();
    }

    public function clients_update($id) {
        $data = array(
            'name' => $this->input->post('name'),
            'status' => $this->input->post('status'),
        );
        if ($_FILES['image']['name'] != "") {
            $this->db->where('id', $id);
            $getimg = $this->db->get('trans_clients')->row();
            $getpath = FCPATH . "upload/clients/" . $getimg->Logo;
            if (!empty($getimg->Logo)) {
                if (file_exists($getpath)) {
                    chmod($getpath, 777);
                    unlink($getpath);
                }
            }

            $config['upload_path'] = FCPATH . 'upload/clients/';
            $config['allowed_types'] = 'gif|jpg|png';
//            $config['max_size'] = 1000;
//            $config['max_width'] = 1024;
//            $config['max_height'] = 768;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('image')) {
                $error = array('error' => $this->upload->display_errors());
                return FALSE;
            } else {
                $imagedata = array('upload_data' => $this->upload->data());
                $data['Logo'] = $imagedata['upload_data']['file_name'];
            }
        }
        $this->db->where('id', $id);
        $r = $this->db->update('trans_clients', $data);
        if ($r) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function clients_delete($id) {
        $this->db->where('id', $id);
        $r = $this->db->delete('trans_clients');
        if ($r) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function contactus_delete($id) {
        $this->db->where('id', $id);
        $r = $this->db->delete('trans_contactus');
        if ($r) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function terms_data($id) {
        $this->db->where('id', $id);
        return $this->db->get('trans_terms_condition')->result_array();
    }

    public function terms_update($id) {
        $data = array(
            'description' => $this->input->post('description'),
        );
//        if ($_FILES['image']['name'] != "") {
//            
//            $config['upload_path'] = FCPATH . 'upload/Terms/';
//            $config['allowed_types'] = 'gif|jpg|png';
////            $config['max_size'] = 1000;
////            $config['max_width'] = 1024;
////            $config['max_height'] = 768;
//            $this->load->library('upload', $config);
//            if (!$this->upload->do_upload('image')) {
//                $error = array('error' => $this->upload->display_errors());
//                return FALSE;
//            } else {
//                $imagedata = array('upload_data' => $this->upload->data());
//                $data['images'] = $imagedata['upload_data']['file_name'];
//            }
//        }
        $this->db->where('id', $id);
        $r = $this->db->update('trans_terms_condition', $data);
        if ($r) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
    
    /*************************New Code Impletationn*****************************/
    
    public function getVehicleServices() {
        $this->db->order_by('id','DESC');
        return $this->db->get('trans_vehicle_services')->result_array();
    }
    public function getVehicleServicesById($id) {
        $this->db->where('id',$id);
        return $this->db->get('trans_vehicle_services')->row_array();
    }
    public function getQuotations() {
        $this->db->order_by('id','DESC');
        return $this->db->get('trans_quotation')->result_array();
    }
    public function getQuotationById($id) {
        $this->db->where('id',$id);
        return $this->db->get('trans_quotation')->row_array();
    }
    
    public function addQuotation($data){
        $this->db->trans_start();
        $this->db->insert('trans_quotation', $data);
        $this->db->trans_complete();
        return true;
    }
    public function deleteQuotation($id) {
        $this->db->where('id',$id);
        $this->db->delete('trans_quotation'); 
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
    public function insertSMSDetails($data){
        $this->db->trans_start();
        $this->db->insert('trans_sms_details', $data);
        $this->db->trans_complete();
        return true;
    }
}
