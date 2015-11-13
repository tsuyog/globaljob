<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Welcome to Administration Zone</title>
<?php $this->load->view("admin/includes/header"); ?>
</head>
<body>
<?php $this->load->view("admin/includes/menu");?>
<div class="row">
	<div class="container">
    	<div class="col-lg-12">
        	<div class="panel panel-default">
            	<div class="panel-heading">
                	Edit Article <a class="pull-right btn btn-primary btn-sm" href="<?php echo site_url("admin/services");?>"><i class="glyphicon glyphicon-remove-circle"></i></a>
                </div>
                <div class="panel-body">
                <form class="form-horizontal" role="form" method="post" action="">
                    
                    <div class="form-group">
                    	<label for="article_title" class="col-sm-2 control-label">Services Title</label>
                        <div class="col-sm-8">
                        <input type="text" class="form-control" name="services_title" id="services_title" value="<?php echo $services->services_title;?>">
                        </div>
                    </div>
                    <div class="form-group">
                    	<label for="services_text" class="col-sm-2 control-label">Text</label>
                        <div class="col-sm-8">
                        <textarea class="form-control" name="services_text" id="services_text"><?php echo $services->services_text;?></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                    	<div class="col-sm-offset-2 col-sm-10">
                        	<button  type="submit" class="btn btn-default">Edit</button>
                        </div>
                    </div>
                </form>
                </div>
			</div>
		</div>
	</div>
</div>