<?php

class MGeneralArticle extends CI_Model{
	function getGeneralArticle(){
	$query=$this->db->query("select * from tbl_general_article");
	if($query->num_rows()>0)
	$data=$query->result();
	else
	$data=array();
	return $data;
	}
	function deleteArticle($general_article_id){
	$query=$this->db->query("delete from tbl_general_article where general_article_id='$general_article_id'");
	if($query==true)
	return true;
	else
	return false;
	}
	function getGeneralArticleById($general_article_id){
	$query=$this->db->query("select * from tbl_general_article where general_article_id='$general_article_id'");
	if($query->num_rows()>0)
	$data=$query->result();
	else
	$data=array();
	return $data;
	}
	function insertGeneralArticle($data){
	$general_article_title=$data['general_article_title'];
	$general_article_alias=$data['general_article_alias'];
	$general_article_text=$data['general_article_text'];
	$posted_by=$data['posted_by'];
	$display_order=$data['display_order'];
	$status=$data['status'];
	$query=$this->db->query("insert into tbl_general_article (general_article_title,general_article_alias,general_article_text,posted_by,display_order,status) values('$general_article_title','$general_article_alias','$general_article_text','$posted_by','$display_order','$status')");
	if($query==true)
	return true;
	else
	return false;
	}
	function updateGeneralArticle($data,$general_article_id){
	$general_article_title=$data['general_article_title'];
	$genenral_article_alias=$data['general_article_alias'];
	$general_article_text=$data['general_article_text'];
	$this->db->where("general_article_id",$general_article_id);
	$query=$this->db->update("tbl_general_article",$data);
	if($query==true)
	return true;
	else
	return false;
	}
	function getDisplayOrder(){
	$query=$this->db->query("select max(display_order) as display_order from tbl_general_article");
		if($query==true)
		return $query->row()->display_order;
		else
		return 0;
	}
	function createAlias($text,$tablename,$fieldname)
	{
	$new_string = trim(preg_replace('/[^A-Za-z0-9_]/', ' ', strip_tags($text)));
	$new_string = preg_replace( '/\s+/', ' ', $new_string );
	$alias=strtolower(str_replace(" ","_",trim($new_string)));
	$CI=& get_instance();
	$q=$CI->db->query("select * from $tablename where $fieldname='$alias'");
		if($q->num_rows()>0)
		{
			$alias.=date("ymdhis");	
		}
		return $alias;
	}
}