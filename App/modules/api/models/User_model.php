<?php

/**
 * Created by PhpStorm.
 * User: Sanjay Yadav <yadav.sanjay@orangemantra.in>
 * Date: 15/01/2016
 * Time: 11:28 AM
 */
class User_model extends CI_Model {

	var $user_table = "users";

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

    

   

}

?>