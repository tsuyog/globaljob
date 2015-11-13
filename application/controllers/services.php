<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Services extends CI_Controller{
	function index($id){
	$this->load->model("MServices");
	$data['services']=$this->MServices->getServicesById($id);
	testArray($data);die;
	$this->load->view("viewservices",$data);
	}
	function getservices($alias){
	$this->load->model("MServices");
	$data['services']=$this->MServices->getServicesByAlias($alias);
	//testArray($data);
	$this->load->view("viewservices",$data);
	}
}