<?php 
class MPurchase_Unit extends CI_Model{
		
	function getpurchaseunit(){
	$query=$this->db->query("select * from tbl_purchase_unit");
	if($query->num_rows()>0)
	$data=$query->result();
	else
	$data=array();
	return $data;
	}
	function getPurchaseUnitById($purchase_unit_id){
	$query=$this->db->query("select * from tbl_purchase_unit where purchase_unit_id='$purchase_unit_id'");
	if($query->num_rows()>0)
	$data=$query->row();
	else
	$data=" ";
	return $data;
	}
	function getpurchaseunitByCompanyId($company_id){
	$query=$this->db->query("select purchased_unit as purchase_unit from tbl_purchase_unit where company_id='$company_id' AND purchase_unit_type=1");
	if($query==true)
		if(isset($query->row()->purchase_unit))
		return $query->row()->purchase_unit;
	else
	return 0;
	}
	function getFeaturedunitByCompanyId($company_id){
	$query=$this->db->query("select purchased_unit as purchase_unit from tbl_purchase_unit where company_id='$company_id' AND purchase_unit_type=3");
	if($query==true)
		if(isset($query->row()->purchase_unit))
		return $query->row()->purchase_unit;
	else
	return 0;
	}
	function updatePurchaseUnitHotJob($company_id){//for emplyee purchased unit checking
	$query=$this->db->query("update tbl_purchase_unit set purchased_unit=purchased_unit-1 where company_id='$company_id' AND purchase_unit_type=1");
	}
	function updatePurchaseUnitFeaturedJob($company_id){//for emplyee purchased unit checking
	$query=$this->db->query("update tbl_purchase_unit set purchased_unit=purchased_unit-1 where company_id='$company_id' AND purchase_unit_type=3");
	}
	function updatePurchaseUnitTable($data,$purchase_unit_id){
	$this->db->where("purchase_unit_id",$purchase_unit_id);
	$query=$this->db->update("tbl_purchase_unit",$data);
	if($query==true)
	return true;
	else
	return false;
	}
	function insertPurchaseUnit($data){
	$company_id=$data['company_id'];
	$purchase_unit_type=$data['purchase_unit_type'];
	$purchased_unit=$data['purchased_unit'];
	$payment_mode=$data['payment_mode'];
	$payment_reference=$data['payment_reference'];
	$payment_date=$data['payment_date'];
	$entry_by=$data['entry_by'];
	$remarks=$data['remarks'];
	$query=$this->db->insert("tbl_purchase_unit",$data);
	if($query==true)
	return true;
	else
	return false;
	}
}
