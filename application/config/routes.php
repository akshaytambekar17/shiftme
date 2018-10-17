<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
  | -------------------------------------------------------------------------
  | URI ROUTING
  | -------------------------------------------------------------------------
  | This file lets you re-map URI requests to specific controller functions.
  |
  | Typically there is a one-to-one relationship between a URL string
  | and its corresponding controller class/method. The segments in a
  | URL normally follow this pattern:
  |
  |	example.com/class/method/id/
  |
  | In some instances, however, you may want to remap this relationship
  | so that a different class/function is called than the one
  | corresponding to the URL.
  |
  | Please see the user guide for complete details:
  |
  |	https://codeigniter.com/user_guide/general/routing.html
  |
  | -------------------------------------------------------------------------
  | RESERVED ROUTES
  | -------------------------------------------------------------------------
  |
  | There are three reserved routes:
  |
  |	$route['default_controller'] = 'welcome';
  |
  | This route indicates which controller class should be loaded if the
  | URI contains no data. In the above example, the "welcome" class
  | would be loaded.
  |
  |	$route['404_override'] = 'errors/page_missing';
  |
  | This route will tell the Router which controller/method to use if those
  | provided in the URL cannot be matched to a valid route.
  |
  |	$route['translate_uri_dashes'] = FALSE;
  |
  | This is not exactly a route, but allows you to automatically route
  | controller and method names that contain dashes. '-' isn't a valid
  | class or method name character, so it requires translation.
  | When you set this option to TRUE, it will replace ALL dashes in the
  | controller and method URI segments.
  |
  | Examples:	my-controller/index	-> my_controller/index
  |		my-controller/my-method	-> my_controller/my_method
 */
$route['default_controller'] = 'User_controller';
$route['admin'] = "Auth";
$route['admin/dashboard'] = "admin/Admin_controller/dashboard";

$route['order'] = "admin/OrderController/index";
$route['order/delete'] = "admin/OrderController/delete";
$route['order/view'] = "admin/OrderController/view";

$route['invoice'] = "admin/InvoiceController/index";
$route['invoice/delete'] = "admin/InvoiceController/delete";
$route['invoice/view'] = "admin/InvoiceController/view";


$route['admin/users'] = "admin/Admin_controller/users";
$route['admin/user-delete'] = "admin/Admin_controller/userDelete";

$route['admin/quotation'] = "admin/Admin_controller/quotation";
$route['admin/quotation-delete'] = "admin/Admin_controller/quotationDelete";
$route['admin/quotation-add'] = "admin/Admin_controller/quotationAdd";
$route['admin/quotation-view'] = "admin/Admin_controller/quotationView";

$route['admin/product-list'] = "admin/Admin_controller/product";
$route['admin/product-delete'] = "admin/Admin_controller/productDelete";
$route['admin/product-add'] = "admin/Admin_controller/productAdd";
$route['admin/product-edit'] = "admin/Admin_controller/productEdit";

$route['admin/sms-sending'] = "admin/Admin_controller/sms_sending";
$route['admin/send_sms'] = "admin/Admin_controller/send_sms";


$route['admin/Menus'] = "admin/Admin_controller/menus";
$route['admin/Menus-add'] = "admin/Admin_controller/menus_add";
$route['admin/Menus-edit/(:any)'] = "admin/Admin_controller/menus_edit/$1";
$route['admin/Menus-save'] = "admin/Admin_controller/menus_save";
$route['admin/Menus-update/(:any)'] = "admin/Admin_controller/menus_update/$1";

$route['admin/Users-edit/(:any)'] = "admin/Admin_controller/system_user_edit/$1";
$route['admin/User-update/(:any)'] = "admin/Admin_controller/system_user_update/$1";
//services
$route['admin/services'] = "admin/Admin_controller/services";
$route['admin/services-add'] = "admin/Admin_controller/services_add";
$route['admin/services-edit/(:any)'] = "admin/Admin_controller/services_edit/$1";
$route['admin/services-save'] = "admin/Admin_controller/services_save";
$route['admin/services-update/(:any)'] = "admin/Admin_controller/services_update/$1";

$route['admin/shiftingServices'] = "admin/Setting_controller/shiftingServices";
$route['admin/shiftingServices-add'] = "admin/Setting_controller/shiftingServices_add";
$route['admin/shiftingServices-edit/(:any)'] = "admin/Setting_controller/shiftingServices_edit/$1";
$route['admin/shiftingServices-view/(:any)'] = "admin/Setting_controller/shiftingServices_view/$1";
$route['admin/shiftingServices-save'] = "admin/Setting_controller/shiftingServices_save";
$route['admin/shiftingServices-update/(:any)'] = "admin/Setting_controller/shiftingServices_update/$1";

//labour services
$route['admin/labourServices'] = "admin/Setting_controller/labourServices";
$route['admin/labourServices-add'] = "admin/Setting_controller/labourServices_add";
$route['admin/labourServices-edit/(:any)'] = "admin/Setting_controller/labourServices_edit/$1";
$route['admin/labourServices-view/(:any)'] = "admin/Setting_controller/labourServices_view/$1";
$route['admin/labourServices-save'] = "admin/Setting_controller/labourServices_save";
$route['admin/labourServices-update/(:any)'] = "admin/Setting_controller/labourServices_update/$1";

//testimonials

$route['admin/testimonials'] = "admin/Setting_controller/testimonials";
$route['admin/testimonials-add'] = "admin/Setting_controller/testimonials_add";
$route['admin/testimonials-edit/(:any)'] = "admin/Setting_controller/testimonials_edit/$1";
$route['admin/testimonials-view/(:any)'] = "admin/Setting_controller/testimonials_view/$1";
$route['admin/testimonials-save'] = "admin/Setting_controller/testimonials_save";
$route['admin/testimonials-update/(:any)'] = "admin/Setting_controller/testimonials_update/$1";
$route['admin/contactus'] = "admin/Setting_controller/contactus";

//Footer Contents

$route['admin/footer-content'] = "admin/Setting_controller/footer_Content";
$route['admin/FooterContent-edit/(:any)'] = "admin/Setting_controller/FooterContent_edit/$1";
$route['admin/FooterContent-update/(:any)'] = "admin/Setting_controller/FooterContent_update/$1";


//Users
$route['logout'] = "User_controller/logout";
$route['myaccount'] = "User_controller/myaccount";
$route['change-password'] = "User_controller/updatepassword";
$route['shifting'] = "Services_controller/shifting";
$route['labour'] = "Services_controller/labour";
$route['vehicle'] = "Services_controller/vehicle";
$route['aboutus'] = "Services_controller/aboutus";
$route['qoute'] = "User_controller/qoute";
$route['terms'] = "User_controller/getterms";
$route['faq'] = "Services_controller/faq";
$route['policy'] = "Services_controller/privacy_policy";
$route['quick-quote'] = "User_controller/quick_qoute";
$route['cost'] = "Services_controller/cost";

$route['contactus'] = "User_controller/contactus";
//vehicle services
$route['admin/vehicleServices'] = "admin/Setting_controller/vehicleServices";
$route['admin/vehicleServices-add'] = "admin/Setting_controller/vehicleServices_add";
$route['admin/vehicleServices-edit/(:any)'] = "admin/Setting_controller/vehicleServices_edit/$1";
$route['admin/vehicleServices-view/(:any)'] = "admin/Setting_controller/vehicleServices_view/$1";
$route['admin/vehicleServices-save'] = "admin/Setting_controller/vehicleServices_save";
$route['admin/vehicleServices-update/(:any)'] = "admin/Setting_controller/vehicleServices_update/$1";
//enquiry

$route['admin/enquiry'] = "admin/Setting_controller/enquiry";
$route['admin/enquiry-edit/(:any)'] = "admin/Setting_controller/enquiry_edit/$1";
$route['admin/enquiry-update/(:any)'] = "admin/Setting_controller/enquiry_update/$1";
$route['admin/enquiry-view/(:any)'] = "admin/Setting_controller/enquiry_view/$1";

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// About Us
$route['admin/about-us'] = "admin/Admin_controller/about_us";
$route['admin/about-edit/(:any)'] = "admin/Admin_controller/about_edit/$1";
$route['admin/aboutus-update/(:any)'] = "admin/Admin_controller/about_update/$1";

// Slider Images
$route['admin/slider-images'] = "admin/Admin_controller/slider_images";
$route['admin/slider-images-add'] = "admin/Admin_controller/slider_add";
$route['admin/slider-save'] = "admin/Admin_controller/slider_save";
$route['admin/slider-edit/(:any)'] = "admin/Admin_controller/slider_edit/$1";
$route['admin/slider-update/(:any)'] = "admin/Admin_controller/slider_update/$1";
$route['admin/slider-delete/(:any)'] = "admin/Admin_controller/slider_delete/$1";

// Our Staff
$route['admin/staff'] = "admin/Admin_controller/staff";
$route['admin/staff-add'] = "admin/Admin_controller/staff_add";
$route['admin/staff-save'] = "admin/Admin_controller/staff_save";
$route['admin/staff-edit/(:any)'] = "admin/Admin_controller/staff_edit/$1";
$route['admin/staff-update/(:any)'] = "admin/Admin_controller/staff_update/$1";

$route['admin/staff-delete/(:any)'] = "admin/Admin_controller/staff_delete/$1";

$route['admin/quote'] = "admin/Setting_controller/quote";
$route['admin/quote-delete/(:any)'] = "admin/Setting_controller/Quote_delete/$1";
$route['admin/staff-delete/(:any)'] = "admin/Admin_controller/staff_delete/$1";

//Our Clients
$route['admin/clients'] = "admin/Admin_controller/clients";
$route['admin/clients-add'] = "admin/Admin_controller/clients_add";
$route['admin/clients-save'] = "admin/Admin_controller/clients_save";
$route['admin/clients-edit/(:any)'] = "admin/Admin_controller/clients_edit/$1";
$route['admin/clients-update/(:any)'] = "admin/Admin_controller/clients_update/$1";
$route['admin/clients-delete/(:any)'] = "admin/Admin_controller/clients_delete/$1";


//FAQ
$route['admin/faq'] = "admin/Setting_controller/FAQ";
$route['admin/faq-edit/(:any)'] = "admin/Setting_controller/faq_edit/$1";
$route['admin/faq-update/(:any)'] = "admin/Setting_controller/faq_update/$1";
//Privacy_Policy
$route['admin/policy'] = "admin/Setting_controller/Privacy_Policy";
$route['admin/policy-edit/(:any)'] = "admin/Setting_controller/Privacy_Policy_edit/$1";
$route['admin/policy-update/(:any)'] = "admin/Setting_controller/Privacy_Policy_update/$1";

// terms and condition
$route['admin/terms'] = "admin/Admin_controller/trems";
$route['admin/trems-edit/(:any)'] = "admin/Admin_controller/trems_edit/$1";
$route['admin/terms_update/(:any)'] = "admin/Admin_controller/terms_update/$1";

