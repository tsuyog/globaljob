<?php 
class MCoverLetter extends CI_Model{
	function getCoverLetterByJobseeker($id){
		$query=$this->db->query("select * from tbl_cover_letter where jobseeker_id=$id");
		if($query->num_rows()>0)
			$data=$query->result();
		else
			$data=array();
		return $data;
	}
}
