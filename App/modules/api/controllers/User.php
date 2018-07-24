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
	
	
	
	
	Public function CheckUserAuthentication_post()
	{
		echo 'Hi gaurav';
	}
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

    /**
     * @method : list Users using GET Method
     * @method description: call to get list of Users.
     * @param : emp_id
     * @data: Users Data
     */
	 
	 
   

    /* function signin_post() {
        $user_id = $this->post('user_mobile', true);
        $password = $this->post('user_pass', true);
        $new_reg_id = $this->input->post('reg_id', true);
        $deviceID = $this->input->post('device_id', true);
        $deviceType = $this->input->post('device_type', true);

        $device_id = json_encode(array($new_reg_id));
        $userdata = $this->user_model->validate($user_id, md5($password));
        if ($userdata) {
            $CareDeviceCheck = $this->user_model->CheckCareDevice($deviceID, $userdata->id, $deviceType);
            if ($CareDeviceCheck > 0) {
                $deviceUpdate = $this->user_model->updateDeviceId($deviceID, $userdata->id, $new_reg_id);
            } else {
                $DeviceCheck = $this->user_model->CheckDevice($deviceID, $deviceType);
                if ($DeviceCheck > 0) {
                    $this->user_model->DeleteDeviceUser($deviceID);
                }
                $deviceUpdate = $this->user_model->InsertDeviceId($deviceID, $userdata->id, $new_reg_id, $deviceType);
            }
            $userid = $userdata->id;
            $photo_id = ($userdata->user_pic != '' && $userdata->user_pic != null ) ? base_url() . '/uploads/users/profile/' . $userdata->user_pic : "";
            if ($userdata->status == 0) {
                $message = [
                    'response_code' => '0',
                    'message' => 'Not validated!'
                ];
                $this->set_response($message, REST_Controller::HTTP_OK);
            } else {
                $Res = $userdata;
                if ($this->post('is_signup') == '1') {
                    $type = 'signup';
                } else {
                    $type = 'signin';
                }
                if ($deviceType == 'android') {
                    $this->user_model->androidnotification($userid, $type, $deviceID);
                } else {
                    $this->user_model->iosNotification($userid, $type, $deviceID);
                }

                $Res->user_pic = $photo_id;
                $removeKeys = array('user_pass', 'registered_date', 'activation_key', 'user_modification_date', 'random_code', 'reg_id', 'reg_id_ios');

                foreach ($removeKeys as $key) {
                    unset($Res->$key);
                }
                $message = [
                    'response_code' => '1',
                    'message' => 'Success',
                    'data' => $Res
                ];

                $this->set_response($message, REST_Controller::HTTP_OK);
            }
        } else {
            $message = [
                'response_code' => '0',
                'message' => 'Invalid Credentials'
            ];

            $this->set_response($message, REST_Controller::HTTP_OK);
        }
    }

    public function forgotpassword_post() {
        foreach ((($this->post())) as $key => $value) {
            log_message('info', 'data=' . $key . ' =>' . $value);
        }
        $data = array(
            'email_id' => $this->post('email_id'),
            'mobile' => $this->post('mobile')
        );
        $checkCredentails = $this->user_model->CheckUserCredentials($data);
        if ($checkCredentails) {
            $create = $this->user_model->validate_password($data);
            if ($create['status']) {
                $status = REST_Controller::HTTP_OK;
                $this->set_response($create, $status);
            } else {

                $message = [
                    'response_code' => '0',
                    'message' => $create['message']
                ];
                $this->set_response($message, REST_Controller::HTTP_OK);
            }
        } else {
            $message = [
                'response_code' => '0',
                'message' => 'Sorry! Invalid Credentails.Please update Your Email and Mobile in profile or Contact Administarator!'
            ];
            $this->set_response($message, REST_Controller::HTTP_OK);
        }
    }

    // change password 
    function changepassword_post() {
        $user_id = $this->post('user_id', true);
        $current_pass = $this->post('current_pass', true);
        $new_pass = $this->post('password', true);
        if ($user_id != '') {
            $userpasswrod = $this->user_model->valid_current_pass($user_id, md5($current_pass));
            if (!$userpasswrod) {
                $message = [
                    'response_code' => '0',
                    'message' => 'Invalid Current Password'
                ];
                $this->set_response($message, REST_Controller::HTTP_OK);
            } else {
                $this->user_model->updatepassword('users', $user_id, $new_pass);
                $message = [
                    'response_code' => '1',
                    'message' => 'Success',
                    'new_password' => $new_pass
                ];
                $this->set_response($message, REST_Controller::HTTP_OK);
            }
        } else {
            $message = [
                'response_code' => '0',
                'message' => 'Invalid Credentials'
            ];
            $this->set_response($message, REST_Controller::HTTP_OK);
        }
    }

    protected function changeprofilepic_post() {
        $user_id = (int) $this->post('care_id');
        if (isset($user_id) && $user_id != '' && $user_id != null) {
            $update = $this->user_model->updateprofile($user_id);
            if ($update) {
                $message = [
                    'response_code' => '1',
                    'message' => 'Success',
                    'photo_id' => $update
                ];
                $this->set_response($message, REST_Controller::HTTP_OK);
            } else {
                $message = [
                    'response_code' => '0',
                    'message' => 'Not Updated! Please Browse File to upload'
                ];
                $this->set_response($message, REST_Controller::HTTP_OK);
            }
        } else {
            $message = [
                'response_code' => '0',
                'message' => 'Invalid User'
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
 */
}
