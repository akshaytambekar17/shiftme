<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function setValue($v1, $v2) {
    if (isset($v1) && $v1 != "") {
        return $v1;
    } else {
        return $v2;
    }
}

function currancyformat($p) {
    return "&#8377 " . number_format($p, 2);
}
function printDie($data){
    echo "<pre>";
    print_r($data);
    die;
}
function prints($data){
    echo "<pre>";
    print_r($data);
}
function includesAll($data){
    $ci=& get_instance();
    $ci->load->view('user/includes/header',$data);
    $ci->load->view('user/includes/menubar',$data);
    $ci->load->view('user/'.$data['view'],$data);
    $ci->load->view('user/includes/footer',$data);
}
function userSession(){
    $ci = & get_instance();
    $details = $ci->session->all_userdata();
    if(empty($details['userData'])){
        $ci->load->model('User_model', 'User');
        $details = $ci->User->getUsersById(232);
        $details['uid'] = $details['user_id'];
     }
    if(!empty($details)){
        return $details;
    }else{
        return false;
    }
}