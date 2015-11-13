<?php 
Class Contact extends CI_Controller{
	function index(){
		$this->load->model("MContact");
		$this->load->view("contactus");	
		if(isset($_POST['name'])){
		$contact = array(
						'contact_name'=>$_POST['name'],
						'contact_email'=>$_POST['email'],
						'contact_message'=>$_POST['message']
						);
		$this->MContact->insertcontact($contact);
		$this->session->set_userdata("msg","Thank you for your contact we will soon send you email to your email address");
		redirect("Welcome");
		}
	}
	
}