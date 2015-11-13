<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	public function index()
	{
		$data['msg']="";
		$this->load->model("MAdmin");
		if(isset($_POST['username']))
		{
			$username=$_POST['username'];
			$password=$_POST['password'];
			if(md5($password)==$this->MAdmin->getPassword($username))
			{
				$this->session->set_userdata("admin_logged","true");	
				redirect("admin");
			}
			else
			{
				$data['msg']="Invalid Username or Password";	
			}
		}
		$this->load->view("admin/login",$data);				
	}
}
