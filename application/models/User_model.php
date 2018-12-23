<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User_model
 *
 * @author Pravinkumar
 */
class User_model extends MY_Model {

    //put your code here
    public function __construct() {
        parent::__construct();
    }


    public function signup() {
        $this->db->where('mobileno', $this->input->post('mobile'));
        $this->db->or_where('email', $this->input->post('email'));
        $q = $this->db->get('trans_user_login');
        if ($q->num_rows() > 0) {
            return -1;
        }
        $data = array(
            'mobileno' => $this->input->post('mobile'),
            'email' => $this->input->post('email'),
            'password' => $this->site->encryptPass($this->input->post('password')),
            'remember' => $this->input->post('remember'),
            'create_date' => date('Y-m-d H'),
        );
        return $this->db->insert('trans_user_login', $data);
    }
    public function sign_up($data) {
        
        $this->db->where('mobileno', $data['mobileno']);
        $query_mobile = $this->db->get('trans_user_login');
        if ($query_mobile->num_rows() > 0) {
            return -1;
        }
        $this->db->where('email', $data['email']);
        $query_email = $this->db->get('trans_user_login');
        if ($query_email->num_rows() > 0) {
            return -2;
        }
        
        $this->db->insert('trans_user_login', $data);
        $last_id = $this->db->insert_id();
        if($data['role'] == 2){
            $data_vendor = array('uid' => $last_id,
                                 'created_at' => date('Y-m-d H:i:s'),
                                 'updated_at' => date('Y-m-d H:i:s'),
                            );
            $this->db->insert('trans_vendor', $data_vendor);
        }
        return ($this->db->affected_rows() != 1) ? false : true;
        
        
    }


    public function userlogin() {
        $pass = $this->site->encryptPass($this->input->post('log_password'));
        $username = $this->input->post('log_username');
        $role = $this->input->post('role');
        $this->db->where("email ='" . $username . "' and  password ='" . $pass . "'");
        $this->db->or_where("mobileno ='" . $username . "' and  password ='" . $pass . "'");
        $this->db->where("role",$role);
        $log = $this->db->get('trans_user_login');
//        echo $this->db->last_query();
        if ($log->num_rows() > 0) {
            $sess = array(
                'uid' => $log->row()->user_id,
                'mobileno' => $log->row()->mobileno,
                'password' => $log->row()->password,
                'email' => $log->row()->email,
            );
            $this->session->set_userdata($sess);
            return true;
        }
        return false;
    }
    public function validateLogin($data) {
        $password = $this->site->encryptPass($data['password']);
        $this->db->where("(email ='" . $data['email'] . "' and  password ='" . $password. "' or mobileno ='" . $data['email'] . "' and  password ='" . $password . "')");
        $this->db->where("role",$data['role']);
        $result = $this->db->get('trans_user_login');
        //echo $this->db->last_query();die;
        if ($result->num_rows() > 0) {
            $data = array(
                'uid' => $result->row()->user_id,
                'mobileno' => $result->row()->mobileno,
                'password' => $result->row()->password,
                'email' => $result->row()->email,
                'role' => $result->row()->role,
                'fullname' => $result->row()->fullname,
            );
            $this->session->set_userdata('userData',$data);
            return $data;
        }
        return false;
    }

    public function update_profile() {

        $data = array(
            'street' => $this->input->post('street'),
            'landmark' => $this->input->post('landmark'),
            'city' => $this->input->post('city'),
            'pincode' => $this->input->post('pincode'),
            'state' => $this->input->post('state'),
            'country' => $this->input->post('country'),
        );

//        if ($_FILES['profiephoto']['name'] != "") {
//            $config['upload_path'] = FCPATH . 'upload/user profile/';
//            $config['allowed_types'] = 'gif|jpg|png';
//            $config['max_size'] = 100;
////            $config['max_width'] = 1024;
////            $config['max_height'] = 768;
//            $this->load->library('upload', $config);
//            if (!$this->upload->do_upload('profiephoto')) {
//                $error = array('error' => $this->upload->display_errors());
////                return $error;
//            } else {
//                $imagedata = array('upload_data' => $this->upload->data());
//                $data['image'] = $imagedata['upload_data']['file_name'];
//            }
//        }
        $this->db->where('user_id', $this->session->userdata('uid'));
        return $this->db->update('trans_user_login', $data);
    }

    public function user_details() {
        $this->db->where('user_id', $this->session->userdata('uid'));
        $Q = $this->db->get('trans_user_login');
        return $Q->result_array();
    }

    public function vehicle_inquery() {
        if ($this->session->userdata('uid') == "") {
            return -1;
        }
        $data = array(
            'user_id' => $this->session->userdata('uid'),
            'pickuppoint' => $this->input->post('pickupPoint'),
            'dropPoint' => $this->input->post('dropPoint'),
            'vehicle_id' => $this->input->post('vehicle'),
            'inquery_datetime' => date('Y-m-d H:i:s'),
        );
        return $this->db->insert('trans_user_inquery', $data);
    }

    public function save_EmailInfo() {
        $data = array(
            'full_name' => $this->input->post('full_name'),
            'contact' => $this->input->post('contact'),
            'email' => $this->input->post('email'),
            'subject' => $this->input->post('subject'),
            'message' => $this->input->post('message'),
            'created_date' => date('Y-m-d H:i:s')
        );

        return $this->db->insert('contactus', $data);
    }

    public function user_inquery_list() {
        $this->db->select('*, trans_user_inquery.id eid, trans_user_inquery.status as bstatus');
        $this->db->where('user_id', $this->session->userdata('uid'));
        $this->db->order_by('trans_user_inquery.id', 'DESC');
        $this->db->join('trans_vehicle_services', 'trans_vehicle_services.id = trans_user_inquery.vehicle_id');
        $Q = $this->db->get('trans_user_inquery');
        return $Q->result_array();
    }

    public function changePassword() {
        $password = $this->site->encryptPass($this->input->post('new_password'));
        $data = array(
            'password' => $password,
        );
        $this->db->where('user_id', $this->session->userdata('uid'));
        return $this->db->update('trans_user_login', $data);
    }

    public function checkpassword() {
        $password = $this->site->encryptPass($this->input->post('oldpass'));

        $this->db->where('password', $password);
        $this->db->where('user_id', $this->session->userdata('uid'));
        $Q = $this->db->get('trans_user_login');
        if ($Q->num_rows() > 0) {
            return true;
        }
        return false;
    }

       function userotp() {
        $username = $this->input->post('f_username');
        $this->db->where('mobileno', $username);
        $Q = $this->db->get('trans_user_login');
        if ($Q->num_rows() > 0) {
            return true;
        }
        return false;
    }

    function useremail() {
        $username = $this->input->post('f_username');
        $this->db->where('email', $username);
        $Q = $this->db->get('trans_user_login');
        if ($Q->num_rows() > 0) {
            return true;
        }
        return false;
    }

    function getuserdetails() {
        $username = $this->input->post('f_username');
        $this->db->where("email ='" . $username . "' or  mobileno ='" . $username . "'");
        $Q = $this->db->get('trans_user_login');

        return $Q->result_array();
    }

    function updatepass($id) {
        $password = $this->site->encryptPass($this->input->post('password'));
        $data = array(
            'password' => $password,
        );
        $this->db->where('user_id', $id);
        return $this->db->update('trans_user_login', $data);
    }

    public function vehicle_list() {
        $Q = $this->db->get('trans_vehicle_services');
        return $Q->result_array();
    }

    public function getTestimonials() {
        $Q = $this->db->get('testimonials');
        return $Q->result_array();
    }

    public function save_Quote($data) {
        return $this->db->insert('qoute', $data);
    }

    public function getslider() {
        $this->db->where('status', 'Active');
        $Q = $this->db->get('trans_home_slider');
        return $Q->result_array();
    }

    public function getVehicleName($id) {
        $this->db->where('id', $id);
        $Q = $this->db->get('vehicle_services');
        return $Q->result_array();
    }

    public function getterms() {
//        $this->db->where('id', $id);
        $Q = $this->db->get('trans_terms_condition');
        return $Q->result();
    }

    public function user_inquery() {
      //  echo '<pre>';
    //    print_r($_POST);
  //      echo '</pre>';
//        die();
        $uid = $this->session->userdata('uid');
        if ($this->session->userdata('uid') == "") {
            $uid = 0;
        }
        $data = array(
            'user_id' => $uid,
            'pickuppoint' => $this->input->post('pickuppoint'),
            'pickupAddress' => $this->input->post('picAddress'),
            'pickupPincode' => $this->input->post('pickpincode'),
            'pickupLandmark' => $this->input->post('picklandmark'),
            'dropPoint' => $this->input->post('droppoint'),
            'dropAddress' => $this->input->post('dropAddress'),
            'dropPincode' => $this->input->post('dropPincode'),
            'vehicle_id' => $this->input->post('Vehicles'),
            'labour' => $this->input->post('Labour'),
            'packers' => $this->input->post('radio2'),
            'storage' => $this->input->post('radio3'),
            'vehicle' => $this->input->post('radio4'),
            'BookingDate' => $this->input->post('date'),
            'inquery_datetime' => date('Y-m-d H:i:s'),
            'mobileno' => $this->input->post('mobileNo'),
            'fullname' => $this->input->post('fullname'),
            'email' => $this->input->post('email'),
            'total_amount' => $this->input->post('total_amount'),
            'total_distance' => $this->input->post('total_distance'),
        );
        $r = $this->db->insert('trans_user_inquery', $data);
        $id = $this->db->insert_id();

        $order_id = "ORD";
        $number = strlen((string) $id);
        for ($j = 6; $j > $number; $j--) {
            $order_id .= "0";
        };
        $order_id .= $id;
        $this->db->where('id', $id);
        $this->db->update('trans_user_inquery', array('order_id' => $order_id));
        return $r;
    }

    public function get_vehicleby_id($id) {
        $this->db->where('id', $id);
        return $this->db->get('trans_vehicle_services')->result_array();
    }

    public function get_Enquiry_id($id) {
        $this->db->where('id', $id);
        return $this->db->get('trans_user_inquery')->result_array();
    }

    public function user_quote_list() {
        $uid = $this->session->userdata('uid');
        $this->db->where('uid', $uid);
        $this->db->order_by('id', 'DESC');
        return $this->db->get('trans_qoute')->result_array();
    }

    
    /*************************New Code Impletationn*****************************/
    
    public function getUsers() {
        $this->db->order_by('user_id','DESC');
        return $this->db->get('trans_user_login')->result_array();
    }
    public function getUsersById($user_id) {
        $this->db->where('user_id',$user_id);
        return $this->db->get('trans_user_login')->row_array();
    }
    public function getVehicleById($id) {
        $this->db->where('id', $id);
        return $this->db->get('trans_vehicle_services')->row_array();
    }
    public function deleteUser($user_id) {
        $this->db->where('user_id',$user_id);
        $this->db->delete('trans_user_login'); 
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
    public function update($updateData){
        $this->db->where('user_id',$updateData['user_id']);
        $this->db->update('trans_user_login',$updateData);
        if($this->db->affected_rows()){
            return true;
        }else{
            return false;
        }
    }
    
}
