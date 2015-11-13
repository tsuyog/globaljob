<?php
class MJobLevel extends CI_Model {

	function getJobLevel(){
	    $query=$this->db->query("select * from tbl_job_level");
		if($query->num_rows()>0)
		$data=$query->result();	
		else
		$data=null;
		
		return $data;
	}
	function getJobLevelById($job_level_id){
		$query=$this->db->query("select * from tbl_job_level where job_level_id=$job_level_id");
		if($query->num_rows()>0)
		$job_level=$query->row();
		else
		$job_level=null;
		return $job_level;
		}
	function deleteJobLevel($job_level_id){
		$query=$this->db->query("delete from tbl_job_level where job_level_id='$job_level_id'");
		return true;
		}
	function updateJobLevel($job_level_id,$job_level_name){
		if($query=$this->db->query("update tbl_job_level set job_level_name='$job_level_name' where job_level_id=$job_level_id"));
		return true;
		}
	function createJobLevel($job_level){
		//$data['job_level_name']=$job_level;
		$this->db->query("insert into tbl_job_level(job_level_name) values('$job_level')");
		return true;
		}
}
