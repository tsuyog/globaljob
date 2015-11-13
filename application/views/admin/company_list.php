<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Welcome to Administration Zone</title>
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
    <script>
		function deletecompany(alias)
		{
			if(confirm("Are you sure to delete?"))
				window.location.href="<?php echo base_url();?>admin/company/delete/"+alias+".html";
		
		}
	</script>
    <table class="table table-striped datatable" id="datatable">
	<thead>
    <tr>
    	<td>Sn</td>
        <td>Name</td>
        <td>Industry</td>
        <td>Company Contact</td>
        <td>size</td>
        <td>Ownership</td>
        <td>Company Head</td>
        <td width="120">Action</td>
    </tr>
    </thead>
    <tbody>
    <?php $sn=0; foreach($companys as $company): $sn++;?>
    <tr>
    	<td><?php echo $sn;?></td>
        <td><?php echo $company->company_name;?></td>
        <td><?php if ($company->Industry!=array())echo $company->Industry->industry_name;?></td>
        <td><?php if ($company->CompanyContact!=array()){
															echo $company->CompanyContact->company_contact_first_name;
														    echo " ";
															echo $company->CompanyContact->company_contact_middle_name;
															echo " ";
        													echo $company->CompanyContact->company_contact_last_name;
															}
			?> 
        </td>
        <td><?php echo $company->size_id;?> </td>
        <td><?php echo $company->Ownership->ownership_name;?> </td>
        <td><?php echo $company->company_head_id;?> </td>
        <td><a class="btn btn-primary btn-sm" href="#" onClick="deletecompany('<?php echo $company->company_alias; ?>');"><i class="glyphicon glyphicon-trash"></i></a>
             <a class="btn btn-primary btn-sm" href="<?php echo site_url("admin/company/edit/".$company->company_id);?>"><i class="glyphicon glyphicon-pencil"></i></a></td>
                                    
    </tr>
    <?php endforeach; ?>
	</tbody>
    </table>
    </div>
</div>

</div>
</div>
<body>
</body>
</html>