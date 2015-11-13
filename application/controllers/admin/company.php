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
	 //testArray($data);die;
	 $this->load->view("admin/company_list",$data);
	}
	
	function add(){
	 isLoggedIn();
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
	 
	 //testarray($data);
	 $this->load->view("admin/company_add",$data);
	 
	 
	 if(isset($_POST['company_name'])){
		 $company['industry']=$_POST['industry'];
		 $company['company_name']=$_POST['company_name'];
		 $company['functions']=$_POST['function'];
		 $company['company_size']=$_POST['company_size'];
		 $company['ownership']=$_POST['ownership'];
		 $company['company_alias']=createAlias($_POST['company_name'],"tbl_company","company_alias");
		 $company['company_address']=$_POST['street_address'];
		  $company['company_description']=$_POST['organization_description'];
		 //making insertion with respect company to contact person
		 $contact['contact_sex']=$_POST['contact_sex'];
		 $contact['contact_first_name']=$_POST['contact_first_name'];
		 $contact['contact_middle_name']=$_POST['contact_middle_name'];
		 $contact['contact_last_name']=$_POST['contact_last_name'];
		 $contact['phone_one']=$_POST['phone_one'];
		 $contact['alternate_phone']=$_POST['alternate_phone'];
		 $contact['email']=$_POST['email'];
		 $contact['city']=$_POST['city'];
		 $company['city']=$_POST['city'];
		 $contact['company_url']=$_POST['company_url'];
		 $company['contact_id']=$this->MCompanyContact->createCompanyContactPerson($contact,"give me ID");// creating and recieving contact person of company
		 $company_head['company_head_sex']=$_POST['company_head_sex'];
		 $company_head['contacthead_first_name']=$_POST['contacthead_first_name'];
		 $company_head['contacthead_middle_name']=$_POST['contacthead_middle_name'];
		 $company_head['contacthead_last_name']=$_POST['contacthead_last_name'];
		
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
			$company['company_logo']=$cow['file_name'];
			//testArray($cow);die;
			
		 }
		
		 $company['company_head']=$this->MCompanyHead->createCompanyHead($company_head,"give me ID");
		 
		if($this->MCompany->createCompany($company))
			redirect("admin/company");
	 }
	}
	function edit($id){
		isLoggedIn();
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
		$data['industry']=$this->MIndustry->getIndustry();
		$data['function']=$this->MFunctions->getFunctions();
		$data['size']=$this->MCompanySize->getCompanySizeRange();
		$data['country']=$this->MCountry->getCountry();
		$data['state']=$this->MState->getState();
		$data['city']=$this->MCity->getCity();
		$data['ownership']=$this->MOwnership->getOwnership();
		$company=$this->MCompany->getCompanyById($id);
		$industry=$this->MIndustry->getIndustryById($company->industry_id);
		$function=$this->MFunctions->getFunctionById($company->function_id);
		$size=$this->MCompanySize->getCompanySizeRangeById($company->size_id);
		$ownership=$this->MOwnership->getOwnershipById($company->ownership_id);
		$companyhead=$this->MCompanyHead->getCompanyHeadById($company->company_head_id);
		$companycontact=$this->MCompanyContact->getCompanyContactByCompany($company->contact_id);
		$data['companycontacts']=$companycontact;
		$data['companyheads']=$companyhead;
		$data['ownerships']=$ownership;
		$data['sizes']=$size;
		$data['functions']=$function;
		$data['companies']=$company;
		$data['industries']=$industry;
		//testArray($data);//die;
		$this->load->view("admin/company_edit",$data);
		if(isset($_POST['industry'])){
		$mcompany['company_name']=$_POST['company_name'];
		$mcompany['industry_id']=$_POST['industry'];
		$mcompany['function_id']=$_POST['function'];
		$mcompany['contact_id']=$_POST['contact_id'];
		$mcompany['size_id']=$_POST['company_size'];
		$mcompany['ownership_id']=$_POST['ownership'];
		$mcompany['company_head_id']=$_POST['head_id'];
		$mcompany['company_profile']=$_POST['organization_description'];
		//$mcompany['location_id']=$_POST['location_id'];not sent location id
		$mcompany['location_id']=5;
		$mcompany['street_address']=$_POST['street_address'];
		$contact['contact_id']=$company->contact_id;//id from line number 126
		$contact['contact_sex']=$_POST['contact_sex'];
		$contact['contact_first_name']=$_POST['contact_first_name'];
		$contact['contact_middle_name']=$_POST['contact_middle_name'];
		$contact['contact_last_name']=$_POST['contact_last_name'];
		$contact['phone_one']=$_POST['phone_one'];
		$contact['alternate_phone']=$_POST['alternate_phone'];
		$contact['email']=$_POST['email'];
		$contact['company_url']=$_POST['company_url'];
		//testArray($contact);die;
		$company_head['company_head_id']=$company->company_head_id;
		$company_head['company_head_sex']=$_POST['company_head_sex'];
		$company_head['company_head_first_name']=$_POST['contacthead_first_name'];
		$company_head['company_head_middle_name']=$_POST['contacthead_middle_name'];
		$company_head['company_head_last_name']=$_POST['contacthead_last_name'];
		$this->MCompanyHead->updateCompanyHead($company_head);
		$this->MCompanyContact->updatecompanycontactperson($contact);
		$this->MCompany->updateCompany($mcompany,$id);
		
		redirect("admin/company");
		}
	}
	function delete($company_alias)
	{
		$this->load->model("MCompany");
		$Company=$this->MCompany->getCompanyByAlias($company_alias);
		$company_logo=$Company->company_logo;
		$logourl="./resources/company_logos/".$company_logo;
		if($this->MCompany->deleteCompany($Company->company_id))
		{
			unlink($logourl);
		}
		redirect("admin/company");
		
	}

}