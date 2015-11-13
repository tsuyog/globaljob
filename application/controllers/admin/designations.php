<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Designations extends CI_Controller {
	
	public function index()
	{
		isLoggedIn();
		$this->load->model("MDesignation");
		$data['designations']=$this->MDesignation->getDesignation();
		$this->load->view("admin/designation_list",$data);
	
	}
	function add(){
	 isLoggedIn();
	 $this->load->view("admin/designation_add");
	 if(isset($_POST['designation_name'])){
	  $designation_name=$_POST['designation_name'];
	  $designation_comments=$_POST['designation_comments'];
	  $this->load->model("MDesignation");
	  $call=$this->MDesignation->createDesignation($designation_name,$designation_comments);
	  redirect("admin/designations");
	 }
	 //$this->loadDesignation();
	 //$this->load->view("admin/designation_add");
	}
	function loadDesignation(){
	 $this->load->model("MDesignation");
	 $data['designations']=$this->MDesignation->getDesignation();
	 $this->load->view("admin/designation_list",$data);
	}
	function delete(){
		isLoggedIn();
		$this->load->model("MDesignation");
		$id=$this->uri->segment(4);
		$t=$this->MDesignation->deleteDesignation($id);
		if($t=TRUE)
		redirect("admin/designations");
	}
	function edit(){
		isLoggedIn();
		$id=$this->uri->segment(4);
		$this->load->model("MDesignation");
		$data['designations']=$this->MDesignation->getDesignationById($id);
		$this->load->view("admin/designation_edit",$data);
		if(isset($_POST['designation_name']))
		if($this->MDesignation->updateDesignation($id,$_POST['designation_name'],$_POST['designation_comments']))
		redirect("admin/designations");
	}
}
