<?php

class MY_Controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->less = $this->config->item('less');
        define("ADMINASSETS", base_url() . "assets/admin/");
        define("USERASSETS", base_url() . "assets/");
        define('SITEURL', site_url());
        define('ASSETSURL', base_url() . 'assets/');
        define('BASEURL', base_url());
        define('ANGULARURL', base_url() . 'angular-js/');
        define('IMGURL', base_url() . 'assets/img/');
        define('SITENAME', "TRANSPORT");
        define('LOADERIMG', IMGURL . "ajax-loading.gif");
        $this->load->model('Site_model', 'site_model');

        $this->load->database();
        $this->load->library(array('ion_auth', 'form_validation'));
        $this->load->helper(array('url', 'language'));
        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));
        $this->lang->load('auth');
        $this->loggedIn = $this->ion_auth->logged_in();
    }

    public function layout($data) {
//        echo '<pre>';
//        print_r($data);
//        echo '</pre>';
//        die();
        $temp['data'] = $data;
        $temp['footer'] = $this->site_model->getFooterContent();
        $this->config->set_item('less', $this->less);
        $this->load->view('user/layout/index', $temp);
    }

    public function user_layout($data) {
        $temp['footer'] = $this->site_model->getFooterContent();
        if ($this->session->userdata('uid') != "") {
            if ($data['template'] == "signup") {
                $data['template'] = "Popular";
                $temp['data'] = $data;
            } else {
                $temp['data'] = $data;
            }
            $this->config->set_item('less', $this->less);
            $this->load->view('user/layout/index', $temp);
        } else {
            $data['template'] = "signup";
            $temp['data'] = $data;
            $this->config->set_item('less', $this->less);
            $this->load->view('user/layout/index', $temp);
        }
    }

    public function sendMail($to, $sub, $msg, $from_name, $from) {

        /*$config['mailtype'] = "html";
        $config['wordwrap'] = TRUE;
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");
        $this->email->from($from); // change it to yours
        $this->email->to($to); // change it to yours
        $this->email->subject($sub);
        $this->email->message($msg);
        return $this->email->send();*/
        
        
        $this->load->library('phpmailer/Pmailer');
        $mail = $this->pmailer->getMailer();

        $mail->setFrom("team@shiftme.in", "Shiftme.in");
        //$mail->addReplyTo($from, $from_name);

        $mail->addAddress($to);  // Optional name
        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = $sub;
        $mail->Body = $msg;
        echo '<pre>';
        print_r($mail);
        echo '</pre>';
        die();
	$m=$mail->send();

        if (!$m) {
//            return array('s' => 0, 'err' => $mail->ErrorInfo);
            return false;
        } else {
//            return array('s' => 1, 'err' => "");
            return true;
        }

    }

    function curlReq($url, $vars) {
        $curl_handle = curl_init();
        curl_setopt($curl_handle, CURLOPT_URL, $url);
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl_handle, CURLOPT_POST, 1);
        curl_setopt($curl_handle, CURLOPT_POSTFIELDS, $vars);
        $buffer = curl_exec($curl_handle);
        curl_close($curl_handle);
        $object = json_decode($buffer);
        return $object;
    }

    public function admin_layout($data) {
        if (!$this->ion_auth->logged_in()) {
            redirect('auth/login');
        }
        $this->data['menus'] = $this->site_model->getMenus();
        //$this->data['pay'] = json_encode($this->site->getPayGetWay());
        $this->data['data'] = $data;
        $this->data['title'] = ucfirst($data['template']);
        $this->load->view('admin/layout/index', $this->data);
    }

  

    public function minify() {
        $this->load->library('minify');
// or load and assign custom config (will override values from config file)
//        $this->load->library('minify', $config);
    }

    public function getTagStriped($rs) {
        $rss = array();
        $pattern = '/\{(?:[^{}]|(?R))*\}/x';
        $i = 0;
        foreach ($rs as $r) {
            $rss[$i] = $r;
            $x = array_keys((array) $r);
            foreach ($x as $z) {
                if ($z != 'images') {
                    if (!is_array($r->{$z})) {
                        $rss[$i]->{$z} = strip_tags($r->{$z});
                        $rss[$i]->{$z} = preg_replace("/[\n\r]/", "", $rss[$i]->{$z});
                    } else {
                        $rss[$i]->{$z} = $this->getTagStriped((array) $r->{$z});
                    }
                } else {
                    $rss[$i]->{$z} = $r->{$z};
                }
            }
            $i++;
        }
        return $rss;
    }

    public function sendSms($mobileno, $textmessage) {
//Your authentication key
        $authKey = "134387Aw1n8DZ95858dde3";
//Multiple mobiles numbers separated by comma
        $mobileNumber = $mobileno;
//Sender ID,While using route4 sender id should be 6 characters long.
        $senderId = "TEST";
//Your message to send, Add URL encoding here.
        $message = urlencode($textmessage);
//Define route 
        $route = "default";
//Prepare you post parameters
        $postData = array(
            'authkey' => $authKey,
            'mobiles' => $mobileNumber,
            'message' => $message,
            'sender' => $senderId,
            'route' => $route
        );
//API URL
        $url = "https://control.msg91.com/api/sendhttp.php";
// init the resource
        $ch = curl_init();
        curl_setopt_array($ch, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $postData
                //,CURLOPT_FOLLOWLOCATION => true
        ));
//Ignore SSL certificate verification
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
//get response
        $output = curl_exec($ch);
//Print error if any
        if (curl_errno($ch)) {
//            echo 'error:' . curl_error($ch);
            return FALSE;
        }
        curl_close($ch);
        return TRUE;
//        echo $output;
    }

}
