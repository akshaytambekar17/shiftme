<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Admin_controller
 *
 * @author Pravinkumar
 */
class Admin_controller extends MY_Controller {

//put your code here
    function __construct() {
        parent::__construct();
        //printDie($this->session->userdata());
        $this->load->model('admin/Admin_model');
        $this->load->model('admin/ProductListModel');
        $this->load->model('admin/QuotationModel','Quotation');
        $this->load->model('admin/OrderModel');
        $this->load->library('form_validation');
        $this->load->helper('message');
        $this->load->model('site_model');
        $this->load->model('User_model');
        $this->load->helper(array('url', 'form', 'email'));
        $this->load->library('session');
        $this->data['filters'] = $this->session->userdata('filters');
    }

    public function dashboard() {
        $group_id = $this->session->userdata('group_id');
        $this->data['user_list'] = $this->User_model->getUsers();
        $this->data['vehicle_services_list'] = $this->Admin_model->getVehicleServices();
        $this->data['product_list'] = $this->ProductListModel->getProductsList();
        $this->data['order_list'] = $this->OrderModel->getOrders();
        $this->data['order_completed_list'] = $this->OrderModel->getOrderCompleted();
        $this->data['enquires_list'] = $this->Enquiry->getEnquires();
        $this->data['quotation_list'] = $this->Quotation->getQuotations();
        $this->data['vendor_list'] = $this->Vendor->getVendors();
        $this->data['template'] = "dashboard";
        $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => '#', 'page' => "Dashboard"));
        $this->load->view('includes/adminltehead');
        $this->admin_layout($this->data);
        $this->load->view('includes/adminltefooter');
    }

//    menu
    public function menus() {
        $this->data['template'] = "Menus/menus";
        $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => '#', 'page' => "Menu"));

        $this->admin_layout($this->data);
    }

    public function menus_add() {
        $this->data['parent'] = $this->Admin_model->getAdminMenus();
        $this->data['template'] = "Menus/menus_add";
        $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => '#', 'page' => "Menu Add"));
        $this->admin_layout($this->data);
    }

    public function menus_save() {
        $this->form_validation->set_rules('name', 'Name', 'required|is_unique[admin_menu.name]');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');
        $this->form_validation->set_rules('parent_id', 'Parent Menu', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->menus_add();
        } else {
            $_POST['create_date'] = date('Y-m-d h:i:s');
            $_POST['created_by'] = $this->session->userdata('user_id');
            $result = $this->Admin_model->saveMenu($_POST);
            if ($result == true) {
                $this->session->set_flashdata('message', array('title' => 'Success.', 'content' => 'Menu Added Successfully.', 'type' => 's'));
                redirect(site_url() . 'admin/Menus');
            } else {
                $this->session->set_flashdata('message', array('title' => 'Error.', 'content' => 'Menu Adding Failed.', 'type' => 'e'));
                redirect(site_url() . 'admin/Menus');
            }
        }
    }

    public function menus_update($id) {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');
        $this->form_validation->set_rules('parent_id', 'Parent Menu', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->menus_edit($id);
        } else {
            unset($_POST['id']);
            $result = $this->Admin_model->updateAdminMenu($_POST, $id);
            if ($result == true) {
                $this->session->set_flashdata('message', array('title' => 'Success.', 'content' => 'Menu Updated Successfully.', 'type' => 's'));
                redirect(site_url() . 'admin/Menus');
            } else {
                $this->session->set_flashdata('message', array('title' => 'Error.', 'content' => 'Menu Updating Failed.', 'type' => 'e'));
                redirect(site_url() . 'admin/Menus');
            }
        }
    }

    public function getMenusData() {

        $edit_link = anchor('admin/Menus-edit/$1', '<i class="fa fa-file-text-o"></i> ' . 'Menu edit');
        $action = '<div class="text-center"><div class="btn-group text-left">'
                . '<button type="button" class="btn btn-default btn-xs btn-primary dropdown-toggle" data-toggle="dropdown">'
                . 'Actions' . ' <i style="color:#fff" class="fa fa-caret-down"></i></button>
		<ul class="dropdown-menu pull-right" role="menu">
			<li>' . $edit_link . '</li>
			</ul>
		</div></div>';

        $this->load->library('datatables');
        $a = $this->db->dbprefix('admin_menu');

        $this->datatables
                ->select("$a.id,$a.name,$a.url,$a.icon,p.name as parent_name,$a.status", false)
                ->from("admin_menu")
                ->join("admin_menu p", "admin_menu.parent_id=p.id", "left");
        $this->datatables->add_column("Actions", $action, "$a.id");
        echo $this->datatables->generate();
    }

    public function menus_edit($id) {
        $this->data['parent'] = $this->Admin_model->getAdminMenus();
        $this->data['menu'] = $this->Admin_model->getAdminMenu($id);
        $this->data['id'] = $id;
        $this->data['template'] = "Menus/menus_edit";

        $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => '#', 'page' => "Menu Edit"));
        $this->admin_layout($this->data);
    }

    public function bulkDelete() {

        $key = $_POST['key'];
        $val = $_POST['val'];
        $table = $_POST['tab'];
        $r = $this->site_model->bulkDelete($key, $val, $table);

        if ($r) {
            echo json_encode(array('status' => 1));
        } else {
            echo json_encode(array('status' => 0));
        }
    }

    public function setStatus() {
        $key = $_POST['key'];
        $id = $_POST['id'];
        $table = $_POST['tab'];
        $r = $this->site_model->setStatus($key, $id, $table);

        if ($r) {
            echo json_encode(array('status' => 1));
        } else {
            echo json_encode(array('status' => 0));
        }
    }

    public function setUStatus() {
        $key = $_POST['key'];
        $id = $_POST['id'];
        $table = $_POST['tab'];
        $r = $this->site_model->setUStatus($key, $id, $table);
        if ($r) {
            echo json_encode(array('status' => 1));
        } else {
            echo json_encode(array('status' => 0));
        }
    }

    //---------<Start subject---------->
    public function services() {

        $this->data['template'] = "Services/services";
        $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => '#', 'page' => "services"));
        $this->admin_layout($this->data);
    }

    public function services_add() {
        $this->data['template'] = "Services/add_services";
        $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => '#', 'page' => "Add services"));
        $this->admin_layout($this->data);
    }

    public function services_edit($id) {
        $this->data['subjectdata'] = $this->Admin_model->getServices($id);
        $this->data['id'] = $id;
        $this->data['template'] = "Services/edit_services";
        $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => '#', 'page' => "Edit services"));
        $this->admin_layout($this->data);
    }

    public function services_save() {
        $this->form_validation->set_rules('name', 'Name', 'required|is_unique[services.name]');
        $this->form_validation->set_rules('description', ' Description', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->services_add();
        } else {
            $result = $this->Admin_model->saveservices($_POST);
            if ($result == true) {
                $this->session->set_flashdata('message', array('title' => '', 'content' => 'Subject Added Successfully.', 'type' => 's'));
                redirect('admin/services');
            } else {
                $this->session->set_flashdata('message', array('title' => '', 'content' => 'Subject Not Added.', 'type' => 'e'));
                redirect('admin/services');
            }
        }
    }

    public function services_update() {

        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('description', 'Description', 'required');
        if ($this->form_validation->run() == FALSE) {

            $this->services_edit($_POST['id']);
        } else {

            $result = $this->Admin_model->updateServices($_POST);

            if ($result == true) {
                $this->session->set_flashdata('message', array('title' => '', 'content' => 'Services Updated Successfully.', 'type' => 's'));
                redirect('admin/services');
            } else {
                $this->session->set_flashdata('message', array('title' => '', 'content' => 'Services Not Updated.', 'type' => 'e'));
                redirect('admin/services');
            }
        }
    }

    public function getServicesdata() {
        $this->load->library('datatables');
        $edit_link = anchor('admin/services-edit/$1', '<i class="fa fa-file-text-o"></i> ' . 'Services Edit');
        $delete_link = anchor('admin/Admin_controller/delete_services/$1', '<i class="fa fa-trash"></i> ' . 'Services Delete');
        $action = '<div class="text-center"><div class="btn-group text-left">'
                . '<button type="button" class="btn btn-default btn-xs btn-primary dropdown-toggle" data-toggle="dropdown">'
                . 'Actions' . ' <i style="color:#fff" class="fa fa-caret-down"></i></button>
		<ul class="dropdown-menu pull-right" role="menu">
			<li>' . $edit_link . '</li>
			<li>' . $delete_link . '</li>
			</ul>
		</div></div>';

        $group_id = $this->session->userdata('group_id');

        $this->datatables
                ->select("id as id,name,description,status", false)
                ->from('services');
        $this->datatables->add_column("Actions", $action, "id");
        echo $this->datatables->generate();
    }

    public function delete_services($id) {
        $result = $this->Admin_model->deleteServices($id);

        if ($result == true) {
            $this->session->set_flashdata('message', array('title' => '', 'content' => 'Services Record  Deleted Succesfully.', 'type' => 's'));
            redirect('admin/services');
        } else {
            $this->session->set_flashdata('message', array('title' => '', 'content' => 'Services Record Not deleted.', 'type' => 'e'));
            redirect('admin/services');
        }
    }

    public function system_user_edit($id) {
        $this->data['groups'] = $this->Admin_model->getGroups();
        $this->data['user'] = $this->Admin_model->getUser($id);
        $this->data['id'] = $id;
        $this->data['template'] = "Users/user_edit";
        $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => '#', 'page' => "User Edit"));
        $this->admin_layout($this->data);
    }

    public function system_user_update($id) {
        $this->form_validation->set_rules('f_name', 'First Name', 'required');
        $this->form_validation->set_rules('l_name', 'Last Name', 'required');
        $this->form_validation->set_rules('email', 'Email_Id', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Re type Password', 'min_length[8]');
        $this->form_validation->set_rules('repassword', 'Password', 'matches[password]');
        $this->form_validation->set_rules('group_id', 'Group', 'required');
        $this->form_validation->set_rules('active', 'Active', 'required');


        if ($this->form_validation->run() == FALSE) {

            $this->system_user_edit($id);
        } else {

            unset($_POST['repassword']);
            unset($_POST['id']);
            $ip_address = $this->input->ip_address();
            $salt = $this->ion->store_salt ? $this->salt() : FALSE;
            if (isset($_POST['password']) && $_POST['password'] != "") {
                $password = $this->ion->hash_password($_POST['password'], $salt);
                $_POST['password'] = $password;
            } else {
                unset($_POST['password']);
            }
            // $_POST['ip_address'] = $ip_address;
            $result = $this->Admin_model->updateSystemUser($_POST, $id);
            if ($result == true) {
                $this->session->set_flashdata('message', array('title' => 'Success.', 'content' => 'Admin User Updated Successfully.', 'type' => 's'));
                redirect(site_url() . 'admin/dashboard');
            } else {
                $this->session->set_flashdata('message', array('title' => 'Error.', 'content' => 'Admin User Updating Failed.', 'type' => 'e'));
                redirect(site_url() . 'admin/dashboard');
            }
        }
    }

    public function about_us() {

        $aboutData = array();
        $aboutData = $this->Admin_model->getAboutDetails();

        if (isset($aboutData) && $aboutData != '') {
            $this->data['aboutCount'] = count($aboutData);
        } else {
            $this->data['aboutCount'] = 0;
        }
        $this->data['template'] = "About Us/about us";
        $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => '#', 'page' => "About Us"));
        $this->admin_layout($this->data);
    }

    public function getaboutDetail() {
        $edit_link = anchor('admin/about-edit/$1', '<i class="fa fa-file-text-o"></i> ' . 'Enquiry edit');
        $action = '<div class="text-center"><div class="btn-group text-left">'
                . '<button type="button" class="btn btn-default btn-xs btn-primary dropdown-toggle" data-toggle="dropdown">'
                . 'Actions' . ' <i style="color:#fff" class="fa fa-caret-down"></i></button>
		<ul class="dropdown-menu pull-right" role="menu">
			<li>' . $edit_link . '</li>
		</ul>
		</div></div>';
        $this->load->library('datatables');
        $a = $this->db->dbprefix('trans_aboutus');
        $this->datatables
                ->select("about_id as id,title,about_details,easy_booking,low_cost_shifting,door_to_door", false)
                ->from("trans_aboutus");
        $this->datatables->add_column("Actions", $action, "id");
        echo $this->datatables->generate();

//        echo json_encode($this->Admin_model->getAboutDetails());
    }

    public function about_edit($id) {
        $this->data['result'] = $this->Admin_model->getAboutDetails();
        $this->data['id'] = $id;
        $this->data['template'] = "About Us/edit_about";
        $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => '#', 'page' => "About Us Edit"));
        $this->admin_layout($this->data);
    }

    public function about_update($id) {
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('long_desc', 'Long Description', 'required');
        $this->form_validation->set_rules('easy_booking', 'Easy Booking', 'required');
        $this->form_validation->set_rules('lowCost_booking', 'Low Cost Shifting Description', 'required');
        $this->form_validation->set_rules('doorToDoor', 'Door to Door Service Description', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->about_edit($id);
        } else {
            $result = $this->Admin_model->updateabout($id);
            if ($result == true) {
                $this->session->set_flashdata('message', array('title' => '', 'content' => 'About Us Updated Successfully.', 'type' => 's'));
                redirect('admin/about-us');
            } else {
                $this->session->set_flashdata('message', array('title' => '', 'content' => 'About Us Not Updated.', 'type' => 'e'));
                redirect('admin/about-us');
            }
        }
    }

    public function slider_images() {
//        
        $this->data['template'] = "Sliders/Sliders";
        $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => '#', 'page' => "Slider Image"));
        $this->admin_layout($this->data);
    }

    public function getSliderData() {
        $edit_link = anchor('admin/slider-edit/$1', '<i class="fa fa-file-text-o"></i> ' . 'edit');
        $delete_link = anchor('admin/slider-delete/$1', '<i class="fa fa-trash"></i> ' . 'Delete');
        $action = '<div class="text-center"><div class="btn-group text-left">'
                . '<button type="button" class="btn btn-default btn-xs btn-primary dropdown-toggle" data-toggle="dropdown">'
                . 'Actions' . ' <i style="color:#fff" class="fa fa-caret-down"></i></button>
		<ul class="dropdown-menu pull-right" role="menu">
			<li>' . $edit_link . '</li>
			<li>' . $delete_link . '</li>
		</ul>
		</div></div>';
        $this->load->library('datatables');
        $a = $this->db->dbprefix('trans_home_slider');
        $this->datatables
                ->select("id as id, Description,  status", false)
                ->from("trans_home_slider");
        $this->datatables->add_column("Actions", $action, "id");
        echo $this->datatables->generate();
    }

    public function slider_add() {
        $this->data['template'] = "Sliders/slder-add";
        $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => '#', 'page' => "Add Slider Image"));
        $this->admin_layout($this->data);
    }

    public function slider_save() {
        $this->form_validation->set_rules('description', 'Image Title', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->slider_add();
        } else {
            $result = $this->Admin_model->slider_add();
            if ($result == true) {
                $this->session->set_flashdata('message', array('title' => '', 'content' => 'Slider Image Added Successfully.', 'type' => 's'));
                redirect('admin/slider-images');
            } else {
                $this->session->set_flashdata('message', array('title' => '', 'content' => 'Slider Image Not Added.', 'type' => 'e'));
                redirect('admin/slider-images');
            }
        }
    }

    public function slider_update($id) {
        $this->form_validation->set_rules('description', 'Image Title', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->slider_edit($id);
        } else {
            $result = $this->Admin_model->slider_update($id);
            if ($result == true) {
                $this->session->set_flashdata('message', array('title' => '', 'content' => 'Slider Image Updated Successfully.', 'type' => 's'));
                redirect('admin/slider-images');
            } else {
                $this->session->set_flashdata('message', array('title' => '', 'content' => 'Slider Image Not Updated.', 'type' => 'e'));
                redirect('admin/slider-images');
            }
        }
    }

    public function slider_edit($id) {
        $this->data['result'] = $this->Admin_model->slider_data($id);
        $this->data['id'] = $id;
        $this->data['template'] = "Sliders/slider-edit";
        $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => '#', 'page' => "Slider Edit"));
        $this->admin_layout($this->data);
    }

    public function slider_delete($id) {
        $result = $this->Admin_model->slider_delete($id);
        if ($result == true) {
            $this->session->set_flashdata('message', array('title' => '', 'content' => 'Slider Image Deleted Successfully.', 'type' => 's'));
            redirect('admin/slider-images');
        } else {
            $this->session->set_flashdata('message', array('title' => '', 'content' => 'Slider Image Not Deleted.', 'type' => 'e'));
            redirect('admin/slider-images');
        }
    }

    public function getstaffData() {
        $edit_link = anchor('admin/staff-edit/$1', '<i class="fa fa-file-text-o"></i> ' . 'edit');
        $delete_link = anchor('admin/staff-delete/$1', '<i class="fa fa-trash"></i> ' . 'Delete');
        $action = '<div class="text-center"><div class="btn-group text-left">'
                . '<button type="button" class="btn btn-default btn-xs btn-primary dropdown-toggle" data-toggle="dropdown">'
                . 'Actions' . ' <i style="color:#fff" class="fa fa-caret-down"></i></button>
		<ul class="dropdown-menu pull-right" role="menu">
			<li>' . $edit_link . '</li>
			<li>' . $delete_link . '</li>
		</ul>
		</div></div>';
        $this->load->library('datatables');
        $a = $this->db->dbprefix('trans_home_slider');
        $this->datatables
                ->select("id as id, name ,designation,about,status", false)
                ->from("trans_our_stuff");
        $this->datatables->add_column("Actions", $action, "id");
        echo $this->datatables->generate();
    }

    public function staff() {
        $this->data['template'] = "Our Stuff/staff";
        $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => '#', 'page' => "Our Staff"));
        $this->admin_layout($this->data);
    }

    public function staff_add() {
        $this->data['template'] = "Our Stuff/staff-add";
        $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => '#', 'page' => "Add Slider Image"));
        $this->admin_layout($this->data);
    }

    public function staff_save() {
        $this->form_validation->set_rules('Name', 'Name', 'required');
        $this->form_validation->set_rules('designation', 'Designation', 'required');
        $this->form_validation->set_rules('about', 'About', 'required');
//        $this->form_validation->set_rules('fblink', 'facebook link', 'required');
//        $this->form_validation->set_rules('twitterlink', 'Twitter link', 'required');
//        $this->form_validation->set_rules('linkedinlink', 'linkedin link', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->staff_add();
        } else {
            $result = $this->Admin_model->staff_save();
            if ($result == true) {
                $this->session->set_flashdata('message', array('title' => '', 'content' => 'Staff Add Successfully.', 'type' => 's'));
                redirect('admin/staff');
            } else {
                $this->session->set_flashdata('message', array('title' => '', 'content' => 'Image Size Must Be Less than 250 X 300px.', 'type' => 'e'));
                redirect('admin/staff');
            }
        }
    }

    public function staff_edit($id) {
        $this->data['result'] = $this->Admin_model->staff_data($id);

        $this->data['id'] = $id;
        $this->data['template'] = "Our Stuff/staff-edit";
        $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => '#', 'page' => "Slider Edit"));
        $this->admin_layout($this->data);
    }

    public function staff_update($id) {
        $this->form_validation->set_rules('Name', 'Name', 'required');
        $this->form_validation->set_rules('designation', 'Designation', 'required');
        $this->form_validation->set_rules('about', 'About', 'required');
//        $this->form_validation->set_rules('fblink', 'facebook link', 'required');
//        $this->form_validation->set_rules('twitterlink', 'Twitter link', 'required');
//        $this->form_validation->set_rules('linkedinlink', 'linkedin link', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->staff_edit($id);
        } else {
            $result = $this->Admin_model->staff_update($id);
            if ($result == true) {
                $this->session->set_flashdata('message', array('title' => '', 'content' => 'Staff Updated Successfully.', 'type' => 's'));
                redirect('admin/staff');
            } else {
                $this->session->set_flashdata('message', array('title' => '', 'content' => 'Image Size Must Be Less Than 360 X 360 px.', 'type' => 'e'));
                redirect('admin/staff');
            }
        }
    }

    public function staff_delete($id) {
        $result = $this->Admin_model->staff_delete($id);
        if ($result == true) {
            $this->session->set_flashdata('message', array('title' => '', 'content' => 'Staff Deleted Successfully.', 'type' => 's'));
            redirect('admin/staff');
        } else {
            $this->session->set_flashdata('message', array('title' => '', 'content' => 'Staff Not Deleted.', 'type' => 'e'));
            redirect('admin/staff');
        }
    }

    public function getclientsData() {
        $edit_link = anchor('admin/clients-edit/$1', '<i class="fa fa-file-text-o"></i> ' . 'edit');
        $delete_link = anchor('admin/clients-delete/$1', '<i class="fa fa-trash"></i> ' . 'Delete');
        $action = '<div class="text-center"><div class="btn-group text-left">'
                . '<button type="button" class="btn btn-default btn-xs btn-primary dropdown-toggle" data-toggle="dropdown">'
                . 'Actions' . ' <i style="color:#fff" class="fa fa-caret-down"></i></button>
		<ul class="dropdown-menu pull-right" role="menu">
			<li>' . $edit_link . '</li>
			<li>' . $delete_link . '</li>
		</ul>
		</div></div>';
        $this->load->library('datatables');
        $a = $this->db->dbprefix('trans_home_slider');
        $this->datatables
                ->select("id as id,name,status", false)
                ->from("trans_clients");
        $this->datatables->add_column("Actions", $action, "id");
        echo $this->datatables->generate();
    }

    public function clients() {
        $this->data['template'] = "Clients/clients";
        $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => '#', 'page' => "Our Clients"));
        $this->admin_layout($this->data);
    }

    public function clients_add() {
        $this->data['template'] = "Clients/clients-add";
        $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => '#', 'page' => "Add Clients"));
        $this->admin_layout($this->data);
    }

    public function clients_save() {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->clients_add();
        } else {
            $result = $this->Admin_model->clients_save();
            if ($result == true) {
                $this->session->set_flashdata('message', array('title' => '', 'content' => 'Client Add Successfully.', 'type' => 's'));
                redirect('admin/clients');
            } else {
                $this->session->set_flashdata('message', array('title' => '', 'content' => 'Client Not Added.', 'type' => 'e'));
                redirect('admin/clients');
            }
        }
    }

    public function clients_edit($id) {
        $this->data['result'] = $this->Admin_model->clients_data($id);
        $this->data['id'] = $id;
        $this->data['template'] = "Clients/clients-edit";
        $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => '#', 'page' => "Client Edit"));
        $this->admin_layout($this->data);
    }

    public function clients_update($id) {
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->clients_edit($id);
        } else {
            $result = $this->Admin_model->clients_update($id);
            if ($result == true) {
                $this->session->set_flashdata('message', array('title' => '', 'content' => 'Clients Updated Successfully.', 'type' => 's'));
                redirect('admin/clients');
            } else {
                $this->session->set_flashdata('message', array('title' => '', 'content' => 'Clients Not Updated.', 'type' => 'e'));
                redirect('admin/clients');
            }
        }
    }

    public function clients_delete($id) {
        $result = $this->Admin_model->clients_delete($id);
        if ($result == true) {
            $this->session->set_flashdata('message', array('title' => '', 'content' => 'Clients Deleted Successfully.', 'type' => 's'));
            redirect('admin/clients');
        } else {
            $this->session->set_flashdata('message', array('title' => '', 'content' => 'Clients Not Deleted.', 'type' => 'e'));
            redirect('admin/clients');
        }
    }

    public function delete_contactus($id) {
        $result = $this->Admin_model->contactus_delete($id);
        if ($result == true) {
            $this->session->set_flashdata('message', array('title' => '', 'content' => 'Contact Us Email Deleted Successfully.', 'type' => 's'));
            redirect('admin/contactus');
        } else {
            $this->session->set_flashdata('message', array('title' => '', 'content' => 'Contact Us Email Not Deleted.', 'type' => 'e'));
            redirect('admin/contactus');
        }
    }

    public function gettermsData() {
        $edit_link = anchor('admin/trems-edit/$1', '<i class="fa fa-file-text-o"></i> ' . 'edit');
        $action = '<div class="text-center"><div class="btn-group text-left">'
                . '<button type="button" class="btn btn-default btn-xs btn-primary dropdown-toggle" data-toggle="dropdown">'
                . 'Actions' . ' <i style="color:#fff" class="fa fa-caret-down"></i></button>
		<ul class="dropdown-menu pull-right" role="menu">
			<li>' . $edit_link . '</li>
		</ul>
		</div></div>';
        $this->load->library('datatables');
        $a = $this->db->dbprefix('terms_condition');
        $this->datatables
                ->select("id, description", false)
                ->from("trans_terms_condition");
        $this->datatables->add_column("Actions", $action, "id");
        echo $this->datatables->generate();
    }

    public function trems() {
        $this->data['template'] = "Terms/terms-conditions";
        $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => '#', 'page' => "Term & Conditions"));
        $this->admin_layout($this->data);
    }

    public function trems_edit($id) {
        $this->data['result'] = $this->Admin_model->terms_data($id);
        $this->data['id'] = $id;
        $this->data['template'] = "Terms/trems-edit";
        $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => '#', 'page' => "Terms & Conditions Edit"));
        $this->admin_layout($this->data);
    }

    public function terms_update($id) {
        $this->form_validation->set_rules('description', 'Description', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->trems_edit($id);
        } else {
            $result = $this->Admin_model->terms_update($id);
            if ($result == true) {
                $this->session->set_flashdata('message', array('title' => '', 'content' => 'Term and Coditions Updated Successfully.', 'type' => 's'));
                redirect('admin/terms');
            } else {
                $this->session->set_flashdata('message', array('title' => '', 'content' => 'Term and Coditions Not Updated.', 'type' => 'e'));
                redirect('admin/terms');
            }
        }
    }

    public function users() {
        $this->data['user_list'] = $this->User_model->getUsers();
        $this->data['template'] = "Users/users_list";
        $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => '#', 'page' => "User List"));
        $this->admin_layout($this->data);
    }

    public function userDelete() {
        $post = $this->input->post();
        $result = $this->User_model->deleteUser($post['user_id']);
        if ($result) {
            echo true;
        } else {
            echo false;
        }
    }

    public function sms_sending() {
        $this->data['user_list'] = $this->User_model->getUsers();
        $this->data['template'] = "SmsSending/sms_sending";
        $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => '#', 'page' => "SMS Sending"));
        $this->admin_layout($this->data);
    }
    
    public function send_sms() {
        $post = $this->input->post();
        $message = strip_tags($post['message']);
        $data = array('user_count' => $post['count'],
            'message' => $message,
            'send_at' => date('Y-m-d H:i:s')
        );
        $this->Admin_model->insertSMSDetails($data);
        $values = json_decode(stripslashes($post['values']));
        foreach ($values as $val) {
            $user = $this->User_model->getUsersById($val);
            $this->sendSms($user['mobileno'], $message);
        }
        echo 1;
    }
    public function CMSPage() {
        $this->data['user_list'] = $this->User_model->getUsers();
        $this->data['template'] = "SmsSending/sms_sending";
        $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => '#', 'page' => "SMS Sending"));
        $this->admin_layout($this->data);
    }

}
