<?php

/* Post Show According to like , comment and View Count 
Pass Type and table name

*/
if (!function_exists('mostList')) {

    function mostList($type, $table ,$limt) {
	
		$CI  = & get_instance();	
		$query = $CI->db->query("select title,image from ".$table." ORDER BY ".$type." limit 0,".$limt); 
		return $query->result();
	}

}

/* End Of function mostList  */

/********************************
Comment Function (Blog, Forums, User) Etc.

*******************************/

if (!function_exists('coreComment')) {

    function coreComment($type, $resuorce_id, $body) {
	
		$CI  = & get_instance();	
		$query = $CI->db->query("select * from nc_comments ORDER BY ".$type." limit 0,".$limt); 
		return $query->result();
	}

}

/********************************
Like Function (Blog, Forums, User) Etc.

*******************************/
if (!function_exists('coreLike')) {

    function coreLike($type, $resuorce_id) {
	
		$CI  = & get_instance();	
		$query = $CI->db->query("select * from nc_comments ORDER BY ".$type." limit 0,".$limt); 
		return $query->result();
	}

}

?>