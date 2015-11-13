<?php 

class MApplicationSetting extends CI_model{
	
	function getApplicationSetting($id=""){
		$my_sql="select * from tbl_application_seeting";
			if($id!=""){
			$my_sql."where application_setting_id=$id";
			$query=$this->db->query($my_sql);
			if($query->num_rows()>0)
			$data=$query->row();
			else
			$data=array();
			}
			else {
			$query=$this->db->query($my_sql);
			if($query->num_rows()>0)
				$data=$query->result();
			}
		return $data;
	}
	function createApplicationSetting($data){
		$by_post=$data['by_post'];
		$by_email=$data['by_email'];
		$by_online=$data['by_online'];
		$email=$data['email'];
		$query=$this->db->query("insert into tbl_application_seeting(by_post,by_online,by_email,email) values('$by_post',
		'$by_online','$by_email','$email')");
		$lastid=$this->db->insert_id();
		if($query==TRUE)
		return $lastid;
		else 
		return FALSE;
	}
	function getLatestApplicationSetting(){
		$query=$this->db->query("select application_setting_id from tbl_application_seeting order by application_setting_id desc limit 1");
		if($query->num_rows()>0)
		$data=$query->row()->application_setting_id;
		else
		$data="";
		return $data;
	}
	function deleteApplicationSetting($id){
		if($this->db->query("delete from tbl_application_seeting where application_setting_id=$id"))
		return TRUE;
		else 
		return FALSE;
	}
}
