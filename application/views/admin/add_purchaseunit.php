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
   				 Purchase Unit <a class="btn btn-xs btn-success pull-right" href="<?php echo site_url("admin/purchase_unit");?>"><i class="glyphicon glyphicon-remove"></i></a>
    		</div>
            <div class="panel-body">
            	<form method="post" role="form" enctype="multipart/form-data">
                	<div class="form-group col-md-8">
                    <label class="forn-control">Company:</label>
                    <select type="text" class="form-control" id="unit_type" name="company_type">
                    <option value="-1">Select Company</option>
					<?php foreach($company as $companies):?>
                    <option value="<?php echo $companies->company_id;?>"><?php echo $companies->company_name;?></option>
                    <?php endforeach;?>
                    </select>
                    </div>
                    <div class="form-group col-md-8">
                    <label class="forn-control">Purchase Unit Type:</label>
                    <select type="text" class="form-control" id="unit_type" name="purchase_unit_type">
                    <option value="-1">Select Unit</option>
					<?php foreach($service_type as $servicetype):?>
                    <option value="<?php echo $servicetype->service_type;?>"><?php echo $servicetype->service_name;?></option>
                    <?php endforeach;?>
                    </select>
                    </div>
                    <div class="form-group col-md-8">
                    <label class="forn-control">Purchase Units:</label>
                    <input type="text" class="form-control" id="purchased_unit" name="purchased_unit">
                    </div>
                    <div class="form-group col-md-8">
                    <label class="forn-control">Payment Mode:</label>
                    <select type="text" class="form-control" id="payment_mode" name="payment_mode">
                    <option value="By Cash">By Cash</option>
                    <option value="By Cheque">By Cheque</option>
                    <option value="By Online">By Online</option>
                    </select>
                    </div>
                    <div class="form-group col-md-8">
                    <label class="forn-control">Purchase Via:</label>
                    <select type="text" class="form-control" id="via" name="payment_via">
					<option>Select Via</option>
                    <option>In Person</option>
                    <option>Bank</option>
                    <option>Visa</option>
                    </select>
                    </div>
                    <div class="form-group col-md-8">
                    <label class="forn-control">Purchase Reference:</label>
                    <input type="text" class="form-control" id="reference" name="payment_reference">
                    </div>
                    <div class="form-group col-md-8">
                    <label class="forn-control">Purchase Date:</label>
                    <input type="text" class="datepicker form-control" id="date" name="payment_date">
                    </div>
                    <div class="form-group col-md-8">
                    <label class="forn-control">Purchase Entry By:</label>
                    <input type="text" class="form-control" id="entry_by" name="entry_by">
                    </div>
                    <div class="form-group col-md-8">
                    <label class="forn-control">Remarks:</label>
                    <textarea class="form-control" id="remarks" name="remarks"></textarea>
                    </div>
                	<div class="form-group col-md-8">
                    </div>
                    <div class="form-group col-md-4">
                    <input type="submit" class="btn btn-success pull-right" value="submit">
                	</div>
                </form>
            </div>		
		</div>
	</div>
</div>