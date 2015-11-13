<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Ownership extends CI_Controller {
	
	public function index() {
		isLoggedIn();
		$this->load->model("MOwnership");
		$data['owneships']=$this->MOwnership->getOwnership();
		$this->load->view("admin/ownership_list", $data);
	}
	function add(){
		isLoggedIn();
		$this->load->view("admin/ownership_add");
		if(isset($_POST['ownership_name'])){
			$this->load->model("MOwnership");
			$this->MOwnership->createOwnership($_POST["ownership_name"]);
		}
	}
	function edit(){
		isLoggedIn();
		$this->load->model("MOwnership");
		$id=$this->uri->segment(4);
		$data['ownerships']=$this->MOwnership->getOwnershipById($id);
		$this->load->view("admin/ownership_edit",$data);
		if(isset($_POST['ownership_name']))
		 if($this->MOwnership->updateOwnership($id,$_POST['ownership_name']))
		 redirect("admin/ownership");
	}
	function delete(){
		isLoggedIn();
		$id=$this->uri->segment(4);
		$this->load->model("MOwnership");
		if($this->MOwnership->deleteOwnership($id))	
		redirect("admin/ownership");	
	}
}
