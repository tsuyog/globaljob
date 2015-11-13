<?php 
class MExperience extends CI_model {
	function getExperienceByJobseeker($id){
		$query=$this->db->query("select * from tbl_jobseekser_experience where jobseeker_id=$id");
		if($query->num_rows()>0)
			$data=$query->result();
		else
			$data=array();
		return $data;
	}
}
