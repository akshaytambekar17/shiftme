<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Site
 *
 * @author Pravinkumar
 */
class Site {

    var $ci = null;

    public function __get($var) {
        return get_instance()->$var;
    }

    public function __construct() {
        $this->ci = &get_instance();
    }

//put your code here
    function getIp() {
        return $_SERVER['REMOTE_ADDR'];
    }

    public function getUserId() {
        return $this->session->userdata('uid');
    }

    public function encryptPass($pass) {
        $salt = $this->config->item('salt');
        return md5($pass . $salt);
    }

    public function getWhere($table, $field = "*", $where = null, $flag = false) {
        $this->db->select($field);
        if (isset($where)) {
            $this->db->where($where);
        }
        $rs = $this->db->get($table);
        if ($rs->num_rows() > 0) {
            if ($flag) {
                return $rs->result();
            } else {
                return $rs;
            }
        } else {
            return false;
        }
    }

    public function getProfile() {
        $profile = $this->getWhere('register', '*', array('id' => $this->ci->session->userdata('uid')));
        $profile = $profile->result();
        $profile = $this->getJSONFilterd($profile);
        return $profile[0];
    }

    public function getPermission() {
        $privacy = $this->getWhere('permission_nuser', '*', array('user_id' => $this->ci->session->userdata('uid')));
        $privacy = $privacy->row();
        $privacy->academics = json_decode($privacy->academics);
        $privacy->workingAt = json_decode($privacy->workingAt);
        $privacy->achieved = json_decode($privacy->achieved);
        $privacy->sports = json_decode($privacy->sports);
        return $privacy;
    }

    public function minify($file) {
        $this->load->driver('minify');
        $pi = pathinfo($file);
        $bn = explode(".", $pi['basename']);
        $fp = fopen($pi['dirname'] . "/" . $bn[0] . ".min." . $bn[1], 'w');
        $data = $this->minify->js->min($file);
        fwrite($fp, $data, strlen($data));
        fclose($fp);
        return $pi['dirname'] . "/" . $bn[0] . ".min." . $bn[1];
    }

    public function getJSONFilterd($rs) {
        $rss = array();
        $pattern = '/\{(?:[^{}]|(?R))*\}/x';
        $i = 0;

        foreach ($rs as $r) {
            $rss[$i] = $r;
            $x = array_keys((array) $r);
            foreach ($x as $z) {
                if ($z != "prominent_guests") {
                    if (preg_match($pattern, $r->{$z})) {
                        $rss[$i]->{$z} = json_decode($r->{$z});
                    }
                } else {
                    $rss[$i]->{$z} = json_decode($r->{$z});
                }
            }
            $i++;
        }
        return $rss;
    }

}
