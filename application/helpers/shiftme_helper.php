<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function getEnquiresByNotRead(){
    $ci=& get_instance();
    $ci->load->model('admin/EnquiryModel','Enquiry');
    $list = $ci->Enquiry->getEnquiresByNotRead();
    return $list;
}
function getQuickEnquiresByNotView(){
    $ci=& get_instance();
    $ci->load->model('admin/QuickEnquiryModel','QuickEnquiry');
    $list = $ci->QuickEnquiry->getQuickEnquiresByNotView();
    return $list;
}
function getQuotationsByNotRead(){
    $ci=& get_instance();
    $ci->load->model('admin/QuotationModel','Quotation');
    $list = $ci->Quotation->getQuotationsByNotRead();
    return $list;
}
function getOrdersByNotRead(){
    $ci=& get_instance();
    $ci->load->model('admin/OrderModel','Order');
    $list = $ci->Order->getOrdersByNotRead();
    return $list;
}
function getContactsByNotRead(){
    $ci=& get_instance();
    $ci->load->model('admin/ContactUsModel','ContactUs');
    $list = $ci->ContactUs->getContactsByNotRead();
    return $list;
}
function getOrdersByUserId($user_id){
    $ci=& get_instance();
    $ci->load->model('admin/OrderModel','Order');
    $list = $ci->Order->getOrdersByUserId($user_id);
    return $list;
}