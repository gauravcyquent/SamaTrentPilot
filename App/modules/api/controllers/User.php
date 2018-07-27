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
		$user_id = $this->input->post('username', true);
		$password = $this->input->post('password', true);


		if($user_id && $password)
		{
			$userdata = $this->user_model->CheckUser($user_id, md5($password));
			if ($userdata) {

				$message = [
                    'Error_code' => '1',
			        'Status'=>true,
                    'message' => 'Authorized user..',
                    'data' => $userdata
				];

				$this->set_response($message, REST_Controller::HTTP_OK);
			}
			else {
				$message = [
                'Error_code' => '0',
			     'Status'=>false,
                'message' => 'Invalid Credentials please try again'
                ];

                $this->set_response($message, REST_Controller::HTTP_OK);
			}
		}


		else {

			if(!$user_id)
			{
				$message = [
                'Error_code' => '-104',
			    'Status'=>false,
                'message' => 'User Id is blank'
                ];

                $this->set_response($message, REST_Controller::HTTP_OK);
			}

			if(!$password)
			{
				$message = [
                'Error_code' => '-105',
			    'Status'=>false,
                'message' => 'Password is blank'
                ];

                $this->set_response($message, REST_Controller::HTTP_OK);
			}


			if(!$user_id && !$password) {
					
				$message = [
                'Error_code' => '-101',
			    'Status'=>false,
                'message' => 'Please enter Username and password'
                ];

                $this->set_response($message, REST_Controller::HTTP_OK);
			}

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


	public function BarcodeValidation_post()
	{
		$barcodes = $this->input->post('barcodes');
		$storeID = $this->input->post('store_id');

		if($storeID)
		{
			$json = json_decode($barcodes,true);
			$data = $this->user_model->BarcodeValidation($json,$storeID);
				
			if($data)
			{
				$message = [
                'response_code' => '0',
                'message' => 'Barcodes not found',
				'data'=> $data
				];
			}
				
				
			else
			{
				$data = $this->user_model->InsertGapScanListing($json,$storeID);

				if(is_array($data))
				{
					$message = [
				'status'=>true,
                'response_code' => '1',
                'message' => 'GapScanlisting Succesfully saved',
				'data'=> $data
					];
				}
				
			
			}
				
		}

		else

		{
			$message = [
                'response_code' => '-107',
                'message' => 'Store Id not found'
                ];
		}


		$this->set_response($message, REST_Controller::HTTP_OK);


		/*$barcodes = json_decode($barcodes,true);

		if(is_array($barcodes))
		{
		$data = $this->user_model->BarcodeValidation($barcodes);
		}*/

		/*$barcode = array_column($barcodes, 'barcode');

		$StoreID  = array_column($barcodes, 'storeid');*/

		//print_r($StoreID);
	}




}
