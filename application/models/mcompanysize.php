<?php

class MCompanySize extends CI_Model{
   
   function getCompanySizeRange(){
    $query=$this->db->query("select * from tbl_company_size");
	if($query->num_rows()>0)
	$data=$query->result();
	else 
	$data=array();
	return $data;
   }
   function getCompanySizeRangeById($size_id){
    $query=$this->db->query("select * from tbl_company_size where company_size_id='$size_id'");
	if($query->num_rows()>0)
	$data=$query->row()->company_size_range;
	else
	$data=null;
	return $data;
   }
   function createCompanySizeRange($company_size_range){
    $data['company_size_range']=$company_size_range;
	if($this->db->insert_string('tbl_company_size', $data));
	return true;
   }
   function updateCompanySizeRange($company_size_id, $company_size_range){
	 $data['company_size_range']=$company_size_range;
	 $where="company_size_id=$company_size_id";
	 if($this->db->update_string('tbl_company_size', $data, $where))   
	 return true;
   }

}
