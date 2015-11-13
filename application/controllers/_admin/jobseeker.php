<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jobseeker extends CI_Controller{
	public function index(){
	 isLoggedIn();
	 $this->load->model("MJobseeker");
	 $data['abc']=$this->MJobseeker->getJobseeker();
	  $this->load->view("admin/jobseeker_list",$data);
	}
	
}