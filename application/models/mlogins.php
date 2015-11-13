<?php
	class MLogins extends CI_Model
	{
		function checkUsernamePassword($username, $password)
		{
			$this->load->model("MJobSeeker");
			$this->load->model("MCompany");
			$t="select * from tbl_jobseeker where jobseeker_user_name='$username' and jobseeker_password='$password'";
			$q=$this->db->query($t);
			if($q->num_rows()>0)
			{
				$temp=new stdClass;
				$temp->LoggedIn="true";
				$temp->LoginType="JobSeeker";
				$temp->Profile=$this->MJobSeeker->getJobseekerByUsername($username);
				//testArray($temp);die;
				return $temp;
			}
			else
			{
				$t="select * from tbl_company where user_name='$username' and password='$password'";
				$q=$this->db->query($t);
				if($q->num_rows()>0)
				{
					$temp=new stdClass;
					$temp->LoggedIn="true";
					$temp->LoginType="Employer";
					$temp->Profile=$this->MCompany->getCompanyByUsername($username);
					return $temp;
				}
					
			}
			return false;
		}
	}
	
?>