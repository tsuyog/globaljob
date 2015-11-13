<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends  CI_Controller{
	function index()
	{
		redirect("profile/view");
	}
	function view()
	{
		if(checkLoginState()){
			$id = $this->session->userdata("LoggedInUserId");
			$this->load->model("MCompany");
			$data['package']=$this->MCompany->prepareProfilePackage($id); //id sent using session variables
			$this->load->view("company/companyprofile",$data);
		}
		else{
		redirect("login");
		}
	}
	function editProfile()
	{
		if(checkLoginState()){
			 $this->load->model("MIndustry");
			 $this->load->model("MFunctions");
			 $this->load->model("MCompanySize");
			 $this->load->model("MCompanyHead");
			 $this->load->model("MCompanyContact");
			 $this->load->model("MCountry");
			 $this->load->model("MState");
			 $this->load->model("MCity");
			 $this->load->model("MCompany");
			 $this->load->model("MOwnership");
			 $this->load->model("MCompany");
			 $data['industries']=$this->MIndustry->getIndustry();
			 $data['functions']=$this->MFunctions->getFunctions();
			 $data['sizes']=$this->MCompanySize->getCompanySizeRange();
			 $data['countries']=$this->MCountry->getCountry();
			 $data['states']=$this->MState->getState();
			 $data['cities']=$this->MCity->getCity();
			 $data['ownerships']=$this->MOwnership->getOwnership();
			 $id=$this->session->userdata("LoggedInUserId");//default id for company when logged in 
			 $data['companydetail']=$this->MCompany->getCompanyById($id);
			 $data['industrydetail']=$this->MIndustry->getIndustryById($data['companydetail']->industry_id);
			 $data['companyheaddetail']=$this->MCompanyHead->getCompanyHeadById($data['companydetail']->company_head_id);
			 $data['contactdetail']=$this->MCompanyContact->getCompanyContactbyId($data['companydetail']->contact_id);
			 //testArray($data);	
			$this->load->view("company/companyedit",$data);
			if(isset($_POST['industry'])){
			$companyData=array(
								'company_name'=>$_POST['company_name'],
								'street_address'=>$_POST['street_address'],
								'industry_id'=>$_POST['industry'],
								'company_profile'=>$_POST['organization_description'],
								'size_id'=>$_POST['company_size'],
								'ownership_id'=>$_POST['ownership_name']
								);
			$company_head=array(
								'company_head_id'=>$_POST['company_head_id'],
								'company_head_sex'=>$_POST['company_head_sex'],
								'company_head_first_name'=>$_POST['contacthead_first_name'],
								'company_head_middle_name'=>$_POST['contacthead_middle_name'],
								'company_head_last_name'=>$_POST['contacthead_last_name']
								);
			$contact     =array(
								'contact_id'=>$_POST['contact_id'],
								'contact_sex'=>$_POST['contact_sex'],
								'contact_first_name'=>$_POST['contact_first_name'],
								'contact_middle_name'=>$_POST['contact_middle_name'],
								'contact_last_name'=>$_POST['contact_last_name'],
								'phone_one'=>$_POST['phone_one'],
								'alternate_phone'=>$_POST['alternate_phone'],
								'email'=>$_POST['email'],
								'company_url'=>$_POST['company_url']
								);
			$this->MCompany->updateCompany($companyData,$id);//default id sent from line no. 34
			$this->MCompanyContact->updatecompanycontactperson($contact);
			$this->MCompanyHead->updateCompanyHead($company_head);
			$this->session->set_userdata("msg","succesfully updated");
			redirect("profile/viewprofile/".$id);
			}
		}
		else{
		redirect("login");
		}
	}
	function create()
	{
		
	}
	function setting(){
		if(checkLoginState()){	
			$this->load->model("MCompany");
			$this->load->view("company/companysetting");
			$id = $this->session->userdata("LoggedInUserId");
			if(isset($_POST['user_name'])){
			$company_user_name=$_POST['user_name'];
			$company_old_password=$_POST['old_password'];
			$company_new_password=$_POST['new_password'];	
				$data=$this->MCompany->checkUsernamePassword($id);//company id is sent using session variable
				if($data['username']==$company_user_name&&$data['password']==$company_old_password){
				$this->MCompany->updatePassword($id,$company_new_password);//company id is sent using session variable
				$this->session->set_userdata("msg","your password has been changed");
				redirect("profile/viewprofile/".$id);
				}
				else
				$this->load->view("company/companysetting");
			}
		}
		else{
		redirect("login");
		}
	}
	function viewProfile(){// to profile data when employeer clicks on view 
		if(checkLoginState()){
		$id = $this->session->userdata("LoggedInUserId");
		$this->load->model("MCompany");
		$data=$this->MCompany->profileView($id);
		$msg = $this->session->userdata("msg");
		if($msg!=""){$data['msg']=$msg;$this->session->unset_userdata("msg");}
		$this->load->view("company/viewcompanyprofile",$data);
		}
		else{
		redirect("login");
		}
	}
	function postJob(){
		if(checkLoginState()){
			$this->load->model("MMasterJob");
			$this->load->model("MIndustry");
			$this->load->model("MFunctions");
			$this->load->model("MServiceType");
			$this->load->model("MJobType");
			$this->load->model("MCompany");
			$this->load->model("MSalaryRange");
			$this->load->model("MDesignation");
			$this->load->model("MJobRequirement");
			$this->load->model("MApplicationSetting");
			$this->load->model("MCity");
			$this->load->model("MJobLevel");
			$data['services']=$this->MServiceType->getServiceType();		
			$data['industries'] = $this-> MIndustry->getIndustry();
			$data['functions'] = $this-> MFunctions->getFunctions();
			$data['job_types']=$this->MJobType->getJobTtype();
			$data['companys']=$this->MCompany->getCompany();
			$data['salary_ranges']=$this->MSalaryRange->getSalaryRange();
			$data['designations']=$this->MDesignation->getDesignation();
			$data['cities']=$this->MCity->getCity();
			$data['joblevels']=$this->MJobLevel->getJobLevel();
			$this->load->view("company/postjob",$data);
			if(isset($_POST['job_title'])){
			$job         = array(
							'job_title'=>$_POST['job_title'],
							'industry_id'=>$_POST['industry'],
							'company_id'=>$this->session->userdata("LoggedInUserId"),//company id sent using session
							'location_id'=>$_POST['joblocation'],
							'function_id'=>$_POST['function'],
							'job_salary_exact_amount'=>$_POST['salary_amount'],
							'salary_range_id'=>$_POST['salary_range'],
							'job_service_type'=>$_POST['service_type'],//gives job_servie_type id
							'job_openings'=>$_POST['opening'],
							'designation_id'=>$_POST['designation'],
							'job_working_type'=>$_POST['working_type'],
							'job_level_id'=>$_POST['job_level'],
							'posted_date'=>$_POST['posted_date'],
							'deadline'=>$_POST['deadline'],
							'job_alias'=>createAlias($_POST['job_title'],"tbl_job","job_alias")  
								);
			$jobrequirement= array(
								'job_requirement_education_level'=>$_POST['education_level'],
								'sex'=>$_POST['sex'],
								'job_requirement_age_bar'=>$_POST['age_bar'],
								'job_requirement_education_description'=>$_POST['education_description'],
								'job_requirement_specification'=>$_POST['job_specification'],
								'job_requirement_special_requirement'=>$_POST['special_requirement'],
								'job_requirement_organization_description'=>$_POST['organization_description']
								);
			$job['job_requirement_id']=$this->MJobRequirement->createJobRequirement($jobrequirement);
			$applicationsetting=array(
									'by_online'=>$_POST['apply_online'],
									'by_post'=>$_POST['by_post'],
									'by_email'=>$_POST['apply_email'],
									'email'=>$_POST['provided_email']
									);
			$job['application_setting_id']=$this->MApplicationSetting->createApplicationSetting($applicationsetting);
			//testArray($data);	
			$this->MMasterJob->createJobs($job);
			$this->session->set_userdata("msg","your jobs has been posted");
			redirect("profile/viewProfile/".$this->session->userdata("LoggedInUserId"));
			}
		}
		else{
		redirect("login");
		}
	}
	function applicationPool($company_id=""){
		if(checkLoginState()){
			$this->load->model("MApplicationPool");
			$this->load->model("MJobseeker");
			$this->load->model("MMasterJob");
			$id = $this->session->userdata("LoggedInUserId");
			$application=$this->MApplicationPool->getApplicationsByCompany($id);
			foreach($application as $app):
			$app->Jobseeker=$this->MJobseeker->getJobseekerById($app->jobseeker_id);
			$app->Job=$this->MMasterJob->getJobsById($app->job_id);
			endforeach;
			$data['applications']=$application; //testArray($data);die;
			$this->load->view("company/companyapplicationpool",$data);
		}
		else{
		redirect("login");
		}
	}
	function shortlistedapplication(){
		if(checkLoginState()){
			$this->load->model("MApplicationPool");
			$this->load->model("MJobseeker");
			$this->load->Model("MMasterJob");
			$id = $this->session->userdata("LoggedInUserId");
			$application=$this->MApplicationPool->getApplicationsByCompany($id);//id sent using session variables
			foreach ($application as $app):
			$app->Jobseeker=$this->MJobseeker->getJobseekerById($app->jobseeker_id);
			$app->Job=$this->MMasterJob->getJobsById($app->job_id);
			endforeach;
			$data['applications']=$application;
			$this->load->view("company/shortlistedapplication",$data);
		}
		else{
		redirect("login");
		}
	}
	function selectedapplication(){
		if(checkLoginState()){
		$id=$this->session->userdata("LoggedInUserId");
		$this->load->model("MApplicationPool");
		$this->load->model("MJobseeker");
		$this->load->Model("MMasterJob");
		$application=$this->MApplicationPool->getSelectedApplicationByCompany($id);
		foreach($application as $apps):
			$apps->Jobseeker=$this->MJobseeker->getJobseekerById($apps->jobseeker_id);
			$apps->Job=$this->MMasterJob->getJobsById($apps->job_id);
		endforeach;
		$data['application']=$application;
		$this->load->view("company/selectedapplication",$data);
		
		}
	}
	function postedjobs(){
		if(checkLoginState()){
			$id = $this->session->userdata("LoggedInUserId");
			$this->load->model("MMasterJob");
			$this->load->model("MFunctions");
			$this->load->model("MIndustry");
			$this->load->model("MCity");
			$this->load->model("MJobType");
			$this->load->model("MDesignation");
			$postedJobs=$this->MMasterJob->getJobsByCompanyId($id);
			//testArray($postedJobs);die;
			foreach($postedJobs as $jobs):
				$jobs->Industry=$this->MIndustry->getIndustryById($jobs->industry_id);
				$jobs->Function=$this->MFunctions->getFunctionById($jobs->function_id);
				$jobs->City=$this->MCity->getCityById($jobs->location_id);
				$jobs->Designation=$this->MDesignation->getDesignationById($jobs->designation_id);
				$jobs->Type=$this->MJobType->getJobTypeById($jobs->job_working_type);
			endforeach;
			$data['postedJob']=$postedJobs;
			//testArray($data); die;
			$this->load->view("company/viewpostedjobs",$data);
		
		}
	}
	function templateresponder(){ 
		$this->load->model("MCompanyResponder");
		$id=$this->session->userdata("LoggedInUserId");
		$data['temp']=$this->MCompanyResponder->getTemplateByCompany($id);
		//testArray($data);die;
		$this->load->view("company/templateresponder",$data);
		if(isset($_POST['createtemplate'])) $this->createtemplate();
		if(isset($_POST['template'])) $this->edittemplate();
	}
	function edittemplate(){ 
		if(isset($_POST['template'])){
			$id=$this->session->userdata("LoggedInUserId");
			$this->load->model("MCompanyResponder");
			$operation=$this->MCompanyResponder->updateTemplate($id,$_POST['template']);
			if($operation==true) 
				redirect("profile/view");	
		}
	}
	function createtemplate(){
		if(isset($_POST['createtemplate'])){
			$id=$this->session->userdata("LoggedInUserId");
			$this->load->model("MCompanyResponder");
			$operation=$this->MCompanyResponder->createTemplate($id,$_POST['createtemplate']);
			if($operation==true) 
				redirect("profile/view");	
		}
	}	
	function hotpost(){
	$this->load->model("MMasterJob");
	$this->load->model("MIndustry");
	$this->load->model("MFunctions");
	$this->load->model("MServiceType");
	$this->load->model("MJobType");
	$this->load->model("MCompany");
	$this->load->model("MSalaryRange");
	$this->load->model("MDesignation");
	$this->load->model("MJobRequirement");
	$this->load->model("MApplicationSetting");
	$this->load->model("MCity");
	$this->load->model("MJobLevel");
			$data['services']=$this->MServiceType->getServiceType();		
			$data['industries'] = $this-> MIndustry->getIndustry();
			$data['functions'] = $this-> MFunctions->getFunctions();
			$data['job_types']=$this->MJobType->getJobTtype();
			$data['companys']=$this->MCompany->getCompany();
			$data['salary_ranges']=$this->MSalaryRange->getSalaryRange();
			$data['designations']=$this->MDesignation->getDesignation();
			$data['cities']=$this->MCity->getCity();
			$data['joblevels']=$this->MJobLevel->getJobLevel();	
	$this->load->view("company/hotpost",$data);
		if(isset($_POST['job_title'])){
			$job         = array(
							'job_title'=>$_POST['job_title'],
							'industry_id'=>$_POST['industry'],
							'company_id'=>$this->session->userdata("LoggedInUserId"),//company id sent using session
							'location_id'=>$_POST['joblocation'],
							'function_id'=>$_POST['function'],
							'job_salary_exact_amount'=>$_POST['salary_amount'],
							'salary_range_id'=>$_POST['salary_range'],
							'job_service_type'=>1,//gives job_servie_type id mannually posting for hot job
							'job_openings'=>$_POST['opening'],
							'designation_id'=>$_POST['designation'],
							'job_working_type'=>$_POST['working_type'],
							'job_level_id'=>$_POST['job_level'],
							'posted_date'=>$_POST['posted_date'],
							'deadline'=>$_POST['deadline'],
							'job_alias'=>createAlias($_POST['job_title'],"tbl_job","job_alias")  
								);
			$jobrequirement= array(
								'job_requirement_education_level'=>$_POST['education_level'],
								'sex'=>$_POST['sex'],
								'job_requirement_age_bar'=>$_POST['age_bar'],
								'job_requirement_education_description'=>$_POST['education_description'],
								'job_requirement_specification'=>$_POST['job_specification'],
								'job_requirement_special_requirement'=>$_POST['special_requirement'],
								'job_requirement_organization_description'=>$_POST['organization_description']
								);
			$job['job_requirement_id']=$this->MJobRequirement->createJobRequirement($jobrequirement);
			$applicationsetting=array(
									'by_online'=>$_POST['apply_online'],
									'by_post'=>$_POST['by_post'],
									'by_email'=>$_POST['apply_email'],
									'email'=>$_POST['provided_email']
									);
			$job['application_setting_id']=$this->MApplicationSetting->createApplicationSetting($applicationsetting);
			//testArray($job);
			$query=$this->MMasterJob->createJobs($job);
				if($query==true){
				$this->load->model("MPurchase_Unit");
				$this->MPurchase_Unit->updatePurchaseUnitHotJob($this->session->userdata("LoggedInUserId"));
				$this->session->set_userdata("msg","your jobs has been posted");
				redirect("profile/viewProfile/".$this->session->userdata("LoggedInUserId"));
				}
				else{
					$this->session->set_userdata("msg","sorry your jobs has not been posted");
					redirect("profile/viewProfile/".$this->session->userdata("LoggedInUserId"));
				}
		}
	}
	function hothistory(){
	$this->load->model("MMasterJob");
	$this->load->model("MMasterJob");
	$this->load->model("MFunctions");
	$this->load->model("MIndustry");
	$this->load->model("MCity");
	$this->load->model("MJobType");
	$this->load->model("MDesignation");
	$id=$this->session->userdata("LoggedInUserId");
	$postedJobs=$this->MMasterJob->getHistoryHotPostedJob($id);
	foreach($postedJobs as $jobs):
				$jobs->Industry=$this->MIndustry->getIndustryById($jobs->industry_id);
				$jobs->Function=$this->MFunctions->getFunctionById($jobs->function_id);
				$jobs->City=$this->MCity->getCityById($jobs->location_id);
				$jobs->Designation=$this->MDesignation->getDesignationById($jobs->designation_id);
				$jobs->Type=$this->MJobType->getJobTypeById($jobs->job_working_type);
	endforeach;
	$data['postedJob']=$postedJobs;
	//testArray($data);
	$this->load->view("company/hothistory",$data);
	}
	function featuredavailableunit(){
	$this->load->view("company/featuredavailableunit");
	}
	function featuredpurchaseunit(){
	$this->load->view("company/featuredpurchaseunit");
	}
	function featuredpost(){
	$this->load->model("MMasterJob");
	$this->load->model("MIndustry");
	$this->load->model("MFunctions");
	$this->load->model("MServiceType");
	$this->load->model("MJobType");
	$this->load->model("MCompany");
	$this->load->model("MSalaryRange");
	$this->load->model("MDesignation");
	$this->load->model("MJobRequirement");
	$this->load->model("MApplicationSetting");
	$this->load->model("MCity");
	$this->load->model("MJobLevel");
			$data['services']=$this->MServiceType->getServiceType();		
			$data['industries'] = $this-> MIndustry->getIndustry();
			$data['functions'] = $this-> MFunctions->getFunctions();
			$data['job_types']=$this->MJobType->getJobTtype();
			$data['companys']=$this->MCompany->getCompany();
			$data['salary_ranges']=$this->MSalaryRange->getSalaryRange();
			$data['designations']=$this->MDesignation->getDesignation();
			$data['cities']=$this->MCity->getCity();
			$data['joblevels']=$this->MJobLevel->getJobLevel();	
	$this->load->view("company/featuredpost",$data);
		if(isset($_POST['job_title'])){
			$job         = array(
							'job_title'=>$_POST['job_title'],
							'industry_id'=>$_POST['industry'],
							'company_id'=>$this->session->userdata("LoggedInUserId"),//company id sent using session
							'location_id'=>$_POST['joblocation'],
							'function_id'=>$_POST['function'],
							'job_salary_exact_amount'=>$_POST['salary_amount'],
							'salary_range_id'=>$_POST['salary_range'],
							'job_service_type'=>3,//gives job_servie_type id mannually posting for featured job
							'job_openings'=>$_POST['opening'],
							'designation_id'=>$_POST['designation'],
							'job_working_type'=>$_POST['working_type'],
							'job_level_id'=>$_POST['job_level'],
							'posted_date'=>$_POST['posted_date'],
							'deadline'=>$_POST['deadline'],
							'job_alias'=>createAlias($_POST['job_title'],"tbl_job","job_alias")  
								);
			$jobrequirement= array(
								'job_requirement_education_level'=>$_POST['education_level'],
								'sex'=>$_POST['sex'],
								'job_requirement_age_bar'=>$_POST['age_bar'],
								'job_requirement_education_description'=>$_POST['education_description'],
								'job_requirement_specification'=>$_POST['job_specification'],
								'job_requirement_special_requirement'=>$_POST['special_requirement'],
								'job_requirement_organization_description'=>$_POST['organization_description']
								);
			$job['job_requirement_id']=$this->MJobRequirement->createJobRequirement($jobrequirement);
			$applicationsetting=array(
									'by_online'=>$_POST['apply_online'],
									'by_post'=>$_POST['by_post'],
									'by_email'=>$_POST['apply_email'],
									'email'=>$_POST['provided_email']
									);
			$job['application_setting_id']=$this->MApplicationSetting->createApplicationSetting($applicationsetting);
			//testArray($job);
			$query=$this->MMasterJob->createJobs($job);
				if($query==true){
				$this->load->model("MPurchase_Unit");
				$this->MPurchase_Unit->updatePurchaseUnitFeaturedJob($this->session->userdata("LoggedInUserId"));
				$this->session->set_userdata("msg","your jobs has been posted");
				redirect("profile/viewProfile/".$this->session->userdata("LoggedInUserId"));
				}
				else{
					$this->session->set_userdata("msg","sorry your jobs has not been posted");
					redirect("profile/viewProfile/".$this->session->userdata("LoggedInUserId"));
				}
		}
	}
	function featuredhistory(){
	$this->load->model("MMasterJob");
	$this->load->model("MMasterJob");
	$this->load->model("MFunctions");
	$this->load->model("MIndustry");
	$this->load->model("MCity");
	$this->load->model("MJobType");
	$this->load->model("MDesignation");
	$id=$this->session->userdata("LoggedInUserId");
	$postedJobs=$this->MMasterJob->getHistoryFeaturedPostedJob($id);
	foreach($postedJobs as $jobs):
				$jobs->Industry=$this->MIndustry->getIndustryById($jobs->industry_id);
				$jobs->Function=$this->MFunctions->getFunctionById($jobs->function_id);
				$jobs->City=$this->MCity->getCityById($jobs->location_id);
				$jobs->Designation=$this->MDesignation->getDesignationById($jobs->designation_id);
				$jobs->Type=$this->MJobType->getJobTypeById($jobs->job_working_type);
	endforeach;
	$data['postedJob']=$postedJobs;
	$this->load->view("company/featuredhistory",$data);
	}
	function viewapplication(){
		if(checkLoginState()){
		$alias=$this->uri->segment(3); 
		$this->load->model("MJobseeker");
		$this->load->model("MJobseekerAcademic");
		$this->load->model("MExperience");
		$this->load->model("MTraining");
		$jobseeker=$this->MJobseeker->getJobseekerByAlias($alias);
		$jobseeker->Academic=$this->MJobseekerAcademic->getJobseekerAcademicByJobseeker($jobseeker->jobseeker_id);
		$jobseeker->Experience=$this->MExperience->getExperienceByJobseeker($jobseeker->jobseeker_id);
		$jobseeker->Training=$this->MTraining->getTrainingByJobseeker($jobseeker->jobseeker_id);
		$data['viewpackage']=$jobseeker;
		//testArray($data); die;
		$this->load->view("company/viewapplication",$data);
		}
	}
	function downloadprofile(){
		if(checkLoginState()){
			$user=$this->uri->segment(3);
			}
		}
}
