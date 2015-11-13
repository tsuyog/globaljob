<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Company extends CI_controller{
		
	public function index(){
	 isLoggedIn();
	 $this->load->model("MCompany");
	 $this->load->model("MIndustry");
	 $this->load->model("MOwnership");
	 $this->load->model("MCompanyContact");
	 $this->load->model("MCompanyHead");
	 $companys=$this->MCompany->getCompany();
	 foreach ($companys as $company){
	 	$company->Industry=$this->MIndustry->getIndustryById($company->industry_id);
		$company->Ownership=$this->MOwnership->getOwnershipById($company->ownership_id);
		$company->CompanyContact=$this->MCompanyContact->getCompanyContactbyId($company->contact_id);
		$company->CompanyHead=$this->MCompanyHead->getCompanyHeadById($company->company_head_id);
	 }
	 $data['companys']=$companys;
	 $this->load->view("admin/company_list",$data);
	}
	
	function add(){
	 isLoggedIn();
	 $this->load->model("MIndustry");
	 $this->load->model("MFunctions");
	 $this->load->model("MCompanySize");
	 $data['industries']=$this->MIndustry->getIndustruy();
	 $data['functions']=$this->MFunctions->getFunctions();
	 $data['sizes']=$this->MCompanySize->getCompanySizeRange();
	 
	 $this->load->view("admin/company_add",$data);
	 
	 if(isset($_POST['company_name'])){
	 	$this->load->model("MCompanyHead");
		$this->load->model("MCompanyContact");
		//$this->MCompanyHead->
	 }
	}

}