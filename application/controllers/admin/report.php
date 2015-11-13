<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report extends CI_Controller{
	function index(){
	$this->load->model("MJobseeker");
	$this->load->model("MJobseekerAcademic");
	$this->load->model("MCity");
	$data['jobseekerdetail'] = $this->MJobseeker->getJobseeker();
	$data['jobseekeracademic'] = $this->MJobseekerAcademic->getJobseekerAcademic();
	$data['jobseekeraddress'] = $this->MJobseeker->getJobSeekerAddress();
	//testArray($data);
	$this->load->view("admin/report",$data);
	}
	function viewreport($data){
	
	}
}