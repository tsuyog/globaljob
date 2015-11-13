<?php
class MJobseeker extends CI_Model{
	
	function getJobseeker(){
	 $query=$this->db->query("select * from tbl_jobseeker");
	 if($query->num_rows()>0)
	 $data=$query->result();
	 else
	 $data=null;
	 return $data;
	}
	function getJobseekerById($jobseeker_id){
	 $query=$this->db->query("select * from tbl_jobseeker where jobseeker_id='$jobseeker_id'");
	 if($query->num_rows()>0)
	 $data=$query->row();
	 else
	 $data=null;
	 return $data;
	}
	function getJobseekerByUsername($jobseeker_username){
	 $query=$this->db->query("select * from tbl_jobseeker where jobseeker_user_name='$jobseeker_username'");
	 if($query->num_rows()>0)
	 $data=$query->row();
	 else
	 $data=null;
	 return $data;
	}
	function getJobseekerByAlias($alias){
		$query=$this->db->query("select * from tbl_jobseeker where jobseeker_alias='$alias'");
		 if($query->num_rows()>0)
		 $data=$query->row();
		 else
		 $data=null;
		 return $data;			
	}
	function getJobseekerByJobseekerLevelOfDegree($jobseeker_level_of_degree){
		$query=$this->db->query("select * from tbl_jobseeker where jobseeker_level_of_degree='$jobseeker_level_of_degree'");
		if($query->num_rows())
		$data=$query->result();
		else
		$data=array();
		return $data;
	}
	function getJobSeekerAddress(){
		$query=$this->db->query("select distinct(jobseeker_address) from tbl_jobseeker");
		if($query->num_rows()>0)
		$data=$query->result();
		else
		$data=array();
		return $data;
	}
	function getJobSeekerByAddress($jobseeker_address){
		$query=$this->db->query("select * from tbl_jobseeker where jobseeker_address='$jobseeker_address'");
		if($query->num_rows()>0)
		$data=$query->result();
		else
		$data=array();
		return $data;
	}
	function createJobseeker($data){// we are allowed to do this via two possible option, either insert string if date and password are     //formated and encoded with md5 or use general query.
	 //$jobseeker_alias=$data->jobseeker_alias;
	 $jobseeker_alias=$data['jobseeker_alias'];
	 $jobseeker_sex=$data['sex'];
	 $jobseeker_first_name=$data['jobseeker_first_name'];
	 $jobseeker_middle_name=$data['jobseeker_middle_name'];
	 $jobseeker_last_name=$data['jobseeker_last_name'];
	 $jobseeker_user_name=$data['jobseeker_user_name'];
	 $jobseeker_password=$data['jobseeker_password'];
	 $jobseeker_contact_number=$data['jobseeker_contact_number'];
	 $jobseeker_email=$data['jobseeker_email'];
	 $jobseeker_address=$data['jobseeker_address'];
	 $jobseeker_nationality=$data['jobseeker_nationality'];
	 $jobseeker_dob=$data['jobseeker_dob'];
	 $jobseeker_marital_status=$data['jobseeker_marital_status'];
	 //$jobseeker_image=$data['jobseeker_image'];
	 $query=$this->db->query("insert into tbl_jobseeker (jobseeker_alias,sex,jobseeker_first_name,jobseeker_middle_name,
	 jobseeker_last_name,jobseeker_user_name,jobseeker_password,jobseeker_contact_number,jobseeker_email,
	 jobseeker_address,jobseeker_nationality,jobseeker_dob,jobseeker_marital_status) 
	 values('$jobseeker_alias','$jobseeker_sex','$jobseeker_first_name','$jobseeker_middle_name',
	 '$jobseeker_last_name','$jobseeker_user_name','$jobseeker_password','$jobseeker_contact_number','$jobseeker_email',
	 '$jobseeker_address','$jobseeker_nationality','$jobseeker_dob','$jobseeker_marital_status');");
	 if($query==true)
	 return true;
	 else 
	 return false;
	 //alternate insert_sring method
	 //$query=$this->db->query('tbl_jobseeker',$data);
	 //if($query==true)
	 //return true;
	 //else 
	 //return false;
	}
	function updateUserName($jobseeker_id, $jobseeker_user_name){
	 $query=$this->db->query("update tbl_jobseeker set jobseeker_user_name=$jobseeker_user_name where jobseeker_id=$jobseeker_id");
	 if($query==true)
	 return true;
	 else 
	 return false;
	}
	function checkUsernamePassword($jobseeker_id){
	$query = $this->db->query("select jobseeker_user_name,jobseeker_password from tbl_jobseeker where jobseeker_id='$jobseeker_id'");
		if($query->num_rows()>0){
		$data['username']=$query->row()->jobseeker_user_name;
		$data['password']=$query->row()->jobseeker_password;
		//testArray($data);
		return $data;
		}
		else{
		$data['username']="";
		$data['password']= ""; 
		return $data;
		}
	}
	
	
	function updatePassword($jobseeker_id, $jobseeker_password){
	 $query=$this->db->query("update tbl_jobseeker set jobseeker_password='$jobseeker_password' where jobseeker_id='$jobseeker_id'");
	 if($query==true)
	 return true;
	 else 
	 return false;
	}
	function updateJobseeker($data)
	{
	 $jobseeker_id=$data['jobseeker_id'];
	 $sex=$data['sex'];
	 $jobseeker_first_name=$data['jobseeker_first_name'];
	 $jobseeker_middle_name=$data['jobseeker_middle_name'];
	 $jobseeker_last_name=$data['jobseeker_last_name'];
	 $jobseeker_contact_number=$data['jobseeker_contact_number'];
	 $jobseeker_email=$data['jobseeker_email'];
	 $jobseeker_address=$data['jobseeker_address'];
	 $jobseeker_email=$data['jobseeker_email'];
	 $jobseeker_nationality=$data['jobseeker_nationality'];
	 $jobseeker_dob=$data['jobseeker_dob'];
	 $jobseeker_marital_status=$data['jobseeker_marital_status'];
	 $query=$this->db->query("update tbl_jobseeker set sex='$sex',jobseeker_first_name='$jobseeker_first_name',jobseeker_middle_name='$jobseeker_middle_name',jobseeker_last_name='$jobseeker_last_name',jobseeker_contact_number='$jobseeker_contact_number',jobseeker_email='$jobseeker_email',jobseeker_address='$jobseeker_address',jobseeker_email='$jobseeker_email',jobseeker_nationality='$jobseeker_nationality',jobseeker_dob='$jobseeker_dob',jobseeker_marital_status='$jobseeker_marital_status' where jobseeker_id='$jobseeker_id'");
		if($query==true)
		return true;
		else
		return false;
	}
	function deleteJobseeker($jobseeker_id){
	 $query=$this->db->query("delete from tbl_jobseeker where jobseeker_id=$jobseeker_id");
	 if($query==true)
	 return true;
	 else
	 return false;
	}
	function getImageName($jobseeker_id){
	 $query=$this->db->query("select image from tbl_jobseeker where jobseeker_id=$jobseeker_id");
	 if($query->num_rows()>0)
	 $data=$query->row()->image;
	 else
	 $data=null;
	 return $data;	
	}
	function uploadimage($jobseeker_id,$image){
	$query = $this->db->query("update tbl_jobseeker set image='$image' where jobseeker_id='$jobseeker_id'");
	if($query==true)
	return true;
	else 
	return false;
	}
}
