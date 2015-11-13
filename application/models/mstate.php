<?php
/**
 * 
 */
class MState extends CI_Model {
	
	function getState(){
		$query=$this->db->query("select * from tbl_state");
		if($query->num_rows()>0)
		 $data=$query->result();
		else
		 $data=array();
		return $data;
	}
	function getStateByid($id){
		$query=$this->db->query("select * from tbl_state where state_id=$id");
		if($query->num_rows()>0)
		$data=$query->row();
		else
		$data=array();
		return $data;
	}
	function getStateByCountry($id){
		$query=$this->db->query("select * from tbl_state where coutry_id=$id");
		if($query->num_rows()>0)
			$data=$query->result();// make sure while retriving data u recieve a result set
		else
			$data=array();
		return $data;
	}
	//function getCountry($id){
		//$query=$this->db->query("select * from tbl_state where ");
	//}
	function createState($country_id, $state_name){
		if($this->db->query("insert into tbl_state(country_id,state_name) values($country_id,'$state_name')"))
			return TRUE;
		else
			return FALSE;
	}
	function updateState($state_id, $country_id, $state_name){
		if($this->db->query("update tbl_state set country_id=$country_id, state_name=$state_name where state_id=$state_id"))
			return TRUE;
		else
			return FALSE;
	}
	function deleteState($id){
		if($this->db->query("delete from tbl_state where state_id=$id"))
			return TRUE;
		else
			return FALSE;
	}
}
