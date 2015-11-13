<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Welcome to Administration Zone</title>
<link rel="stylesheet" type="text/css" href="../../../css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../../../css/bootstrap-theme.css">
<?php $this->load->view("admin/includes/header"); ?>
</head>
<body>
<?php $this->load->view("admin/includes/menu");?>
<div class="row" > 
<div class="container">
<div class="panel panel-default">
	<div class="panel-heading">
    List of Company <a class="btn btn-xs btn-success pull-right" href="<?php echo site_url("admin/company/add");?>"><i class="glyphicon glyphicon-plus"></i></a>
    </div>
    <div class="panel-body">
    <table class="table table-striped">
	<tr>
    	<td>Sn</td>
        <td>Name</td>
        <td>Industry</td>
        <td>Company Contact</td>
        <td>size</td>
        <td>Ownership</td>
        <td>Comapny Head</td>
        <td width="120">Action</td>
    </tr>
    <?php $sn=0; foreach($companys as $company): $sn++;?>
    <tr>
    	<td><?php echo $sn;?></td>
        <td><?php echo $company->company_name;?></td>
        <td><?php echo $company->Industry->industry_name;?></td>
        <td><?php echo $company->CompanyContact->company_contact_first_name; echo " ";
        	echo $company->CompanyContact->comapny_contact_middle_name; echo " ";
        	echo $company->CompanyContact->comapny_contact_last_name;?></td>
        <td><?php echo $company->size_id;?> </td>
        <td><?php echo $company->Ownership->ownership_name;?> </td>
        <td><?php echo $company->company_head_id;?> </td>
        <td><a class="btn btn-primary btn-sm" href="<?php echo site_url("admin/company/delete");?>"><i class="glyphicon glyphicon-trash"></i></a>
             <a class="btn btn-primary btn-sm" href="<?php echo site_url("admin/company/edit");?>"><i class="glyphicon glyphicon-pencil"></i></a></td>
                                    
    </tr>
    <?php endforeach; ?>
</table>
    </div>
</div>

</div>
</div>
<body>
</body>
</html>