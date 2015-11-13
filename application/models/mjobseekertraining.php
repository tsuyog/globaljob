<?php
class MJobseekerTraining extends CI_Model{
	function getJobseekerTraining(){
	 $query=$this->db->query("select * from tbl_jobseeker_training");
	 if($query->num_rows()>0)
	 $data=$query->result();
	 else 
	 $data=null;
	 return $data;
	}
	function getJobseekerTrainingByJobseekerId($jobseeker_id){
	 $query=$this->db->query("select * from tbl_jobseeker_training where jobseeker_id='$jobseeker_id'");
	 if($query->num_rows()>0){
	 	/*if($query->num_rows()==1)
	 	$data=$query->row();
	 	else
		$data=$query->result();*/
		$data=$query->result();
	 }
	 else 
	 $data=array();
	 return $data;
	}
	function getJobseekerTrainingByJobseekertrainingId($jobseeker_training_id){
	 $query=$this->db->query("select * from tbl_jobseeker_training where jobseeker_training_id='$jobseeker_training_id'");
	 if($query->num_rows()>0){
	 	if($query->num_rows()==1)
	 	$data=$query->row();
	 	else
		$data=$query->result();
	 }
	 else 
	 $data=null;
	 return $data;
	}
	function createJobseekerTraining($data){
	 $jobsseker_id=$data['jobseeker_id'];
	 $jobseeker_training_year=$data['jobseeker_training_year'];
	 $jobseeker_training_description=$data['jobseeker_training_description'];
	 $jobseeker_training_purpose=$data['jobseeker_training_purpose'];
	 $query=$this->db->query("insert into tbl_jobseeker_training(jobseeker_id,jobseeker_training_year, jobseeker_training_description,
	 jobseeker_training_purpose) values($jobsseker_id,'$jobseeker_training_year','$jobseeker_training_description',
	 '$jobseeker_training_purpose')");
	 $lastid=$this->db->insert_id();
	 if($query==true)
	 return $lastid;
	 else 
	 return false;
	}
	function updateJobseekerTraining($data){
	 $jobseeker_training_id=$data->jobseeker_training;
	 $jobsseker_id=$data->jobseeker_id;
	 $jobseeker_training_year=$data->jobseeker_training_year;
	 $jobseeker_training_description=$data->jobseeker_training_description;
	 $jobseeker_training_purpose=$data->jobseeker_training_purpose;
	 $query=$this->db->query("update tbl_jobseeker_training set jobseeker_id=$jobsseker_id, 
	 jobseeker_training_year='$jobseeker_training_year', jobseeker_training_description='$jobseeker_training_description',
	 jobseeker_training_purpose='$jobseeker_training_purpose' where jobseeker_training_id=$jobseeker_training_id");
	 if($query==true)
	 return true;
	 else 
	 return false;
	}
	function updateJobseekerTrainingbytrainingid($data){
	 $jobseeker_training_id=$data['jobseeker_training_id'];
	 $jobseeker_training_year=$data['jobseeker_training_year'];
	 $jobseeker_training_description=$data['jobseeker_training_description'];
	 $jobseeker_training_purpose=$data['jobseeker_training_purpose'];
	 $this->db->where("jobseeker_training_id",$jobseeker_training_id);
	 $query = $this->db->update("tbl_jobseeker_training",$data);
	 if($query==true)
	 return true;
	 else 
	 return false;
	}
	function deleteJobseekerTraining($jobseeker_training_id){
	 $query=$this->db->query("delete from tbl_jobseeker_training where jobseeker_training_id=$jobseeker_training_id");
	 if($query==true)
	 return true;
	 else 
	 return false;
	}
	function deleteJobseekerTrainingByJobseekerId($jobseeker_id){ // it affects multiple rows belonging to jobseeker
	 $query=$this->db->query("delete from tbl_jobseeker_training where jobseeker_id=$jobseeker_id");
	 if($query==true)
	 return true;
	 else
	 return false;
	}
}