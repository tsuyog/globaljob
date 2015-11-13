<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class JobBenifits extends  CI_Controller{
	
	public function index(){
		isLoggedIn();
		$this->load->model("MMasterBenifit");
		$benifits=$this->MMasterBenifit->getMasterBenifits();
		$data['jobbenifits']=$benifits;
		$this->load->view("admin/job_benifits_list", $data);
	}
	function add(){
		isLoggedIn();
		$this->load->view("admin/job_benifit_add");
		if(isset($_POST['benifit_name'])){
		$this->load->model("MMasterBenifit");
		if($this->MMasterBenifit->createMasterBenifits($_POST['benifit_name']));
		 redirect("admin/jobbenifits");
		}
	}
	function edit(){
		isLoggedIn();
		$id=$this->uri->segment(4);
		$this->load->model("MMasterBenifit");
		$data['benifits']=$this->MMasterBenifit->getMasterBenifitsById($id);
		$this->load->view("admin/job_benifit_edit", $data);
		if(isset($_POST['benifit_name']))
		 if($this->MMasterBenifit->updateMasterBenifits($id,$_POST['benifit_name']))
		 redirect("admin/jobbenifits");
	}
	function delete(){
		isLoggedIn();
		$id=$this->uri->segment(4);
		$this->load->model("MMasterBenifit");
		if($this->MMasterBenifit->deleteMasterBenifits($id))
		 redirect("admin/jobbenifits");
	}
}
