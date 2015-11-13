<?php
/**
 * 
 */
class MCountry extends CI_Model {
	
	function getCountry(){
		$query=$this->db->query("select * from tbl_country");
		if($query->num_rows()>0)
		$data=$query->result();
		else
		$data=array();
		return $data;
	}
	function getCountryById($id){
		$query=$this->db->query("select * from tbl_country where country_id=$id");
		if($query->num_rows()>0)
		$data=$query->row();
		else
		$data=array();
		return $data;
	}
	function createCountry($country_name){
		if($this->db->query("insert into tbl_country(country) values('$country_name')"))
		return TRUE;
		else 
		return FALSE;
	}
	function deleteCountry($id){
		if($this->db->query("delete from tbl_country where country_id='$id'"))
		return TRUE;
		else
		return false;
	}
	function updateCountry($id,$name){
		if($this->db->query("update tbl_country set country='$name' where country_id=$id"))
		return TRUE;
		else 
		return FALSE;
	}
}

