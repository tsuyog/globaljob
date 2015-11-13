<?php

class MCompanyContact extends CI_Model{
	
	function getCompanyContact(){
	 $query=$this->db->query("select * from tbl_company_contact");
	 if($query->num_rows()>0)
	 $data=$query->result();
	 else 
	 $data=null;
	 return $data;	
	}
	
	function getCompanyContactByCompany($company_id){
	 $query=$this->db->query("select * from tbl_company_contact where company_contact_id=$company_id");
	 if($query->num_rows()>0)
	 $data=$query->row();
	 else
	 $data=null;
	 return $data;
	}
	function getCompanyContactbyId($id){
	 $query=$this->db->query("select * from tbl_company_contact where company_contact_id=$id");
	 if ($query->num_rows()>0) {
		 $data=$query->row();
	 } else {
		 $data=array();
	 }
	 return $data;
	 
	}	
	function getContactPersonByLocation($location_id){
	 $query=$this->db->query("select * from tbl_company_contact where company_location_id=$location_id");
	 if($query->num_rows()>0)
	 $data=$query->row();
	 else
	 $data=null;
	 return $data;
	}
	function createCompanyContactPerson($data,$passMeId=""){// we need to deploy a array list while passsing parameter.
	 $company_contact_first_name=$data['contact_first_name'];
	 $company_contact_middle_name=$data['contact_middle_name'];
	 $company_contact_last_name=$data['contact_last_name'];
	 $company_contact_sex=$data['contact_sex'];
	 $company_location_id=$data['city'];
	 $company_phone_one=$data['phone_one'];
	 $company_phone_two=$data['alternate_phone'];
	 $company_email=$data['email'];
	 $company_url=$data['company_url'];
	 $query=$this->db->query("insert into tbl_company_contact(company_contact_first_name,
	 company_contact_middle_name,company_contact_last_name,company_contact_sex,
	 company_location_id,company_phone_one,company_phone_two,
	 company_email,company_url)  values('$company_contact_first_name','$company_contact_middle_name','$company_contact_last_name','$company_contact_sex',$company_location_id,'$company_phone_one','$company_phone_two','$company_email','$company_url')");
	 if($query==true)
	 	if($passMeId!=""){
	 	return $this->getLatestId();
	 	}
	 else{
	 return false;
	 }
	}
	function updatecompanycontactperson($company){
	$company_contact_id= $company['contact_id'];
	$company_contact_first_name = $company['contact_first_name'];
	$company_contact_middle_name = $company['contact_middle_name'];
	$company_contact_last_name = $company['contact_last_name'];
	$company_contact_sex = $company['contact_sex'];
	$company_phone_one = $company['phone_one'];
	$company_phone_two = $company['alternate_phone'];
	$company_email = $company['email'];
	$company_url = $company['company_url'];
	$query=$this->db->query("update tbl_company_contact set company_contact_first_name='$company_contact_first_name',company_contact_middle_name='$company_contact_middle_name',company_contact_last_name='$company_contact_last_name', company_contact_sex='$company_contact_sex',company_phone_one='$company_phone_one',company_phone_two='$company_phone_two',company_email='$company_email',company_url='$company_url' where company_contact_id='$company_contact_id'");
	if($query==true)
	return true;
	else
	return false;
	}
	function deleteCompanyContact($company_contact_id){
	 $query=$this->db->query("delete from tbl_company_contact where company_contact_id=$company_contact_id");
	 if($query==true)
	 return true;
	 else 
	 return false;
	
	}
	function getLatestId(){
	$query=$this->db->query("select company_contact_id from tbl_company_contact order by company_contact_id desc limit 1");
	if($query->num_rows()>0)
	return $query->row()->company_contact_id;
	}
}