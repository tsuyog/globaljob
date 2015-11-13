<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class JobLevel extends CI_Controller{
	
	public function index(){
	 isLoggedIn();
	 $this->load->model("MJobLevel");
	 $data['joblevel']=$this->MJobLevel->getJobLevel();
	 $this->load->view("admin/job_level_list",$data);
	}	
	function add(){
		isLoggedIn();
		$this->load->view("admin/job_level_add");
		$this->load->model("MJobLevel");
		if(isset($_POST['job_level_name'])){
			$this->MJobLevel->createJobLevel($_POST['job_level_name']);
		}
	}
	function deleteJobLevel(){
		IsLoggedIn();
		$id=$this->uri->segment(4);
		$this->load->model("MJobLevel");
		$t=$this->MJobLevel->deleteJobLevel($id);
		if($t==TRUE)
		redirect("admin/joblevel");
	}
	function edit(){
		isLoggedIn();
		$this->load->model("MJobLevel");
		$id=$this->uri->segment(4);
		$data['jobs']=$this->MJobLevel->getJobLevelById($id);
		$this->load->view("admin/job_level_edit",$data);
		if(isset($_POST['job_level_name']))
		 if($this->MJobLevel->updateJobLevel($id,$_POST['job_level_name']))
		 redirect("admin/joblevel");
	} 
}