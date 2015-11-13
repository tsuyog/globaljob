<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 
 */
class Address extends CI_controller {
	
	function index(){
		isLoggedIn();
		$this->load->model("MCity");
		$this->load->model("MCountry");
		$this->load->model("MState");
		
		$countries=$this->MCountry->getCountry();
		//testArray($data);die;
		foreach($countries as $country):
		$country_id=$country->country_id;
		$country_name=$country->country;
		endforeach;
		$data['country']=$countries;
		$states=$this->MState->getState();
		foreach($states as $state):
			$state->Country=$this->MCountry->getCountryById($state->country_id);	
		endforeach;
		$data['state']=$states;
		$cities=$this->MCity->getCity();
		foreach($cities as $city):
			$city->State=$this->MState->getStateByid($city->state_id);//retriving state from tbl_state
			$city->Country=$this->MCountry->getCountryById($city->State->country_id);// retriving country from tbl_country as per the states
				//foreach($t as $country):
					//$country->Country=$this->MCountry->getCountryById($country->country_id);
				//endforeach;
		endforeach;
		$data['city']=$cities;
		//testArray($data);
		$this->load->view("admin/address_list",$data);
	}
	function addCountry(){
		isLoggedIn();
		$this->load->model("MCountry");
		$this->load->view("admin/country_add");
		if(isset($_POST['country_name']))
			if($this->MCountry->createCountry($_POST['country_name']))
			redirect("admin/address");
			
	}
	function addState(){
		isLoggedIn();
		$this->load->model("MCountry");
		$this->load->model("MState");
		$data['countries']=$this->MCountry->getCountry();
		$this->load->view("admin/state_add",$data);
		if(isset($_POST['state_name']))
			if($this->MState->createState($_POST['country'], $_POST['state_name']))
			redirect("admin/address");
		
	}
	function addCity(){
		isLoggedIn();
		$this->load->model("MCountry");
		$this->load->model("MState");
		$this->load->model("MCity");
		$data['countries']=$this->MCountry->getCountry();
		$data['states']=$this->MState->getState();
		$this->load->view("admin/city_add",$data);
		if(isset($_POST['city_name']))
			if($this->MCity->createCity($_POST['state'], $_POST['city_name']))
			redirect("admin/address");
	}
	function delete($id){
		isLoggedIn();
		$this->load->model("MCountry");
		$this->MCountry->deleteCountry($id);
		redirect("admin/address");
	}
	function edit($id){
		isLoggedIn();
		$this->load->model("MCountry");
		$data['country']=$this->MCountry->getCountryById($id);
		//testArray($data);
		$this->load->view("admin/country_edit",$data);
		if(isset($_POST['country'])){
		$country_name=$_POST['country'];
		$country_id=$_POST['country_id'];
		$this->MCountry->updateCountry($country_id,$country_name);
		redirect("admin/address");
		}
		
	}
}
