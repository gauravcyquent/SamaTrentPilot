<?php

/**
 * Created by PhpStorm.
 * User: Sanjay Yadav <yadav.sanjay@orangemantra.in>
 * Date: 15/01/2016
 * Time: 11:28 AM
 */
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
		if ($query->num_rows() === 1) {
			return $query->row();
		} else {
			return false;
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

			if($query->num_rows() == 0)
			{
				array_push($array,$codes);
			}
		}
			
		return $array;
	}


	function InsertGapScanListing($barcodes,$storeID)
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
				unset($row['sub_cat_id']);
				unset($row['sub_cat_name']);

				array_push($arr,$row);
					
					
			}


			$this->db->where_in('Barcode',$barcodes);
			$this->db->where('Store_Id',$storeID);
			$query = $this->db->get($this->gap_scan_listing);
			if($query->num_rows() == 0){
				$insert = $this->db->insert_batch($this->gap_scan_listing, $arr);

					
			}
				
			return $arr;
			
    	}
    	
    	//print_r($query->result()); die();
    	
    	
    }
   

}

?>