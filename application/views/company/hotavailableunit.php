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
			<div class="col-lg-9">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="h3">Available Unit</div>
						<table class="table table-striped">
                        	<tr><?php foreach($company as $companies):?><td><?php echo "you have"." ".$companies->purchased_unit." "."available unit left"?></td><?php endforeach;?></tr>
                        </table>
                    </div>
    			</div>
        	</div>
			<?php $this->load->view("company/companynav");?>
        </div>
	</div>
</body>
