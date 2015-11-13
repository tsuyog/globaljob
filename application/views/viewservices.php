<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Company Profile</title>
</head>
<body>
	<?php $this->load->view("include-site-header"); ?>
	<?php $this->load->view("menu"); ?>
    <div class="container site-body">
		<div class="row">
            <div class="panel panel-default backgroundgray">
            	<div class="panel-body">
                	<div class="look decor">Services</div>
                    <div class="decor">
                    <pre>
                    <?php echo $services->services_text;?>
                    </pre>
                    </div>
                    <div class="bestregards backgroundgray">
                    	<pre>Global Jobs </pre>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>