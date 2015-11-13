<?php $RecentJobsRows=array_chunk($RecentJobs,6);  ?>
<?php $NewspaperJobsRows=array_chunk($NewspaperJobs,5);?>
<?php $industryRows=array_chunk($industry,7);?>
<?php $locationRows=array_chunk($location,6);?>
<?php $this->load->view("include-site-header"); ?>
<?php $this->load->view("menu"); ?>
<div class="container site-body">
    <div class="row">
    <div class="col-lg-9">
    	<div class="row">
        	<div class="col-lg-8">
                <?php $this->load->view("part-caraousel"); ?>
                <div class="clearfix corporate-jobs-container"></div>
                <?php $this->load->view("part-corporate-jobs"); ?>
            </div>
            <div class="col-lg-4">
            <?php $this->load->view("part-hotjobs"); ?>        
        	</div>
           </div>
        <div class="row">
           	<div class="col-lg-12">
            	<?php $this->load->view("part-featured-job");?>  
            </div>
           </div>
    
    </div>
    <div class="col-lg-3">
            <?php $this->load->view("part-home-sidebar"); ?>
    </div>
    
</div>
     
    <div class="row site-lower-body">
    <div class="col-lg-12">
        <ul class="nav nav-tabs tabs">
          <li class="active"><a href="#recent" data-toggle="tab" >Recently Posted Jobs</a></li>
          <li><a href="#newspaper" data-toggle="tab">Newspaper Jobs</a></li>
          <li><a href="#industry" data-toggle="tab">Jobs by Industry</a></li>
          <li><a href="#location" data-toggle="tab">Jobs by Location</a></li>
        </ul>
        
        <!-- Tab panes -->
        <div class="tab-content">
          <div class="tab-pane active homepage-tabbed" id="recent">
          	<?php foreach ($RecentJobsRows as $recentjob):?>
          	 <div class="panel-body col-md-4">
             <ul class="format">
             <?php foreach($recentjob as $recent_job):?>
             	<div class="row">
                	<li>
                    	<a href="<?php echo site_url("company/companyview/".$recent_job->Company->company_alias);?>"><?php echo character_limiter($recent_job->Company->company_name,15); ?></a> <br>
                    </li>
                    <div class="disp">
                    <a href="<?php echo site_url("jobs/".$recent_job->job_alias);?>"><?php echo character_limiter($recent_job->job_title,15);?></a>
                    <div class="pull-right">
						<?php echo getdays($recent_job->deadline)."  "."days left";?><?php applynow($recent_job->job_alias);?>
                    </div>
                    </div>
                </div>
              <?php endforeach;?>
              </ul>
             </div>
           <?php endforeach;?>
          </div>
          
          
          <div class="tab-pane" id="newspaper">
          	<?php foreach($NewspaperJobsRows as $newspaperjob):?>
            <div class="panel-body col-md-4">
            	<ul class="format">
            	<?php foreach($newspaperjob as $newspaper_job):?>
                <div class="row">
                	<li><a href="<?php echo site_url("company/companyview/".$newspaper_job->Company->company_alias);?>"><?php echo character_limiter($newspaper_job->Company->company_name,40);?></a><br></li>
                    <div class="disp">
                        <a href="<?php echo site_url("jobs/".$newspaper_job->job_alias); ?>">
                        <?php echo character_limiter($newspaper_job->job_title,20);?>
                        </a>
                        	<div class="pull-right">
							<?php echo getdays($newspaper_job->deadline)."  "."days left";?><?php applynow($newspaper_job->job_alias);?>
                        	</div>
                        </div>
                   </div>
                <?php endforeach;?>
             	</ul>
            </div>  
          <?php endforeach;?>
          </div>
          
          
          <div class="tab-pane" id="industry">
          	<?php foreach($industryRows as $industry_rows):?>
            	 <div class="panel-body col-md-3">
                 	 <ul>
                 	<?php foreach($industry_rows as $industry_job):?>
					 <li class="disp"><a href="<?php echo site_url("jobs/jobsbyindustry/".$industry_job->industry_id);?>"><?php echo $industry_job->industry_name;?>
                     <?php if(getCountedJobs($industry_job->industry_id)>0):?>
                     [<?php echo getCountedJobs($industry_job->industry_id);echo "  "; echo "Jobs";?>]
                     <?php endif;?>
                     </a></li>
					<?php endforeach;?>
                    </ul>
                 </div>
            <?php endforeach;?>
          </div>
          <div class="tab-pane" id="location">
          	<?php foreach($locationRows as $location_rows):?>
            	<div class="panel-body col-md-3">
                	<ul>
                    <?php foreach($location_rows as $location):?>
                    <li class="disp"> <a href="<?php echo site_url("jobs/jobsbyindustry/".$location->city_id);?>"><?php echo $location->city_name;?>
                    <?php if(getCountedJobs($location->city_id)>0):?>
                    [<?php echo getCountedJobs($location->city_id); echo "  "; echo "Jobs";?>]
                    <?php endif;?>
                    </a></li>
                    <?php endforeach;?>
                    </ul>
                </div>
				<?php endforeach;?>
          </div>
        </div>
    </div>
    </div>
    
    
    <div class="row">
    <div class="site-footer">
        <div class="panel panel-default site-footer">
        	<div class="panel-body site-footer">
            	<div class="panel-body col-md-3 foot">
                	<div class="look decor">Quick Links</div>
                    <ul class="foot">
                    	<li><a href="<?php echo site_url("")?>">Home</a></li>
                        <li><a href="<?php echo site_url("AboutUs/view")?>">About Us</a></li>
                        <li><a href="<?php echo site_url("login")?>">Jobseeker LogIn</a></li>
                        <li><a href="<?php echo site_url("login")?>">Employer LogIn</a></li>
                        <li><a href="<?php echo site_url("")?>">Share Your Success</a></li>
                        <li><a href="<?php echo site_url("")?>">Feedback</a></li>
                        <li><a href="<?php echo site_url("Contact")?>">Conact Us</a></li>
                        
                    </ul>
                </div>
                <div class="panel-body col-md-3">
                	<div class="look decor">Services</div>
                    <ul class="foot">
                    	<?php foreach($services as $service):?>
                        <li><a href="<?php echo site_url("services/getservices/".$service->services_alias);?>"><?php echo $service->services_title;?></a></li>
                    	<?php endforeach;?>
                    </ul>
                </div>
                <div class="panel-body col-md-3">
                	<div class="look decor">Social Media</div>
                    <ul class="foot">
                    	<li><a href="#">Facebook</a></li>
                        <li><a href="#">Twitter</a></li>
                        <li><a href="#">Youtube</a></li>
                        <li><a href="#">Google+</a></li>
                        <li><a href="#">Flicker</a></li>
                        <li><a href="#">Picasa</a></li>
                        <li><a href="#">Skype</a></li>
                        
                    </ul>
                </div>
                <div class="panel-body col-md-3">
                	<div class="look decor">Global Job Pvt. Ltd.</div>
                    <ul class="foot">
                    	<li>G.P.O. 8975 EPC 5273</li>  
                        <li>Kathmandu Plaza - Y Block, 4th Floor</li>  
                        <li>Kamaladi, Kathmandu Nepal</li>    
                        <li><span class="glyphicon glyphicon-phone"></span> +977-1-4168658/4168657</li>
                        <li><span class="glyphicon glyphicon-print"></span> +977-1-4168517</li>
                        <li><span class="glyphicon glyphicon-envelope"></span>info@globaljob.com</li>                    
                    </ul>
                </div>
            </div>
        </div>
    
    </div>
    
</div>
</div>

</body>
</html>