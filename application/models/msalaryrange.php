<?php 
class MSalaryRange extends CI_Model{
	
	

function getSalaryRange($id=""){
	$my_sql="select * from tbl_salary_range";
		if($id!=""){
		$my_sql=$my_sql." "."where id=$id";
		$query=$this->db->query($my_sql);
		$data = $query->row();
		}
		else{
			$query=$this->db->query($my_sql);
			if ($query->num_rows()>0) 
			$data=$query->result();
			else
			$data = array();
			}
	return $data;
 }
}