<nav class="navbar navbar-default navbar-static-top" role="navigation">

<a class="navbar-brand" href="<?php echo site_url("admin");?>">Global Job Administration Panel</a>
<ul class="nav navbar-nav">
	<li><a href="<?php echo site_url("admin");?>">Home</a></li>
    <li class="active dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Masters <b class="caret"></b></a>
    <ul class="dropdown-menu">
    	<li><a href="<?php echo site_url("admin/functions");?>">Functions</a></li>
        <li><a href="<?php echo site_url("admin/designations");?>">Designations</a></li>
        <li><a href="<?php echo site_url("admin/ownership");?>"> Ownership</a></li>
        <li><a href="<?php echo site_url("admin/address");?>">Address Master</a></li>
       
    </ul>
    
    </li>
</ul>
<ul class="nav navbar-nav">
		<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Job<b class="caret"></b></a>
		<ul class="dropdown-menu">
        <li><a href="<?php echo site_url("admin/jobseeker")?>">Jobseeker</a></li>
        <li><a href="<?php echo site_url("admin/joblevel")?>">Job Level</a></li>
        <li><a href="<?php echo site_url("admin/jobbenifits")?>">Job Benifits</a></li>
        <li><a href="<?php echo site_url("admin/jobs");?>">Master Jobs</a></li>
        <li><a href="<?php echo site_url("admin/jobtype");?>">Job Type</a></li>
        </li>
        </ul>
</ul>
<ul class="nav navbar-nav">
		<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Company<b class="caret"></b></a>
		<ul class="dropdown-menu">
		<li><a href="<?php echo site_url("admin/company")?>">Company</a></li>
        <li><a href="<?php echo site_url("admin/industry");?>">Industry</a></li>
        </ul>
        </li>
</ul>
<ul class="nav navbar-nav">
	<li><a href="<?php echo site_url("admin/report");?>">Report</a></li>
</ul>
<ul class="nav navbar-nav">
	<li><a href="<?php echo site_url("admin/purchase_unit");?>">Purchase Unit</a></li>
</ul>
<ul class="nav navbar-nav">
	<li><a href="<?php echo site_url("admin/general_article");?>">General Article</a></li>
</ul>
<ul class="nav navbar-nav">
	<li><a href="<?php echo site_url("admin/services");?>">Services</a></li>
</ul>
<p class="navbar-text navbar-right">Signed in as Administrator <a href="<?php echo site_url("admin/logout");?>" class="navbar-link">Logout</a></p>

</nav>