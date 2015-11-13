<?php
class MIndustry extends CI_Model
{

	function getIndustry(){
	 $query=$this->db->query("select * from tbl_industry");
	 if($query->num_rows()>0)
	 $data=$query->result();
	 else 
	 $data=array();
	 return $data;	
	}
	function getIndustryById($id){ 
	 $query=$this->db->query("select * from tbl_industry where 	industry_id=$id");
	 if($query->num_rows()>0)
	 $data=$query->row();
	 else 
	 $data=array();
	 return $data;
	}
	function createIndustry($industry_name){
	 $data['industry_name']=$industry_name;
	 $this->db->query("insert into tbl_industry(industry_name) values('$industry_name')");
	 //$this->db->insert_string('tbl_industry', $data);
	}
	
	function updateIndustry($industry_id, $industry_name){
	 //$data['industry_name']=$industry_name;
	 //$where="industry_id=$industry_id";
	 if($this->db->query("update tbl_industry set industry_name='$industry_name' where industry_id=$industry_id"));
	 return true;	
	}
	function deleteIndustry($id){
		$query=$this->db->query("delete from tbl_industry where industry_id=$id");
		if($query==TRUE)
		return TRUE;
		else
		return FALSE;
	}



}
