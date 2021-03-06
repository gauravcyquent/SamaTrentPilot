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
			if($query)
			{
				if($query->num_rows() == 0)
				{
					array_push($array,$codes);
				}
			}

			else {
				$message = '000';
				return 105;

				die();
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
		$GsID = uniqid();
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
				$this->db->where('GsTransactionID',$GsID);
				$query2 = $this->db->get($this->gap_scan_listing);
				//echo $this->db->last_query(); die();
				//echo $query->num_rows(); die();
				if($query2){
					if($query2->num_rows() == 0){
							
							

						$arr2 = array(

				 'Store_Id'=>$row['Store_Id'],
				 'GsTransactionID' =>$GsID,
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

				else {
					$message = '000';
					return 105;
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


	public function FetchList($userID)
	{
		$this->db->where('id',$userID);
		$this->db->select('userCategoryId,userStoreId,role');
		$user  = $this->db->get($this->user_table);
			
		if($user)
		{
			//print_r($user->row()); die();

			$CatID = $user->row()->userCategoryId;
			$StoreID = $user->row()->userStoreId;
			$role = $user->row()->role;

			if($CatID && $StoreID && $role == 'CH')
			{
				$this->db->order_by("GS_CreatedDateTime", "DESC");
				$this->db->limit(1);
				$this->db->where('Store_Id',$StoreID);
				$this->db->where('Category_id',$CatID);
				$query = $this->db->get($this->gap_scan_listing);

				if($query)
				{
					$GsID = $query->row()->GsTransactionID;
					if($GsID)
					{
						$this->db->order_by("GS_CreatedDateTime", "DESC");
						$this->db->where('GsTransactionID',$GsID);
						$this->db->where('Category_id',$CatID);
						$data = $this->db->get($this->gap_scan_listing);

						$array = array();
						foreach($data->result_array() as $row)
						{

							$output = array_slice($row,0,11);

							array_push($array,$output);




						}

						return $array;


					}

					else {
						return false;
					}
				}

			}

			else {
				return false;
			}

		}

	}


	public function GetUserData($userID)
	{
		$this->db->where('id',$userID);
		$query = $this->db->get($this->user_table);


		if($query->num_rows() === 1)
		{
			return $query->row();
		}

		else
		{
			return false;
		}
	}


	public function UpdateByCategoryHead($json,$userID)
	{


		$data = array(
                       'Avaliable_flag' => 'TRUE'
             
                       );
                       $this->db->set('CH_Updated_DateTime',"NOW()",FALSE);
                       $this->db->set('CH_Updated_UserId',$userID,FALSE);
                       $this->db->where_in('Barcode',$json);
                       $this->db->where('GsTransactionID',$this->input->post('gs_id'));
                       $update = $this->db->update($this->gap_scan_listing, $data);



                       if($update)
                       {
                       	$this->db->where('users.id',$userID);
                       	$this->db->where('gap_scan_listing.Avaliable_flag!=','TRUE');
                       	$this->db->where('gap_scan_listing.GsTransactionID',$this->input->post('gs_id'));
                       	$this->db->where('gap_scan_listing.Category_id',$this->input->post('cat_id'));

                       	$this->db->join($this->user_table,'gap_scan_listing.Category_id = users.userCategoryId');
                       	$query = $this->db->get('gap_scan_listing');
                       	//echo $this->db->last_query(); die();
                       	if($query)
                       	{
                       		if($query->num_rows() > 0)
                       		{

                       	 	return $query->result_array();


                       		}

                       		else {
                       			return true;
                       		}
                       	}
                       	else {
                       		return false;
                       	}

                       }

                       else {
                       	return false;
                       }


                       //echo $this->db->last_query(); die();




	}


}

?>