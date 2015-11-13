<?php
Class MMasterBenifit extends CI_Model{
	function getMasterBenifits(){
		$query=$this->db->query("select * from tbl_master_benifits");
		if($query->num_rows()>0)
		$data=$query->result();
		else
		$data=array();
		
		return $data;
	}
	function getMasterBenifitsById($benifits_id){
		$query=$this->db->query("select * from tbl_master_benifits where benifit_id=$benifits_id");
		if($query->num_rows()>0)
		$data=$query->row();
		else 
		$data=array();
		
		return $data;
	}
	function createMasterBenifits($benifit_name){
		if($this->db->query("insert into tbl_master_benifits(benifit_name) values('$benifit_name')"));
		 return true;
	}
	function updateMasterBenifits($id,$benifit_name){
	   if($this->db->query("update tbl_master_benifits set benifit_name='$benifit_name' where benifit_id=$id"));
	    return true;
	
	}
	function deleteMasterBenifits($id){
		if($this->db->query("delete from tbl_master_benifits where benifit_id=$id"))
		return TRUE;
	}

}