<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jobseeker extends CI_Controller{
	public function index(){
	 isLoggedIn();
	 $this->load->model("MJobseeker");
	 $data['abc']=$this->MJobseeker->getJobseeker();
	  $this->load->view("admin/jobseeker_list",$data);
	}
	
	function add(){
	$this->load->model("MJobseeker");
	$this->load->view("admin/jobseeker_add");
		if(isset($_POST['jobseeker_first_name'])){
		$data['sex']=$_POST['jobseeker_sex'];
		$data['jobseeker_first_name']=$_POST['jobseeker_first_name'];
		$data['jobseeker_middle_name']=$_POST['jobseeker_middle_name'];
		$data['jobseeker_last_name']=$_POST['jobseeker_last_name'];
		$data['jobseeker_contact_number']=$_POST['jobseeker_contact'];
		$data['jobseeker_email']=$_POST['jobseeker_email'];
		$data['jobseeker_address']=$_POST['jobseeker_address'];
		$data['jobseeker_dob']=$_POST['jobseeker_dob'];
		$data['jobseeker_nationality']=$_POST['jobseeker_nationality'];
		$data['jobseeker_marital_status']=$_POST['marital_status'];
		$data['jobseeker_user_name']=$_POST['user_name'];
		$data['jobseeker_password']=$_POST['password'];
		$data['jobseeker_alias']=createAlias($_POST['jobseeker_first_name'],"tbl_jobseeker","jobseeker_alias");
		//testArray($data);die;
		$this->MJobseeker->createJobseeker($data);
		redirect("admin/jobseeker");
		}
	}
	function edit($id){
	$this->load->model("MJobseeker");
	$data['jobseeker'] = $this->MJobseeker->getJobseekerById($id);
	//testArray($data);
	$this->load->view("admin/jobseeker_edit",$data);
		if(isset($_POST['jobseeker_first_name'])){
		$data['jobseeker_id']=$id;
		$data['sex']=$_POST['jobseeker_sex'];
		$data['jobseeker_first_name']=$_POST['jobseeker_first_name'];
		$data['jobseeker_middle_name']=$_POST['jobseeker_middle_name'];
		$data['jobseeker_last_name']=$_POST['jobseeker_last_name'];
		$data['jobseeker_contact_number']=$_POST['jobseeker_contact'];
		$data['jobseeker_email']=$_POST['jobseeker_email'];
		$data['jobseeker_address']=$_POST['jobseeker_address'];
		$data['jobseeker_nationality']=$_POST['jobseeker_nationality'];
		$data['jobseeker_dob']=$_POST['jobseeker_dob'];
		$data['jobseeker_marital_status']=$_POST['maritul_status'];
		$this->MJobseeker->updateJobseeker($data);
		redirect("admin/jobseeker");
		}
	}
	function delete($id){
	$this->load->model("MJobseeker");
	$this->MJobseeker->deleteJobseeker($id);
	redirect("admin/jobseeker");
	}
}