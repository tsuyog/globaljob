<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Functions extends CI_Controller {
	
	public function index()
	{
		isLoggedIn();
		$this->load->model("MFunctions");
		$Functions=$this->MFunctions->getFunctions();
		$data['Functions']=$Functions;
		$this->load->view("admin/functions_list",$data);
	}
	public function add()
	{
		isLoggedIn();
		$this->load->model("MFunctions");
		$data['msg']="";
		if(isset($_POST['function_name']))
		{
			$function=array(
			"function_name"=>$_POST['function_name']
			);
			$this->MFunctions->addFunction($function);
			$data['msg']="New Function Added Successfully";
				
		}
		$this->load->view("admin/functions_add",$data);
	}
	function edit(){
		isLoggedIn();
		$id=$this->uri->segment(4);
		$this->load->model("MFunctions");
		$data['functions']=$this->MFunctions->getFunctionById($id);
		$this->load->view("admin/functions_edit",$data);
		if(isset($_POST['function_name']))
		 if($this->MFunctions->updateFunction($id,$_POST['function_name']))
		  redirect("admin/functions");
	}

	function delete(){
		isLoggedIn();
		$this->load->model("MFunctions");
		$id=$this->uri->segment(4);
		echo $id;
		$t=$this->MFunctions->delete($id);
		if($t==TRUE)
		redirect("admin/functions");
		
	}
	
}
