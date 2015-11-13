<?php
class MWorkingPreferrence extends CI_Controller{
	function getWorkingPreferrence(){
	 $query=$this->db->query("select * from tbl_jobseeker_working_preferrence");
	 if($query->num_rows()>0)
	 $data=$query->result();
	 else
	 $data=null;
	 return $data;
	}
	function getWorkingPreferrenceByJobseeker($jobseeker_id){
	 $query=$this->db->query("select * from tbl_jobseeker_working_preferrence where jobseeker_id=$jobseeker_id");
	 if($query->num_rows()>0)
	 $data=$query->row();
	 else
	 $data=null;
	 return $data;
	}
	function getWorkingPreferrenceByDesignation($designation_id){
	 $query=$this->db->query("select * from tbl_jobseeker_working_preferrence where designation_id=$designation_id");
	 if($query->num_rows()>0)
	 $data=$query->row();
	 else 
	 $data=null;
	 return $data;
	}
	function createWorkingPreferrence($data){
	 $jobseeker_id=$data->jobseeker_id;
	 $function_id=$data->function_id;
	 $designation_id=$data->designation_id;
	 $salary_range_id=$data->salary_range_id;
	 $job_location_id=$data->job_location_id;
	 $query=$this->db->query("insert into tbl_jobseeker_working_preferrence(jobseeker_id,function_id,designation_id,
	 salary_range_id,job_location_id) values($jobseeker_id, $function_id, $designation_id, $salary_range_id, $job_location_id)");
	 if($query==true)
	 return true;
	 else 
	 return false;
	}
	function deleteWorkingPreferrence($working_preferrence_id){
	 $query=$this->db->query("delete from tbl_jobseeker_working_preferrence where preferrence_id=$working_preferrence_id");
	 if($query==true)
	 return true;
	 else
	 return false;
	}
}