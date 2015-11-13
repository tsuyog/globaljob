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
		<div class="col-lg-9"><!-- main profile of company or content -->
			<div class="panel panel-default">
				<div class="panel-body">
					
					<div class="h3"> Profile</div>
					 
					<table class="table table-striped">
							<tr><td><?php echo $companies->company_name;?></td></tr>
							<tr><td><?php if(!$companies->Industry=="")echo $companies->Industry->industry_name;?></td></tr>
							<tr><td><?php if(!$companies->Functions=="")echo $companies->Functions->function_name;?></td></tr>
							<tr><td><?php if(!$companies->Ownership=="")echo $companies->Ownership->ownership_name;?></td></tr>
							<tr><td><?php echo $companies->Size;?></td></tr>
							<tr><td><?php echo $companies->street_address;?></td></tr>
							<tr><td><?php echo $companies->Head->company_head_first_name; echo " "; echo $companies->Head->company_head_middle_name; echo " "; echo $companies->Head->company_head_last_name;?></td></tr>
					</table>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="h3"> Contact Person</div>
					<table class="table table-striped">
						
							<tr class="col-md-4"><td>Contact:<?php echo " "; echo $companies->Contact->company_contact_first_name; echo " "; echo $companies->Contact->company_contact_middle_name; echo " "; echo $companies->Contact->company_contact_last_name; ?></td></tr>
							<tr class="col-md-4"><td>Sex:<?php echo " "; echo $companies->Contact->company_contact_sex;?></td></tr>
							<tr class="col-md-4"><td>Primary Contact:<?php echo " "; echo $companies->Contact->company_phone_one;?></td></tr>
							<tr class="col-md-4"><td>Alternate Contact:<?php echo " "; echo $companies->Contact->company_phone_two;?></td></tr>
							<tr class="col-md-4"><td>Email:<?php echo " "; echo $companies->Contact->company_email;?></td></tr>
							<tr class="col-md-4"><td>Website Url:<?php echo " "; echo $companies->Contact->company_url;?></td></tr>
					</table>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-body">
					<div class="h3">Organization Profile</div>
					<div class="panel-default backgroundgray">
						<pre> <?php echo $companies->company_profile;?></pre>
					</div>
				</div>
			</div>
		</div><!-- closing of main right panel -->
		<?php $this->load->view("company/companynav");?>
	</div>
	</div>
</body>
</html>