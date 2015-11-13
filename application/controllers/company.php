<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Company extends  CI_Controller{
	/*function _remap($alias="", $params=array())
	{
		if($alias=="" || $alias=="index")
		{
			echo "Determine later what to do here";	
		}
		else
		{
			$this->load->model("MCompany");
			$this->load->model("Mindustry");
			$this->load->model("Mownership");
			$this->load->model("Mfunctions");
			$this->load->model("Mcompanysize");
			$profile=$this->MCompany->getCompanyByAlias($alias);
			$profile->Industry=$this->Mindustry->getIndustryById($profile->industry_id);
			$profile->ownership=$this->Mownership->getOwnershipById($profile->ownership_id);
			$profile->function_name=$this->Mfunctions->getFunctionById($profile->function_id);
			$profile->company_size=$this->Mcompanysize->getCompanySizeRangeById($profile->size_id);
			$profile->company_logo= ($profile->company_logo!="")?base_url()."resources/company_logos/".$profile->company_logo:base_url()."resources/company_logos/avatar.jpg";
			$data['Profile']=$profile;
			$this->load->view("company/profile",$data);	
			//testArray($profile);

		}
	}*/
	function companyview($alias="",$params=array()){
	if($alias=="" || $alias=="index")
		{
			echo "Determine later what to do here";	
		}
		else
		{
			$this->load->model("MCompany");
			$this->load->model("Mindustry");
			$this->load->model("Mownership");
			$this->load->model("Mfunctions");
			$this->load->model("Mcompanysize");
			$this->load->model("MMasterJob");
			$profile=$this->MCompany->getCompanyByAlias($alias);
			$profile->Jobs=$this->MMasterJob->getJobsByCompanyId($profile->company_id);
			$profile->Industry=$this->Mindustry->getIndustryById($profile->industry_id);
			$profile->ownership=$this->Mownership->getOwnershipById($profile->ownership_id);
			$profile->function_name=$this->Mfunctions->getFunctionById($profile->function_id);
			$profile->company_size=$this->Mcompanysize->getCompanySizeRangeById($profile->size_id);
			$profile->company_logo= ($profile->company_logo!="")?base_url()."resources/company_logos/".$profile->company_logo:base_url()."resources/company_logos/avatar.jpg";
			$data['Profile']=$profile;
			$this->load->view("company/profile",$data);	
		}
	}
	function index(){}
	function companyregistration(){
		 
		 $this->load->model("MIndustry");
		 $this->load->model("MFunctions");
		 $this->load->model("MCompanySize");
		 $this->load->model("MCompany");
		 $this->load->model("MOwnership");
		 $this->load->model("MCompany");
		 $data['industries']=$this->MIndustry->getIndustry();
		 $data['functions']=$this->MFunctions->getFunctions();
		 $data['sizes']=$this->MCompanySize->getCompanySizeRange();
		 $data['ownerships']=$this->MOwnership->getOwnership();
		 
		 $this->load->view("company/companyregistration",$data);
		 if(isset($_POST['company_name'])){
		 	$data['industry']=$_POST['industry'];
			$data['company_name']=$_POST['company_name'];
			$data['functions']=$_POST['function'];
			$data['size']=$_POST['company_size'];
			$data['ownership']=$_POST['ownership'];
			$data['street']=$_POST['street_address'];
			$data['username']=$_POST['user_name'];
			$data['password']=$_POST['password'];
			if(isset($_FILES['company_logo']))
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
			$this->MCompany->registerCompany($data);
		 }
		 
	}
}
