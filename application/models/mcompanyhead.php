<?php

class MCompanyHead extends CI_Model{
	
	function getCompanyHead(){
	 $query=$this->db->query("select * from tbl_company_head");
	 if($query->num_rows()>0)
	 $data=$query->result();
	 else 
	 $data=null;
	 return $data;
	}	
	function getCompanyHeadById($company_head_id){
	 $query=$this->db->query("select * from tbl_company_head where company_head_id=$company_head_id");
	 if($query->num_rows()>0)
	 $data=$query->row();
	 else 
	 $data=null;
	 return $data;
	}
	function deleteCompanyHead($company_head_id){
	 if($query=$this->db->query("delete from tbl_company_head where company_head_id=$company_head_id"));
	 return true;
	}
	function createCompanyHead($data, $getMeLatest=""){
		$first_name=$data['contacthead_first_name'];
		$last_name=$data['contacthead_last_name'];
		$middle_name=$data['contacthead_middle_name'];
		$sex=$data['company_head_sex'];
		if($this->db->query("insert into tbl_company_head(company_head_first_name,company_head_middle_name,
		company_head_last_name,company_head_sex) values('$first_name','$middle_name','$last_name','$sex')")){
		if($getMeLatest!="")
		return $this->getLatestCompanyHead(); 
		}
		else{
		return FALSE;
		} 
	}
	function updateCompanyHead($company_head){
	$company_head_id=$company_head['company_head_id'];
	$company_head_sex=$company_head['company_head_sex'];
	$company_head_first_name=$company_head['company_head_first_name'];
	$company_head_middle_name=$company_head['company_head_middle_name'];
	$company_head_last_name=$company_head['company_head_last_name'];
	$this->db->where("company_head_id",$company_head_id);
	$query = $this->db->update("tbl_company_head",$company_head);  
	 if($query==true)
	 return true;
	 else
	 return false;
	}
	function getLatestCompanyHead(){
		$query=$this->db->query("select company_head_id from tbl_company_head order by company_head_id desc limit 1");
		if($query->num_rows()>0)
		return $query->row()->company_head_id;
		else
		return null;
	}
}