<?php
function testArray($arr)
{
	echo "<pre>";
	print_r($arr);
	echo "</pre>";
}
function convertdate($d){
$date = strtotime($d);
return date("jS F Y ",$date);
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
function getdays($date){
$d = strtotime($date);
$diff=$d-time();
$day = floor($diff/(60*60*24));

return ++$day;
}
function getCountedJobs($by_industry="", $by_city=""){
	$date=date("Y-m-d");
	if($by_industry!="")
		$my_query="select count(distinct(job_title)) as jobs from tbl_job where industry_id=$by_industry and deadline>'$date'";
	else
		$my_query="select count(distinct(job_title)) as jobs from tbl_job where location_id=$by_city and deadline>'$date'";
	$CI=& get_instance();
	$query=$CI->db->query($my_query);
	if($query->num_rows()>0)
		$jobs=$query->row()->jobs;
	else
		$jobs=0;
	return $jobs;	
	}
function getHotjobunit(){
	$CI=& get_instance();
	$CI->load->model("MPurchase_Unit");
	$id=$CI->session->userdata("LoggedInUserId");
	$purchase_unit=$CI->MPurchase_Unit->getpurchaseUnitByCompanyId($id);
	return $purchase_unit;
}
function getFeaturedjobunit(){
	$CI=& get_instance();
	$CI->load->model("MPurchase_Unit");
	$id=$CI->session->userdata("LoggedInUserId");
	$purchase_unit=$CI->MPurchase_Unit->getFeaturedunitByCompanyId($id);
	return $purchase_unit;
}

function getFeaturedHistory(){

}
function applynow($job_alias){
	$CI=&get_instance();
	$usertype=$CI->session->userdata("LoginType");
		if($usertype=="" || $usertype=="JobSeeker"){ ?>
		[<a href="<?php echo site_url("jobs/applyjobs/".$job_alias);?>">apply now</a>]
		<?php }
		else{
		echo " "; 
		}
}
