<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class JobType extends CI_Controller{
	
	public function index(){
		isLoggedIn();
		$this->load->model("MJobType");
		$data['jobtypes']=$this->MJobType->getJobTtype();
		$this->load->view("admin/jobtype_list",$data);
	}
	function add(){
		isLoggedIn();
		$this->load->view("admin/job_type_add");
		if(isset($_POST['job_type_name'])){
			$this->load->model("MJobType");
			$this->MJobType->createJobType($_POST['job_type_name']);
			redirect("admin/jobtype");
		}
	}
	function edit(){
		isLoggedIn();
		$this->load->model("MJobType");
		$data['jobtypes']=$this->MJobType->getJobTypeById($this->uri->segment(4));
		$this->load->view("admin/jobtype_edit",$data);
		if(isset($_POST['jobtype_name']))
		 if($this->MJobType->updateJobType($this->uri->segment(4),$_POST['jobtype_name']))
		 redirect("admin/jobtype");
	}
	function delete(){
		isLoggedIn();
		$this->load->model("MJobType");
		if($this->MJobType->deleteJobType($this->uri->segment(4)))
		redirect("admin/jobtype");
	}

}
