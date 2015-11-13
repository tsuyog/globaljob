<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jobs extends CI_Controller{
	function _remap($alias="", $params=array())
	{
		// if($alias=="" || $alias=="index")
		// {
			// echo "Determine later what to do here";	
		// }
		// else
		// {
			
			switch ($alias) {
				case 'applyjobs':
				$this->applyjobs();
				break;
				
				case 'jobsbyindustry':
				$this->jobsbyindustry();
				break;
				
				case 'jobsbycity':
				$this->jobsbycity();
				break;
				
				case 'postapplication':
					$this->postapplication();
				break;
				
				default:
				$this->load->model("MMasterJob");
				$this->load->model("MIndustry");
				$this->load->model("MCompany");
				$this->load->model("Mfunctions");
				$this->load->model("Mjobtype");
				$this->load->model("Mjoblevel");
				$this->load->model("Mjobrequirement");
				$this->load->model("Msalaryrange");
				$this->load->model("Mcity");
				$this->load->model("Mapplicationsetting"); 
				$profile=$this->MMasterJob->getJobsByAlias($alias,"give");
				$profile->Industry=$this->MIndustry->getIndustryById($profile->industry_id);
				$profile->Function=$this->Mfunctions->getFunctionById($profile->function_id);
				$profile->Jobtype=$this->Mjobtype->getJobTypeById($profile->job_working_type);
				$profile->Joblevel=$this->Mjoblevel->getJobLevelById($profile->job_level_id);
				$profile->Education=$this->Mjobrequirement->getJobRequirement($profile->job_requirement_id);
				$profile->Salary=$this->Msalaryrange->getSalaryRange($profile->salary_range_id);
				$profile->Location=$this->Mcity->getCityById($profile->location_id);
				$profile->Company=$this->MCompany->getCompanyById($profile->company_id);
				$profile->Application=$this->Mapplicationsetting->getApplicationSetting($profile->application_setting_id);
				$profile->Function=$this->Mfunctions->getFunctionById($profile->function_id);
				$profile->JobRelevancy=$this->MMasterJob->Jobrelevancy($profile->function_id,$profile->industry_id);
				$data['Job'] = $profile;
				$this->load->view("jobs/jobprofile",$data);
				break;
		}
	}

	function applyjobs(){
	 	if(checkLoginState()==FALSE){
	 		$url=$this->uri->segment(4);
			$this->session->set_userdata("callbackurl",site_url("Jobs/applyjobs/".$url));
	 		redirect("login");
	 	}
			$id = $this->uri->segment(3);
			if($this->session->userdata("LoginType")=="JobSeeker"){
			$user_name=$this->session->userdata("LoggedInUsername");
			$this->load->Model("MMasterJob");
			$this->load->Model("MJobseeker");
			$this->load->model("MJobseekerAcademic");
			$this->load->model("MTraining");
			$this->load->model("MCoverLetter");
			$this->load->model("MExperience");
			$this->load->model("MCompany");
			$this->load->model("MDesignation");
			
			$jobdetail =$this->MMasterJob->getJobsByAlias($id); //testArray($jobdetail);die;
				foreach($jobdetail as $jobdetails):
				$jobdetails->company=$this->MCompany->getCompanyById($jobdetails->company_id);
				$jobdetails->designation=$this->MDesignation->getDesignationById($jobdetails->designation_id);
				endforeach;
			$data['job']=$jobdetail; 
			$profile=$this->MJobseeker->getJobseekerByUsername($user_name); 
			//testArray($profile);die;
			$profile->Academic=$this->MJobseekerAcademic->getJobseekerAcademicByJobseeker($profile->jobseeker_id);
			$profile->Training=$this->MTraining->getTrainingByJobseeker($profile->jobseeker_id);
			$profile->Experience=$this->MExperience->getExperienceByJobseeker($profile->jobseeker_id);
			$profile->CoverLetter=$this->MCoverLetter->getCoverLetterByJobseeker($profile->jobseeker_id);
			$data['apply']=$profile;
			$this->load->view("jobs/applyjob",$data);
			}
			else{
			$this->viewothersjob($id);
			}
   }
  function viewothersjob($id){
  			$this->load->Model("MMasterJob");
			$this->load->Model("MJobseeker");
			$this->load->model("MJobseekerAcademic");
			$this->load->model("MTraining");
			$this->load->model("MCoverLetter");
			$this->load->model("MExperience");
			$this->load->model("MCompany");
			$this->load->model("MDesignation");
			
			$jobdetail =$this->MMasterJob->getJobsByAlias($id); //testArray($jobdetail);die;
				foreach($jobdetail as $jobdetails):
				$jobdetails->company=$this->MCompany->getCompanyById($jobdetails->company_id);
				$jobdetails->designation=$this->MDesignation->getDesignationById($jobdetails->designation_id);
				endforeach;
			$data['job']=$jobdetail; 
			$this->load->view("jobs/jobviewbycompany",$data);
  }
  function jobsbyindustry(){
	  	$industry=$this->uri->segment(3);
		$this->load->model("MCity");
		$this->load->model("MSalaryRange");
		$this->load->model("MMasterJob");
		$this->load->model("MCompany");
		$this->load->model("MFunctions");	
		$this->load->model("MJobRequirement");
		$this->load->model("MFunctions");
		$this->load->model("MFunctions");
		$this->load->model("MSalaryRange");
		$jobs = $this->MMasterJob->getJobsByIndustryId($industry);
		foreach($jobs as $job):
			$job->Company = $this->MCompany->getCompanyById($job->company_id);
			$job->salary_range = $this->MSalaryRange->getSalaryRange($job->salary_range_id);
			$job->location = $this->MCity->getCityById($job->location_id);
		endforeach;
		$data['jobs']=$jobs;
		$data['functions']=$this->MFunctions->getFunctions();
		$data['location']=$this->MCity->getCity();
		$data['salaryrange']=$this->MSalaryRange->getSalaryRange();
		$this->load->view("searched_jobs",$data);  
	  
  }
  function jobsbycity(){
	  	$city=$this->uri->segment(3);
		$this->load->model("MCity");
		$this->load->model("MSalaryRange");
		$this->load->model("MMasterJob");
		$this->load->model("MCompany");
		$this->load->model("MFunctions");	
		$this->load->model("MJobRequirement");
		$this->load->model("MFunctions");
		$this->load->model("MFunctions");
		$this->load->model("MSalaryRange");
		
		$jobs = $this->MMasterJob->getJobsByLocationId($city);
		foreach($jobs as $job):
			$job->Company = $this->MCompany->getCompanyById($job->company_id);
			$job->salary_range = $this->MSalaryRange->getSalaryRange($job->salary_range_id);
			$job->location = $this->MCity->getCityById($job->location_id);
		endforeach;
		$data['jobs']=$jobs;
		$data['functions']=$this->MFunctions->getFunctions();
		$data['location']=$this->MCity->getCity();
		$data['salaryrange']=$this->MSalaryRange->getSalaryRange();
		$this->load->view("searched_jobs",$data); 
	  }
	  
	  function postapplication(){
		  if(checkLoginState()==FALSE){
	 		$url=$this->uri->segment(4);
			$this->session->set_userdata("callbackurl",site_url("Jobs/applyjobs/".$url));
	 		redirect("login");
	 	}
		$this->load->model("MMasterJob");
		$this->load->model("MCompany");
		$this->load->model("MApplicationPool");
		$job_alias=$this->uri->segment(3);
		$company_alias=$this->uri->segment(4);
		$applicant=$this->session->userdata("LoggedInUserId");
		$job=$this->MMasterJob->getJobIdByAlias($job_alias);
		$company=$this->MCompany->getCompanyIdByAlias($company_alias);
		$trans=$this->MApplicationPool->doPostApplication($applicant,$company,$job);
		if($trans==true) redirect("welcome"); 
	  }
} 