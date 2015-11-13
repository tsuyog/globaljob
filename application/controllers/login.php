<?php
	class Login extends CI_Controller
	{
		function index()
		{
			if(checkLoginState())redirect();
			if(isset($_POST['login']))
			{
				$username=$_POST['username'];
				$password=$_POST['password'];
				$this->load->model("MLogins");
				$LoggedIn=$this->MLogins->checkUsernamePassword($username,$password);
				//testArray($LoggedIn);die;
				if($LoggedIn)
				{
					$this->session->set_userdata("LoggedIn","true");
					$this->session->set_userdata("LoginType",$LoggedIn->LoginType);
					if($LoggedIn->LoginType=="JobSeeker")
					{
						$this->session->set_userdata("LoggedInUsername",$LoggedIn->Profile->jobseeker_user_name);
						$this->session->set_userdata("LoggedInUserId",$LoggedIn->Profile->jobseeker_id);			
						//testArray($LoggedIn);die;
						//redirect("jobseekerprofile/viewprofile/".$LoggedIn->Profile->jobseeker_id);	
					}
					else
					{
						$this->session->set_userdata("LoggedInUsername",$LoggedIn->Profile->user_name);	
						$this->session->set_userdata("LoggedInUserId",$LoggedIn->Profile->company_id);
						//redirect("profile/viewProfile/".$LoggedIn->Profile->company_id);
					}
					$callbackurl=$this->session->userdata("callbackurl");
					//testArray($this->session->all_userdata());die;
					if($callbackurl!="")
					header("location:".$callbackurl);
					else
					redirect("");
				}
			}
			$this->load->view("login");
			
		}
		
		// function checkLogin(){
				// $username=$_POST['username'];
				// $password=$_POST['password'];
				// $this->load->model("MLogins");
				// $LoggedIn=$this->MLogins->checkUsernamePassword($username,$password);
				// if($LoggedIn)
				// {
					// $this->session->set_userdata("LoggedIn","true");
					// $this->session->set_userdata("LoginType",$LoggedIn->LoginType);
					// if($LoggedIn->LoginType=="JobSeeker")
					// {
						// $this->session->set_userdata("LoggedInUsername",$LoggedIn->Profile->jobseeker_user_name);	
					// }
					// else
					// {
						// $this->session->set_userdata("LoggedInUsername",$LoggedIn->Profile->user_name);	
					// }
					// redirect("");
				// }
			// }	
		}

?>