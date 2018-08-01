<?php


class User_model extends CI_Model {

	var $user_table = "users";
	var $product_master = "trent_product_master";
	var $gap_scan_listing = "gap_scan_listing";

	function __construct() {
		parent::__construct();

			
	}

	/**
	 * @param null $ID
	 * @return mixed data
	 * @date : 04/12/2015
	 * @description : Get User data
	 */

	function CheckUser($user_id, $password) {
		$cond = array(
            'login_id' => $user_id,
            'password' => $password,
		);
		$this->db->where($cond);
		$query = $this->db->get($this->user_table);  //echo $this->db->last_query(); die();
		if($query){
			if ($query->num_rows() === 1) {
				return $query->row();
			} else {
				return false;
			}

		}



	}

	function BarcodeValidation($barcodes,$storeID)
	{
			
		$array = array();
			
		foreach($barcodes as $codes)
		{
			$this->db->where('Barcode',$codes);
			$this->db->where('Store_Id',$storeID);
			$query = $this->db->get($this->product_master);
			//echo $this->db->last_query(); die();

			if($query->num_rows() == 0)
			{
				array_push($array,$codes);
			}
		}
			
		return $array;
	}


	function InsertGapScanListing($barcodes,$storeID,$userID)
	{
		$this->db->where_in('Barcode',$barcodes);
		$this->db->where('Store_Id',$storeID);
		$query = $this->db->get($this->product_master);
		//echo $this->db->last_query();

		if($query->num_rows() > 0)
		{

			$arr = array();
			foreach($query->result_array() as $row)
			{
				unset($row['id']);
				unset($row['qual1']);
				unset($row['qual2']);
				unset($row['qual3']);
				unset($row['qual4']);
				//unset($row['sub_cat_id']);
				//unset($row['sub_cat_name']);

				array_push($arr,$row);

				$this->db->where('Barcode',$row['Barcode']);
				$this->db->where('Store_Id',$row['Store_Id']);
				$query2 = $this->db->get($this->gap_scan_listing);
				//echo $this->db->last_query(); die();
				//echo $query->num_rows(); die();
				if($query2->num_rows() == 0){

				 $arr2 = array(

				 'Store_Id'=>$row['Store_Id'],
				 'Barcode'=>$row['Barcode'],
				 'ItemCode'=>$row['Barcode'],
				 'ItemDescription'=>$row['ItemDescription'],
				 'Sys_qty'=>$row['Sys_qty'],
				 'Packge_size'=>$row['Packge_size'],
				 'Units'=>$row['Units'],
				 'Associate_Created_UserId'=>$userID,
				 'Category_id'=>$row['Category_id'],
				 'Category_Name'=>$row['Category_name'],
				 'Sub_Category_Id'=>$row['sub_cat_id'],
				 'Sub_Category_Name'=>$row['sub_cat_name']


				 );
				 $this->db->set('GS_CreatedDateTime', 'NOW()', FALSE);
				 $insert = $this->db->insert($this->gap_scan_listing, $arr2);


				 //echo $this->db->last_query();


				}
					
					
			}






			return $arr;

		}
			
		//print_r($query->result()); die();
			
			
	}


	public function check_username($username)
	{
		$this->db->where('login_id',$username);
		$query = $this->db->get($this->user_table);
			
		//echo $this->db->last_query(); die();
		if($query)
		{
			if($query->num_rows() == 0)
			{

				$message['msg'] ='User Id not found';
				$message['err'] = 'INVALIDUSER';
				$message['code'] = '-102';
					

				return $message;


				// $this->set_response($message, REST_Controller::HTTP_OK);
			}

			else {

				$message['msg'] ='Password is not matched';
				$message['err'] = 'INVALIDUSER';
				$message['code'] = '-103';


				return $message;
			}

		}
			
	}


}

?>