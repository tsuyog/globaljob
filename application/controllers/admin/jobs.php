<?php
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
class Jobs extends CI_Controller {

	public function index() {
		isLoggedIn();
		$this->load->model("MMasterJob");
		$this->load->model("MIndustry");
		$this->load->model("MCompany");
		$this->load->model("MServiceType");
		$this->load->model("MFunctions");
		$this->load->model("MDesignation");
		$jobs=$this->MMasterJob->getJobs();
		foreach ($jobs as $job) {
			$job->Industry=$this->MIndustry->getIndustryById($job-> industry_id);
			$job->Company=$this->MCompany-> getCompanyById($job-> company_id);
			$job->Service=$this->MServiceType-> getServiceTypeId($job->job_service_type);
			$job->Function=$this->MFunctions->getFunctionById($job->function_id);
			$job->Designation=$this->MDesignation-> getDesignationById($job-> designation_id);
		}
		
		$data['job'] = $jobs;
		//testArray($data);
		$this->load->view("admin/job_list", $data);
	}

		function add(){
		$this->load->model("MMasterJob");
        $this->load->model("MIndustry");
		$this->load->model("MFunctions");
		$this->load->model("MServiceType");
		$this->load->model("MJobType");
		$this->load->model("MCompany");
		$this->load->model("MSalaryRange");
		$this->load->model("MDesignation");
		$this->load->model("MJobRequirement");
		$this->load->model("MApplicationSetting");
		$this->load->model("MCity");
		$this->load->model("MJobLevel");
		
		$data['services']=$this->MServiceType->getServiceType();		
		$data['industries'] = $this-> MIndustry->getIndustry();
		$data['functions'] = $this-> MFunctions->getFunctions();
		$data['job_types']=$this->MJobType->getJobTtype();
		$data['companys']=$this->MCompany->getCompany();
		$data['salary_ranges']=$this->MSalaryRange->getSalaryRange();
		$data['designations']=$this->MDesignation->getDesignation();
		$data['cities']=$this->MCity->getCity();
		$data['joblevels']=$this->MJobLevel->getJobLevel();
		//$data['sizes'] = $this-> MCompanySize->getCompanySizeRange();
	    $this->load->view("admin/job_add",$data);
		isLoggedIn();
		if(isset($_POST['job_title'])){
			$job['job_title']=$_POST['job_title'];
			$job['posted_date']=$_POST['posted_date'];
			$job['deadline']=$_POST['deadline'];
			$job['job_service_type']=$_POST['service_type'];
			$job['industry_id']=$_POST['industry'];
			$job['function_id']=$_POST['function'];
			$job['location_id']=$_POST['joblocation'];
			$job['job_working_type']=$_POST['working_type'];
			$job['company_id']=$_POST['company'];
			$job['job_level_id']=$_POST['job_level'];
			$job['salary_range_id']=$_POST['salary_range'];
			$job['job_salary_exact_amount']=$_POST['salary_amount'];
			$job['job_openings']=$_POST['opening'];
			$job['job_alias']=createAlias($_POST['job_title'],"tbl_job","job_alias");
			if($_POST['designation']=="other"){
				
				$this->MDesignation->createDesignation($_POST['other_designation'], " ");
				$job['designation_id']=$this->MDesignation->getLatestDesignation();
				//$job['designation']=$desig->designation_id;
			}//make insertion to the designation tbl
			else {
				$job['designation_id']=$_POST['designation'];
			}
			// inserting other requirement of jobs
			$requirement = array(
								'job_requirement_education_level'=>$_POST['education_level'],
								'sex'=>$_POST['sex'],
								'job_requirement_age_bar'=>$_POST['age_bar'],
								'job_requirement_education_description'=>$_POST['education_description'],
								'job_requirement_specification'=>$_POST['job_specification'],
								'job_requirement_special_requirement'=>$_POST['special_requirement'],
								'job_requirement_organization_description'=>$_POST['organization_description']
								);
			if($this->MJobRequirement->createJobRequirement($requirement))
			$job['job_requirement_id']=$this->MJobRequirement->getLatestId();
			// creating application setting
			$app          = array(
								'by_online'=>$_POST['apply_online'],
								'by_post'=>$_POST['by_post'],
								'by_email'=>$_POST['apply_email'],
								'email'=>$_POST['provided_email']
								);
			if($this->MApplicationSetting->createApplicationSetting($app))
				$job['application_setting_id']=$this->MApplicationSetting->getLatestApplicationSetting();
			//testArray($job);//die;
			// creating jobs

			if($this->MMasterJob->createJobs($job)) 
			redirect("admin/jobs");

		}
	}
	function edit(){
		isLoggedIn();
		$this->load->model("MMasterJob");
		$this->load->model("MIndustry");
		$this->load->model("MFunctions");
		$this->load->model("MServiceType");
		$this->load->model("MJobType");
		$this->load->model("MCompany");
		$this->load->model("MSalaryRange");
		$this->load->model("MDesignation");
		$this->load->model("MCity");
		$this->load->model("MJobLevel");
		$this->load->model("MJobRequirement");
		$this->load->model("MApplicationSetting");
		$data['job']=$this->MMasterJob->getJobs();
		$data['industry']=$this->MIndustry->getIndustry();
		$data['function']=$this->MFunctions->getFunctions();
		$data['service']=$this->MServiceType->getServiceType();
		$data['jobtype']=$this->MJobType->getJobTtype();
		$data['company']=$this->MCompany->getCompany();
		$data['salary_range']=$this->MSalaryRange->getSalaryRange();
		$data['designation']=$this->MDesignation->getDesignation();
		$data['city']=$this->MCity->getCity();
		$data['job_level']=$this->MJobLevel->getJobLevel();
		$alias=$this->uri->segment(4);
		//echo $id;die;
		$job_detail = $this->MMasterJob->getJobsByAlias($alias,"givrow");
		$data['jobs']=$job_detail;
		//testArray($data);die;
		$data['jobrequirement']=$this->MJobRequirement->getJobRequirement($job_detail->job_requirement_id);
		$data['applicationsetting']=$this->MApplicationSetting->getApplicationSetting($job_detail->application_setting_id);
		//testArray($data);die;
		$this->load->view("admin/job_edit",$data);
		if(isset($_POST['job_title'])){
			$job = array(
						'job_id'=>$job_detail->job_id,
						'job_title'=>$_POST['job_title'],
						'posted_date'=>$_POST['posted_date'],
						'deadline'=>$_POST['deadline'],
						'job_service_type'=>$_POST['service_type'],
						'industry_id'=>$_POST['industry'],
						'function_id'=>$_POST['function'],
						'location_id'=>$_POST['location'],
						'job_working_type'=>$_POST['job_working_type'],
						'company_id'=>$_POST['company'],
						'job_level_id'=>$_POST['job_level'],
						'salary_range_id'=>$_POST['salaryrange'],
						'job_salary_exact_amount'=>$_POST['salary_amount'],
						'job_openings'=>$_POST['job_opening']
						
						);
				if($_POST['designation']=="other"){
				$this->MDesignation->createDesignation($_POST['other_designation'], " ");
				$job['designation_id']=$this->MDesignation->getLatestDesignation();
				//$job['designation']=$desig->designation_id;
				}//make insertion to the designation tbl
				else{
				$job['designation_id']=$_POST['designation'];
				 }
			$req['job_requirement_education_level']=$_POST['education_level'];
			$req['sex']=$_POST['sex'];
			$req['job_requirement_age_bar']=$_POST['age_bar'];
			$req['job_requirement_education_description']=$_POST['education_description'];
			$req['job_requirement_specification']=$_POST['job_specification'];
			$req['job_requirement_special_requirement']=$_POST['special_requirement'];
			$req['job_requirement_organization_description']=$_POST['organization_description'];
			if($this->MJobRequirement->updateJobRequirement($req,$job_detail->job_requirement_id))
				$job['job_requirement_id']=$this->MJobRequirement->getLatestId();
			// creating application setting
			$app['by_online']=$_POST['apply_online'];
			$app['by_post']=$_POST['by_post'];
			$app['by_email']=$_POST['apply_email'];
			$app['email']=$_POST['provided_email'];
			if($this->MApplicationSetting->createApplicationSetting($app))
				$job['application_setting_id']=$this->MApplicationSetting->getLatestApplicationSetting();
			//testArray($job);die;	
			if($this->MMasterJob->updateJobs($job)) 
			redirect("admin/jobs");
		}
	}
	function delete(){
		isLoggedIn();
		$this->load->model("MMasterJob");
		if($this->MMasterJob->deleteJobs($this->uri->segment(4)))
		redirect("admin/jobs");
	}

}
