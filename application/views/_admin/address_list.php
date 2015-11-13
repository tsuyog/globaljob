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
    List of Countries <a class="btn btn-xs btn-success pull-right" href="<?php echo site_url("admin/address/addCountry");?>"><i class="glyphicon glyphicon-plus"></i></a>
    </div>
    <div class="panel-body">
    <table class="table table-striped">
	<tr>
    	<td>Sn</td>
        <td>Country Name</td>
        <td width="120">Action</td>
    </tr>
    <?php $sn=0; foreach($countries as $country): $sn++;?>
    <tr>
    	<td><?php echo $sn;?></td>
        <td><?php echo $country->country;?></td>
        <td><a class="btn btn-primary btn-sm" href="<?php echo site_url("admin/address/delete/".$country->country_id);?>"><i class="glyphicon glyphicon-trash"></i></a>
             <a class="btn btn-primary btn-sm" href="<?php echo site_url("admin/address/edit/".$country->country_id);?>"><i class="glyphicon glyphicon-pencil"></i></a></td>
                                    
    </tr>
    <?php endforeach; ?>
</table>
    </div>
</div><!-- end of default panel -->
<div class="panel panel-default"><!-- opening of seconf default panel -->
	<div class="panel-heading">
    List of State or Zone <a class="btn btn-xs btn-success pull-right" href="<?php echo site_url("admin/address/addState");?>"><i class="glyphicon glyphicon-plus"></i></a>
    </div>
    <div class="panel-body"><!-- opening body of panel -->
    	<table class="table table-striped">
		<tr>
    		<td>Sn</td>
        	<td>Country Name</td>
        	<td>States or Zone</td>
        	<td width="120">Action</td>
    	</tr>
    	<?php $sn=0; foreach($states as $state): $sn++;?>
    	<tr>
    		<td><?php echo $sn;?></td>
        	<td><?php echo $state->Country->country;?></td>
        	<td><?php echo $state->state_name; ?></td>
        	<td><a class="btn btn-primary btn-sm" href="<?php echo site_url("admin/address/delete/".$state->Country->country_id."/".$state->state_id);?>"><i class="glyphicon glyphicon-trash"></i></a>
             <a class="btn btn-primary btn-sm" href="<?php echo site_url("admin/address/edit/".$state->Country->country_id."/".$state->state_id);?>"><i class="glyphicon glyphicon-pencil"></i></a></td>                        
    	</tr>
    	<?php endforeach; ?>
		</table>
    	
    </div><!-- opening body of panel -->
	
</div><!-- end of second default panel -->
<div class="panel panel-default"><!-- opening of third default panel -->
	<div class="panel-heading">
    	List of City <a class="btn btn-xs btn-success pull-right" href="<?php echo site_url("admin/address/addCity");?>"><i class="glyphicon glyphicon-plus"></i></a>
    </div>
    
     <div class="panel-body"><!-- opening body of panel -->
    	<table class="table table-striped">
		<tr>
    		<td>Sn</td>
        	<td>Country Name</td>
        	<td>States or Zone</td>
        	<td>City</td>
        	<td width="120">Action</td>
    	</tr>
    	<?php $sn=0; foreach($cities as $city): $sn++;?>

    	<tr>
    		<td><?php echo $sn;?></td>
        	<td><?php echo $city->Country->country;?></td>
        	<td><?php echo $city->State->state_name; ?></td>
        	<td><?php echo $city->city_name; ?></td>
        	<td><a class="btn btn-primary btn-sm" href="<?php echo site_url("admin/address/delete/".$city->Country->country_id."/".$city->State->state_id."/".$city->city_id);?>"><i class="glyphicon glyphicon-trash"></i></a>
             <a class="btn btn-primary btn-sm" href="<?php echo site_url("admin/address/edit/".$city->Country->country_id."/".$city->State->state_id."/".$city->city_id);?>"><i class="glyphicon glyphicon-pencil"></i></a></td>                        
    	</tr>
    	<?php endforeach; ?>
		</table>
    	
    </div><!-- opening body of panel -->
    
</div><!-- end of third default panel -->
</div>
</div>
<body>
</body>
</html>