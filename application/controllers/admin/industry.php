<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Industry extends CI_Controller{
	
	public function index(){
		isLoggedIn();
		$this->load->model("MIndustry");
		$data['industrys']=$this->MIndustry->getIndustry();
		$this->load->view("admin/industry_list",$data);
	}
	function add(){
		isLoggedIn();
		$this->load->view("admin/industry_add");
		$this->load->model("MIndustry");
		if(isset($_POST['industry_name'])){
			$this->MIndustry->createIndustry($_POST['industry_name']);
			redirect("admin/industry");
		}
	}
	function delete(){
		isLoggedIn();
		$id=$this->uri->segment(4);
		$this->load->model("MIndustry");
		$t=$this->MIndustry->deleteIndustry($id);
		if($t==TRUE)
		redirect("admin/industry");
	}
	function edit(){
		isLoggedIn();
		$this->load->model("MIndustry");
		$id=$this->uri->segment(4);
		$data['industries']=$this->MIndustry->getIndustryById($id);
		$this->load->view("admin/industry_edit",$data);
		if(isset($_POST['industry_name']))
		if($this->MIndustry->updateIndustry($id, $_POST['industry_name']))
		redirect("admin/industry");
	}
}
