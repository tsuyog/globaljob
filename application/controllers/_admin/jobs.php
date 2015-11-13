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
		$this -> load -> view("admin/job_list", $data);
	}

	function add() {
        $this->load->model("MIndustry");
		$this->load->model("MFunctions");
		$this->load->model("MServiceType");
		$this->load->model("MJobType");
		$this->load->model("MCompany");
		$this->load->model("MSalaryRange");
		$this->load->model("MDesignation");
		
		$data['services']=$this->MServiceType->getServiceType();		
		$data['industries'] = $this-> MIndustry->getIndustruy();
		$data['functions'] = $this-> MFunctions->getFunctions();
		$data['job_types']=$this->MJobType->getJobTtype();
		$data['companys']=$this->MCompany->getCompany();
		$data['salary_ranges']=$this->MSalaryRange->getSalaryRange();
		$data['designations']=$this->MDesignation->getDesignation();
		//$data['sizes'] = $this-> MCompanySize->getCompanySizeRange();
	    $this->load->view("admin/job_add",$data);
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
		
		$data['jobs']=$this->MMasterJob->getJobsById($this->uri->segment(4));
		
		
	}
	function delete(){
		isLoggedIn();
		$this->load->model("MMasterJob");
		if($this->MMasterJob->deleteJobs($this->uri->segment(4)))
		redirect("admin/jobs");
	}

}
