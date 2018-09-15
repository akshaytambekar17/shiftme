<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class User_controller extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('User_model', 'user');
        $this->load->helper('message');
//        $this->load->model('Event_model', 'event');
    }

//Home Page
    public function index() {
        $data['test'] = $this->user->getTestimonials();
        $data['slider'] = $this->user->getslider();
        $data['metadata'] = "Home";
        $data['template'] = "Home";
        $data['name'] = "Home";
        $data['vehicle'] = $this->user->vehicle_list();

        $this->layout($data);
    }

    public function sendotp() {
        
    }

    public function signup() {
        $post = $this->input->post();
        $data = array(
            'mobileno' => $post['mobile'],
            'email' => $post['email'],
            'password' => $this->site->encryptPass($post['password']),
            'remember' => $post['remember'],
            'create_date' => date('Y-m-d H:i:s'),
        );
        $result = $this->user->sign_up($data);
        echo $result;
    }

    public function signin() {
        $rs = $this->user->userlogin();
        if ($rs) {

            echo '1';
        } else {
            echo '0';
        }
    }

    public function logout() {
        $this->session->sess_destroy();
        redirect(site_url());
    }

    public function changePassword() {
        $rs = $this->user->changePassword();
        if ($rs) {
            $this->session->set_flashdata('insert_msg', 'Password Changed Successfully.');
        } else {
            $this->session->set_flashdata('error_msg', 'Password Changed Failed.');
        }
        redirect('myaccount');
    }

    public function myaccount() {
        if ($this->session->userdata('uid') == "") {
            redirect(site_url());
        }
        $data['metadata'] = "My Account";
        $data['template'] = "myaccount";
        $data['name'] = "My Account";
        $data['result'] = $this->user->user_details();
        $data['inquery_list'] = $this->user->user_inquery_list();
        $data['quote_list'] = $this->user->user_quote_list();
//        echo '<pre>';
//        print_r($data['quote_list']);
//        echo '</pre>';
//        die();
        $this->layout($data);
    }

    public function getterms() {
        $data['metadata'] = "Terms Conditiont";
        $data['template'] = "Terms-condition";
        $data['name'] = "Terms Conditiont";
        $data['result'] = $this->user->getterms();
//        echo '<pre>';
//        print_r($data['result']);
//        echo '</pre>';
//        die();
        $this->layout($data);
    }

    public function qoute() {
        $data['metadata'] = "Qoute";
        $data['template'] = "qoute_1";
        $data['name'] = "Qoute";
        $data['vehicle'] = $this->user->vehicle_list();
        $this->layout($data);
    }

    public function quick_qoute() {

        $pin;
        if ($_POST['pickupPoint'] != "" && $_POST['dropPoint'] != "") {
            $pin = array(
                'pickupPoint' => $_POST['pickupPoint'],
                'pickupzip' => $this->getZipcode($_POST['pickupPoint']),
                'dropPoint' => $_POST['dropPoint'],
                'dropzip' => $this->getZipcode($_POST['dropPoint']),
            );
        }
        $data['metadata'] = "Qoute";
        $data['template'] = "qoute";
        $data['name'] = "Qoute";
        $data['vehicle'] = $this->user->vehicle_list();
        $data['selvehical'] = $this->user->get_vehicleby_id($_POST['vehicle']);
        $data['details'] = $pin;
        $this->layout($data);
    }

    public function contactus() {
        $data['metadata'] = "Contactus";
        $data['template'] = "contactus";
        $data['name'] = "Contactus";
        $this->layout($data);
    }

    public function update_pro() {
        $rs = $this->user->update_profile();
        if ($rs) {
            $this->session->set_flashdata('insert_msg', 'Profile Updated Successfully.');
        } else {
            $this->session->set_flashdata('error_msg', 'Profile updated Failed.');
        }
        redirect('myaccount');
    }

    public function vehicle_inquery() {
//        
        if ($this->session->userdata('uid') == "") {
            echo json_encode(array('message' => 'Please login to send enquiry', 's' => 0));
            die();
        }

        $rs = $this->user->vehicle_inquery();
        $vehicle_name = $this->user->getVehicleName($_POST['vehicle']);
//end email
        if ($rs == 1) {
//email
            $data = $_POST;
            $data['vehicle_name'] = $vehicle_name[0]['vehicle_name'];
            $data['login_user'] = $_SESSION['email'];
//to admin
            $msg = $this->load->view('emails/enquiry', $data, true);
            if ($this->sendMail("kumar01anish@gmail.com", "Vehicle Enquiry From User", $msg, "Transport User", $_SESSION['email'])) {
                
            }
//to user
            $msg = $this->load->view('emails/enquiry_user', $data, true);
            if ($this->sendMail($_SESSION['email'], "Response From Admin", $msg, "Admin", "kumar01anish@gmail.com")) {
                
            }
            echo json_encode(array('message' => 'Your Enquiry Submitted Succesfully', 's' => 1));
//            $this->session->set_flashdata('insert_msg', 'Requst Send Successfully.');
        } else if ($rs == '-1') {
            echo json_encode(array('message' => 'Please login to send enquiry', 's' => 0));
//            $this->session->set_flashdata('user_valid', 'User Not Login');
        } else {
            echo json_encode(array('message' => 'Please login to send enquiry', 's' => 0));

//            $this->session->set_flashdata('error_msg', 'Requst Send Failed.');
        }
//        redirect(site_url());
    }

    public function checkpassword() {
        $rs = $this->user->checkpassword();
        if ($rs) {
            echo 1;
        } else {
            echo 0;
        }
    }

    public function get_forget_otp() {
        $rsotp = $this->user->userotp();
        $rsmail = $this->user->useremail();
        $userdetails = $this->user->getuserdetails();
        $username = $this->input->post('f_username');
        $otp = random_string('alnum', 8);
        $myotp = $this->site->encryptPass($otp);
        $sess = array(
            'opt' => $myotp,
        );
        $this->session->set_userdata($sess);
        if ($rsotp) {
            $msg = "Your OTP is : " . $otp . " as Transport Password Reset Code";
            $retmsg = "";
            if ($this->sendSms($username, $msg)) {
                echo 1;
            } else {
                echo 0;
            }
        } else if ($rsmail) {
            $msg = "Transport Click <a href='" . site_url() . "change-password?Token=" . $userdetails[0]['user_id'] . "'> Here </a> to Reset Password";
            if ($this->sendMail($username, 'Reset Password', $msg, "Transport", "kumar01anish@gmail.com")) {
                echo 2;
            } else {
                echo 0;
            }
        } else {
            echo 0;
        }
    }

    public function validotp() {
        $rs = $this->user->userotp();
        if (!empty($rs)) {
            $id = $rs[0]['user_id'];
            $email = $rs[0]['email'];
            $mobileno = $rs[0]['mobileno'];
            $myotp = $this->site->encryptPass($this->input->post('forget_opt'));
//            echo $myotp;
            $otp = $this->session->userdata('opt');
            if ($myotp == $otp) {
                $msg = site_url() . "change-password?Token=" . $id;
                echo $msg;
            } else {
//                echo "Enter Valid OTP";
            }
        }
    }

    public function updatepassword() {
        $data['metadata'] = "Change Password";
        $data['template'] = "change_password";
        $data['name'] = "Change Password";
        $data['result'] = $this->user->user_details();
        $data['inquery_list'] = $this->user->user_inquery_list();

        $this->layout($data);
    }

    public function updatepass($id) {
        $rs = $this->user->updatepass($id);
        if ($rs) {
            $this->session->set_flashdata('insert_msg', 'Password Changed Successfully.');
        } else {
            $this->session->set_flashdata('error_msg', 'Password Changed Failed.');
        }
        redirect(site_url());
    }

    public function save_userEmail() {

        $rs = $this->user->save_EmailInfo();
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $full_name = $_POST['full_name'];
        $to = 'kumar01anish@gmail.com';
        $from_email = 'team@shiftme.in';

        $data = $_POST;
        $msg = $this->load->view('emails/contactus', $data, true);
        $data = $this->sendMail($to, $subject, $msg, $full_name, $from_email);
        if ($this->sendMail($to, $subject, $msg, $full_name, $from_email)) {
            $this->session->set_flashdata('insert_msg', 'Email Sent Successfully');
        } else {
            $this->session->set_flashdata('error_msg', 'Email Not Sent');
        }
//to user
        $msg = $this->load->view('emails/contactus_user', $data, true);
        if ($this->sendMail($email, "Thank You!", $msg, "Shiftme.in", "kumar01anish@gmail.com")) {
            $this->session->set_flashdata('insert_msg', 'Email Sent Successfully');
        } else {
            $this->session->set_flashdata('error_msg', 'Email Not Sent');
        }
        redirect(site_url());
    }

    public function save_Quote() {

        $data = $_POST;
        $data['created_date'] = date('Y-m-d H:i:s');
        $data['status'] = 'Active';
        if ($this->session->userdata('uid') != "") {
            $data['uid'] = $this->session->userdata('uid');
        }
        $rs = $this->user->save_Quote($data);
        if ($rs) {
//email
//to admin
            $msg = $this->load->view('emails/quote', $data, true);
            if ($this->sendMail("kumar01anish@gmail.com", "Quote From User", $msg, "Transport User", $data['email'])) {
                
            }
//to user
            $msg = $this->load->view('emails/quote_user', $data, true);
            if ($this->sendMail($data['email'], "Response From Admin", $msg, "Admin", "kumar01anish@gmail.com")) {
                
            }
            $this->session->set_flashdata('insert_msg', 'Quote Submitted Successfully.');
        } else {
            $this->session->set_flashdata('error_msg', 'Failed.');
        }
        redirect(site_url() . 'shifting');
    }

    function getZipcode($address) {
        if (!empty($address)) {
            //Formatted address
            $formattedAddr = str_replace(' ', '+', $address);
            //Send request and receive json data by address
            $geocodeFromAddr = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?address=' . $formattedAddr . '&sensor=true_or_false');
            $output1 = json_decode($geocodeFromAddr);
            //Get latitude and longitute from json data
            $latitude = $output1->results[0]->geometry->location->lat;
            $longitude = $output1->results[0]->geometry->location->lng;
            //Send request and receive json data by latitude longitute
            $geocodeFromLatlon = file_get_contents('http://maps.googleapis.com/maps/api/geocode/json?latlng=' . $latitude . ',' . $longitude . '&sensor=true_or_false');
            $output2 = json_decode($geocodeFromLatlon);
            if (!empty($output2)) {
                $addressComponents = $output2->results[0]->address_components;
                foreach ($addressComponents as $addrComp) {
                    if ($addrComp->types[0] == 'postal_code') {
                        //Return the zipcode
                        return $addrComp->long_name;
                    }
                }
                return false;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function user_inquery() {

        $data['content'] = $_POST;

        $rs = $this->user->user_inquery();
//        user
        $msg = $this->load->view('emails/quick_quote', $data, true);
        if ($this->sendMail($_POST['email'], "Transport", $msg, "QUOTE", "kumar01anish@gmail.com")) {
            
        }
//        admin
        $msg = $this->load->view('emails/quick_quote_admin', $data, true);
        if ($this->sendMail("kumar01anish@gmail.com", "Transport", $msg, "QUOTE", $_POST['email'])) {
            
        }
        if ($rs) {
            $this->session->set_flashdata('insert_msg', 'Quote Send Sucessfully.');
        } else {
            $this->session->set_flashdata('error_msg', 'Quote Send Failed.');
        }
        redirect(site_url());
    }

    public function get_vehicleby_id($id) {
        $data = $this->user->get_vehicleby_id($id);
        echo json_encode($data[0]);
    }

    public function ShowEnquiry() {
        $id = $_POST['id'];
        $data = $this->user->get_Enquiry_id($id);
        echo json_encode($data[0]);
    }

}
