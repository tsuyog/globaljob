<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Services extends CI_Controller{
	function index(){
	$this->load->model("MServices");
	$data['services']=$this->MServices->getServices();
	$this->load->view("admin/servicelist",$data);
	}
	function addServices(){
	$this->load->model("MServices");
	$this->load->view("admin/addservices");
	$display_order=$this->MServices->getDisplayOrderServices();
		if(isset($_POST['services_title'])){
		$data = array(
						'services_title'=>$_POST['services_title'],
						'services_alias'=>createAlias($_POST['services_title'],"tbl_services","services_alias"),
						'services_text'=>$_POST['services_text'],
						'services_posted_by'=>"admin", //username sent manuallly
						'services_display_order'=>$display_order+1,
						'status'=>1 //manually sending status 1 in first use
					);
		$this->MServices->addServices($data);
		redirect("admin/services");
		}
	}
	function edit($id){
	$this->load->model("MServices");
	$data['services']=$this->MServices->getServicesById($id);
	$this->load->view("admin/editservices",$data);
		if(isset($_POST['services_title'])){
		$data = array(
						'services_title'=>$_POST['services_title'],
						'services_alias'=>createAlias($_POST['services_title'],"tbl_services","services_alias"),
						'services_text'=>$_POST['services_text']
					);	
		$this->MServices->updateServices($data,$id);
		redirect("admin/services");
		}

	}
	function delete($id){
	$this->load->model("MServices");
	$this->MServices->deleteServices($id);
	redirect("admin/services");	
	}
}