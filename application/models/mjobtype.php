<?php

class MJobType extends CI_Model{
		
		function getJobTtype(){
	    $query=$this->db->query("select * from tbl_job_type");
		if($query->num_rows()>0)
		$data=$query->result();	
		else
		$data=array();
		
		return $data;
	}
	function getJobTypeById($job_type_id){
		$query=$this->db->query("select * from tbl_job_type where job_type_id=$job_type_id");
		if($query->num_rows()>0)
		$data=$query->row();
		else
		$data=array();
		return $data;
		}	
	function deleteJobType($job_type_id){
		$query=$this->db->query("delete from tbl_job_type where job_type_id=$job_type_id");
		return true;
		}
	function createJobType($job_type_name){
		$this->db->query("insert into tbl_job_type(job_type_name) values('$job_type_name')");
		return true;
		}
	function updateJobType($job_type_id, $job_type_name){
		if($this->db->query("update tbl_job_type set job_type_name='$job_type_name' where job_type_id=$job_type_id"))
		return true;
		}

}