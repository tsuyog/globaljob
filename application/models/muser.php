<?php 

class MUser extends CI_Model{
	
	function checkUsernamePassword($username,$password){
	$query=$this->db->query("select * from tbl_user where usernam='$username' and password='$password'");
		if($query->num_rows()>0){
		$temp=new stdClass;
		$temp->LoggedIn="true";
		$temp->LoginType="User";
		return $temp;
		}
	}
	
}