<?php

class Setting_controller extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('admin/Setting_model');
        $this->load->library('form_validation');
        $this->load->helper('message');
        //$this->load->model('site_model');
        $this->load->helper(array('url', 'form'));
        $this->load->library('session');
        $this->data['filters'] = $this->session->userdata('filters');
    }

    public function shiftingServices() {
        $shiftingData = array();
        $shiftingData = $this->Setting_model->getShiftingData();

        if (isset($shiftingData) && $shiftingData != '') {
            $this->data['shiftingCount'] = count($shiftingData);
        } else {
            $this->data['shiftingCount'] = 0;
        }
        $this->data['template'] = "ShiftingServices/shifting";
        $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => '#', 'page' => "Shifting Services"));
        $this->admin_layout($this->data);
    }

    public function getshiftingServicesData() {

        $edit_link = anchor('admin/shiftingServices-edit/$1', '<i class="fa fa-file-text-o"></i> ' . 'Service edit');
        $view_link = anchor('admin/shiftingServices-view/$1', '<i class="fa fa-file-text-o"></i> ' . 'Service view');
        $action = '<div class="text-center"><div class="btn-group text-left">'
                . '<button type="button" class="btn btn-default btn-xs btn-primary dropdown-toggle" data-toggle="dropdown">'
                . 'Actions' . ' <i style="color:#fff" class="fa fa-caret-down"></i></button>
		<ul class="dropdown-menu pull-right" role="menu">
			<li>' . $edit_link . '</li>
                        <li>' . $view_link . '</li>
		</ul>
		</div></div>';

        $this->load->library('datatables');
        $b = $this->db->dbprefix('shifting');

        $this->datatables
                ->select("$b.id as id,$b.short_desc", false)
                ->from("shifting");

        $this->datatables->add_column("Actions", $action, "id");
        echo $this->datatables->generate();
    }

    public function shiftingServices_add() {

        $this->data['template'] = "ShiftingServices/add_shifting";
        $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => '#', 'page' => "Shifting Services Add"));
        $this->admin_layout($this->data);
    }

    public function shiftingServices_save() {
        $this->form_validation->set_rules('long_desc', 'long_desc', 'required');
        $this->form_validation->set_rules('short_desc', 'short_desc', 'required');
        if ($this->form_validation->run() == FALSE) {
            $this->shiftingServices_add();
        } else {
            $_POST['status'] = "Active";
            $count = count($_FILES['image']['size']);
            if (!empty($_FILES['image']['name'])) {

                $_FILES['oimages']['name'] = $_FILES['image']['name'];
                $_FILES['oimages']['type'] = $_FILES['image']['type'];
                $_FILES['oimages']['tmp_name'] = $_FILES['image']['tmp_name'];
                $_FILES['oimages']['error'] = $_FILES['image']['error'];
                $_FILES['oimages']['size'] = $_FILES['image']['size'];
                $config['upload_path'] = './assets/upload/shifting/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '1000';
                $config['max_width'] = '1024';
                $config['max_height'] = '768';
                $this->load->library('upload');
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('oimages')) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('message', array('title' => '', 'content' => $error['error'], 'type' => 'e'));
                    $this->shiftingServices_add();
                } else {
                    $data = $this->upload->data();
                }
                $_POST['image'] = site_url() . 'assets/upload/shifting/' . $_FILES['image']['name'];
            }

            if (!empty($_POST['objective']) && !empty($_POST['obj_icon'])) {            //event images
                for ($i = 0; $i < count($_POST['objective']); $i++) {
                    $objectiveArr['obj'] = $_POST['objective'][$i];
                    $objectiveArr['icon'] = $_POST['obj_icon'][$i];
                    $objArr[] = $objectiveArr;
                }
            }

            unset($_POST['objective']);
            unset($_POST['obj_icon']);

            $_POST['objectives'] = json_encode($objArr);


            $result = $this->Setting_model->saveShifting($_POST);
            if ($result == true) {
                $this->session->set_flashdata('message', array('title' => 'Success.', 'content' => 'Shifting Service Added Successfully.', 'type' => 's'));
                redirect(site_url() . 'admin/shiftingServices');
            } else {
                $this->session->set_flashdata('message', array('title' => 'Error.', 'content' => 'Shifting Service Adding Failed.', 'type' => 'e'));
                redirect(site_url() . 'admin/shiftingServices');
            }
        }
    }

    public function shiftingServices_edit($id) {
        $this->data['shift'] = $this->Setting_model->getShiftingById($id);
        $this->data['id'] = $id;
        $this->data['template'] = "ShiftingServices/edit_shifting";
        $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => '#', 'page' => "Shifting Service Edit"));
        $this->admin_layout($this->data);
    }

    public function shiftingServices_view($id) {
        $this->data['shift'] = $this->Setting_model->getShiftingById($id);
        $this->data['id'] = $id;
        $this->data['template'] = "ShiftingServices/view_shifting";
        $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => '#', 'page' => "Shifting Service View"));
        $this->admin_layout($this->data);
    }

    public function shiftingServices_update($id) {

        $this->form_validation->set_rules('long_desc', 'long_desc', 'required');
        $this->form_validation->set_rules('short_desc', 'short_desc', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->shiftingServices_edit($id);
        } else {
            if (!empty($_FILES['image']['name'])) {

                $_FILES['oimages']['name'] = $_FILES['image']['name'];
                $_FILES['oimages']['type'] = $_FILES['image']['type'];
                $_FILES['oimages']['tmp_name'] = $_FILES['image']['tmp_name'];
                $_FILES['oimages']['error'] = $_FILES['image']['error'];
                $_FILES['oimages']['size'] = $_FILES['image']['size'];
                $config['upload_path'] = './assets/upload/shifting/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '1000';
                $config['max_width'] = '1024';
                $config['max_height'] = '768';
                $this->load->library('upload');
                $this->upload->initialize($config);
                //$this->upload->do_upload('otherimages');
                if (!$this->upload->do_upload('oimages')) {


                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('message', array('title' => '', 'content' => $error['error'], 'type' => 'e'));
                    $this->shiftingServices_add();
                } else {
                    $data = $this->upload->data();
                }
                $_POST['image'] = site_url() . 'assets/upload/shifting/' . $_FILES['image']['name'];
            }
//                if(!empty($_POST['objectives'])){            //event images
//                    foreach($_POST['objectives'] as $val){
//                        $objective['obj'] = $val;
//                        $objArr[] = $objective;
//
//                    }
//                }
//                $_POST['objectives'] = json_encode($objArr);
            if (!empty($_POST['objective']) && !empty($_POST['obj_icon'])) {            //event images
                for ($i = 0; $i < count($_POST['objective']); $i++) {
                    $objectiveArr['obj'] = $_POST['objective'][$i];
                    $objectiveArr['icon'] = $_POST['obj_icon'][$i];
                    $objArr[] = $objectiveArr;
                }
            }

            unset($_POST['objective']);
            unset($_POST['obj_icon']);

            $_POST['objectives'] = json_encode($objArr);
            unset($_POST['id']);

            $result = $this->Setting_model->updateshifting($_POST, $id);
            if ($result == true) {
                $this->session->set_flashdata('message', array('title' => 'Success.', 'content' => 'Shifting Service Updated Successfully.', 'type' => 's'));
                redirect(site_url() . 'admin/shiftingServices');
            } else {
                $this->session->set_flashdata('message', array('title' => 'Error.', 'content' => 'Shifting Service Updating Failed.', 'type' => 'e'));
                redirect(site_url() . 'admin/shiftingServices');
            }
        }
    }

    public function getShiftingDetail() {
        $id = $_POST['id'];
        echo json_encode($this->Setting_model->getShiftingDetail($id));
    }

//    labour
    public function labourServices() {
        $labourData = array();
        $labourData = $this->Setting_model->getLabourData();

        if (isset($labourData) && $labourData != '') {
            $this->data['labourCount'] = count($labourData);
        } else {
            $this->data['labourCount'] = 0;
        }

        $this->data['template'] = "LabourServices/labour";
        $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => '#', 'page' => "labour Services"));
        $this->admin_layout($this->data);
    }

    public function getLabourServicesData() {

        $edit_link = anchor('admin/labourServices-edit/$1', '<i class="fa fa-file-text-o"></i> ' . 'Service edit');
        $view_link = anchor('admin/labourServices-view/$1', '<i class="fa fa-file-text-o"></i> ' . 'Service view');
        $action = '<div class="text-center"><div class="btn-group text-left">'
                . '<button type="button" class="btn btn-default btn-xs btn-primary dropdown-toggle" data-toggle="dropdown">'
                . 'Actions' . ' <i style="color:#fff" class="fa fa-caret-down"></i></button>
		<ul class="dropdown-menu pull-right" role="menu">
			<li>' . $edit_link . '</li>
                        <li>' . $view_link . '</li>
		</ul>
		</div></div>';

        $this->load->library('datatables');
        $b = $this->db->dbprefix('labour');

        $this->datatables
                ->select("$b.id as id,$b.description", false)
                ->from("labour");

        $this->datatables->add_column("Actions", $action, "id");
        echo $this->datatables->generate();
    }

    public function labourServices_add() {

        $this->data['template'] = "LabourServices/add_labour";
        $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => '#', 'page' => "labour Services Add"));
        $this->admin_layout($this->data);
    }

    public function labourServices_save() {
        $this->form_validation->set_rules('description', 'long_desc', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->labourServices_add();
        } else {
            $_POST['status'] = "Active";
            $count = count($_FILES['image']['size']);
            if (!empty($_FILES['image']['name'])) {

                $_FILES['oimages']['name'] = $_FILES['image']['name'];
                $_FILES['oimages']['type'] = $_FILES['image']['type'];
                $_FILES['oimages']['tmp_name'] = $_FILES['image']['tmp_name'];
                $_FILES['oimages']['error'] = $_FILES['image']['error'];
                $_FILES['oimages']['size'] = $_FILES['image']['size'];
                $config['upload_path'] = './assets/upload/labour/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '1000';
                $config['max_width'] = '1024';
                $config['max_height'] = '768';
                $this->load->library('upload');
                $this->upload->initialize($config);
                //$this->upload->do_upload('otherimages');
                if (!$this->upload->do_upload('oimages')) {


                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('message', array('title' => '', 'content' => $error['error'], 'type' => 'e'));
                    $this->labourServices_add();
                } else {
                    $data = $this->upload->data();
                }
                $_POST['image'] = site_url() . 'assets/upload/labour/' . $_FILES['image']['name'];
            }


            $result = $this->Setting_model->saveLabour($_POST);
            if ($result == true) {
                $this->session->set_flashdata('message', array('title' => 'Success.', 'content' => 'labour Service Added Successfully.', 'type' => 's'));
                redirect(site_url() . 'admin/labourServices');
            } else {
                $this->session->set_flashdata('message', array('title' => 'Error.', 'content' => 'labour Service Adding Failed.', 'type' => 'e'));
                redirect(site_url() . 'admin/labourServices');
            }
        }
    }

    public function labourServices_edit($id) {
        $this->data['labour'] = $this->Setting_model->getLabourById($id);

        $this->data['id'] = $id;
        $this->data['template'] = "LabourServices/edit_labour";
        $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => '#', 'page' => "labour Service Edit"));
        $this->admin_layout($this->data);
    }

    public function labourServices_view($id) {
        $this->data['labour'] = $this->Setting_model->getLabourById($id);
        $this->data['id'] = $id;
        $this->data['template'] = "LabourServices/view_labour";
        $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => '#', 'page' => "labour Service View"));
        $this->admin_layout($this->data);
    }

    public function labourServices_update($id) {

        $this->form_validation->set_rules('description', 'description', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->labourServices_edit($id);
        } else {
            if (!empty($_FILES['image']['name'])) {

                $_FILES['oimages']['name'] = $_FILES['image']['name'];
                $_FILES['oimages']['type'] = $_FILES['image']['type'];
                $_FILES['oimages']['tmp_name'] = $_FILES['image']['tmp_name'];
                $_FILES['oimages']['error'] = $_FILES['image']['error'];
                $_FILES['oimages']['size'] = $_FILES['image']['size'];
                $config['upload_path'] = './assets/upload/labour/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '1000';
                $config['max_width'] = '1024';
                $config['max_height'] = '768';
                $this->load->library('upload');
                $this->upload->initialize($config);
                //$this->upload->do_upload('otherimages');
                if (!$this->upload->do_upload('oimages')) {


                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('message', array('title' => '', 'content' => $error['error'], 'type' => 'e'));
                    $this->shiftingServices_add();
                } else {
                    $data = $this->upload->data();
                }
                $_POST['image'] = site_url() . 'assets/upload/labour/' . $_FILES['image']['name'];
            }


            unset($_POST['id']);

            $result = $this->Setting_model->updateLabour($_POST, $id);
            if ($result == true) {
                $this->session->set_flashdata('message', array('title' => 'Success.', 'content' => 'labour Service Updated Successfully.', 'type' => 's'));
                redirect(site_url() . 'admin/labourServices');
            } else {
                $this->session->set_flashdata('message', array('title' => 'Error.', 'content' => 'labour Service Updating Failed.', 'type' => 'e'));
                redirect(site_url() . 'admin/labourServices');
            }
        }
    }

    //vehicle services
    public function vehicleServices() {
        $this->data['template'] = "VehicleServices/vehicle";
        $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => '#', 'page' => "Vehicle Services"));
        $this->admin_layout($this->data);
    }

    public function getVahicleServicesData() {

        $edit_link = anchor('admin/vehicleServices-edit/$1', '<i class="fa fa-file-text-o"></i> ' . 'Service edit');
        $view_link = anchor('admin/vehicleServices-view/$1', '<i class="fa fa-file-text-o"></i> ' . 'Service view');
        $action = '<div class="text-center"><div class="btn-group text-left">'
                . '<button type="button" class="btn btn-default btn-xs btn-primary dropdown-toggle" data-toggle="dropdown">'
                . 'Actions' . ' <i style="color:#fff" class="fa fa-caret-down"></i></button>
		<ul class="dropdown-menu pull-right" role="menu">
			<li>' . $edit_link . '</li>
                        <li>' . $view_link . '</li>
		</ul>
		</div></div>';

        $this->load->library('datatables');
        $b = $this->db->dbprefix('vehicle_services');

        $this->datatables
                ->select("$b.id as id,$b.vehicle_name,$b.status", false)
                ->from("vehicle_services");

        $this->datatables->add_column("Actions", $action, "id");
        echo $this->datatables->generate();
    }

    public function vehicleServices_add() {

        $this->data['template'] = "VehicleServices/add_vehicle";
        $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => '#', 'page' => "vehicle Services Add"));
        $this->admin_layout($this->data);
    }

    public function vehicleServices_save() {
        $this->form_validation->set_rules('vehicle_name', 'vehicle_name', 'required');
        $this->form_validation->set_rules('base_fare', 'base_fare', 'required');
        $this->form_validation->set_rules('free_waiting_minutes', 'free_waiting_minutes', 'required');
        $this->form_validation->set_rules('capacity', 'capacity', 'required');
        $this->form_validation->set_rules('transit_charge', 'transit_charge', 'required');
        $this->form_validation->set_rules('waiting_charge_per_minute', 'waiting_charge_per_minute', 'required');
        $this->form_validation->set_rules('dimension', 'dimension', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->labourServices_add();
        } else {
            $_POST['status'] = "Active";
            $count = count($_FILES['image']['size']);
            if (!empty($_FILES['image']['name'])) {

                $_FILES['oimages']['name'] = $_FILES['image']['name'];
                $_FILES['oimages']['type'] = $_FILES['image']['type'];
                $_FILES['oimages']['tmp_name'] = $_FILES['image']['tmp_name'];
                $_FILES['oimages']['error'] = $_FILES['image']['error'];
                $_FILES['oimages']['size'] = $_FILES['image']['size'];
                $config['upload_path'] = './assets/upload/vehicle/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '1000';
                $config['max_width'] = '1024';
                $config['max_height'] = '768';
                $this->load->library('upload');
                $this->upload->initialize($config);
                if (!$this->upload->do_upload('oimages')) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('message', array('title' => '', 'content' => $error['error'], 'type' => 'e'));
                    $this->labourServices_add();
                } else {
                    $data = $this->upload->data();
                }
                $_POST['image'] = site_url() . 'assets/upload/vehicle/' . $_FILES['image']['name'];
            }

            $result = $this->Setting_model->saveVehicle($_POST);
            if ($result == true) {
                $this->session->set_flashdata('message', array('title' => 'Success.', 'content' => 'Vehicle Service Added Successfully.', 'type' => 's'));
                redirect(site_url() . 'admin/vehicleServices');
            } else {
                $this->session->set_flashdata('message', array('title' => 'Error.', 'content' => 'Vehicle Service Adding Failed.', 'type' => 'e'));
                redirect(site_url() . 'admin/vehicleServices');
            }
        }
    }

    public function vehicleServices_edit($id) {
        $this->data['vehicle'] = $this->Setting_model->getVehicleDetailById($id);

        $this->data['id'] = $id;
        $this->data['template'] = "VehicleServices/edit_vehicle";
        $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => '#', 'page' => "Vehicle Service Edit"));
        $this->admin_layout($this->data);
    }

    public function vehicleServices_view($id) {
        $this->data['vehicle'] = $this->Setting_model->getVehicleDetailById($id);

        $this->data['id'] = $id;
        $this->data['template'] = "VehicleServices/view_vehicle";
        $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => '#', 'page' => "Vehicle Service View"));
        $this->admin_layout($this->data);
    }

    public function vehicleServices_update($id) {

        $this->form_validation->set_rules('vehicle_name', 'vehicle_name', 'required');
        $this->form_validation->set_rules('base_fare', 'base_fare', 'required');
        $this->form_validation->set_rules('free_waiting_minutes', 'free_waiting_minutes', 'required');
        $this->form_validation->set_rules('capacity', 'capacity', 'required');
        $this->form_validation->set_rules('transit_charge', 'transit_charge', 'required');
        $this->form_validation->set_rules('waiting_charge_per_minute', 'waiting_charge_per_minute', 'required');
        $this->form_validation->set_rules('dimension', 'dimension', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->vehicleServices_edit($id);
        } else {
            if (!empty($_FILES['image']['name'])) {

                $_FILES['oimages']['name'] = $_FILES['image']['name'];
                $_FILES['oimages']['type'] = $_FILES['image']['type'];
                $_FILES['oimages']['tmp_name'] = $_FILES['image']['tmp_name'];
                $_FILES['oimages']['error'] = $_FILES['image']['error'];
                $_FILES['oimages']['size'] = $_FILES['image']['size'];
                $config['upload_path'] = './assets/upload/vehicle/';
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size'] = '1000';
                $config['max_width'] = '1024';
                $config['max_height'] = '768';
                $this->load->library('upload');
                $this->upload->initialize($config);
                //$this->upload->do_upload('otherimages');
                if (!$this->upload->do_upload('oimages')) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('message', array('title' => '', 'content' => $error['error'], 'type' => 'e'));
                    $this->vehicleServices_edit();
                } else {
                    $data = $this->upload->data();
                }
                $_POST['image'] = site_url() . 'assets/upload/vehicle/' . $_FILES['image']['name'];
            }


            unset($_POST['id']);

            $result = $this->Setting_model->updateVehicle($_POST, $id);
            if ($result == true) {
                $this->session->set_flashdata('message', array('title' => 'Success.', 'content' => 'Vehicle Service Updated Successfully.', 'type' => 's'));
                redirect(site_url() . 'admin/vehicleServices');
            } else {
                $this->session->set_flashdata('message', array('title' => 'Error.', 'content' => 'Vehicle Service Updating Failed.', 'type' => 'e'));
                redirect(site_url() . 'admin/vehicleServices');
            }
        }
    }

    public function enquiry() {
        $this->data['template'] = "Enquiry/enquiry";
        $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => '#', 'page' => "Enquiry Services"));
        $this->admin_layout($this->data);
    }

    public function getEnquiryData() {

        $edit_link = anchor('admin/enquiry-edit/$1', '<i class="fa fa-file-text-o"></i> ' . 'Enquiry edit');
        $view_link = anchor('admin/enquiry-view/$1', '<i class="fa fa-eye"></i> ' . 'Enquiry View');
        $action = '<div class="text-center"><div class="btn-group text-left">'
                . '<button type="button" class="btn btn-default btn-xs btn-primary dropdown-toggle" data-toggle="dropdown">'
                . 'Actions' . ' <i style="color:#fff" class="fa fa-caret-down"></i></button>
		<ul class="dropdown-menu pull-right" role="menu">
			<li>' . $edit_link . '</li>
			<li>' . $view_link . '</li>
                        
		</ul>
		</div></div>';
        $action1 = '<select name="status_name" class="form-control" id="status_name">'
                . '<option value="" >Select Status</option>'
                . '<option value="In Process">In Process</option>'
                . '<option value="Pending" >Pending</option>'
                . '<option value="Completed" >Completed</option>'
                . '<option value="Cancel" >Cancel</option>'
                . '</select>';
        $this->load->library('datatables');
        $a = $this->db->dbprefix('user_login');
        $b = $this->db->dbprefix('user_inquery');
        $c = $this->db->dbprefix('vehicle_services');
        $this->datatables
                ->select("$b.id as id,$b.order_id,date($b.inquery_datetime),$b.fullname,$b.mobileno,$b.pickuppoint,$b.dropPoint,$c.vehicle_name,$b.total_amount,$b.status as bstatus", false)
                ->from("user_inquery")
                ->join('user_login', 'user_login.user_id =user_inquery.user_id', 'left')
                ->join('vehicle_services', 'vehicle_services.id =user_inquery.vehicle_id');

//        $this->datatables->add_column("Status", $action1, "bstatus");
        $this->datatables->add_column("Actions", $action, "id");
        echo $this->datatables->generate();
    }

    public function enquiry_edit($id) {
        $this->data['enquiry'] = $this->Setting_model->getEnquiryDetailById($id);
        $this->data['vehicles'] = $this->Setting_model->getVehicles();
        $this->data['id'] = $id;
        $this->data['template'] = "Enquiry/edit_enquiry";
        $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => '#', 'page' => "Enquiry Edit"));
        $this->admin_layout($this->data);
    }

    public function enquiry_view($id) {
        $this->data['enquiry'] = $this->Setting_model->getEnquiryDetailById($id);
//        $this->data['vehicles'] = $this->Setting_model->getVehicles();
        $this->data['id'] = $id;
        $this->data['template'] = "Enquiry/enquiry_view";
        $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => '#', 'page' => "Enquiry View"));
        $this->admin_layout($this->data);
    }

    public function enquiry_update($id) {

        $this->form_validation->set_rules('pickuppoint', 'pickuppoint', 'required');
        $this->form_validation->set_rules('pickupAddress', 'Pickup Address', 'required');
        $this->form_validation->set_rules('pickupLandmark', 'Pickup Landmark', 'required');
        $this->form_validation->set_rules('pickupPincode', 'Pickup Pincode', 'required');
        $this->form_validation->set_rules('dropPoint', 'dropPoint', 'required');
        $this->form_validation->set_rules('dropAddress', 'Drop Address', 'required');
        $this->form_validation->set_rules('dropPincode', 'Drop Pincode', 'required');
        $this->form_validation->set_rules('vehicle_id', 'vehicle_id', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->enquiry_edit($id);
        } else {

            unset($_POST['id']);

            $result = $this->Setting_model->updateEnquiry($_POST, $id);
            if ($result == true) {
                $this->session->set_flashdata('message', array('title' => 'Success.', 'content' => 'Enquiry Service Updated Successfully.', 'type' => 's'));
                redirect(site_url() . 'admin/enquiry');
            } else {
                $this->session->set_flashdata('message', array('title' => 'Error.', 'content' => 'Enquiry Service Updating Failed.', 'type' => 'e'));
                redirect(site_url() . 'admin/enquiry');
            }
        }
    }

//    testimonials
    public function testimonials() {
        $this->data['template'] = "Testimonial/testimonials";
        $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => '#', 'page' => "Testimonial Services"));
        $this->admin_layout($this->data);
    }

    public function getTestimonialdata() {
        $edit_link = anchor('admin/testimonials-edit/$1', '<i class="fa fa-file-text-o"></i> ' . 'Testimonials edit');
        $view_link = anchor('admin/testimonials-view/$1', '<i class="fa fa-file-text-o"></i> ' . 'Testimonials view');
        $action = '<div class="text-center"><div class="btn-group text-left">'
                . '<button type="button" class="btn btn-default btn-xs btn-primary dropdown-toggle" data-toggle="dropdown">'
                . 'Actions' . ' <i style="color:#fff" class="fa fa-caret-down"></i></button>
		<ul class="dropdown-menu pull-right" role="menu">
			<li>' . $edit_link . '</li>
                        <li>' . $view_link . '</li>
                        
		</ul>
		</div></div>';

        $this->load->library('datatables');
        $b = $this->db->dbprefix('testimonials');

        $this->datatables
                ->select("$b.id as id,$b.text,$b.status", false)
                ->from("testimonials")
                ->group_by("$b.id");

        $this->datatables->add_column("Actions", $action, "id");
        echo $this->datatables->generate();
    }

    public function testimonials_add() {

        $this->data['template'] = "Testimonial/add_testimonials";
        $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => '#', 'page' => "Testimonial Add"));
        $this->admin_layout($this->data);
    }

    public function testimonials_save() {
        $this->form_validation->set_rules('text', 'Description', 'required');
        if(empty($_FILES['image']['name'])){
            $this->form_validation->set_rules('image', 'Image', 'trim|required');
        }
        if ($this->form_validation->run() == FALSE) {
            $this->data['template'] = "Testimonial/add_testimonials";
            $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => '#', 'page' => "Testimonial Add"));
            $this->admin_layout($this->data);
        } else {
            $post = $this->input->post();
            if( !empty( $_FILES['image']['name'] ) ){ 
                $config['upload_path']          = './assets/images/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 3048;
                
                $this->load->library('upload', $config);
                if( $this->upload->do_upload('image') ){
                    $uploadData = $this->upload->data();
                    $imageName = $uploadData['file_name'];
                    $error = '';
                }else{
                    $error = $this->upload->display_errors();
                    $imageName = '';
                }
            }else{
                $error = '';
                $imageName = '';
            }
            if( empty( $error ) ){
                $post['status'] = "Active";
                $post['image'] = $imageName;
                $post['updated_at'] = date('Y-m-d H:i:s');
                $result = $this->Setting_model->saveTestimonial( $post );
                if ($result == true) {
                    $this->session->set_flashdata('message', array('title' => 'Success.', 'content' => 'Testimonial Added Successfully.', 'type' => 's'));
                    redirect(site_url() . 'admin/testimonials');
                } else {
                    $this->session->set_flashdata('message', array('title' => 'Error.', 'content' => 'Testimonial Adding Failed.', 'type' => 'e'));
                    redirect(site_url() . 'admin/testimonials');
                }
            } else {
                $this->session->set_flashdata('message', array('title' => 'Error.', 'content' => $error, 'type' => 'e'));
                $this->data['template'] = "Testimonial/add_testimonials";
                $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => '#', 'page' => "Testimonial Add"));
                $this->admin_layout($this->data);
            }
        }
    }

    public function testimonials_edit($id) {
        $this->data['test'] = $this->Setting_model->gettestimonialsById($id);
        $this->data['id'] = $id;
        $this->data['template'] = "Testimonial/edit_testimonials";
        $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => '#', 'page' => "Testimonial Edit"));
        $this->admin_layout($this->data);
    }

    public function testimonials_update($id) {

        $this->form_validation->set_rules('text', 'text', 'required');
        
        if ($this->form_validation->run() == FALSE) {
            $this->testimonials_edit($id);
        } else {

            unset($_POST['id']);
            $post = $this->input->post();
            
            if( !empty( $_FILES['image']['name'] ) ){ 
                $config['upload_path']          = './assets/images/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                $config['max_size']             = 3048;
                
                $this->load->library('upload', $config);
                if( $this->upload->do_upload('image') ){
                    $uploadData = $this->upload->data();
                    $imageName = $uploadData['file_name'];
                    $error = '';
                }else{
                    $error = $this->upload->display_errors();
                    $imageName = '';
                }
            }else{
                $error = '';
                $imageName = !empty( $post['image_hidden'] ) ? $post['image_hidden'] : '' ;
            }   
            
            if( empty( $error ) ){
                $post['image'] = $imageName;
                $post['updated_at'] = date('Y-m-d H:i:s');
                unset($post['image_hidden']);
                $result = $this->Setting_model->updateTestimonials($post, $id);
                if ($result == true) {
                    $this->session->set_flashdata('message', array('title' => 'Success.', 'content' => 'Testimonial Service Updated Successfully.', 'type' => 's'));
                    redirect(site_url() . 'admin/testimonials');
                } else {
                    $this->session->set_flashdata('message', array('title' => 'Error.', 'content' => 'Testimonial Service Updating Failed.', 'type' => 'e'));
                    redirect(site_url() . 'admin/testimonials');
                }
            }else{
                $this->session->set_flashdata('message', array('title' => 'Error.', 'content' => $error, 'type' => 'e'));
                $this->data['test'] = $this->Setting_model->gettestimonialsById($id);
                $this->data['id'] = $id;
                $this->data['template'] = "Testimonial/edit_testimonials";
                $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => '#', 'page' => "Testimonial Edit"));
                $this->admin_layout($this->data);
            }
        }
    }

    public function testimonials_view($id) {
        $this->data['test'] = $this->Setting_model->gettestimonialsById($id);

        $this->data['id'] = $id;
        $this->data['template'] = "Testimonial/view_testimonials";
        $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => '#', 'page' => "Testimonial View"));
        $this->admin_layout($this->data);
    }

    public function contactus() {
        $this->data['template'] = "Contact/contactus";
        $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => '#', 'page' => "Contact Us List"));
        $this->admin_layout($this->data);
    }

    public function getContactUsdata() {
        $this->load->library('datatables');
        $delete_link = anchor('admin/Admin_controller/delete_contactus/$1', '<i class="fa fa-trash"></i> ' . 'Delete');
        $action = '<div class="text-center"><div class="btn-group text-left">'
                . '<button type="button" class="btn btn-default btn-xs btn-primary dropdown-toggle" data-toggle="dropdown">'
                . 'Actions' . ' <i style="color:#fff" class="fa fa-caret-down"></i></button>
		<ul class="dropdown-menu pull-right" role="menu">
			<li>' . $delete_link . '</li>
		</ul>
		</div></div>';


        $b = $this->db->dbprefix('contactus');

        $this->datatables
                ->select("id,full_name,contact,email,subject,Left(message,150)as message", false)
                ->from("contactus");
        $this->datatables->add_column("Actions", $action, "id");
        echo $this->datatables->generate();
    }

    public function quote() {
        $this->data['template'] = "Quote/quote";
        $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => '#', 'page' => "Quote List"));
        $this->admin_layout($this->data);
    }

    public function getQuoteData() {
        $delete_link = anchor('admin/quote-delete/$1', '<i class="fa fa-file-text-o"></i> ' . 'Quote Delete');
        $action = '<div class="text-center"><div class="btn-group text-left">'
                . '<button type="button" class="btn btn-default btn-xs btn-primary dropdown-toggle" data-toggle="dropdown">'
                . 'Actions' . ' <i style="color:#fff" class="fa fa-caret-down"></i></button>
		<ul class="dropdown-menu pull-right" role="menu">
			<li>' . $delete_link . '</li>
                        
                        
		</ul>
		</div></div>';
        $this->load->library('datatables');
        $b = $this->db->dbprefix('qoute');

        $this->datatables
                ->select("$b.id as id,$b.name,$b.email,$b.from_loc,$b.to_loc,$b.phone,$b.shifting_date", false)
                ->from("qoute");
        $this->datatables->add_column("Actions", $action, "id");
        echo $this->datatables->generate();
    }

    public function Quote_delete($id) {

        $result = $this->Setting_model->Quote_delete($id);
        if ($result == true) {
            $this->session->set_flashdata('message', array('title' => '', 'content' => 'Quote Deleted Successfully.', 'type' => 's'));
            redirect('admin/quote');
        } else {
            $this->session->set_flashdata('message', array('title' => '', 'content' => 'Quote Not Deleted.', 'type' => 'e'));
            redirect('admin/quote');
        }
    }

    public function footer_Content() {
        $this->data['template'] = "Footer_Content/Footer";
        $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => '#', 'page' => "Footer Content"));
        $this->admin_layout($this->data);
    }

    public function FooterContent_edit($id) {
        $this->data['template'] = "Footer_Content/Footer_Edit";
        $this->data['footer'] = $this->Setting_model->getFooterContentById($id);
        $this->data['id'] = $id;
        $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => '#', 'page' => "Edit Footer Content"));
        $this->admin_layout($this->data);
    }

    public function getFooterContentdata() {
        $edit_link = anchor('admin/FooterContent-edit/$1', '<i class="fa fa-file-text-o"></i> ' . 'Footer Edit');
//        $view_link = anchor('admin/FooterContent-view/$1', '<i class="fa fa-file-text-o"></i> ' . 'Footer view');
        $action = '<div class="text-center"><div class="btn-group text-left">'
                . '<button type="button" class="btn btn-default btn-xs btn-primary dropdown-toggle" data-toggle="dropdown">'
                . 'Actions' . ' <i style="color:#fff" class="fa fa-caret-down"></i></button>
		<ul class="dropdown-menu pull-right" role="menu">
			<li>' . $edit_link . '</li>
                        
                        
		</ul>
		</div></div>';

        $this->load->library('datatables');
        $f = $this->db->dbprefix('footer_content');

        $this->datatables
                ->select("footer_id as id,contact_us,site,instagram,social_media,fb_link,twitter_link,google_link,pinterest_link,rss_link", false)
                ->from("footer_content");

        $this->datatables->add_column("Actions", $action, "id");
        echo $this->datatables->generate();
    }

    public function FooterContent_update($id) {

        $this->form_validation->set_rules('contact_us', 'Contact Us', 'required');
        $this->form_validation->set_rules('instagram', 'Instagram', 'required');
        $this->form_validation->set_rules('site', 'Site', 'required');
        $this->form_validation->set_rules('social_media', 'Social Media', 'required');
        $this->form_validation->set_rules('fb_link', 'Facebook Link', 'required');
        $this->form_validation->set_rules('twitter_link', 'Twitter Link', 'required');
        $this->form_validation->set_rules('google_link', 'Google Link', 'required');
        $this->form_validation->set_rules('pinterest_link', 'Pinterest Link', 'required');
        $this->form_validation->set_rules('rss_link', 'RSS Link', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->FooterContent_edit($id);
        } else {

            unset($_POST['footer_id']);

            $result = $this->Setting_model->updateFooterContent($_POST, $id);
            if ($result == true) {
                $this->session->set_flashdata('message', array('title' => 'Success.', 'content' => 'Footer Content Updated Successfully.', 'type' => 's'));
                redirect(site_url() . 'admin/footer-content');
            } else {
                $this->session->set_flashdata('message', array('title' => 'Error.', 'content' => 'Footer Content Updating Failed.', 'type' => 'e'));
                redirect(site_url() . 'admin/footer-content');
            }
        }
    }

    public function FAQ() {
        $this->data['template'] = "FAQ/faq";
        $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => '#', 'page' => "FAQ"));
        $this->admin_layout($this->data);
    }

    public function faq_edit($id) {
        $this->data['template'] = "FAQ/faq_edit";
        $this->data['faq'] = $this->Setting_model->getFAQById($id);
        $this->data['id'] = $id;
        $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => '#', 'page' => "FAQ Edit"));
        $this->admin_layout($this->data);
    }

    public function getFAQData() {

        $edit_link = anchor('admin/faq-edit/$1', '<i class="fa fa-file-text-o"></i> ' . 'FAQ Edit');

        $action = '<div class="text-center"><div class="btn-group text-left">'
                . '<button type="button" class="btn btn-default btn-xs btn-primary dropdown-toggle" data-toggle="dropdown">'
                . 'Actions' . ' <i style="color:#fff" class="fa fa-caret-down"></i></button>
		<ul class="dropdown-menu pull-right" role="menu">
			<li>' . $edit_link . '</li>
                        
		</ul>
		</div></div>';

        $this->load->library('datatables');
        $b = $this->db->dbprefix('faq');

        $this->datatables
                ->select("$b.faq_id as id,$b.description", false)
                ->from("faq");

        $this->datatables->add_column("Actions", $action, "id");
        echo $this->datatables->generate();
    }

    public function faq_update($id) {
//        echo '<pre>';
//        print_r($_POST);
//        echo '</pre>';
//        die();
        $this->form_validation->set_rules('description', 'description', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->faq_edit($id);
        } else {
            
//            unset($_POST['id']);

            $result = $this->Setting_model->updatefaq($_POST, $id);
            if ($result == true) {
                $this->session->set_flashdata('message', array('title' => 'Success.', 'content' => 'FAQ Updated Successfully.', 'type' => 's'));
                redirect(site_url() . 'admin/faq');
            } else {
                $this->session->set_flashdata('message', array('title' => 'Error.', 'content' => 'FAQ Updating Failed.', 'type' => 'e'));
                redirect(site_url() . 'admin/faq');
            }
        }
    }

    public function Privacy_Policy() {
        $this->data['template'] = "Privacy_Policy/privacy_policy";
        $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => '#', 'page' => "Privacy Policy"));
        $this->admin_layout($this->data);
    }

    public function Privacy_Policy_edit($id) {
        $this->data['template'] = "Privacy_Policy/privacy_policy_edit";
        $this->data['faq'] = $this->Setting_model->getPrivacy_PolicyById($id);
        $this->data['id'] = $id;
        $this->data['bc'] = array(array('link' => site_url('admin'), 'page' => "Home"), array('link' => '#', 'page' => "Privacy Policy Edit"));
        $this->admin_layout($this->data);
    }

    public function getPrivacy_PolicyData() {

        $edit_link = anchor('admin/policy-edit/$1', '<i class="fa fa-file-text-o"></i> ' . 'Policy Edit');

        $action = '<div class="text-center"><div class="btn-group text-left">'
                . '<button type="button" class="btn btn-default btn-xs btn-primary dropdown-toggle" data-toggle="dropdown">'
                . 'Actions' . ' <i style="color:#fff" class="fa fa-caret-down"></i></button>
		<ul class="dropdown-menu pull-right" role="menu">
			<li>' . $edit_link . '</li>
                        
		</ul>
		</div></div>';

        $this->load->library('datatables');
        $b = $this->db->dbprefix('privacy_policy');

        $this->datatables
                ->select("$b.policy_id as id,$b.description", false)
                ->from("privacy_policy");

        $this->datatables->add_column("Actions", $action, "id");
        echo $this->datatables->generate();
    }

    public function Privacy_Policy_update($id) {

        $this->form_validation->set_rules('description', 'description', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->faq_edit($id);
        } else {
//            if (!empty($_FILES['image']['name'])) {
//
//                $_FILES['oimages']['name'] = $_FILES['image']['name'];
//                $_FILES['oimages']['type'] = $_FILES['image']['type'];
//                $_FILES['oimages']['tmp_name'] = $_FILES['image']['tmp_name'];
//                $_FILES['oimages']['error'] = $_FILES['image']['error'];
//                $_FILES['oimages']['size'] = $_FILES['image']['size'];
//                $config['upload_path'] = './assets/upload/policy/';
//                $config['allowed_types'] = 'gif|jpg|png|jpeg';
//                $config['max_size'] = '1000';
//                $config['max_width'] = '1024';
//                $config['max_height'] = '768';
//                $this->load->library('upload');
//                $this->upload->initialize($config);
//                //$this->upload->do_upload('otherimages');
//                if (!$this->upload->do_upload('oimages')) {
//
//
//                    $error = array('error' => $this->upload->display_errors());
//                    $this->session->set_flashdata('message', array('title' => '', 'content' => $error['error'], 'type' => 'e'));
//                    $this->shiftingServices_add();
//                } else {
//                    $data = $this->upload->data();
//                }
//                $_POST['image'] = site_url() . 'assets/upload/policy/' . $_FILES['image']['name'];
//            }


            unset($_POST['id']);

            $result = $this->Setting_model->updatePrivacy_Policy($_POST, $id);
            if ($result == true) {
                $this->session->set_flashdata('message', array('title' => 'Success.', 'content' => 'Privacy Policy Updated Successfully.', 'type' => 's'));
                redirect(site_url() . 'admin/policy');
            } else {
                $this->session->set_flashdata('message', array('title' => 'Error.', 'content' => 'Privacy Policy Updating Failed.', 'type' => 'e'));
                redirect(site_url() . 'admin/policy');
            }
        }
    }

    public function change_status() {
        $result = $this->Setting_model->change_status();
        if($result){
            echo json_encode(array('status' => 1));
        }else{
            echo json_encode(array('status' => 0));
        }
    }

}
