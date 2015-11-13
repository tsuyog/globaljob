<?php

class MServices extends CI_Model{
	function getServices(){
	$query=$this->db->query("select * from tbl_services");
	if($query->num_rows>0)
	$data=$query->result();
	else
	$data=array();
	return $data;
	}
	function getServicesById($services_id){
	$query=$this->db->query("select * from tbl_services where services_id='$services_id'");
	if($query->num_rows()>0)
	$data=$query->row();
	else
	$data=" ";
	return $data;
	}
	function getServicesByAlias($services_alias){
	$query=$this->db->query("select * from tbl_services where services_alias='$services_alias'");
	if($query->num_rows()>0)
	$data=$query->row();
	else
	$data=" ";
	return $data;
	}
	function addServices($data){
	$services_title=$data['services_title'];
	$services_alias=$data['services_alias'];
	$services_text=$data['services_text'];
	$services_posted_by=$data['services_posted_by'];
	$services_display_order=$data['services_display_order'];
	$status=$data['status'];
	$query=$this->db->query("insert into tbl_services (services_title,services_alias,services_text,services_posted_by,services_display_order,status) values('$services_title','$services_alias','$services_text','$services_posted_by','$services_display_order','$status')");
	if($query==true)
	return true;
	else
	return false;
	}
	function getDisplayOrderServices(){
	$query=$this->db->query("select max(services_display_order) as services_display_order from tbl_services");
		if($query==true)
		return $query->row()->services_display_order;
		else
		return 0;
	}
	function deleteServices($services_id){
	$query=$this->db->query("delete from tbl_services where services_id='$services_id'");
	if($query==true)
	return true;
	else
	return false;
	}
	function updateServices($data,$services_id){
	$services_title=$data['services_title'];
	$services_alias=$data['services_alias'];
	$services_text=$data['services_text'];
	$this->db->where("services_id",$services_id);
	$query=$this->db->update("tbl_services",$data);
	if($query==true)
	return true;
	else
	return false;
	}
}