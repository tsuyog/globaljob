<?php
class MFunctions extends CI_Model
{
	function getFunctions()
	{
		$query=$this->db->query("select * from tbl_function");
		if($query->num_rows()>0)
		$functions=$query->result();	
		else
		$functions=array();
		return $functions;
	}
	function getFunctionById($id){
		$query=$this->db->query("select * from tbl_function where function_id=$id");
		if ($query->num_rows()>0) {
			$data=$query->row();
		} else {
			$data=array();
		}
		return $data;
	}
	function addFunction($Function)
	{
		$this->db->insert("tbl_function",$Function);	
	}
	function delete($id){
		$query=$this->db->query("delete from tbl_function where function_id=$id");
		if($query==TRUE)
		return TRUE;
		else 
		return FALSE;
	}
	function getFunctionByFunctionName($function){
	echo $function;die;
	$query = $this->db->query("select * from tbl_function where function_name='$function'");
		if($query->num_rows()>0){
		$data = $query->row();
		}
		else
		$data = array();
		return $data;
	}
	function updateFunction($id,$name){
		$query=$this->db->query("update tbl_function set function_name='$name' where function_id=$id");
		if($query==TRUE)
		return true;
		else 
		return FALSE;
	}
}