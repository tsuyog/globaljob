<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class JobSeeker extends CI_Controller {
	
	function index(){
		//$this->load->view("jobseekerregistration");
	}
	
	function registerJobseeker(){
	 //isLoggedIn();
	 $this->load->model("MIndustry");
	 $this->load->model("MFunctions");
	 $this->load->model("MCompanySize");
	 $this->load->model("MJobSeeker");
	 $this->load->model("MCountry");
	 $data['country'] =$this->MCountry->getCountry();
		//print_r($data);die;
		$this->load->view("jobseekerregistration",$data);
	 if(isset($_POST['sex'])){
		$data['jobseeker_alias']=createAlias($_POST['first_name'],"tbl_jobseeker","jobseeker_alias");
		$data['sex']=$_POST['sex'];
		$data['jobseeker_first_name']=$_POST['first_name'];
		$data['jobseeker_middle_name']=$_POST['middle_name'];
		$data['jobseeker_last_name']=$_POST['last_name'];
		$data['jobseeker_contact_number']=$_POST['Contact'];
		$data['jobseeker_email']=$_POST['email'];
		$data['jobseeker_address']=$_POST['address'];
		$data['jobseeker_nationality']=$_POST['country'];
		$data['jobseeker_marital_status']=$_POST['marital_status'];
		$data['jobseeker_dob']=$_POST['dob'];
			if(empty($_POST['jobseeker_image'])){
			$data['jobseeker_image']=" ";
			}
			else{
			$data['jobseeker_image']=$_POST['jobseeker_image'];
			}
		$data['jobseeker_user_name']=$_POST['user_name'];
		$data['jobseeker_password']=$_POST['password'];
		$data['jobseeker_password']=$_POST['confirm_password'];
	 	$this->MJobSeeker->createJobseeker($data);
	 	 }
	}
}
