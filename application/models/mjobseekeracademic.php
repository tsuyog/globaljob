<?php
class MJobseekerAcademic extends CI_Model{
	function getJobseekerAcademic(){
	 $query=$this->db->query("select * from tbl_jobseeker_academic");
	 if($query->num_rows()>0)
	 $data=$query->result();
	 else 
	 $data=null;
	 return $data;
	}
	function getJobseekerAcademicByacademicid($jobseeker_academic_id){
	$query=$this->db->query("select * from tbl_jobseeker_academic where jobseeker_academic_id=$jobseeker_academic_id");
	 if($query->num_rows()>0){
	 	if($query->num_rows()==1)
		$data=$query->row();
		else
	 	$data=$query->result();
	}
	 else
	 $data=array();
	 return $data;
	}
	function getJobseekerByJobseekerLevelOfDegree($jobseeker_level_of_degree){
		$query=$this->db->query("select * from tbl_jobseeker_academic where jobseeker_level_of_degree='$jobseeker_level_of_degree'");
		if($query->num_rows())
		$data=$query->result();
		else
		$data=array();
		return $data;
	}
	function getJobseekerAcademicByJobseeker($jobseeker_id){
	 $query=$this->db->query("select * from tbl_jobseeker_academic where jobseeker_id='$jobseeker_id'");
	 if($query->num_rows()>0){
/*	 	if($query->num_rows()==1){
		$data=$query->row();
		return $num=1;
		}
		else
	 	$data=$query->result();
*/	
	 $data=$query->result();
	 }
	 else
	 $data=array();
	 return $data;
	}
	function createJobseekerAcademic($data){
	 $jobseeker_id=$data['jobseeker_id'];
	 $jobseeker_level_of_degree=$data['jobseeker_level_of_degree'];
	 $jobseeker_degree_name=$data['jobseeker_degree_name'];
	 $jobseeker_graduation_year=$data['jobseeker_graduation_year'];
	 $jobseeker_college_name=$data['jobseeker_college_name'];
	 $jobseeker_university_name=$data['jobseeker_university_name'];
	 $jobseeker_score=$data['jobseeker_score'];
	 $query=$this->db->query("insert into tbl_jobseeker_academic (jobseeker_id,jobseeker_level_of_degree,jobseeker_degree_name,
	 jobseeker_graduation_year, jobseeker_college_name, jobseeker_university_name, jobseeker_score) values($jobseeker_id,
	 '$jobseeker_level_of_degree','$jobseeker_degree_name','$jobseeker_graduation_year','$jobseeker_college_name',
	 '$jobseeker_university_name','$jobseeker_score')");
	 $lastid=$this->db->insert_id();
	 if($query==true)
	 return $lastid;
	 else
	 return false;
	}
	function updateJobseekerAcademic($data){
 	 $jobseeker_academic_id=$data['jobseeker_academic_id'];
	 //$jobseeker_id=$data['jobseeker_id'];
	 $jobseeker_level_of_degree=$data['jobseeker_level_of_degree'];
	 $jobseeker_degree_name=$data['jobseeker_degree_name'];
	 $jobseeker_graduation_year=$data['jobseeker_graduation_year'];
	 $jobseeker_college_name=$data['jobseeker_college_name'];
	 $jobseeker_university_name=$data['jobseeker_university_name'];
	 $jobseeker_score=$data['jobseeker_score'];
	 $query=$this->db->query("update tbl_jobseeker_academic set jobseeker_level_of_degree='$jobseeker_level_of_degree', jobseeker_degree_name='$jobseeker_degree_name',jobseeker_graduation_year='$jobseeker_graduation_year', jobseeker_college_name='$jobseeker_college_name',jobseeker_university_name='$jobseeker_university_name', jobseeker_score='$jobseeker_score' where jobseeker_academic_id=$jobseeker_academic_id");
	 if($query==true)
	 return true;
	 else
	 return false;		
	}
	function deleteJobseekerAcademic($jobseeker_academic_id){
	 $query=$this->db->query("delete from tbl_jobseeker_academic where jobseeker_academic_id='$jobseeker_academic_id'");
	 if($query==true)
	 return true;
	 else
	 return false;
	}

}