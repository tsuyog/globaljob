<?php

class MOwnership extends CI_Model{
	
	function getOwnership(){
	  $query=$this->db->query("select * from tbl_ownership");
	  if($query->num_rows()>0)
	  $data=$query->result();
	  else
	  $data= array();
	 
	  return $data;
    }
	function getOwnershipById($ownership_id){
	  $query=$this->db->query("select * from tbl_ownership where ownership_id=$ownership_id");
	  if($query->num_rows()>0)
	  $data=$query->row();
	  else
	  $data=array();
	  
	  return $data;
	}
	function createOwnership($ownership_name){
	  $this->db->query("insert into tbl_ownership(ownership_name) values('$ownership_name')");;
	  return true;	

	}
	function updateOwnership($ownership_id, $ownership_name){
	  if($this->db->query("update tbl_ownership set ownership_name='$ownership_name' where ownership_id=$ownership_id"));
	    return true;
	}
	function deleteOwnership($id){
		if($this->db->query("delete from tbl_ownership where ownership_id=$id"))
		return TRUE;
	}
	
	
}
