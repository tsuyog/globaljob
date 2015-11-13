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
	function viewApplicant($alias=""){
		//testArray($_POST);die;
		if($alias=="")
		{
			$app_id=isset($_POST['application_id'])?$_POST['application_id']:5;
			$alias=isset($_POST['jobseekeralias'])?$_POST['jobseekeralias']:'prajwal';	
			
		}
//		$app_id=$this->uri->segment(4);
		$this->load->model("MJobseeker");
		$this->load->model("MJobseekerAcademic");
		$this->load->model("MExperience");
		$this->load->model("MTraining");
		$this->load->model("MCoverLetter");
		$this->load->model("MApplicationPool");
		$app=$this->MApplicationPool->getApplicationById($app_id);
		$jobseeker=$this->MJobseeker->getJobseekerByAlias($alias);
		$jobseeker->Academic=$this->MJobseekerAcademic->getJobseekerAcademicByJobseeker($jobseeker->jobseeker_id);
		$jobseeker->Experience=$this->MExperience->getExperienceByJobseeker($jobseeker->jobseeker_id);
		$jobseeker->Training=$this->MTraining->getTrainingByJobseeker($jobseeker->jobseeker_id);
		$jobseeker->CoverLetter=$this->MCoverLetter->getCoverLetterByJobseeker($jobseeker->jobseeker_id);
		$viewpackage=$jobseeker;
		//testArray($viewpackage); die;
		?>
        <script type="text/javascript" src="<?php echo base_url();?>js/jquery.printElement.js"></script>
        <div id="printArea">
            <div class="panel panel-default backgroundgray">
                <div class="panel-body">
                	<div class="look decor"><?php echo " "; echo $viewpackage->jobseeker_first_name; echo " "; echo $viewpackage->jobseeker_middle_name; echo " "; echo $viewpackage->jobseeker_last_name;?></div>
                    <div class="row">
                    <div class="col-md-6">Name:<?php echo " "; echo $viewpackage->jobseeker_first_name; echo " "; echo $viewpackage->jobseeker_middle_name; echo " "; echo $viewpackage->jobseeker_last_name;?></div>
                        <div class="col-md-6">Sex:<?php echo " "; echo $viewpackage->sex;?></div>
                     </div>
                     <div class="row">
                    
                        <div class="col-md-6">Address:<?php echo " "; echo $viewpackage->jobseeker_address;?></div>
                        <div class="col-md-6">Contact:<?php echo " "; echo $viewpackage->jobseeker_contact_number;?></div>
                     </div>
                     <div class="row">   
                        <div class="col-md-6">Email:<?php echo " "; echo $viewpackage->jobseeker_email;?></div>
                        <div class="col-md-6">Nationality:<?php echo " "; echo $viewpackage->jobseeker_nationality;?></div>
                      
                     </div>
                     <div class="row">   
                       
                        <div class="col-md-6">D.O.B:<?php echo " "; echo $viewpackage->jobseeker_dob;?></div>
                        <div class="col-md-6">Marital:<?php echo " "; echo $viewpackage->jobseeker_marital_status;?></div>
                     </div>
                        </div>
                </div>
            <div class="panel panel-default backgroundgray">
                	<div class="panel-body">
                    <?php if($viewpackage->Academic!=array()) {?>
                    	 <div class="look decor">Academic</div>
                         <table class="table table-striped">
                          <tr>
                          	<td>Level</td>
                            <td>Degree Name</td>
                            <td>Graduation year</td>
                            <td>College</td>
                            <td>University</td>
                            <td>Score</td>
                          </tr>
                          <?php foreach($viewpackage->Academic as $academic):?>
                          	<tr>
                            	<td><?php echo $academic->jobseeker_level_of_degree;?></td>
                                <td><?php echo $academic->jobseeker_degree_name;?></td>
                                <td><?php echo $academic->jobseeker_graduation_year;?></td>
                                <td><?php echo $academic->jobseeker_college_name;?></td>
                                <td><?php echo $academic->jobseeker_university_name;?></td>
                                <td><?php echo $academic->jobseeker_score;?></td>
                            </tr>
                          <?php endforeach;?>
                        </table>
                        <?php } 
						else {?>
                        	<div class="col-md-6 decor">No records found</div>
                        <?php }?>
                    </div>
                </div>
            <div class="panel panel-default backgroundgray">
                	<div class="panel-body">
                    <?php if($viewpackage->Experience!=array()) {?>
                    	 <div class="look decor">Experience</div>
                         <table class="table table-striped">
                         	<tr>
                            	<td>Experience Period</td>
                                <td>Performed Designation</td>
                                <td>Remarks</td>
                            </tr>
                            <?php foreach($viewpackage->Experience as $experience):?>
                            	<tr>
                                	<td><?php echo $experience->jobseeker_experience_period;?></td>
                                    <td><?php echo $experience->jobseeker_experience_designation;?></td>
                                    <td><?php echo $experience->jobseeker_experience_description;?></td>
                                </tr>
                            <?php endforeach;?>
                         </table>
                         <?php }
						 else {?>
                         	<div class="col-md-6 decor">No records found</div>
                         <?php }?>
                    </div>
                 </div>
            <div class="panel panel-default backgroundgray">
                	<div class="panel-body">
                    <?php if($viewpackage->Training!=array()) {?>
                    	 <div class="look decor">Training</div>
                         <table class="table table-striped">
                         	<tr>
                            	<td>Attended</td>
                                <td>Training</td>
                                <td>Purpose</td>
                            </tr>
                            <?php foreach($viewpackage->Training as $training): ?>
                            	<tr>
                                	<td><?php echo $training->jobseeker_training_year;?></td>
                                    <td><?php echo $training->jobseeker_training_description;?></td>
                                    <td><?php echo $training->jobseeker_training_purpose;?></td>
                                </tr>
                            <?php endforeach;?>
                         </table>
                     <?php } 
					 else {?>
                     	<div class="col-md-6 decor">No records found</div>
                     <?php } ?>
                    </div>
                 </div>
            <div class="panel panel-default backgroundgray">
                	<div class="panel-body">
                    <?php if($viewpackage->CoverLetter!=array()) { ?>
                    	 <div class="look decor">Cover Letter</div>
                         <?php foreach($viewpackage->CoverLetter as $cover):?>
                          <div class="decor"><pre><?php echo $cover->cover_letter;?></pre></div>
                    	<?php endforeach;?>
                    <?php }
					else { ?>
                    	<div class="decor">Cover Letter</div>
                    <?php }?>
                    </div>
                 </div>
              </div>
            <div class="panel panel-default backgroundgray">
                  		<div class="panel-body">
                        	<div class="col-md-12 pull-right">
                            <?php 
							$url=base_url();
							$filename =  realpath("resources/resume_pool/".$viewpackage->jobseeker_id.".pdf");
							$filename =  ($filename=="")?realpath("resources/resume_pool/".$viewpackage->jobseeker_id.".doc"):$filename;
							$filename =  ($filename=="")?realpath("resources/resume_pool/".$viewpackage->jobseeker_id.".docx"):$filename;
							//echo $filename; die;
							//echo file_exists($filename); die;
							if($filename!==""){ 
							$filename=explode("\\",$filename);
							$filename=$filename[sizeof($filename)-1];
							?>
                              <a href="<?php echo base_url()."resources/resume_pool/".$filename; ?>" class="label label-success backlist">Download Uploaded Profile</a>
                              <?php }?>
                             <a href="javascript:$('#printArea').printElement();"><span class="label label-success"> Make & Download Resume </span></a>
                             <a href="#" id="<?php echo $app->jobseeker_id;?>" class="label label-success shortlist">Shortlist</a>
                            </div>
                        </div>
                  </div>    
            <script>
				$(".shortlist").click(function(e) {
                    $.ajax({
						url:'<?php echo site_url("ajax/shortlistapplication/".$app_id); ?>',
						success: function(data)
						{
							alert("Application Shortlisted");
							window.location="<?php echo site_url("profile/applicationpool"); ?>";	
						}
						
					});
                });
				
			
			</script> 
        <?php 
	}
	function shortlistapplication($app_id){
		$this->load->model("MApplicationPool");
		$this->MApplicationPool->doShortlist($app_id);
	}
	function searchjobs(){
		$this->load->model("MMasterJob");
		$this->load->model("MCompany");
		$this->load->model("MCity");
		$this->load->model("MFunctions");
		$this->load->model("MSalaryRange");
		
		
			if(isset($_POST['functionid'])){
				$function_id=$_POST['functionid'];
				$query=$this->MMasterJob->getJobsByFunctionId($function_id);
			
			}
			elseif(isset($_POST['company'])){
				$company=$_POST['company'];
				$jobs=$this->MMasterJob->getJobsByCompanyName($company);
				$query=$jobs;
			}
			elseif(isset($_POST['locationid'])){
				$location=$_POST['locationid'];
				$query=$this->MMasterJob->getJobsByLocationId($location);
			}
			elseif(isset($_POST['salaryrangeid'])){
				$salary_range=$_POST['salaryrangeid'];
				$query=$this->MMasterJob->getJobsbySalaryRanges($salary_range);
			}
			foreach($query as $job):
				$job->Company = $this->MCompany->getCompanyById($job->company_id);
				$job->salary_range = $this->MSalaryRange->getSalaryRange($job->salary_range_id);
				$job->location = $this->MCity->getCityById($job->location_id);
			endforeach;
			$jobs=$query;
			?>
            <div class="panel-heading look decor">JOBS</div>
            <div class="panel-body">
                <table class="table table-striped">
                <tr>
                <th>Company Logo</th>
                <th>Job Title</th>
                <th>Location</th>
                <th>Salary Range</th>
                <th>Deadline</th>
                <th></th>
                </tr>
                <?php foreach($jobs as $job):?>
                <tr>
                <figure class="logo">
                <td><img src="<?php echo base_url()."resources/company_logos/".$job->Company->company_logo;?>" height="50" width="50"></td>
                </figure>
                <td><?php echo $job->job_title;?></td>
                <td><?php echo $job->location->city_name;?></td>
                <td><?php if(!empty($job->salary_range->salary_range))echo $job->salary_range->salary_range;?></td>
                <td><?php echo getdays($job->deadline)."days left";?></td>
                <td><a href="<?php echo site_url("jobs/applyjobs/".$job->job_id);?>" class="btn btn-success">Apply now</a>
                </tr>
                <?php endforeach;?>
                </table>
                </div>
            
            
		<?php 
		}
	function tempupload()
	{
	$path = base_url()."images/";
	$valid_formats = array("jpg", "png", "gif", "bmp");
	if(isset($_POST['submit']))
		{
			$name = $_FILES['photoimg']['name'];
			$size = $_FILES['photoimg']['size'];
			
			if(strlen($name))
				{
					list($txt, $ext) = explode(".", $name);
					if(in_array($ext,$valid_formats) && $size<(1024*1024))
						{
							$actual_image_name = time().substr($txt, 5).".".$ext;
							$tmp = $_FILES['photoimg']['tmp_name'];
							if(move_uploaded_file($tmp, $path.$actual_image_name))
								{
								$this->load->model("MJobseeker");
								$id= $this->session->userdata("LoggedInUserId");
								$this->MJobseeker->uploadimage($id,$actual_image_name);
									$image="<h1>Please drag on the image</h1><img src='images/".$actual_image_name."' id=\"photo\" style='max-width:500px' >";
									return $image;
								}
						}				
				}
			else
				echo "Please select image..!";
		}
	}
	
	
			
		
	function uploadresume(){
		if(isset($_FILES['resume'])){
				 
				 $config['upload_path'] = './resources/resume_pool/';
				 $config['file_name']=$this->session->userdata("LoggedInUserId");
				 $config['allowed_types'] = 'doc|docx|pdf';
				 $config['overwrite']=true;
				 $this->load->library('upload', $config);
				 if (!$this->upload->do_upload('resume'))
				{
					$error = array('error' => $this->upload->display_errors());
					testArray($error);die;
				}
				else
				{
					$resume =$this->upload->data();
					echo "Upload Successful !!";
				}
			}	
	}
	
	function uploadcover(){
		if(isset($_FILES['cover'])){
				 $config['upload_path'] = './resources/cover_letter_pool/';
				 $config['allowed_types'] = 'doc|docx|pdf';
				 $config['file_name']=$this->session->userdata("LoggedInUserId");
				 $this->load->library('upload', $config);
				 $config['overwrite']=true;
				 if (!$this->upload->do_upload('cover'))
				{
					$error = array('error' => $this->upload->display_errors());
					testArray($error);die;
				}
				else
				{
					$cover =$this->upload->data();
					echo "Upload Successful !!";
				}	
			
		}
	}
	function viewcompanydetail($company_alias){
	$this->load->model("MCompany");
	$company_detail=$this->MCompany->getCompanyByAlias($company_alias);
	?>
    <table class="table table-striped" id="companyprofile">
    <tr>
    <th>Company Name</th>
    <th>Company Profile</th>
    </tr>
    <tr>
    <td><?php echo $company_detail->company_name;?></td>
    <td><?php echo $company_detail->company_profile;?></td>
    </tr>
    </table>
    <?php
    //testArray($company_detail);die;
	}
	function checkusername(){
	$CI=&get_instance();
	$field_name=$_POST['field_name'];
	$table=$_POST['tbl_name'];
	$arg=$_POST['user_name'];
	$query=$CI->db->query("select $field_name from $table where $field_name='$arg'");
	if($query->num_rows()>0)
		echo "true";
	else 
		echo "false";
	}
	function checkOldPassword(){
		$CI=&get_instance();
		$tbl_target=$_POST['tbl_name'];
		$password=$_POST['password'];
		$field_name=$_POST['field_name'];
		$user_name=$_POST['user_name'];
		$my_sql="select * from $tbl_target where user_name='$user_name' and $field_name='$password'"; 
		echo $my_sql; die;
		$query=$CI->db->query($my_sql);
		if($query->num_rows()>0)
		echo "true";
		else 
		echo "false";	
	}
}
?>