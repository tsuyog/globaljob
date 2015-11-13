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
    Purchase Unit <a class="btn btn-xs btn-success pull-right" href="<?php echo site_url("admin/purchase_unit/insertPurchaseUnit");?>"><i class="glyphicon glyphicon-plus"></i></a>
    </div>
    <div class="panel-body">
    	<table class="table table-striped datatable" id="datatable">
        	<thead>
            <tr><th>S.N</th>
            	<th>Unit Type</th>
                <th>Unit</th>
                <th>Company Name</th>
                <th>Payment Mode</th>
                <th>Payment Reference</th>
                <th>Payment Date</th>
                <th>Entry By</th>
                <th>Remarks</th>
            	<th>Action</th>
            </tr>
        	</thead>
			<tbody>
			<?php $a=0;foreach($Purchaseunit as $purchaseunit):$a++;?>
            <tr><td><?php echo $a;?></td>
            	<td><?php echo $purchaseunit->service_type->service_name;?></td>
                <td><?php echo $purchaseunit->purchased_unit;?></td>
                <td><?php echo $purchaseunit->company->company_name;?></td>
                <td><?php echo $purchaseunit->payment_mode;?></td>
                <td><?php echo $purchaseunit->payment_reference;?></td>
                <td><?php echo $purchaseunit->payment_date;?></td>
                <td><?php echo $purchaseunit->entry_by;?></td>
                <td><?php echo $purchaseunit->remarks;?></td>
            	<td><a class="btn btn-primary btn-sm" href="<?php echo site_url("admin/purchase_unit/edit/".$purchaseunit->purchase_unit_id);?>"><i class="glyphicon glyphicon-pencil"></i></a></td>
            </tr>
			<?php endforeach;?>
        	</tbody>
        </table>
    </div>
</div>
</div>
</div>