<?php $RecentJobsRows=array_chunk($RecentJobs,6); ?>
<?php foreach($RecentJobsRows as $RecentJobsCol):  ?>
<div class="col-lg-6">
            	<ul class="list-group">
                <?php foreach($RecentJobsCol as $RecentJob): ?>
                	<li class="list-group-item">
                    <div class="row">
                    	<div class="col-lg-6">
                        <a href="<?php echo site_url("company/".$RecentJob->Company->company_alias); ?>"><?php echo $RecentJob->Company->company_name; ?></a><br>
                        <a href="<?php echo site_url("jobs/".$RecentJob->job_alias); ?>"><?php echo $RecentJob->job_title; ?></a>
                        </div>
                        <div class="col-lg-6">
                        <br>
                        <?php echo $RecentJob->deadline; ?> - [<a href="<?php echo site_url("apply"); ?>">apply now</a>]
                        </div>
                    </div>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
<?php endforeach; ?>
