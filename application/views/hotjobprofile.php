<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Global Job</title>
<link rel="stylesheet" type="text/css" href="../../css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../../css/font-awesome.css">
<?php $this->load->view("includes-header"); ?>
</head>

<body>
<div class="container header">
    <div class="col-md-1">
		<figure class="logo">
        	<a href="./"><img src="<?php echo base_url(); ?>images/logo.png" /></a>
        </figure>    
    </div>
</div>
<nav class="navbar navbar-green">
<div class="container">
	<ul class="nav navbar-nav">
    	<li><a href="#">Home</a></li>
    </ul>
</div>
</nav>
<div class="container site-body">
    <div class="row">
        <div class="col-lg-6">
            <?php $this->load->view("part-caraousel"); ?>
            <div class="clearfix corporate-jobs-container"></div>
            <?php $this->load->view("part-corporate-jobs"); ?>
        </div>
        <div class="col-lg-3">
            <?php $this->load->view("part-hotjobs"); ?>
        </div>
        <div class="col-lg-3">
            <?php $this->load->view("part-home-sidebar"); ?>
        </div>
    </div>
    <div class="row">
    <div class="col-lg-12">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#recent" data-toggle="tab" >Recently Posted Jobs</a></li>
          <li><a href="#featured" data-toggle="tab">Featured Jobs</a></li>
          <li><a href="#newspaper" data-toggle="tab">Newspaper Jobs</a></li>
          <li><a href="#location" data-toggle="tab">Jobs by Location</a></li>
        </ul>
        
        <!-- Tab panes -->
        <div class="tab-content">
          <div class="tab-pane active" id="recent">
          	 <?php $this->load->view("part-recent-jobs"); ?>
          </div>
          <div class="tab-pane" id="featured">
          	<?php $this->load->view("part-featured-jobs"); ?>
          </div>
          <div class="tab-pane" id="newspaper">
          	<div class="col-lg-6">
            	<ul class="list-group">
                	<li class="list-group-item">
                    <div class="row">
                    	<div class="col-lg-6">
                        Company Name<br>
                        Job Name
                        </div>
                        <div class="col-lg-6">
                        <br>
                        deadline - [apply link]
                        </div>
                    </div>
                    </li>
                    <li class="list-group-item">
                    <div class="row">
                    	<div class="col-lg-6">
                        Company Name<br>
                        Job Name
                        </div>
                        <div class="col-lg-6">
                        <br>
                        deadline - [apply link]
                        </div>
                    </div>
                    </li>
                    <li class="list-group-item">
                    <div class="row">
                    	<div class="col-lg-6">
                        Company Name<br>
                        Job Name
                        </div>
                        <div class="col-lg-6">
                        <br>
                        deadline - [apply link]
                        </div>
                    </div>
                    </li>
                    <li class="list-group-item">
                    <div class="row">
                    	<div class="col-lg-6">
                        Company Name<br>
                        Job Name
                        </div>
                        <div class="col-lg-6">
                        <br>
                        deadline - [apply link]
                        </div>
                    </div>
                    </li>
                    <li class="list-group-item">
                    <div class="row">
                    	<div class="col-lg-6">
                        Company Name<br>
                        Job Name
                        </div>
                        <div class="col-lg-6">
                        <br>
                        deadline - [apply link]
                        </div>
                    </div>
                    </li>
                    <li class="list-group-item">
                    <div class="row">
                    	<div class="col-lg-6">
                        Company Name<br>
                        Job Name
                        </div>
                        <div class="col-lg-6">
                        <br>
                        deadline - [apply link]
                        </div>
                    </div>
                    </li>
                </ul>
            </div>
            <div class="col-lg-6">
                <ul class="list-group">
                    <li class="list-group-item">
                    <div class="row">
                    	<div class="col-lg-6">
                        Company Name<br>
                        Job Name
                        </div>
                        <div class="col-lg-6">
                        <br>
                        deadline - [apply link]
                        </div>
                    </div>
                    </li>
                    <li class="list-group-item">
                    <div class="row">
                    	<div class="col-lg-6">
                        Company Name<br>
                        Job Name
                        </div>
                        <div class="col-lg-6">
                        <br>
                        deadline - [apply link]
                        </div>
                    </div>
                    </li>
                    <li class="list-group-item">
                    <div class="row">
                    	<div class="col-lg-6">
                        Company Name<br>
                        Job Name
                        </div>
                        <div class="col-lg-6">
                        <br>
                        deadline - [apply link]
                        </div>
                    </div>
                    </li>
                    <li class="list-group-item">
                    <div class="row">
                    	<div class="col-lg-6">
                        Company Name<br>
                        Job Name
                        </div>
                        <div class="col-lg-6">
                        <br>
                        deadline - [apply link]
                        </div>
                    </div>
                    </li>
                    <li class="list-group-item">
                    <div class="row">
                    	<div class="col-lg-6">
                        Company Name<br>
                        Job Name
                        </div>
                        <div class="col-lg-6">
                        <br>
                        deadline - [apply link]
                        </div>
                    </div>
                    </li>
                    <li class="list-group-item">
                    <div class="row">
                    	<div class="col-lg-6">
                        Company Name<br>
                        Job Name
                        </div>
                        <div class="col-lg-6">
                        <br>
                        deadline - [apply link]
                        </div>
                    </div>
                    </li>
                </ul>
            </div>
          </div>
          <div class="tab-pane" id="location">
          	<div class="col-lg-6">
            	<ul class="list-group">
                	<li class="list-group-item">
                    <div class="row">
                    	<div class="col-lg-6">
                        Company Name<br>
                        Job Name
                        </div>
                        <div class="col-lg-6">
                        <br>
                        deadline - [apply link]
                        </div>
                    </div>
                    </li>
                    <li class="list-group-item">
                    <div class="row">
                    	<div class="col-lg-6">
                        Company Name<br>
                        Job Name
                        </div>
                        <div class="col-lg-6">
                        <br>
                        deadline - [apply link]
                        </div>
                    </div>
                    </li>
                    <li class="list-group-item">
                    <div class="row">
                    	<div class="col-lg-6">
                        Company Name<br>
                        Job Name
                        </div>
                        <div class="col-lg-6">
                        <br>
                        deadline - [apply link]
                        </div>
                    </div>
                    </li>
                    <li class="list-group-item">
                    <div class="row">
                    	<div class="col-lg-6">
                        Company Name<br>
                        Job Name
                        </div>
                        <div class="col-lg-6">
                        <br>
                        deadline - [apply link]
                        </div>
                    </div>
                    </li>
                    <li class="list-group-item">
                    <div class="row">
                    	<div class="col-lg-6">
                        Company Name<br>
                        Job Name
                        </div>
                        <div class="col-lg-6">
                        <br>
                        deadline - [apply link]
                        </div>
                    </div>
                    </li>
                    <li class="list-group-item">
                    <div class="row">
                    	<div class="col-lg-6">
                        Company Name<br>
                        Job Name
                        </div>
                        <div class="col-lg-6">
                        <br>
                        deadline - [apply link]
                        </div>
                    </div>
                    </li>
                </ul>
            </div>
            <div class="col-lg-6">
                <ul class="list-group">
                    <li class="list-group-item">
                    <div class="row">
                    	<div class="col-lg-6">
                        Company Name<br>
                        Job Name
                        </div>
                        <div class="col-lg-6">
                        <br>
                        deadline - [apply link]
                        </div>
                    </div>
                    </li>
                    <li class="list-group-item">
                    <div class="row">
                    	<div class="col-lg-6">
                        Company Name<br>
                        Job Name
                        </div>
                        <div class="col-lg-6">
                        <br>
                        deadline - [apply link]
                        </div>
                    </div>
                    </li>
                    <li class="list-group-item">
                    <div class="row">
                    	<div class="col-lg-6">
                        Company Name<br>
                        Job Name
                        </div>
                        <div class="col-lg-6">
                        <br>
                        deadline - [apply link]
                        </div>
                    </div>
                    </li>
                    <li class="list-group-item">
                    <div class="row">
                    	<div class="col-lg-6">
                        Company Name<br>
                        Job Name
                        </div>
                        <div class="col-lg-6">
                        <br>
                        deadline - [apply link]
                        </div>
                    </div>
                    </li>
                    <li class="list-group-item">
                    <div class="row">
                    	<div class="col-lg-6">
                        Company Name<br>
                        Job Name
                        </div>
                        <div class="col-lg-6">
                        <br>
                        deadline - [apply link]
                        </div>
                    </div>
                    </li>
                    <li class="list-group-item">
                    <div class="row">
                    	<div class="col-lg-6">
                        Company Name<br>
                        Job Name
                        </div>
                        <div class="col-lg-6">
                        <br>
                        deadline - [apply link]
                        </div>
                    </div>
                    </li>
                </ul>
            </div>
          </div>
        </div>
    </div>
    </div>
</div>
<div class="container site-lower-body">
    <div class="row">
    <div class="col-lg-12 center-block">
        <ul class="nav nav-tabs" >
          <li class="active"><a href="#recent" data-toggle="tab" >Recently Posted Jobs</a></li>
          <li><a href="#featured" data-toggle="tab">Featured Jobs</a></li>
          <li><a href="#newspaper" data-toggle="tab">Newspaper Jobs</a></li>
          <li><a href="#location" data-toggle="tab">Jobs by Location</a></li>
        </ul>
        
        <!-- Tab panes -->
        <div class="tab-content">
          <div class="tab-pane active" id="recent">
         
          	
          </div>
          <div class="tab-pane" id="featured">
          	<div class="col-lg-6">
            	<ul class="list-group">
                	<li class="list-group-item">
                    <div class="row">
                    	<div class="col-lg-6">
                        Company Name<br>
                        Job Name
                        </div>
                        <div class="col-lg-6">
                        <br>
                        deadline - [apply link]
                        </div>
                    </div>
                    </li>
                    <li class="list-group-item">
                    <div class="row">
                    	<div class="col-lg-6">
                        Company Name<br>
                        Job Name
                        </div>
                        <div class="col-lg-6">
                        <br>
                        deadline - [apply link]
                        </div>
                    </div>
                    </li>
                    <li class="list-group-item">
                    <div class="row">
                    	<div class="col-lg-6">
                        Company Name<br>
                        Job Name
                        </div>
                        <div class="col-lg-6">
                        <br>
                        deadline - [apply link]
                        </div>
                    </div>
                    </li>
                    <li class="list-group-item">
                    <div class="row">
                    	<div class="col-lg-6">
                        Company Name<br>
                        Job Name
                        </div>
                        <div class="col-lg-6">
                        <br>
                        deadline - [apply link]
                        </div>
                    </div>
                    </li>
                    <li class="list-group-item">
                    <div class="row">
                    	<div class="col-lg-6">
                        Company Name<br>
                        Job Name
                        </div>
                        <div class="col-lg-6">
                        <br>
                        deadline - [apply link]
                        </div>
                    </div>
                    </li>
                    <li class="list-group-item">
                    <div class="row">
                    	<div class="col-lg-6">
                        Company Name<br>
                        Job Name
                        </div>
                        <div class="col-lg-6">
                        <br>
                        deadline - [apply link]
                        </div>
                    </div>
                    </li>
                </ul>
            </div>
            <div class="col-lg-6">
                <ul class="list-group">
                    <li class="list-group-item">
                    <div class="row">
                    	<div class="col-lg-6">
                        Company Name<br>
                        Job Name
                        </div>
                        <div class="col-lg-6">
                        <br>
                        deadline - [apply link]
                        </div>
                    </div>
                    </li>
                    <li class="list-group-item">
                    <div class="row">
                    	<div class="col-lg-6">
                        Company Name<br>
                        Job Name
                        </div>
                        <div class="col-lg-6">
                        <br>
                        deadline - [apply link]
                        </div>
                    </div>
                    </li>
                    <li class="list-group-item">
                    <div class="row">
                    	<div class="col-lg-6">
                        Company Name<br>
                        Job Name
                        </div>
                        <div class="col-lg-6">
                        <br>
                        deadline - [apply link]
                        </div>
                    </div>
                    </li>
                    <li class="list-group-item">
                    <div class="row">
                    	<div class="col-lg-6">
                        Company Name<br>
                        Job Name
                        </div>
                        <div class="col-lg-6">
                        <br>
                        deadline - [apply link]
                        </div>
                    </div>
                    </li>
                    <li class="list-group-item">
                    <div class="row">
                    	<div class="col-lg-6">
                        Company Name<br>
                        Job Name
                        </div>
                        <div class="col-lg-6">
                        <br>
                        deadline - [apply link]
                        </div>
                    </div>
                    </li>
                    <li class="list-group-item">
                    <div class="row">
                    	<div class="col-lg-6">
                        Company Name<br>
                        Job Name
                        </div>
                        <div class="col-lg-6">
                        <br>
                        deadline - [apply link]
                        </div>
                    </div>
                    </li>
                </ul>
            </div>
          </div>
          <div class="tab-pane" id="newspaper">
          	<div class="col-lg-6">
            	<ul class="list-group">
                	<li class="list-group-item">
                    <div class="row">
                    	<div class="col-lg-6">
                        Company Name<br>
                        Job Name
                        </div>
                        <div class="col-lg-6">
                        <br>
                        deadline - [apply link]
                        </div>
                    </div>
                    </li>
                    <li class="list-group-item">
                    <div class="row">
                    	<div class="col-lg-6">
                        Company Name<br>
                        Job Name
                        </div>
                        <div class="col-lg-6">
                        <br>
                        deadline - [apply link]
                        </div>
                    </div>
                    </li>
                    <li class="list-group-item">
                    <div class="row">
                    	<div class="col-lg-6">
                        Company Name<br>
                        Job Name
                        </div>
                        <div class="col-lg-6">
                        <br>
                        deadline - [apply link]
                        </div>
                    </div>
                    </li>
                    <li class="list-group-item">
                    <div class="row">
                    	<div class="col-lg-6">
                        Company Name<br>
                        Job Name
                        </div>
                        <div class="col-lg-6">
                        <br>
                        deadline - [apply link]
                        </div>
                    </div>
                    </li>
                    <li class="list-group-item">
                    <div class="row">
                    	<div class="col-lg-6">
                        Company Name<br>
                        Job Name
                        </div>
                        <div class="col-lg-6">
                        <br>
                        deadline - [apply link]
                        </div>
                    </div>
                    </li>
                    <li class="list-group-item">
                    <div class="row">
                    	<div class="col-lg-6">
                        Company Name<br>
                        Job Name
                        </div>
                        <div class="col-lg-6">
                        <br>
                        deadline - [apply link]
                        </div>
                    </div>
                    </li>
                </ul>
            </div>
            <div class="col-lg-6">
                <ul class="list-group">
                    <li class="list-group-item">
                    <div class="row">
                    	<div class="col-lg-6">
                        Company Name<br>
                        Job Name
                        </div>
                        <div class="col-lg-6">
                        <br>
                        deadline - [apply link]
                        </div>
                    </div>
                    </li>
                    <li class="list-group-item">
                    <div class="row">
                    	<div class="col-lg-6">
                        Company Name<br>
                        Job Name
                        </div>
                        <div class="col-lg-6">
                        <br>
                        deadline - [apply link]
                        </div>
                    </div>
                    </li>
                    <li class="list-group-item">
                    <div class="row">
                    	<div class="col-lg-6">
                        Company Name<br>
                        Job Name
                        </div>
                        <div class="col-lg-6">
                        <br>
                        deadline - [apply link]
                        </div>
                    </div>
                    </li>
                    <li class="list-group-item">
                    <div class="row">
                    	<div class="col-lg-6">
                        Company Name<br>
                        Job Name
                        </div>
                        <div class="col-lg-6">
                        <br>
                        deadline - [apply link]
                        </div>
                    </div>
                    </li>
                    <li class="list-group-item">
                    <div class="row">
                    	<div class="col-lg-6">
                        Company Name<br>
                        Job Name
                        </div>
                        <div class="col-lg-6">
                        <br>
                        deadline - [apply link]
                        </div>
                    </div>
                    </li>
                    <li class="list-group-item">
                    <div class="row">
                    	<div class="col-lg-6">
                        Company Name<br>
                        Job Name
                        </div>
                        <div class="col-lg-6">
                        <br>
                        deadline - [apply link]
                        </div>
                    </div>
                    </li>
                </ul>
            </div>
          </div>
          <div class="tab-pane" id="location">
          	<div class="col-lg-6">
            	<ul class="list-group">
                	<li class="list-group-item">
                    <div class="row">
                    	<div class="col-lg-6">
                        Company Name<br>
                        Job Name
                        </div>
                        <div class="col-lg-6">
                        <br>
                        deadline - [apply link]
                        </div>
                    </div>
                    </li>
                    <li class="list-group-item">
                    <div class="row">
                    	<div class="col-lg-6">
                        Company Name<br>
                        Job Name
                        </div>
                        <div class="col-lg-6">
                        <br>
                        deadline - [apply link]
                        </div>
                    </div>
                    </li>
                    <li class="list-group-item">
                    <div class="row">
                    	<div class="col-lg-6">
                        Company Name<br>
                        Job Name
                        </div>
                        <div class="col-lg-6">
                        <br>
                        deadline - [apply link]
                        </div>
                    </div>
                    </li>
                    <li class="list-group-item">
                    <div class="row">
                    	<div class="col-lg-6">
                        Company Name<br>
                        Job Name
                        </div>
                        <div class="col-lg-6">
                        <br>
                        deadline - [apply link]
                        </div>
                    </div>
                    </li>
                    <li class="list-group-item">
                    <div class="row">
                    	<div class="col-lg-6">
                        Company Name<br>
                        Job Name
                        </div>
                        <div class="col-lg-6">
                        <br>
                        deadline - [apply link]
                        </div>
                    </div>
                    </li>
                    <li class="list-group-item">
                    <div class="row">
                    	<div class="col-lg-6">
                        Company Name<br>
                        Job Name
                        </div>
                        <div class="col-lg-6">
                        <br>
                        deadline - [apply link]
                        </div>
                    </div>
                    </li>
                </ul>
            </div>
            <div class="col-lg-6">
                <ul class="list-group">
                    <li class="list-group-item">
                    <div class="row">
                    	<div class="col-lg-6">
                        Company Name<br>
                        Job Name
                        </div>
                        <div class="col-lg-6">
                        <br>
                        deadline - [apply link]
                        </div>
                    </div>
                    </li>
                    <li class="list-group-item">
                    <div class="row">
                    	<div class="col-lg-6">
                        Company Name<br>
                        Job Name
                        </div>
                        <div class="col-lg-6">
                        <br>
                        deadline - [apply link]
                        </div>
                    </div>
                    </li>
                    <li class="list-group-item">
                    <div class="row">
                    	<div class="col-lg-6">
                        Company Name<br>
                        Job Name
                        </div>
                        <div class="col-lg-6">
                        <br>
                        deadline - [apply link]
                        </div>
                    </div>
                    </li>
                    <li class="list-group-item">
                    <div class="row">
                    	<div class="col-lg-6">
                        Company Name<br>
                        Job Name
                        </div>
                        <div class="col-lg-6">
                        <br>
                        deadline - [apply link]
                        </div>
                    </div>
                    </li>
                    <li class="list-group-item">
                    <div class="row">
                    	<div class="col-lg-6">
                        Company Name<br>
                        Job Name
                        </div>
                        <div class="col-lg-6">
                        <br>
                        deadline - [apply link]
                        </div>
                    </div>
                    </li>
                    <li class="list-group-item">
                    <div class="row">
                    	<div class="col-lg-6">
                        Company Name<br>
                        Job Name
                        </div>
                        <div class="col-lg-6">
                        <br>
                        deadline - [apply link]
                        </div>
                    </div>
                    </li>
                </ul>
            </div>
          </div>
        </div>
    </div>
    </div>
</div>
</body>
</html>