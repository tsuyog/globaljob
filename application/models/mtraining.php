<?php
Class MTraining extends CI_model {
	function getTrainingByJobseeker($id){
		$query=$this->db->query("select * from tbl_jobseeker_training where jobseeker_id=$id");
		if($query->num_rows()>0)
			$data=$query->result();
		else 
			$data=array();
		return $data;
	}
}
