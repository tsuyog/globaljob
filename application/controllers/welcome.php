<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Welcome extends CI_Controller {
	public function index()
	{
		$msg = $this->session->userdata("msg");
		if($msg!=""){$data['msg']=$msg;$this->session->unset_userdata("msg");}
		$this->load->model("MMasterJob");
		$this->load->model("MCompany");
		$this->load->model("MIndustry");
		$this->load->model("MCity");
		$this->load->model("MServices");
		$HotJobs=$this->MMasterJob->getJobsAsServiceTypeByCompany(1);
		$data['HotJobs']=$HotJobs;
		$CorporateJobs=$this->MMasterJob->getJobsAsServiceTypeByCompany(2,4);
		$data['CorporateJobs']=$CorporateJobs;
		$RecentJobs=$this->MMasterJob->getJobs($job="jobdeadline");
		$data['RecentJobs']=$RecentJobs;
		$FeaturedJobs=$this->MMasterJob->getJobsByCompanyAsServiceType(2);
		$data['FeaturedJobs']=$FeaturedJobs;
		$NewspaperJobs=$this->MMasterJob->getJobsByCompanyAsServiceType(5);
		$data['NewspaperJobs']=$NewspaperJobs;
		$jobs = $this->MMasterJob->getJobs();
		$Industry = $this->MIndustry->getIndustry();
		$data['industry']=$Industry;
		$location = $this->MCity->getCity();
		$data['location'] = $location;
		$services= $this->MServices->getServices();
		$data['services']=$services;
		//testArray($Industry);
		//testArray($data);
		$this->load->view('welcome_message',$data);
	}
}