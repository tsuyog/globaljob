<?php
class MMasterJob extends CI_Model{
	
	function getJobs($deadline=""){
			if(!$deadline==""){
			$date=date("Y-m-d");
			$query=$this->db->query("select * from tbl_job where deadline>'$date' order by job_id desc limit 18");
				if ($query->num_rows()>0) {
					$data=$query->result();
					$data=$this->prepareJobsForOutput($data);
				} else {
					$data=array();
				}
				return $data;		
			}
			else{
			$query=$this->db->query("select * from tbl_job order by job_id desc");
				if($query->num_rows()>0){
				$data=$query->result();
				$data=$this->prepareJobsForOutput($data);
				}
				else{
					$data=array();
				}
				return $data;
			}
	}
	function getJobsByIndustryId($id){
		$date=date("y-m-d");
		$query=$this->db->query("select * from tbl_job where industry_id=$id and deadline>'$date'");
		if ($query->num_rows()>0) {
			$data=$query->result();
		} else {
			$data=array();
		}
		return $data;
	}
	function getJobIdByAlias($alias){
			$query=$this->db->query("select job_id from tbl_job where job_alias='$alias'");
			if($query->num_rows()>0)
				$key=$query->row()->job_id;
			else
				$key=null;
			return $key;
		}
	function getJobsByCompanyName($company_name){
		$this->load->model("MCompany");
		$company=$this->MCompany->getCompanyLikeName($company_name);
		$jobs_arr=array();
		foreach($company as $jobs):
			$query=$this->db->query("select * from tbl_job where company_id='".$jobs->company_id."'");
			$jobs_array=$query->result();
			foreach($jobs_array as $single_job)
			{
				$jobs_arr[]=$single_job;	
			}
		endforeach;
		$data=$jobs_arr;
		return $data;
		}
	function getJobsByCompanyId($id, $count="",$history=""){
		$date=date("Y-m-d");
		if($count!==""){
			$my_sql="select * from tbl_job where company_id=$id AND deadline<'$date'";
			$query=$this->db->query($my_sql);
			return $query->num_rows();
		}
		else{
			$my_sql="select * from tbl_job where company_id=$id AND deadline>'$date'";
			$query=$this->db->query($my_sql);
			if ($query->num_rows()>0) {
				$data=$query->result();
			} else {
				$data=array();
			}
			return $data;
		}
	}
	function getHistoryHotPostedJob($company_id){
	$query=$this->db->query("select * from tbl_job where company_id='$company_id' AND job_service_type=1 ORDER BY posted_date DESC");
	if($query->num_rows()>0)
	$data=$query->result();
	else
	$data=array();
	return $data;
	}
	function getHistoryFeaturedPostedJob($company_id){
	$query=$this->db->query("select * from tbl_job where company_id='$company_id' AND job_service_type=3 ORDER BY posted_date DESC");
	if($query->num_rows()>0)
	$data=$query->result();
	else
	$data=array();
	return $data;
	}
	function getJobsbySalaryRanges($id){
			$date=date("Y-m-d");
			$query=$this->db->query("select * from tbl_job where salary_range_id=$id and deadline>'$date'");
			if($query->num_rows()>0)
				$data=$query->result();
			else 
				$data=array();
			return $data;
		}
	function Jobrelevancy($job_id,$industry_id){
		$query=$this->db->query("select * from tbl_job where job_id='$job_id' OR industry_id='$industry_id' limit 3");
		if ($query->num_rows()>0) {
			$data=$query->result();
			
		} else {
			$data['data']=array();
		}
		
		return $data;
	}
	function getJobsByFunctionId($id){
		$date=date("Y-m-d");
		$query=$this->db->query("select * from tbl_job where function_id=$id and deadline>'$date'");
		if ($query->num_rows()>0) {
			$data=$query->result();
		} else {
			$data=array();
		}
		return $data;
	}
	function searchJobsByFunctionId($id,$keyword){
		$date=date("Y-m-d");
		$query=$this->db->query("select * from tbl_job where function_id='$id' and job_title like '%$keyword%' and deadline>'$date'");
		if ($query->num_rows()>0) {
			$data=$query->result();
		} else {
			$data=array();
		}
		return $data;
	}
	function getJobsByLocationId($id){
		$date=date("Y-m-d");
		$query=$this->db->query("select * from tbl_job where location_id=$id and deadline>'$date'");
		if ($query->num_rows()>0) {
			$data=$query->result();
		} else {
			$data=array();
		}
		return $data;
	}
	function getJobsByDesignationId($id){
		$query=$this->db->query("select * from tbl_job where designation_id=$id");
		if ($query->num_rows()>0) {
			$data=$query->result();
		} else {
			$data=array();
		}
		return $data;
	}
	function getJobsByWorkingTypeId($id){
		$query=$this->db->query("select * from tbl_job where working_type=$id");
		if ($query->num_rows()>0) {
			$data=$query->result();
		} else {
			$data=array();
		}
		return $data;
	}
	
	function getJobsByJobLevelId($id){
		$query=$this->db->query("select * from tbl_job where job_level_id=$id");
		if ($query->num_rows()>0) {
			$data=$query->result();
		} else {
			$data=array();
		}
		return $data;
	}
	function basicSearchJobs($keyword , $function){
		$date=date("Y-m-d");
		if($function==-1)
			$my_query="select * from tbl_job where job_title like '%$keyword%' and deadline>'$date'";
		else
			$my_query="select * from tbl_job where job_title like '%$keyword%' and function_id=$function and deadline>'$date'";
		$query=$this->db->query($my_query);
		if($query->num_rows()>0)
			$data=$query->result();
		else
			$data=array();
		return $data;	
		
	}
	function createJobs($data){
	$job_alias=$data['job_alias'];
	$job_title=$data['job_title'];	
	$industry_id=$data['industry_id'];	
	$company_id=$data['company_id'];	
	$location_id=$data['location_id'];	
	$function_id=$data['function_id'];	
	$job_salary_exact_amount=$data['job_salary_exact_amount'];	
	$salary_range_id=$data['salary_range_id'];	
	$job_service_type=$data['job_service_type'];	
	$job_openings=$data['job_openings'];	
	$designation_id=$data['designation_id'];	
	$job_requirement_id=$data['job_requirement_id'];	
	$job_working_type=$data['job_working_type'];	
	$job_level_id=$data['job_level_id'];	
	$posted_date=$data['posted_date'];	
	$deadline=$data['deadline'];	
	$application_setting_id=$data['application_setting_id'];		
	$query=$this->db->query("insert into tbl_job(job_title,job_alias,industry_id,company_id,location_id,function_id,job_salary_exact_amount,salary_range_id,job_service_type,job_openings,designation_id,job_requirement_id,job_working_type,job_level_id,posted_date,deadline,application_setting_id)   

values('$job_title','$job_alias','$industry_id','$company_id','$location_id','$function_id','$job_salary_exact_amount','$salary_range_id','$job_service_type','$job_openings','$designation_id','$job_requirement_id','$job_working_type','$job_level_id','$posted_date','$deadline','$application_setting_id')");
	if($query==true)
	return true;
	else
	return false;
	}
	function updateJobs($data){
	$job_id=$data['job_id'];
	$job_title=$data['job_title'];	
	$industry_id=$data['industry_id'];	
	$company_id=$data['company_id'];	
	$location_id=$data['location_id'];	
	$function_id=$data['function_id'];	
	$job_salary_exact_amount=$data['job_salary_exact_amount'];	
	$salary_range_id=$data['salary_range_id'];	
	$job_service_type=$data['job_service_type'];	
	$job_openings=$data['job_openings'];	
	$designation_id=$data['designation_id'];	
	$job_requirement_id=$data['job_requirement_id'];	
	$job_working_type=$data['job_working_type'];	
	$job_level_id=$data['job_level_id'];	
	$posted_date=$data['posted_date'];	
	$deadline=$data['deadline'];	
	$application_setting_id=$data['application_setting_id'];		
	$this->db->where("job_id",$job_id);
	$query = $this->db->update("tbl_job",$data);

	if($query==true)
	return true;
	else
	return false;
	}
	function deleteJobs($id){
		if($this->db->query("delete from tbl_job where job_id=$id"))
		return TRUE;
	}
	function getJobsById($id){
		$query=$this->db->query("select * from tbl_job where job_id='$id'");
		if($query->num_rows()>0)
		$data=$query->result();
		else 
		$data=array();
		return $data;
	}
	function getJobsByAlias($job_alias, $give_row=""){
		$query=$this->db->query("select * from tbl_job where job_alias='$job_alias'");
		if($query->num_rows()>0){
			if($give_row!="")
			$data=$query->row();
			else
			$data=$query->result();
		}
		else 
		$data=array();
		return $data;
	}
	function prepareJobPackage()
	{
		$query=$this->db->query("select * from tbl_job");
		if($query->num_rows()>0){
			$jobs=$query->result();
			$Jobs=$this->prepareJobsForOutput($jobs);
		}
		else{
			$Jobs=array();
		}
		return $Jobs;
	}
	function prepareJobsForOutput($Jobs){
		$this->load->model("MCompany");
		$this->load->model("MIndustry");
		$this->load->model("MFunctions");
		$this->load->model("MCity");//referred as location of the job
		$this->load->model("MSalaryRange");
		$this->load->model("MDesignation");
		$this->load->model("MJobRequirement");
		$this->load->model("MJobType");
		$this->load->model("MJobLevel");
		foreach($Jobs as $job):
				$job->Industry=$this->MIndustry->getIndustryById($job->industry_id);
				$job->Functions=$this->MFunctions->getFunctionById($job->function_id);
				$job->City=$this->MCity->getCityById($job->location_id);
				$job->Company=$this->MCompany->getCompanyById($job->company_id);
				$job->SalaryRange=$this->MSalaryRange->getSalaryRange($job->salary_range_id);
				$job->Designation=$this->MDesignation->getDesignationById($job->designation_id);
				$job->JobRequirement=$this->MJobRequirement->getJobRequirement($job->job_requirement_id);
				$job->JobType=$this->MJobType->getJobTypeById($job->job_working_type);
				$job->JobLevel=$this->MJobLevel->getJobLevelById($job->job_level_id);
		endforeach;
		return $Jobs;
		
	}
	
	function getJobsByCompanyAsServiceType($type){//receives service nature as parameter and returns result set of jobs of that company
		$date=date("Y-m-d");
		$query=$this->db->query("select * from tbl_job where job_service_type=$type AND deadline>'$date'");
		if($query->num_rows()>0){
			$jobs=$query->result();
			$this->load->model("MCompany");
			$this->load->model("MDesignation");
			foreach($jobs as $job):
				$job->Company=$this->MCompany->getCompanyById($job->company_id);
				$job->Designation=$this->MDesignation->getDesignationById($job->designation_id);
			
			endforeach;
		}
		else
			$jobs=array();

		return $jobs;
	}
	function getJobsAsServiceTypeByCompany($type,$limit=""){//receives service nature as parameter and returns result set of jobs of that company
		$query="select * from tbl_company where company_id in (select distinct(company_id) from tbl_job where job_service_type=$type)";
		if($limit!="")$query.=" limit $limit";
		$q=$this->db->query($query);
		if($q->num_rows()>0)
		{
			$Companies=$q->result();
			foreach($Companies as $Company)
			{
				$query=$this->db->query("select * from tbl_job where job_service_type=$type and company_id='".$Company->company_id."'");
				$Jobs=$query->result();
				$Company->Jobs=$this->prepareJobsForOutput($Jobs);	
				
			}
		}
		else
		{
			$Companies=array();	
		}
		return $Companies;
	}
}


















		/*
		 * $my_sql="select * from tbl_jobs";
		if ($id!="") {
			$my_sql."where job_id=$id";
			$query=$this->db->query($my_sql);
				if($query->num_rows()>0)
				$data=$query->row();
				else
				$data=array();
		} else {
			$query=$this->db->query($my_sql);
				if($query->num_rows()>0)
				$data=$query->result();
				else
				$data=array();
		}//end of master condition
		 */