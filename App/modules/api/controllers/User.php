<?php


/**
 *
 * Author: Gaurav Ranjan<gaurav.r@cyquent.com>
 * Date: 24/07/2018
 *
 */
defined('BASEPATH') OR exit('No direct script access allowed');

// This can be removed if you use __autoload() in config.php OR use Modular Extensions
require APPPATH . '/libraries/REST_Controller.php';

class User extends REST_Controller {

	function __construct() {
		// Construct the parent class
		parent::__construct();
		$this->load->model('user_model');
		$this->load->helper('string');

	}

	function CheckUserAuthentication_post() {
			
		//echo 1333; die();
		$user_id = $this->post('username', true);
		$password = $this->post('password', true);

		$userdata = $this->user_model->CheckUser($user_id, md5($password));
		if ($userdata) {
			 
			$message = [
                    'response_code' => '1',
                    'message' => 'Login Successfull',
                    'data' => $userdata
			];

			$this->set_response($message, REST_Controller::HTTP_OK);
		}
		else {
			$message = [
                'response_code' => '0',
                'message' => 'Invalid Credentials please try again'
                ];

                $this->set_response($message, REST_Controller::HTTP_OK);
		}
	}

	 

	// logout

	public function logout_post() {
		$user_id = $this->post('care_id', true);
		$reg_id = $this->input->post('android_device_id', true);
		$device = $this->input->post('device_id', true);

		if ($user_id != '' && $reg_id != '') {

			//$create = $this->user_model->updaterlogout('users', $user_id, $reg_id);
			$create = $this->user_model->Deviceupdaterlogout('user_devices', $user_id, $device);
			$message = [
                'response_code' => '1',
                'userid' => $user_id,
                'message' => 'Successfully Logout'
                ];
                $this->set_response($message, REST_Controller::HTTP_OK);
		} else {
			$message = [
                'response_code' => '0',
                'message' => 'Sorry! Invalid Userid. and reg id'
                ];
                $this->set_response($message, REST_Controller::HTTP_OK);
        }
    }
 
}
