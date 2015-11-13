<?php
/**
 * 
 */
class MCity extends CI_model {
	
	function getCity(){
		$query=$this->db->query("select * from tbl_city");
		if($query->num_rows()>0)
			$data=$query->result();
		else
			$data=array();
		return $data;
	}
	function getCityById($id){
		$query=$this->db->query("select * from tbl_city where city_id=$id");
		if($query->num_rows()>0)
			$data=$query->row();
		else
			$data=array();
		return $data;
	}
	function getCityByState($state_id){
		$query=$this->db->query("select * from tbl_city where state_id=$state_id");
		if($query->num_rows()>0)
			$data=$query->result();// make sure it returns result not a row because one state has many city.
		else
			$data=array();
		return $data;
	}
	function createCity($state_id, $city_name){
		if($this->db->query("insert into tbl_city(state_id,city_name) values($state_id,'$city_name')"))
			return TRUE;
		else
	    	return FALSE;
	}
	function deleteCity($id){
		if($this->db->query("delete from tbl_city where city_id=$id"))
			return TRUE;
		else
			return FALSE;
	}
}
