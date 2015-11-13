<?php 
class MApplicationPool extends CI_Model{
		
	function getApplicationsByCompany($id,$count=""){
		$check;
		if($count!=""){
			$query=$this->db->query("select * from tbl_application_pool where company_id=$id");
			return $query->num_rows();
		}
		else {
			$query=$this->db->query("select * from tbl_application_pool where company_id=$id");
			if($query->num_rows()>0)
				$data=$query->result();
			else
				$data=array();
			return $data;
		}
	}
	function getApplicationsByJobseeker($id){
			$query=$this->db->query("select * from tbl_application_pool where jobseeker_id=$id");
				if($query->num_rows()>0)
					$data=$query->result();
				else
				$data=array();
				return $data;
		}
	/*function getApplicationsByJobseeker($id,$count=""){
		if($count!=""){
			$query=$this->db->query("select * from tbl_application_pool where jobseeker_id=$id");
			return $query->num_rows();
		}
		else {
			$query=$this->db->query("select * from tbl_application_pool where jobseeker_id=$id");
			if($query->num_rows()>0){
				if($query->num_rows()==1)
					$data=$query->row();
				else
					$data=$query->result();
			}
			else {
				$data=array();
			}
			return $data;
		}
	}*/
	function getShortlistedApplicationByCompany($id){
		$query=$this->db->query("select * from tbl_application_pool where company_id=$id and application_shortlist=1");
			if($query->num_rows()>0)
			$data=$query->result();
			else 
			$data=array();
			return $data;	
	}
	function getSelectedApplicationByCompany($company_id){
		$query=$this->db->query("select * from tbl_application_pool where company_id=$company_id and selected=1");
		if($query->num_rows()>0)
			$data=$query->result();
		else
			$data=array();
		return $data;
	}
	function getApplicationById($app_id){
		$query=$this->db->query("Select * from tbl_application_pool where application_id=$app_id");
		if($query->num_rows()>0)
			$data=$query->row();
		else
		$data=array();
		return $data;	
	}
	function doShortlist($app_id){
		$query=$this->db->query("update tbl_application_pool set application_shortlist=1 where application_id=$app_id");
			
	}
	function doPostApplication($user, $company, $job){
		$query=$this->db->query("insert into tbl_application_pool(job_id,company_id,jobseeker_id,application_shortlist,selected) values($job,$company,$user,0,0)");
		if($query==true) return true;
		else return false;	
	}
}
