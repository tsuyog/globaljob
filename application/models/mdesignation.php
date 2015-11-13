<?php
class MDesignation extends CI_Model {

     function getDesignation(){
	 $query=$this->db->query("select * from tbl_designation");
	 if($query->num_rows()>0)
	 $data=$query->result();
	 else
	 $data=array();
	 return $data;
	}
	 function getDesignationById($id){
	 	$query=$this->db->query("select * from tbl_designation where designation_id=$id");
		if ($query->num_rows()>0) {
			$data=$query->row();
		} else {
			$data=array();
		}
		return $data;
	 }
	function createDesignation($designation_name,$designation_comments){
	 //$data['designation_name']=$designation_name;
	 //$data['designation_comments']=$designation_comments;
	 
	 $query=$this->db->query("insert into tbl_designation(designation_name, designation_comments)
	 values('$designation_name','$designation_comments')");
	 if($query==true)
	 return true;
	 else 
	 return false;
	}
	function updateDesignation($designation_id, $designation_name, $designation_comments){
	 //$data=array('designation_name'=>$designation_name,'designation_comments'=>$designation_comments);
	 //$where="designatiion_id=$designation_id";
	 $query=$this->db->query("update tbl_designation set designation_name='$designation_name', designation_comments='$designation_comments' where designation_id=$designation_id");
	 if($query==true)
	 return true;
	 else 
	 return false;
	}
	function deleteDesignation($designation_id){ // such privilage is not conferred to user or comapny but only for admin with limitation
	 $query=$this->db->query("delete from tbl_designation where designation_id=$designation_id");
	 if($query==true)
	 return true;
	 else 
	 return false;
	}
	function getLatestDesignation(){
	$query=$this->db->query("select designation_id from tbl_designation order by designation_id desc limit 1");
	$data=$query->row()->designation_id;
	return $data;
	}	
	function getDesignaionId($designation){
		$query=$this->db->query("select designation_id from tbl_designation where designation_name='$designation'");
		if($query->num_rows()>0)
			$data=$query->result();
		else
			$data=array();
		return $data;
		}
}