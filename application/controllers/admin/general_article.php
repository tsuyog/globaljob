<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class General_Article extends CI_Controller{
	function index(){
	$this->load->model("MGeneralArticle");
	$data['article']=$this->MGeneralArticle->getGeneralArticle();
	//testArray($data);
	$this->load->view("admin/getgeneralarticle",$data);
	}
	function addarticle(){
	$this->load->model("MGeneralArticle");
	$this->load->view("admin/add_generalarticle");
	$display_order=	$this->MGeneralArticle->getDisplayOrder();	
		if(isset($_POST['general_title'])){
		$data = array(
						'general_article_title'=>$_POST['general_title'],
						'general_article_alias'=>createAlias($_POST['general_title'],"tbl_general_article","general_article_alias"),
						'general_article_text'=>$_POST['article_text'],
						'posted_by'=>"admin", //username sent manuallly
						'display_order'=>$display_order+1,
						'status'=>1 //manually sending status 1 in first use
					);
		$this->MGeneralArticle->insertGeneralArticle($data);
		redirect("admin/general_article");
		}
	}
	function delete($id){
	$this->load->model("MGeneralArticle");
	$this->MGeneralArticle->deleteArticle($id);
	redirect("admin/general_article");
	}
	function edit($id){
	$this->load->model("MGeneralArticle");
	$data['article']=$this->MGeneralArticle->getGeneralArticleById($id);
	//testArray($article);die;
	$this->load->view("admin/edit_generalarticle",$data);	
		if(isset($_POST['article_title'])){
		$data = array(
						'general_article_title'=>$_POST['article_title'],
						'general_article_alias'=>createAlias($_POST['article_title'],"tbl_general_article","general_article_alias"),
						'general_article_text'=>$_POST['article_text']
					);	
		$this->MGeneralArticle->updateGeneralArticle($data,$id);
		redirect("admin/general_article");
		}
	}
}