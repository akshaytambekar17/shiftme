<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Example
 *
 * This is an example of a few basic user interaction methods you could use
 * all done with a hardcoded array.
 *
 * @package		CodeIgniter
 * @subpackage	Rest Server
 * @category	Controller
 * @author		Phil Sturgeon
 * @link		http://philsturgeon.co.uk/code/
 */
// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

class Rest extends REST_Controller {

    function __construct() {
        // Construct our parent class
        parent::__construct();
        $this->load->model('User_model', 'user');
        $this->load->model('Event_model', 'event');
        // Configure limits on our controller methods. Ensure
        // you have created the 'limits' table and enabled 'limits'
        // within application/config/rest.php
        $this->methods['register_post']['limit'] = 1000; //500 requests per hour per user/key
        $this->methods['gender_post']['limit'] = 1000; //500 requests per hour per user/key
        $this->methods['login_post']['limit'] = 1000; //100 requests per hour per user/key
        $this->methods['fblogin_post']['limit'] = 1000; //100 requests per hour per user/key
        $this->methods['getpopevents_post']['limit'] = 1000; //100 requests per hour per user/key
        $this->methods['getlocalevents_post']['limit'] = 1000; //100 requests per hour per user/key
        $this->methods['getuserevents_post']['limit'] = 1000; //100 requests per hour per user/key
    }

    public function gender_post() {
        $result = $this->db->select('id,name')->get('gender')->result_array();
        if (!empty($result)) {
            $this->set_response(['gender' => $result, 'status' => TRUE, 'message' => USER_REGISTERED], REST_Controller::HTTP_CREATED); // Create (201) being the HTTP response code
        } else {
            $this->set_response(['status' => FALSE, 'message' => USER_REGISTERED_FAILED], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }

    public function register_post() {
        // Users from a data store e.g. database
        $data['email'] = $this->post('email');
        $data['username_C'] = $this->post('displayname');
        $data['fname'] = $this->post('fname');
        $data['lname'] = $this->post('lname');
        $data['gender'] = $this->post('gender');
        $data['pass'] = $this->post('pass');

        if ($data['email'] === "") {
            $this->response([
                'status' => FALSE,
                'message' => EMAIL_REQ,
                    ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
        }
        if ($data['username_C'] === "") {
            $this->response([
                'status' => FALSE,
                'message' => DISPLAYNAME_REQ,
                    ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
        }
        if ($data['fname'] === "") {
            $this->response([
                'status' => FALSE,
                'message' => FNAME_REQ,
                    ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
        }
        if ($data['lname'] === "") {
            $this->response([
                'status' => FALSE,
                'message' => LNAME_REQ,
                    ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
        }
        if ($data['pass'] === "") {
//            $products = $this->User_model->getOrderList();
            // Check if the products data store contains products (in case the database result returns NULL)
            // Set the response and exit
            $this->response([
                'status' => FALSE,
                'message' => PASSWORD_REQ
                    ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
        }
        if ($this->user->emailverify($data['email'])) {
            $this->response([
                'status' => FALSE,
                'message' => EMAIL_VERIFY
                    ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
        }
        $result = $this->user->getSignup($data);
        if (!empty($result)) {
            $sess = $this->session->all_userdata();
            $data = array(
                'uid' => $sess['uid'],
                'fb_id' => $sess['fb_id'],
                'username_C' => $sess['username_C'],
                'username_P' => $sess['username_P'],
                'email' => $sess['email'],
                'profile_pic' => $sess['profile_pic']
            );
            $this->set_response(['user' => $data, 'status' => TRUE, 'message' => USER_REGISTERED], REST_Controller::HTTP_CREATED); // Create (201) being the HTTP response code
        } else {
            $this->set_response(['status' => FALSE, 'message' => USER_REGISTERED_FAILED], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }

    public function login_post() {
        // Users from a data store e.g. database
        $data['email'] = $this->post('email');
        $data['pass'] = $this->post('pass');
        if ($data['email'] === "") {
            $this->response([
                'status' => FALSE,
                'message' => EMAIL_REQ
                    ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
        if ($data['pass'] === "") {
            // Check if the products data store contains products (in case the database result returns NULL)
            // Set the response and exit
            $this->response([
                'status' => FALSE,
                'message' => PASSWORD_REQ
                    ], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
        $result = $this->user->getLogin($data);
        if (!empty($result)) {
            $sess = $this->session->all_userdata();
            $data = array(
                'uid' => $sess['uid'],
                'fb_id' => $sess['fb_id'],
                'username_C' => $sess['username_C'],
                'username_P' => $sess['username_P'],
                'email' => $sess['email'],
                'profile_pic' => $sess['profile_pic']
            );
            $this->set_response(['user' => $data, 'status' => TRUE, 'message' => LOGIN_SUCCESS], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        } else {
            $this->set_response(['status' => FALSE, 'message' => LOGIN_FAILED], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }

    public function fblogin_post() {
        $data['id'] = $this->post('fbid');
        $data['first_name'] = $this->post('first_name');
        $data['last_name'] = $this->post('last_name');
        $data['email'] = $this->post('email');
        $data['gender'] = $this->post('gender');
        $data['link'] = $this->post('profilelink');
        // Users from a data store e.g. database
        if ($data['id'] === "") {
            $this->response([
                'status' => FALSE,
                'message' => FBID_REQ,
                    ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
        }
        if ($data['first_name'] === "") {
            $this->response([
                'status' => FALSE,
                'message' => FNAME_REQ,
                    ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
        }
        if ($data['last_name'] === "") {
            $this->response([
                'status' => FALSE,
                'message' => LNAME_REQ,
                    ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
        }
        if ($data['email'] === "") {
            $this->response([
                'status' => FALSE,
                'message' => EMAIL_REQ,
                    ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
        }
        if ($data['gender'] === "") {
            $this->response([
                'status' => FALSE,
                'message' => GENDER_REQ
                    ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
        }
        if ($data['link'] === "") {
            $this->response([
                'status' => FALSE,
                'message' => FBLINK_REQ
                    ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
        }
        $result = $this->user->getFBLogin($data);
        if (!empty($result)) {
            $sess = $this->session->all_userdata();
            $data = array(
                'uid' => $sess['uid'],
                'fb_id' => $sess['fb_id'],
                'username_C' => $sess['username_C'],
                'username_P' => $sess['username_P'],
                'email' => $sess['email'],
                'profile_pic' => $sess['profile_pic']
            );
            $this->set_response(['user' => $data, 'status' => TRUE, 'message' => LOGIN_SUCCESS], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        } else {
            $this->set_response(['status' => FALSE, 'message' => LOGIN_FAILED], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }

    public function getpopevents_post() {
        $data['no'] = $this->post('no');
        $data['i'] = $this->post('i');
        // Users from a data store e.g. database
        if ($data['no'] === "") {
            $this->response([
                'status' => FALSE,
                'message' => NO_REQ
                    ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
        }
        if ($data['i'] === "") {
            $this->response([
                'status' => FALSE,
                'message' => I_REQ
                    ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
        }
        $result = $this->event->getPopEventListPaginate($data);
        if (!empty($result)) {
            $result = $this->getTagStriped($result);
            $this->set_response(['event' => $result, 'status' => TRUE, 'message' => POPEVENT_SUCCESS], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        } else {
            $this->set_response(['status' => FALSE, 'message' => POPEVENT_FAILED], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }

    public function getlocalevents_post() {
        $data['no'] = $this->post('no');
        $data['i'] = $this->post('i');
        // Users from a data store e.g. database
        if ($data['no'] === "") {
            $this->response([
                'status' => FALSE,
                'message' => NO_REQ
                    ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
        }
        if ($data['i'] === "") {
            $this->response([
                'status' => FALSE,
                'message' => I_REQ
                    ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
        }
        $result = $this->event->getLocalEventListPaginate($data);
        if (!empty($result)) {
            $result = $this->getTagStriped($result);
            $this->set_response(['event' => $result, 'status' => TRUE, 'message' => POPEVENT_SUCCESS], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        } else {
            $this->set_response(['status' => FALSE, 'message' => POPEVENT_FAILED], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }

    public function getuserevents_post() {
        $data['no'] = $this->post('no');
        $data['i'] = $this->post('i');
        // Users from a data store e.g. database
        if ($data['no'] === "") {
            $this->response([
                'status' => FALSE,
                'message' => NO_REQ
                    ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
        }
        if ($data['i'] === "") {
            $this->response([
                'status' => FALSE,
                'message' => I_REQ
                    ], REST_Controller::HTTP_OK); // NOT_FOUND (404) being the HTTP response code
        }
        $result = $this->event->getUserEventsRest($data);
        if (!empty($result)) {
            $result = $this->getTagStriped($result);
            $this->set_response(['event' => $result, 'status' => TRUE, 'message' => POPEVENT_SUCCESS], REST_Controller::HTTP_OK); // OK (200) being the HTTP response code
        } else {
            $this->set_response(['status' => FALSE, 'message' => POPEVENT_FAILED], REST_Controller::HTTP_NOT_FOUND); // NOT_FOUND (404) being the HTTP response code
        }
    }

}
