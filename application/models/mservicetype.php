<?php

class MServiceType extends CI_Model{
		
	function getServiceType(){
		$query=$this->db->query("select * from tbl_service_type");
		if($query->num_rows()>0)
		$data=$query->result();
		else
		$data=array();
		return $data;
	}
	function getServiceTypeId($service_type_id){
		$query=$this->db->query("select * from tbl_service_type where service_type=$service_type_id");
		if($query->num_rows()>0)
		$data=$query->row();
		else
		$data=array();
		return $data;
	}
	function createServiceType($service_name){
		//$data['service_name']=$service_name;
		//$query=$this->db->insert_string('tbl_service_type',$data);
		$query=$this->db->query("insert into tbl_service_type(service_name) values('$service_name')");
		if ($query==TRUE) {
			return TRUE;
		} else {
			return FALSE;
		}	
	}
	function updateServiceType($id, $name){
		$query=$this->db->query("update tbl_service_type set service_name='$name' where service_type_id=$id");
		if ($query==TRUE) {
			return TRUE;
		} else {
		return FALSE;	
		}
	}
	function deleteServiceType($id){
		$query=$this->db->query("delete from tbl_service_type where service_type_id=$id");
		if ($query==TRUE) {
			return TRUE;
		} else {
			return FALSE;
		}		
	}
	
}
