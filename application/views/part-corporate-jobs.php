<?php $CorporateJobsRows=array_chunk($CorporateJobs,2); ?>
<div class="panel panel-default ">
        	<div class="panel-heading">
            	<i class="fa fa-building-o"></i> Corporate Jobs
            </div>
            <div class="panel-body">
            <?php foreach($CorporateJobsRows as $CorporateJobsRow): ?>
            <div class="col-lg-6">
            <ul class="list-group">
            <?php foreach($CorporateJobsRow as $CorporateJobsCol): ?>
            <li class="list-group-item">
                <div class="row">
            <div class="employer">
            <div class="employer-logo col-lg-4"><img src="<?php echo base_url(); ?>images/no_logo.jpg" height="47"></div>
            <div class="employer-name col-lg-8"><a class="title" href="<?php echo site_url("company/companyview/".$CorporateJobsCol->company_alias); ?>" title="<?php echo $CorporateJobsCol->company_name; ?>"><?php echo substr($CorporateJobsCol->company_name,0,20); ?></a><div class="posted-job-list  col-lg-12">
                <div class="limited-list">
                <?php $Job=$CorporateJobsCol->Jobs[0]; ?>
                <?php unset($CorporateJobsCol->Jobs[0]); ?>
                <div class="individual-job"><a href="<?php echo site_url("jobs/".$Job->job_alias); ?>" title="<?php echo $Job->job_title; ?>">- <?php echo substr($Job->job_title,0,22); ?></a>
                <?php $jobs_count=sizeof($CorporateJobsCol->Jobs);?>
                <?php if($jobs_count>0): ?>
                <i class="fa fa-plus-square-o tooltip-example" data-toggle="tooltip" title="<?php foreach($CorporateJobsCol->Jobs as $Job): ?>
            	<div><a href='<?php echo site_url("jobs/".$Job->job_alias); ?>'><?php echo $Job->job_title; ?></a></div>
            <?php endforeach; ?>" style="display: inline-block;position: absolute;margin: 5px 10px; cursor:pointer;"></i>
                
                <?php endif; ?>
                </div>
                    
                </div>
            </div></div>
            </div>
        </div>
               
            </li>
            <?php endforeach; ?>
            </ul>
        	</div>
            <?php endforeach; ?>
            </div>
        </div>