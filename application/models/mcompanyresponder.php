<?php 
class MCompanyResponder extends CI_Model{
	
	function getTemplate(){
		$query=$this->db->query("select * from tbl_company_responder");
		if($query->num_rows()>0)
			$data=$query->result();
		else	
			$data=array();
		return $data;
		}
	function getTemplateByCompany($id){
		$query=$this->db->query("select * from tbl_company_responder where company_id=$id");
		if($query->num_rows()>0)
			$data=$query->row();
		else
			$data=array();
		return $data;
		}
	function createTemplate($company_id, $template){
		$query=$this->db->query("insert into tbl_company_responder(company_id,template) values($company_id,'$template')");
		if($query==true) return true;	
	}
	function updateTemplate($company_id, $template){
		if($this->db->query("update tbl_company_responder set template='$template' where company_id=$company_id"))
		return true;
	}
}