<style>
.posted-job
{
	
}
.posted-job .employer
{
	
}
.posted-job .employer-logo
{

	
}
.posted-job .employer-logo img
{
	
}
.posted-job .employer-name
{
	
}
.posted-job .posted-job-list
{
	
}
.posted-job .posted-job-list .individual-job
{
	
}

</style>
<div class="panel panel-default">
	<div class="panel-heading">
    <span class="glyphicon glyphicon-bullhorn"></span> Hot Jobs
    </div>
    <div class="panel-body hot-jobs-container">
    <ul class="list-group">
    <?php foreach($HotJobs as $HotJob):?>
    	<li class="list-group-item">
        	<div class="row">
    	<div class="employer">
    	<div class="employer-logo col-lg-4">
        <?php if($HotJob->company_logo==""): ?>
        <img src="<?php echo base_url(); ?>images/no_logo.jpg" height="47">
        <?php else: ?>
        <img src="<?php echo base_url()."resources/company_logos/".$HotJob->company_logo; ?>" onError="javascript:this.src='images/no_logo.jpg'" height="47">
        <?php endif; ?>
        </div>
        <div class="employer-name col-lg-8"><a href="<?php echo site_url("company/companyview/".$HotJob->company_alias); ?>" title="<?php echo $HotJob->company_name; ?>"><?php echo character_limiter($HotJob->company_name,20); ?></a>
        <div class="posted-job-list  col-lg-12">
        	<div class="limited-list"><!--limited list--> 
            <?php $jobs_count=sizeof($HotJob->Jobs);?>
            <?php if($jobs_count==1): ?>
            	<?php $Job=$HotJob->Jobs[0]; ?>
				<div class="individual-job"><a href="<?php echo site_url("jobs/".$Job->job_alias); ?>">- <?php echo $Job->job_title; ?></a></div>
                <?php else: ?>
                <?php $Job=$HotJob->Jobs[0]; ?>
                <?php unset($HotJob->Jobs[0]); ?>
				<div class="individual-job"><a href="<?php echo site_url("jobs/".$Job->job_alias); ?>">- <?php echo $Job->job_title; ?></a><i class="fa fa-plus-square-o tooltip-example" data-toggle="tooltip" title="<?php foreach($HotJob->Jobs as $Job): ?>
            	<div><a href='<?php echo site_url("jobs/".$Job->job_alias); ?>'>- <?php echo $Job->job_title; ?></a></div>
            <?php endforeach; ?>" style="display: inline-block;position: absolute;margin: 5px 10px; cursor:pointer;"></i></div>
            <?php endif; ?>
            
            </div><!-- limited list -->
        </div>
        </div>
    	</div>
    </div>
    		
        </li>
    <?php endforeach; ?>
    
        
    </ul>
    
    </div>
</div>
