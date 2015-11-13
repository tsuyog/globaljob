<?php
class MAdmin extends CI_Model
{
	function getPassword($username)
	{
		$query=$this->db->query("select password from tbl_admin where username='$username'");
		if($query->num_rows()>0)
		$password=$query->row()->password;	
		else
		$password=false;
		return $password;
	}
}