<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/imgareaselect-default.css">
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.imgareaselect.pack.js"></script>
<script>
function getSizes(im,obj)
	{
		var x_axis = obj.x1;
		var x2_axis = obj.x2;
		var y_axis = obj.y1;
		var y2_axis = obj.y2;
		var thumb_width = obj.width;
		var thumb_height = obj.height;
		if(thumb_width > 0)
			{
				if(confirm("Do you want to save image..!"))
					{
						$.ajax({
							type:"GET",
							url:"ajax_image.php?t=ajax&img="+$("#image_name").val()+"&w="+thumb_width+"&h="+thumb_height+"&x1="+x_axis+"&y1="+y_axis,
							cache:false,
							success:function(rsponse)
								{
								 $("#cropimage").hide();
								    $("#thumbs").html("");
									$("#thumbs").html("<img src='uploads/"+rsponse+"' />");
								}
						});
					}
			}
		else
			alert("Please select portion..!");
	}

$(document).ready(function () {
    $('img#photo').imgAreaSelect({
        aspectRatio: '1:1',
        onSelectEnd: getSizes
    });
});
</script>
<div class="col-lg-3"><!-- right side logo of jobseeker and typical info -->
				<div class="panel panel-default">
					<div class="panel-heading" >Welcome <?php $user_name=$this->session->userdata("LoggedInUsername");$username = explode("@",$user_name);echo $username[0];?> </div>
					<div class="panel-body">
                        <img src="<?php echo base_url();?>resources/company_logos/avatar.jpg" alt="..." class="img-rounded img-responsive profile-pic">
							<input type="submit" value="upload" data-toggle="modal" data-target="#myModal"/>
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Edit Images</h4>
                                  </div>
                                  <div class="modal-body">
                                   		<div style="margin:0 auto; width:600px">
                                        <div id="thumbs" style="padding:5px; width:600px"></div>
                                        <div style="width:600px">
                                        
                                        <form action="<?php echo site_url("ajax/tempupload");?>" id="cropimage" method="post" enctype="multipart/form-data">
                                        Upload your image <input type="file" name="photoimg" id="photoimg" />
                                        <input type="hidden" name="image_name" id="image_name" value="<?php //echo($actual_image_name)?>" />
                                        <input type="submit" name="submit" value="Submit" />
                                        </form>
                                        
                                        </div>
                                        </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Upload</button>
                                  </div>
                                </div>
                              </div>
                            </div>                                     
                        <div class="panel panel-default">
							<div class="panel-body">
								<div class="h3"><span class="glyphicon glyphicon-bookmark">&nbsp;Profile</span></div>
								<ul class="list-group">
								  <li class="list-group-item"><a href="<?php echo site_url("JobSeekerProfile/viewprofile");?>"><span class="glyphicon glyphicon-user"></span> &nbsp;View Profile</a></li>
								  <li class="list-group-item"><a href="<?php echo site_url("JobSeekerProfile/edit");?>"><span class="glyphicon glyphicon-edit"></span>&nbsp;&nbsp;Edit Profile</a></li>
								  <li class="list-group-item"><a href="<?php echo site_url("JobSeekerProfile/setting");?>"><span class="glyphicon glyphicon-wrench"></span>&nbsp;&nbsp;Settings</a></li>
								  <li class="list-group-item"><a href="#"><span class="glyphicon glyphicon-off"></span>&nbsp;&nbsp;Logout</a></li>
								</ul>
								<div class="h3"><span class="glyphicon glyphicon-th">&nbsp;Jobs</span></div>
								<ul class="list-group">
								  
								  <li class="list-group-item"><a href="<?php echo site_url("JobSeekerProfile/appliedjob");?>"><span class="glyphicon glyphicon-leaf"></span>&nbsp;&nbsp;Applied Jobs</a></li>
								  <li class="list-group-item"><a href="#"><span class="glyphicon glyphicon-certificate"></span>&nbsp;&nbsp; Job Notification</a></li>
								</ul>
								<div class="h3"><span class="glyphicon glyphicon-paperclip">&nbsp;Academic</span></div>
								<ul class="list-group">
								  <li class="list-group-item"><a href="<?php echo site_url("JobSeekerProfile/createacademic");?>"><span class="glyphicon glyphicon-cog"></span> &nbsp;Create </a></li>
								  <li class="list-group-item"><a href="<?php echo site_url("JobSeekerProfile/viewacademic");?>"><span class="glyphicon glyphicon-wrench"></span>&nbsp;&nbsp;Edit</a></li>
								</ul>
								<div class="h3"><span class="fa fa-file-text fa-1x">&nbsp;Resume</span></div>
								<ul class="list-group">
								  <li class="list-group-item"><a href="<?php echo site_url("JobSeekerProfile/createresume");?>"><span class="glyphicon glyphicon-cog"></span> &nbsp;Create </a></li>
								  <li class="list-group-item"><a href="<?php echo site_url("JobSeekerProfile/createemail");?>"><span class="glyphicon glyphicon-envelope"></span>&nbsp;&nbsp;Email</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>