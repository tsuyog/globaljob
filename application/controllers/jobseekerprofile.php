<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class JobSeekerProfile extends CI_Controller {
	

	function _remap($alias="", $params=array())
	{
		switch($alias)
		{
			case "edit":
				$this->edit();
				break;
			case "createacademic":
				$this->createacademic();
				break;
			case "viewacademic":
				$this->viewacademic();
				break;
			case "appliedjob":
				$this->appliedjob();
				break;
			case "editacademic":
				$this->editacademic($params[0]);
				break;
			case "deleteacademic":
				$this->deleteacademic($params[0]);
				break;
			case "edittraining":
				$this->edittraining($params[0]);
				break;	
			case "deletetraining":
				$this->deletetraining($params[0]);
				break;
			case "viewprofile":
				$this->viewprofile();
				break;
			case "setting":
				$this->setting();
				break;
			case "createresume":
				$this->createresume();
				break;
			case "createemail":
				$this->createemail();
				break;
			case "uploadimage":
				$this->uploadimage();
				break;
			case "index":
			case "":
				echo "Determine later what to do here";	
				break;
			default:
				if(checkLoginState()){
				$this->load->Model("MJobseeker");
				$data['JobSeeker']=$this->MJobseeker->getJobseekerById($this->session->userdata("LoggedInUserId"));
				$msg = $this->session->userdata("msg");
				if($msg!=""){$data['msg']=$msg;$this->session->unset_userdata("msg");}
				$this->load->view("jobseekerprofile",$data);	
				}
				else{
				redirect("login");
				}
		}
	}
	function createacademic(){
		if(checkLoginState()){		
			$this->load->model("MJobSeekerAcademic");
			$this->load->model("MJobseekerTraining");
			$this->load->view("jobseekeracademic");
			if(isset($_POST['level'])){
			$data['jobseeker_id']=$this->session->userdata("LoggedInUserId");
			$data['jobseeker_level_of_degree']=$_POST['level'];
			$data['jobseeker_degree_name']=$_POST['degreename'];
			$data['jobseeker_graduation_year']=$_POST['year'];
			$data['jobseeker_college_name']=$_POST['college'];
			$data['jobseeker_university_name']=$_POST['university'];
			$data['jobseeker_score']=$_POST['grade'];
			$this->MJobSeekerAcademic->createJobseekerAcademic($data);
			$this->session->set_userdata("msg","successfully added");
			redirect("jobseekerprofile/viewacademic");
			//testArray($data);die;
			}
			//echo $_POST['experiencedyear'];
			if(isset($_POST['description'])){
			$data['jobseeker_id']=$this->session->userdata("LoggedInUserId");
			$data['jobseeker_training_year']=$_POST['experiencedyear'];
			$data['jobseeker_training_description']=$_POST['description'];
			$data['jobseeker_training_purpose']=$_POST['trainingpurpose'];
			//testArray($data);die;
			$this->MJobseekerTraining->createJobseekerTraining($data);
			$this->session->set_userdata("msg","successfully added");
			redirect("jobseekerprofile/viewacademic");
			}
		}
		else{
		redirect("login");
		}
	}
	
	function viewprofile(){
		if(checkLoginState()){
			$id = $this->session->userdata("LoggedInUserId");
			$this->load->Model("MJobseeker");
			$data['JobSeeker']=$this->MJobseeker->getJobseekerById($id);
			//testArray($data);die;
			$this->load->view("jobseekerprofile",$data);	
		}
		else{
		redirect("login");
		}
	}
	function viewacademic(){
	$id = $this->session->userdata("LoggedInUserId");
	$this->load->model("MJobSeekerAcademic");
	$this->load->model("MJobseekerTraining");
	$data['jobseekeracademic'] =$this->MJobSeekerAcademic->getJobseekerAcademicByJobseeker($id);
	$data['jobseekertraining'] =$this->MJobseekerTraining->getJobseekerTrainingByJobseekerId($id);
	$msg = $this->session->userdata("msg");
	if($msg!=""){$data['msg']=$msg;$this->session->unset_userdata("msg");}
	$this->load->view("academicview",$data);
	}
	function appliedjob(){
		$id = $this->session->userdata("LoggedInUserId");
		$this->load->model("MApplicationPool");
		$this->load->model("MMasterJob");
		$this->load->model("MCompany");
		$Applications=$this->MApplicationPool->getApplicationsByJobseeker($id);//id is sent using session variable
			foreach($Applications as $jobseeker_application):
				$jobseeker_application->jobdetail=$this->MMasterJob->getJobsById($jobseeker_application->job_id);
				$jobseeker_application->companydetail=$this->MCompany->getCompanyById($jobseeker_application->company_id);
			endforeach;
			$data['Application']=$Applications;
		$this->load->view("jobseekerappliedjob",$data);
	}
	function editacademic($id){
	$this->load->model("MJobSeekerAcademic");
	//$data['jobseekeracademic'] =$this->MJobSeekerAcademic->getJobseekerAcademicByacademicid($id);
	$data['jobseekeracademic'] =$this->MJobSeekerAcademic->getJobseekerAcademicByacademicid($id);

	//$data['jobseekertraining'] =$this->MJobseekerTraining->getJobseekerTrainingByJobseekertrainingId($id);
	//testArray($data);
	$this->load->view("academicedit",$data);
		if(isset($_POST['degreename'])){
		$data['jobseeker_academic_id']= $id;
		$data['jobseeker_level_of_degree']= $_POST['level'];
		$data['jobseeker_degree_name']= $_POST['degreename'];
		$data['jobseeker_graduation_year']= $_POST['year'];
		$data['jobseeker_college_name']= $_POST['college'];
		$data['jobseeker_university_name']= $_POST['university'];
		$data['jobseeker_score']= $_POST['grade'];
		$this->MJobSeekerAcademic->updateJobseekerAcademic($data);
		$this->session->set_userdata("msg","successfully updated");
		//redirect("jobseekerprofile/viewacademic");
		redirect("jobseekerprofile/viewacademic");
		}	
	}
	function deleteacademic($id){
	$this->load->model("MJobSeekerAcademic");
	$this->MJobSeekerAcademic->deleteJobseekerAcademic($id);
	$this->session->set_userdata("msg","successfully deleted");
	redirect("jobseekerprofile/viewacademic");
	}
	function edittraining($id){
	$this->load->model("MJobseekerTraining");
	$data['jobseekertraining'] =$this->MJobseekerTraining->getJobseekerTrainingByJobseekertrainingId($id);
	$this->load->view("trainingedit",$data);
		if(isset($_POST['description'])){
		$jobseekertraining = array(
								    'jobseeker_training_id'=> $id,
									'jobseeker_training_year'=> $_POST['year'],
									'jobseeker_training_description'=> $_POST['description'],
									'jobseeker_training_purpose'=> $_POST['purpose']
									);
		$this->MJobseekerTraining->updateJobseekerTrainingbytrainingid($jobseekertraining);
		$this->session->set_userdata("msg","successfully updated");
		redirect("jobseekerprofile/viewacademic");
		//testArray($data);die;
		}
	}
	function deletetraining($id){
		if(checkLoginState()){
		$this->load->model("MJobseekerTraining");
		$this->MJobseekerTraining->deleteJobseekerTraining($id);
		$this->session->set_userdata("msg","successfully deleted");
		redirect("jobseekerprofile/viewacademic");
		}
		else{
		redirect("login");
		}
	}
	function edit()
	{
		$id = $this->session->userdata("LoggedInUserId");
		if(checkLoginState()){
			if(isset($_POST['submit']))
			{
				$this->load->model("MJobSeeker");
				$data['jobseeker_id']=$id;
				$data['sex']=$_POST['sex'];
				$data['jobseeker_first_name']=$_POST['first_name'];
				$data['jobseeker_middle_name']=$_POST['middle_name'];
				$data['jobseeker_last_name']=$_POST['last_name'];
				$data['jobseeker_contact_number']=$_POST['contact_number'];			
				$data['jobseeker_address']=$_POST['address'];
				$data['jobseeker_nationality']=$_POST['jobseeker_nationality'];
				$data['jobseeker_marital_status']=$_POST['marital_status'];
				$data['jobseeker_dob']=$_POST['dob'];
				$data['jobseeker_email']=$_POST['email'];
				$this->MJobSeeker->updateJobseeker($data);
				$this->session->set_userdata("msg","your profile has been updated");
				redirect("jobseekerprofile/view");
			}
	$this->load->model("MCountry");
	$this->load->model("MJobSeeker");
	$data['jobseekerdetail'] = $this->MJobSeeker->getJobseekerById($id);
	$this->load->view("jobseekeredit",$data);	
		}
		else{
		redirect("jobseekerprofile/login");
		}
	}
	function setting(){
		if(checkLoginState()){
			$id = $this->session->userdata("LoggedInUserId");
			$this->load->model("MJobseeker");
			$this->load->view("jobseekersetting");
				if(isset($_POST['user_name'])){
				$jobseeker_user_name=$_POST['user_name'];
				$jobseeker_old_password=$_POST['old_password'];
				$jobseeker_new_password=$_POST['new_password'];	
					$data=$this->MJobseeker->checkUsernamePassword($id);//id is sent using session variables
					//testArray($data);die;
					if($data['username']==$jobseeker_user_name&&$data['password']==$jobseeker_old_password){
					$this->MJobseeker->updatePassword($id,$jobseeker_new_password);//id is sent using session variables
					$this->session->set_userdata("msg","your password has been changed"); 
					redirect("jobseekerprofile/view");
					}
					else
					$this->load->view("jobseekersetting");
				}
		}
		else{
		redirect("login");
		}
	}
	
	function update(){
	$this->load->model("MJobSeeker");
	 $this->load->model("MCountry");
	 //$data['country'] =$this->MCountry->getCountry();
	$this->load->view("jobseekeredit");
	if(isset($_POST['sex'])){
		$data['jobseeker_id']=$this->session->userdata("LoggedInUserId");
		$data['sex']=$_POST['sex'];
		$data['jobseeker_first_name']=$_POST['first_name'];
		$data['jobseeker_middle_name']=$_POST['middle_name'];
		$data['jobseeker_last_name']=$_POST['last_name'];
		$data['jobseeker_contact_number']=$_POST['contact_number'];
		$data['jobseeker_email']=$_POST['email'];
		$data['jobseeker_address']=$_POST['address'];
		$data['jobseeker_nationality']=$_POST['nationality'];
		$data['jobseeker_marital_status']=$_POST['marital_status'];
		$data['jobseeker_dob']=$_POST['dob'];
		$data['image']=$_POST['jobseeker_image'];
		$data['jobseeker_user_name']=$_POST['user_name'];
		$data['jobseeker_password']=$_POST['password'];
		//$data['confirm_password']=$_POST['confirm_password'];
		//testarray($data);die;
		}
		$this->MJobSeeker->updateJobseeker($data);
	}
	
	function create()
	{
		$this->load->model("MJobSeeker");
		$this->load->view("jobseekerregistration",$data);
	 if(isset($_POST['sex'])){
		$data['sex']=$_POST['sex'];
		$data['first_name']=$_POST['first_name'];
		$data['middle_name']=$_POST['middle_name'];
		$data['last_name']=$_POST['last_name'];
		$data['Contact']=$_POST['Contact'];
		$data['email']=$_POST['email'];
		$data['address']=$_POST['address'];
		$data['country']=$_POST['country'];
		$data['marital_status']=$_POST['marital_status'];
		$data['dob']=$_POST['dob'];
		$data['jobseeker_image']=$_POST['jobseeker_image'];
		$data['user_name']=$_POST['user_name'];
		$data['password']=$_POST['password'];
		$data['confirm_password']=$_POST['confirm_password'];
	 	$this->MJobSeeker->createJobseeker($data);
	 	$this->session->set_userdata("msg","you have successfully created your profile please verify your email address");
	 //testarray($data);
	 redirect("company-job-profile");
	 }
	}
	
	function createresume(){
	$id = $this->session->userdata("LoggedInUserId");
	$this->load->model("MJobSeeker");
	$this->load->model("MJobseekerAcademic");
	$this->load->model("MJobseekerTraining");
	$data['jobseekerdetail']=$this->MJobSeeker->getJobseekerById($id);
	$data['academic']=$this->MJobseekerAcademic->getJobseekerAcademicByJobseeker($id);
	$data['training']=$this->MJobseekerTraining->getJobseekerTrainingByJobseekerId($id);
	//testArray($data);
	$this->load->view("createresume",$data);
	}
	
	function createemail(){
	$this->load->view("createemail");
	}
	function uploadimage(){
	$this->load->model("MJobseeker");
	$jobseeker_id = $this->session->userdata("LoggedInUserId");
	if(isset($_FILES['img']))
		 	{
			 $config['upload_path'] = './resources/company_logos/';
			 $config['allowed_types'] = 'jpg|png';
			 $this->load->library('upload', $config);
			 if (!$this->upload->do_upload('company_logo'))
			{
				$error = array('error' => $this->upload->display_errors());
				testArray($error);die;
			}
			else
			{
				$cow =$this->upload->data();
			}
			$data['company_logo']=$cow['file_name'];
		 	}
	$this->MJobseeker->uploadimage($jobseeker_id,$image);
	redirect ("jobseekerprofile/viewprofile");
	}
}
