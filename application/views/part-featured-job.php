<?php $FeaturedJobsRows=array_chunk($FeaturedJobs,3); ?>
<div class="panel panel-default">                       
                        <div class="panel-heading"> <span class="glyphicon glyphicon-star"></span>Featured Jobs</div>	
                        <div class="panel-body">
		<?php foreach($FeaturedJobsRows as $FeaturedJobsCol):  ?>
        	<div class="col-lg-6">
            	<ul class="list-group">
                <?php foreach($FeaturedJobsCol as $FeaturedJob): ?>
                		<li class="list-group-item">
                        <div class="row">
                        <div class="col-lg-8">
                        <a href="<?php echo site_url("company/companyview/".$FeaturedJob->Company->company_alias); ?>"><?php echo $FeaturedJob->Company->company_name; ?></a><br>
                        <a href="<?php echo site_url("jobs/".$FeaturedJob->job_alias); ?>"><?php echo $FeaturedJob->job_title; ?></a>
                     </div>     
                        <div class="col-lg-4">
						<?php echo getdays($FeaturedJob->deadline)." "."days left"; ?> <br /><?php applynow($FeaturedJob->job_alias)?>
                        </div>
                        </div>
                    </li>
        <?php endforeach; ?>
        	</ul>
        		</div>
<?php endforeach; ?>
</div>
</div>