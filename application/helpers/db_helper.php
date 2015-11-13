<?php
function getFunctionsForSearch(){
	$CI = & get_instance();
	$CI->load->model("MFunctions");
	$query = $CI->db->query("select * from tbl_function");
	if($query->num_rows()>0){
	$data=$query->result();
	}
	else
	$data = array();
	return $data;
}