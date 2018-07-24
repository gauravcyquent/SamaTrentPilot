<?php

/**
 * Created by PhpStorm.
 * User: Parmod Bhardwaj<parmod@orangemantra.com>
 * Date: 5/4/2016
 * Time: 6:56 PM
 */
class Activity_model extends CI_Model {

    var $table = "activity";
    var $company_table = "company";

    function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('pagination');
    }

    public function insertActivity() {
    	$data['company'] = $this->input->post('company');
    	$data['name'] = $this->input->post('activity');
    	$data['purpose'] = $this->input->post('purpose');
    	$data['start_date'] = $this->input->post('start_dates');
    	$time = date("H:i:s",strtotime($data['start_date']));
    	$date = date("Y-m-d",strtotime($data['start_date']));
    	
    	
    	
    	if($time == '12:00:00')
    	{
    		$time= '00:00:00';
    		$data['start_date'] = $date." " .$time;
    		
    	}
    	
    	$data['end_date'] = $this->input->post('end_dates');
        $data['description'] = $this->input->post('description');
        $query = $this->db->insert($this->table, $data);
     //   echo $this->db->last_query(); die();
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function listActivity() {
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->result();
    }

    public function getActivityDetails($id) {
        $this->db->where('activity_id',$id);
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->row();
    }

}

?>