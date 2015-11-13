<?php 
class Search extends CI_Controller{
	function index(){
	$this->load->model("MFunctions");	
	$this->load->model("MMasterJob");
	$this->load->model("MCompany");
	$this->load->model("MJobRequirement");
	$this->load->model("MFunctions");
	$this->load->model("MCity");
	$this->load->model("MFunctions");
	$this->load->model("MSalaryRange");
		if(isset($_POST['submit']) || isset($_POST['item'])){
					
					if(isset($_POST['item'])) {
					$keyword=$_POST['item'];
					$function_id=-1;
					}
					else {
					$keyword = $_POST['keyword'];
					$function_id = $_POST['industry_type'];
					}
					//echo $functions->function_id;
					$jobs = $this->MMasterJob->basicSearchJobs($keyword,$function_id);
					foreach ($jobs as $job):
					$job->Company = $this->MCompany->getCompanyById($job->company_id);
					$job->jobrequirement = $this->MJobRequirement->getJobRequirement($job->job_requirement_id);
					$job->salary_range = $this->MSalaryRange->getSalaryRange($job->salary_range_id);
					$job->location = $this->MCity->getCityById($job->location_id);
					endforeach;	
					$data['jobs']=$jobs;
					$data['functions']=$this->MFunctions->getFunctions();
					$data['location']=$this->MCity->getCity();
					$data['salaryrange']=$this->MSalaryRange->getSalaryRange();
					//testArray($data);die;
					$this->load->view("searched_jobs",$data);
		}		
	}
}