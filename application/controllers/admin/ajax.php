<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Ajax extends CI_controller{

	function getStates($Country)
	{	
		$this->load->model("MState");
		$states=$this->MState->getStateByCountry($Country);
		echo json_encode($states);die;
		?>
        <select name="state" id="state_id" class="form-control" >
     	  <option value="<?php echo "content"; ?>">Select State</option>
     	  <?php foreach($states as $state):?>
     	  	 <option value="<?php echo $state->state_id; ?>"><?php echo $state->state_name;?></option>
     	  <?php endforeach; ?>
     	 </select>
         
        <?php
	}
	function getCities($State)
	{
		$this->load->model("MCity");
		$cities=$this->MCity->getCityByState($State);
		echo json_encode($cities);die;
		?>
         <select name="city" id="city_id" class="form-control" >
     	  	<option value="<?php echo 0; ?>">Select State</option>
     	  	<?php foreach($cities as $city):?>
     	  		<option value="<?php echo $city->city_id; ?>"><?php echo $city->city_name;?></option>
     	  	<?php endforeach;?>
     	  </select>
        <?php	
	}
	function searchjobseekerlocation(){
	$this->load->model("MJobseeker");
		if(isset($_POST['jobseekeraddress'])){
		$jobseekeraddress = $_POST['jobseekeraddress'];
		$query = $this->MJobseeker->getJobSeekerByAddress($jobseekeraddress);
		}
	?>	
            	<div class="panel-body">
                <table class="table table-striped" id="table_searched">
                    <thead>
                    <tr>
                        <td>Sn</td>
                        <td>Name</td>
                        <td>User Name</td>
                        <td>Contact</td>
                        <td>email</td>
                        <td>Address</td>
                        <td>Nationality</td>
                        <td>D.O.B</td>
                        <td>Marital Status</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $a=0;foreach($query as $jobseeker_detail):$a++;?>
                    <tr><td><?php echo $a;?></td>
                    	<td><?php echo $jobseeker_detail->jobseeker_first_name." ".$jobseeker_detail->jobseeker_middle_name." ".$jobseeker_detail->jobseeker_last_name?></td>
                        <td><?php echo $jobseeker_detail->jobseeker_user_name;?></td>
                        <td><?php echo $jobseeker_detail->jobseeker_contact_number;?></td>
                        <td><?php echo $jobseeker_detail->jobseeker_email;?></td>
                        <td><?php echo $jobseeker_detail->jobseeker_address;?></td>
                        <td><?php echo $jobseeker_detail->jobseeker_nationality;?></td>
                        <td><?php echo $jobseeker_detail->jobseeker_dob;?></td>
                        <td><?php echo $jobseeker_detail->jobseeker_marital_status;?></td>
                    </tr>	
                    <?php endforeach;?>
                    </tbody>
               </table>
               
                 </div>
                 
		<?php 
	}
	function searchjobseeker(){
	$this->load->model("MJobseeker");
	$this->load->model("MJobseekerAcademic");
	$this->load->model("MCity");
		if(isset($_POST['jobseekerlevelofdegree'])){
		$query = $this->MJobseekerAcademic->getJobseekerByJobseekerLevelOfDegree($_POST['jobseekerlevelofdegree']);
		foreach($query as $jobseeker):
		$jobseeker->jobseekerdetail=$this->MJobseeker->getJobseekerById($jobseeker->jobseeker_id);
		endforeach;
		}
		$data = $query;
		//testArray($data);die;
	?>
            	<div class="panel-body">
                <table class="table table-striped datatable" id="datatable">
                    <thead>
                    <tr>
                        <td>Sn</td>
                        <td>Name</td>
                        <td>User Name</td>
                        <td>Contact</td>
                        <td>email</td>
                        <td>Address</td>
                        <td>Nationality</td>
                        <td>D.O.B</td>
                        <td>Marital Status</td>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $a=0;foreach($data as $jobseeker_detail):$a++;?>
                    <tr><td><?php echo $a;?></td>
                    	<td><?php echo $jobseeker_detail->jobseekerdetail->jobseeker_first_name." ".$jobseeker_detail->jobseekerdetail->jobseeker_middle_name." ".$jobseeker_detail->jobseekerdetail->jobseeker_last_name?></td>
                        <td><?php echo $jobseeker_detail->jobseekerdetail->jobseeker_user_name;?></td>
                        <td><?php echo $jobseeker_detail->jobseekerdetail->jobseeker_contact_number;?></td>
                        <td><?php echo $jobseeker_detail->jobseekerdetail->jobseeker_email;?></td>
                        <td><?php echo $jobseeker_detail->jobseekerdetail->jobseeker_address;?></td>
                        <td><?php echo $jobseeker_detail->jobseekerdetail->jobseeker_nationality;?></td>
                        <td><?php echo $jobseeker_detail->jobseekerdetail->jobseeker_dob;?></td>
                        <td><?php echo $jobseeker_detail->jobseekerdetail->jobseeker_marital_status;?></td>
                    </tr>	
                    <?php endforeach;?>
                   
                    </tbody>
                 </table>            
                 </div>
   <?php 
   }
}