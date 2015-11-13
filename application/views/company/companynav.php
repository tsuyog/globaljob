<div class="col-lg-3"><!-- right side logo of company and typical info -->
		   <div class="panel panel-default">
				<div class="panel-heading" >Welcome <?php $user_name=$this->session->userdata("LoggedInUsername");$username = explode("@",$user_name);echo $username[0];?></div>
					<img src="<?php echo base_url();?>resources/company_logos/avatar.jpg" alt="..." class="img-rounded img-responsive profile-pic">
					<button type="button" class="btn btn-default btn-md">
						  <span class="glyphicon glyphicon-circle-arrow-up "></span> Upload Picture
					</button>
				<div class="panel-body">
					<div class="panel panel-default">
						<div class="panel-body">
							<div class="h3"><span class="glyphicon glyphicon-bookmark">&nbsp;Profile</span></div>
							<ul class="list-group">
								  <li class="list-group-item"><a href="<?php echo site_url("profile/viewProfile");?>"><span class="glyphicon glyphicon-user"></span> &nbsp;View Profile</a></li>
								  <li class="list-group-item"><a href="<?php echo site_url("profile/editProfile");?>"><span class="glyphicon glyphicon-edit"></span>&nbsp;&nbsp;Edit Profile</a></li>
								  <li class="list-group-item"><a href="<?php echo site_url("profile/setting");?>"><span class="glyphicon glyphicon-wrench"></span>&nbsp;&nbsp;Settings</a></li>
								  <li class="list-group-item"><a href="#"><span class="glyphicon glyphicon-off"></span>&nbsp;&nbsp;Logout</a></li>
							</ul>
							<div class="h3"><span class="glyphicon glyphicon-th">&nbsp;Jobs</span></div>
							<ul class="list-group">
								  <li class="list-group-item"><a href="<?php echo site_url("profile/postJob");?>"><span class="glyphicon glyphicon-plus-sign"></span> &nbsp;Post Job</a></li>
								  <li class="list-group-item"><a href="<?php echo site_url("profile/applicationPool");?>"><span class="glyphicon glyphicon-folder-open"></span>&nbsp;&nbsp;Application</a></li>
								  <li class="list-group-item"><a href="<?php echo site_url("profile/shortlistedapplication");?>"><span class="glyphicon glyphicon-pushpin"></span>&nbsp;&nbsp;Shortlisted Application</a></li>
								  <li class="list-group-item"><a href="<?php echo site_url("profile/selectedapplication");?>"><span class="glyphicon glyphicon-star"></span>&nbsp;&nbsp;Selected Application</a></li>
								  <li class="list-group-item"><a href="<?php echo site_url("profile/postedjobs");?>"><span class="glyphicon glyphicon-th-list"></span>&nbsp;&nbsp;View Posted Jobs</a></li>
								  <li class="list-group-item"><a href="<?php echo site_url("profile/templateresponder");?>"><span class="glyphicon glyphicon-pencil"></span>&nbsp;&nbsp;Responder Template</a></li>
							</ul>
							<div class="h3"><span class="glyphicon glyphicon-fire">&nbsp;Hot Jobs</span></div>
							<ul class="list-group">
								  <li class="list-group-item"><span class="glyphicon glyphicon-glass"></span>&nbsp;&nbsp;AvailableUnits <?php $unit=getHotjobunit();echo " "." "."(".$unit.")";?></li>
								  <li class="list-group-item"><a href="<?php echo site_url("profile/hotpurchaseunit");?>"><span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;&nbsp;Purchase Unit</a></li>
								  <li class="list-group-item"><?php if(!$unit<=0):?><a href="<?php echo site_url("profile/hotpost");?>"><span class="glyphicon glyphicon-plus-sign"></span>&nbsp;&nbsp;Post</a><?php else:?><span class="glyphicon glyphicon-plus-sign"></span>&nbsp;&nbsp;Post<?php endif;?>
                                  </li>
								  <li class="list-group-item"><a href="<?php echo site_url("profile/hothistory");?>"><span class="glyphicon glyphicon-signal"></span>&nbsp;&nbsp;History</a></li>
							</ul>
							<div class="h3"><span class="glyphicon glyphicon-star">&nbsp;Featured Jobs</span></div>
							<ul class="list-group">
								  <li class="list-group-item"><span class="glyphicon glyphicon-glass"></span>&nbsp;&nbsp;Available Units<?php $unit=getFeaturedjobunit(); echo " "." ". "(".$unit.")";?></li>
								  <li class="list-group-item"><a href="<?php echo site_url("profile/featuredpurchaseunit");?>"><span class="glyphicon glyphicon-shopping-cart"></span>&nbsp;&nbsp;Purchase Unit</a></li>
								  <li class="list-group-item"><?php if(!$unit<=0):?><a href="<?php echo site_url("profile/featuredpost");?>"><span class="glyphicon glyphicon-plus-sign"></span>&nbsp;&nbsp;Post</a><?php else:?><span class="glyphicon glyphicon-plus-sign"></span>&nbsp;&nbsp;Post<?php endif;?>
                                  </li>
								  <li class="list-group-item"><a href="<?php echo site_url("profile/featuredhistory");?>"><span class="glyphicon glyphicon-signal"></span>&nbsp;&nbsp;History</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!-- closing of right side -->