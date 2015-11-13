<?php 

/**
 * 
 */
class MJobRequirement extends CI_Model {
	
	function getJobRequirement($id=""){
		$my_sql="select * from tbl_job_requirement";
		if($id!=""){
			$my_sql."where job_requirement_id=$id";
			$query=$this->db->query($my_sql);
			if($query->num_rows()>0)
				$data=$query->row();
			else
				$data=array();
		}
		else {
			$query=$this->db->query($my_sql);
			if($query->num_rows()>0)
				$data=$query->result();
		}
		return $data;
	}
	function createJobRequirement($data){//this function receives an array as parameter
	$job_requirement_education_level=$data['job_requirement_education_level'];
	$job_requirement_education_description=$data['job_requirement_education_description'];
	$job_requirement_specification=$data['job_requirement_specification'];
	$job_requirement_special_requirement=$data['job_requirement_special_requirement'];
	$job_requirement_organization_description=$data['job_requirement_organization_description'];
	$job_requirement_age_bar=$data['job_requirement_age_bar'];
	$sex=$data['sex'];	
	$query=$this->db->insert("tbl_job_requirement",$data);
		$lastid=$this->db->insert_id();
		//echo $lastid;
		if($query==true){
		return $lastid;
		}
		else{
		return false;
		}
	}
	function deleteJobRequirement($id){
		
	}
	function updateJobRequirement($data,$id){// this receives as array as parameter
	$job_requirement_education_level=$data['job_requirement_education_level'];
	$job_requirement_education_description=$data['job_requirement_education_description'];
	$job_requirement_specification=$data['job_requirement_specification'];
	$job_requirement_special_requirement=$data['job_requirement_special_requirement'];
	$job_requirement_organization_description=$data['job_requirement_organization_description'];
	$job_requirement_age_bar=$data['job_requirement_age_bar'];
	$sex=$data['sex'];	
	$this->db->where("job_requirement_id",$id);
	$query = $this->db->update("tbl_job_requirement",$data);
	if($query==true)
	return true;
	else
	return false;
	}
	function getLatestId(){
	$query=$this->db->query("select job_requirement_id from tbl_job_requirement order by job_requirement_id desc limit 1");
	return $query->row()->job_requirement_id;
	}
}