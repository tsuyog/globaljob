<?php
class MContact extends CI_Model{
	function getcontactbycontactid(){
	}
	function insertcontact($data){
		$contact_name = $data['contact_name'];
		$contact_email = $data['contact_email'];
		$contact_message = $data['contact_message'];
		$query = $this->db->query("insert into tbl_contact(contact_name,contact_email,contact_message) values ('$contact_name','$contact_email','$contact_message')");
		if($query==true)
		return true;
		else
		return false;
	}
}