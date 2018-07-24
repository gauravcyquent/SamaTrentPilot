<?php

/**
 * Created by PhpStorm.
 * User: Parmod Bhardwaj<parmod@orangemantra.com>
 * Date: 5/4/2016
 * Time: 6:56 PM
 */
class Activity extends Front_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library("session");
        $this->load->model('activity_model', 'activity');
    }

    public function index() {
    	 $includeJs = array(
            'assets/js/plugins/metisMenu/jquery.metisMenu.js',
            'assets/js/plugins/slimscroll/jquery.slimscroll.min.js',
            'assets/js/inspinia.js',
            'assets/js/plugins/pace/pace.min.js',
            'assets/js/jquery-ui.custom.min.js',
            'assets/js/plugins/iCheck/icheck.min.js',
            'assets/js/plugins/fullcalendar/fullcalendar.min.js',
            'assets/js/plugins/jasny/jasny-bootstrap.min.js',
            'assets/js/plugins/datapicker/bootstrap-datepicker.js',
            'assets/js/plugins/clockpicker/clockpicker.js',
            'assets/js/plugins/validate/jquery.validate.min.js',
            'assets/js/datetimepicker.js',
            'assets/js/activity.js',
    	 	'assets/js/setenddate.js',
        );
        $includeCss = array(
            'assets/css/datetimepicker.css',
            'assets/css/plugins/iCheck/custom.css',
            'assets/css/plugins/fullcalendar/fullcalendar.css',
            'assets/css/plugins/fullcalendar/fullcalendar.print.css',
            'assets/css/plugins/clockpicker/clockpicker.css',
            'assets/css/plugins/steps/jquery.steps.css'
        );
        $data['includes_for_layout_js'] = add_includes('js', $includeJs, 'footer');
        $data['includes_for_layout_css'] = add_includes('css', $includeCss, 'header');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('company', 'company', 'trim|required');
        // $this->form_validation->set_rules('purpose', 'purpose', 'trim|required');
 
        if ($this->form_validation->run() == false) {
            $data['error'] = validation_errors();
        } else {
        	
            $insert = $this->activity->insertActivity();
            if ($insert) {
                $this->session->set_flashdata('message', 'Activity has been created successfully');
            } else {
                $data['error'] = 'Something wrong Happen with database;';
            }
        }
        $data['result'] = $this->activity->listActivity();
        $data['meta_title'] = "Danamon Activity";
        $data['meta_description'] = "Danamon";
        $data['meta_keyword'] = "Danamon";
        $this->setData($data);
    }

    function report() {
        $includeJs = array(
            'assets/js/plugins/metisMenu/jquery.metisMenu.js',
            'assets/js/plugins/slimscroll/jquery.slimscroll.min.js',
            'assets/js/plugins/jasny/jasny-bootstrap.min.js',
            'assets/js/plugins/datapicker/bootstrap-datepicker.js',
            'assets/js/plugins/daterangepicker/daterangepicker.js',
            'assets/js/inspinia.js',
            'assets/js/plugins/pace/pace.min.js',
            'assets/js/plugins/staps/jquery.steps.min.js',
            'assets/js/plugins/validate/jquery.validate.min.js',
            'assets/js/activity_report.js',
        );
        $includeCss = array(
            'assets/css/plugins/iCheck/custom.css',
            'assets/css/plugins/steps/jquery.steps.css',
            'assets/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css',
            'assets/css/plugins/datapicker/datepicker3.css',
            'assets/css/plugins/daterangepicker/daterangepicker-bs3.css'
        );
        $data['includes_for_layout_js'] = add_includes('js', $includeJs, 'footer');
        $data['includes_for_layout_css'] = add_includes('css', $includeCss, 'header');
        $data['meta_title'] = "Danamon Activity Report";
        $data['meta_description'] = "Danamon";
        $data['meta_keyword'] = "Danamon";
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Activity Name', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('priority', 'Priority', 'required');
        if ($this->form_validation->run() == false) {
            $data['error'] = validation_errors();
        } else {
            $insert = $this->activity->insertActivity();
            if ($insert) {
                $this->session->set_flashdata('message', 'Your Activity Has Been saved successfully.');
                //redirect(base_url('activity'));
            } else {
                $data['error'] = 'Something wrong Happen with database;';
            }
        }
        $this->setData($data);
    }

    function getActivity() {
        $ActivityId = $this->input->post('activity_id');
        $getDetails = $this->activity->getActivityDetails($ActivityId);
        if (!empty($getDetails)) {
            $data['status'] = true;
            $data['result'] = $getDetails;
        }else{
            $data['status'] = false;
        }

        echo json_encode($data);
    }

}

?>