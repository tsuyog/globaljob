<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Purchase_Unit extends CI_Controller{
	function index(){
	$this->load->model("MPurchase_Unit");
	$this->load->model("MServiceType");
	$this->load->model("MCompany");
	$purchase_unit=$this->MPurchase_Unit->getpurchaseunit();
	foreach($purchase_unit as $purchaseunit):
	//testArray($data);die;
	$purchaseunit->company=$this->MCompany->getCompanyNameById($purchaseunit->company_id);
	$purchaseunit->service_type=$this->MServiceType->getServiceTypeId($purchaseunit->purchase_unit_type);
	endforeach;
	$data['Purchaseunit']=$purchase_unit;
	//testArray($data);
	$this->load->view("admin/purchaseunit",$data);
	}
	
	function insertPurchaseUnit(){
	$this->load->model("MPurchase_Unit");
	$this->load->model("MServiceType");
	$this->load->model("MCompany");
	$data['company']=$this->MCompany->getCompany();
	$data['service_type']=$this->MServiceType->getServiceType();
	//testArray($data);
	$this->load->view("admin/add_purchaseunit",$data);
		if(isset($_POST['purchase_unit_type'])){
		$data=array(
					'company_id'=>$_POST['company_type'],
					'purchase_unit_type'=>$_POST['purchase_unit_type'],
					'purchased_unit'=>$_POST['purchased_unit'],
					'payment_mode'=>$_POST['payment_mode'],
					'payment_reference'=>$_POST['payment_reference'],
					'payment_date'=>$_POST['payment_date'],
					'entry_by'=>$_POST['entry_by'],
					'remarks'=>$_POST['remarks']
					);
		$this->MPurchase_Unit->insertPurchaseUnit($data);
		//redirect("admin/purchase_unit");
		}	
	}
	function edit($id){
	$this->load->model("MPurchase_Unit");
	$this->load->model("MServiceType");
	$this->load->model("MCompany");
	$data['Company']=$this->MCompany->getCompany();
	$data['Service_type']=$this->MServiceType->getServiceType();
	$purchase_unit=$this->MPurchase_Unit->getPurchaseUnitById($id);
	$data['company']=$this->MCompany->getCompanyNameById($purchase_unit->company_id);
	$data['service_type']=$this->MServiceType->getServiceTypeId($purchase_unit->purchase_unit_type);
	$data['Purchaseunit']=$purchase_unit;
	//testArray($data);
	$this->load->view("admin/edit_purchaseunit",$data);
		if(isset($_POST['company_type'])){
		$purchase=array(
						'purchase_unit_type'=>$_POST['purchase_unit_type'],
						'purchased_unit'=>$_POST['purchased_unit'],
						'company_id'=>$_POST['company_type'],
						'payment_mode'=>$_POST['payment_mode'],
						'payment_reference'=>$_POST['payment_reference'],
						'payment_date'=>$_POST['payment_date'],
						'entry_by'=>$_POST['entry_by'],
						'remarks'=>$_POST['remarks']
						);
		$this->MPurchase_Unit->updatePurchaseUnitTable($purchase,$id);
		redirect("admin/purchase_unit");
		}
	}
}