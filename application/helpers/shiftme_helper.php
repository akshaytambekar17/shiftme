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
function getQuotationsByNotRead(){
    $ci=& get_instance();
    $ci->load->model('admin/QuotationModel','Quotation');
    $list = $ci->Quotation->getQuotationsByNotRead();
    return $list;
}
