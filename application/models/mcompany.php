<?php

class MCompany extends CI_Model{
	
	function getCompany(){
	$query=$this->db->query("select * from tbl_company");
	if($query->num_rows()>0)
	$data=$query->result();
	else 
	$data=array();
	return $data;	
	}
	function getCompanyIdByAlias($alias){
		$query = $this->db->query("select company_id from tbl_company where company_alias='$alias'");
		if($query->num_rows()>0)
			$key=$query->row()->company_id;
		else
			$key=null;
		return $key;
		}
	function getCompanyNameById($id){
		$query=$this->db->query("select company_name from tbl_company where company_id=$id");
		if($query->num_rows()>0)
			$data=$query->row();
		else
			$data=array();
		return $data;
	}
	function getCompanyLikeName($company_name){
		$query=$this->db->query("select company_id from tbl_company where company_name like '%$company_name%'");
		if($query->num_rows()>0)
			$data=$query->result();
		else
			$data=array();
		return $data;
		}
	function getCompanyById($company_id){
	$query=$this->db->query("select * from tbl_company where company_id=$company_id");
	if($query->num_rows()>0)
	$data=$query->row();
	else 
	$data=array();
	return $data;
	}
	function getCompanyByUsername($username){
	$query=$this->db->query("select * from tbl_company where user_name='$username'");
	if($query->num_rows()>0)
	$data=$query->row();
	else 
	$data=array();
	return $data;
	}
	function getCompanyByAlias($company_alias){
	$query=$this->db->query("select * from tbl_company where company_alias='$company_alias'");
	if($query->num_rows()>0)
	$data=$query->row();
	else 
	$data=array();
	return $data;
	}
	function getCompanyByIndustry($industry_id){
	 $query=$this->db->query("select * from tbl_company where industry_id=$industry_id");
	 if($query->num_rows()>0)
	 $data=$query->row();
	 else 
	 $data=array();
	 return $data;
	}
	function getAliasById($company_id){
	 $query=$this->db->query("select company_alias from tbl_company where company_id=$company_id");
	 if($query->num_rows()>0)
	 $data=$query->row()->alias;
	 else
	 $data=array();
	 return $data;
	}
	function createCompany($data){
	 $company_name=$data['company_name'];
	 $company_logo=$data['company_logo'];
	 $industry_id=$data['industry'];
	 $company_alias=$data['company_alias'];
	 $contact_id=$data['contact_id'];
	 $size_id=$data['company_size'];
	 $ownership_id=$data['ownership'];
	 $company_head_id=$data['company_head'];
	 $query=$this->db->query("insert into tbl_company(company_name,company_logo,industry_id,company_alias,contact_id,
	 size_id,ownership_id,company_head_id)
	 values('$company_name','$company_logo',$industry_id,'$company_alias',$contact_id,$size_id,$ownership_id,$company_head_id)");
	 if($query==true)
	 return true;
	 else 
	 return false;
	}
	function deleteCompany($company_id){
	 $query=$this->db->query("delete from tbl_company where company_id=$company_id");
	 if($query==true)
	 return true;
	 else 
	 return false;
	}
	function updateIndustry($company_id,$industry_id){
	 $query=$this->db->query("update tbl_company set industry_id=$industry_id where company_id=$company_id");
	 if($query==true)
	 return true;
	 else 
	 return false;
	}
	function updateCompanySize($company_id,$size_id){
	 $query=$this->db->query("update tbl_company set size_id=$size_id where company_id=$company_id");
	 if($query==true)
	 return true;
	 else 
	 return false;
	}
	function updateOwnership($company_id,$ownership_id){
	 $query=$this->db->query("update tbl_company set ownership_id=$ownership_id where company_id=$company_id");
	 if($query==true)
	 return true;
	 else 
	 return false;
	}
	function updateCompany($data,$company_id){
	 $company_name=$data['company_name'];
	 $street_address=$data['street_address'];
	 $industry_id=$data['industry_id'];
	 $company_profile=$data['company_profile'];
	 $size_id=$data['size_id'];
	 $ownership_id=$data['ownership_id'];
	 $this->db->where("company_id",$company_id);
	 $query = $this->db->update("tbl_company",$data);
	 if($query=true)
	 return true;
	 else 
	 return false;	
	}
	function getCompanyLogo($company_id){
	 $query=$this->db->query("select company_logo from tbl_company where company_id=$company_id");
	 if($query->num_rows()>0)
	 $data=$query->row()->company_logo;
	 else
	 $data=array();
	 return $data;
	}
	function registerCompany($data){
			
			$industry=$data['industry'];
			$company=$data['company_name'];
			$functions=$data['functions'];
			$size=$data['size'];
			$ownership=$data['ownership'];
			$street=$data['street'];
			$username=$data['username'];
			$password=md5($data['password']);
			$logo=$data['company_logo'];
			
			$query=$this->db->query("insert into tbl_company(company_name,company_logo,industry_id,function_id,size_id,ownership_id,
			street_address,user_name,password) values('$company','$logo',$industry,$functions,$size,$ownership,'$street','$username',
			'$password')");
			if($query==TRUE) return TRUE;
			else return FALSE; 
	}
	function prepareProfilePackage($id){
		$this->load->model("MMasterJob");
		$this->load->model("MApplicationPool");
		$this->load->model("MIndustry");
		$this->load->model("MFunctions");
		$this->load->model("MJobType");
		$this->load->model("MJobLevel");
		
		//fetching jobs corresponding to the company
		$jobs=$this->MMasterJob->getJobsByCompanyId($id);
		foreach($jobs as $job):
			$job->Industry=$this->MIndustry->getIndustryById($job->industry_id);
			$job->JobType=$this->MJobType->getJobTypeById($job->job_working_type);
			$job->Function=$this->MFunctions->getFunctionById($job->function_id);
			$job->JobLevel=$this->MJobLevel->getJobLevelById($job->job_level_id);
			
		endforeach;
		$data['posted_job']=$this->MMasterJob->getJobsByCompanyId($id,"count");
		$data['Application']=$this->MApplicationPool->getApplicationsByCompany($id,"count");
		$data['job']=$jobs;
		return $data;
	}
	function profileView($id){
		$this->load->model("MIndustry");
		$this->load->model("MFunctions");
		$this->load->model("MOwnership");
		$this->load->model("MCompanySize");
		$this->load->model("MCompanyHead");
		$this->load->model("MCompanyContact");
		//$companies=new stdClass;
		$query=$this->db->query("select * from tbl_company where company_id=$id");
		if($query->num_rows()>0)
			$company=$query->row();
		
		$company->Industry=$this->MIndustry->getIndustryById($company->industry_id);
		$company->Functions=$this->MFunctions->getFunctionById($company->function_id);
		$company->Ownership=$this->MOwnership->getOwnershipById($company->ownership_id);
		$company->Size=$this->MCompanySize->getCompanySizeRangeById($company->size_id);
		$company->Head=$this->MCompanyHead->getCompanyHeadById($company->company_head_id);
		$company->Contact=$this->MCompanyContact->getCompanyContactbyId($company->contact_id);
		$data['companies']=$company;
		return $data;
		
	}
	function checkUsernamePassword($company_id){
	$query = $this->db->query("select user_name,password from tbl_company where company_id='$company_id'");
	if($query->num_rows()>0){
	$data['username']=$query->row()->user_name;
	$data['password']=$query->row()->password;
	return $data;
	}
	else{
	$data['username']="";
	$data['password']=""; 
	return $data;
	}
	}
	function updatePassword($company_id, $company_new_password){
	 $query=$this->db->query("update tbl_company set password='$company_new_password' where company_id='$company_id'");
	 if($query==true)
	 return true;
	 else 
	 return false;
	}
}