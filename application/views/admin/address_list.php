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
    List of Countries <a class="btn btn-xs btn-success pull-right" href="<?php echo site_url("admin/address/addCountry");?>"><i class="glyphicon glyphicon-plus"></i></a>
    </div>
    <div class="panel-body">
    <table class="table table-striped datatable" id="datatable">
	<thead>
    <tr>
    	<td>Sn</td>
        <td>Country Name</td>
        <td width="120">Action</td>
    </tr>
    </thead>
    <tbody>
	<?php $sn=0; foreach($country as $countries): $sn++;?>
    <tr>
    	<td><?php echo $sn;?></td>
        <td><?php echo $countries->country;?></td>
        <td><a class="btn btn-primary btn-sm" href="<?php echo site_url("admin/address/delete/".$countries->country_id);?>"><i class="glyphicon glyphicon-trash"></i></a>
             <a class="btn btn-primary btn-sm" href="<?php echo site_url("admin/address/edit/".$countries->country_id);?>"><i class="glyphicon glyphicon-pencil"></i></a></td>
                                    
    </tr>
    <?php endforeach; ?>
	</tbody>
    </table>
    </div>
</div><!-- end of default panel -->
<div class="panel panel-default"><!-- opening of seconf default panel -->
	<div class="panel-heading">
    List of State or Zone <a class="btn btn-xs btn-success pull-right" href="<?php echo site_url("admin/address/addState");?>"><i class="glyphicon glyphicon-plus"></i></a>
    </div>
    <div class="panel-body"><!-- opening body of panel -->
    	<table class="table table-striped datatable" id="datatable">
		<thead>
        <tr>
    		<td>Sn</td>
        	<td>Country Name</td>
        	<td>States or Zone</td>
        	<td width="120">Action</td>
    	</tr>
        </thead>
    	<tbody>
		<?php $sn=0; foreach($state as $states): $sn++;?>
    	<tr>
    		<td><?php echo $sn;?></td>
        	<td><?php if($states->Country!=array())echo $states->Country->country;?></td>
        	<td><?php if($states!=array())echo $states->state_name; ?></td>
        	<td><a class="btn btn-primary btn-sm" href="<?php echo site_url("admin/address/delete/".$states->Country->country_id."/".$states->state_id);?>"><i class="glyphicon glyphicon-trash"></i></a>
             <a class="btn btn-primary btn-sm" href="<?php echo site_url("admin/address/edit/".$states->Country->country_id."/".$states->state_id);?>"><i class="glyphicon glyphicon-pencil"></i></a></td>                        
    	</tr>
    	<?php endforeach; ?>
		</tbody>
        </table>
    	
    </div><!-- opening body of panel -->
	
</div><!-- end of second default panel -->
<div class="panel panel-default"><!-- opening of third default panel -->
	<div class="panel-heading">
    	List of City <a class="btn btn-xs btn-success pull-right" href="<?php echo site_url("admin/address/addCity");?>"><i class="glyphicon glyphicon-plus"></i></a>
    </div>
    
     <div class="panel-body"><!-- opening body of panel -->
    	<table class="table table-striped datatable" id="datatable">
		<thead>
        <tr>
    		<td>Sn</td>
        	<td>Country Name</td>
        	<td>States or Zone</td>
        	<td>City</td>
        	<td width="120">Action</td>
    	</tr>
        </thead>
        <tbody>
    	<?php $sn=0; foreach($city as $cities): $sn++;?>

    	<tr>
    		<td><?php echo $sn;?></td>
        	<td><?php if($cities->Country!=array()) echo $cities->Country->country;?></td>
        	<td><?php if($cities->State!=array())echo $cities->State->state_name; ?></td>
        	<td><?php if($cities!=array())echo $cities->city_name;?></td>
            <td><a class="btn btn-primary btn-sm" href="<?php echo site_url("admin/address/delete/".$cities->Country->country_id."/".$cities->State->state_id."/".$cities->city_id);?>"><i class="glyphicon glyphicon-trash"></i></a>
             <a class="btn btn-primary btn-sm" href="<?php echo site_url("admin/address/edit/".$cities->Country->country_id."/".$cities->State->state_id."/".$cities->city_id);?>"><i class="glyphicon glyphicon-pencil"></i></a></td>                        
    	</tr>
    	<?php endforeach; ?>
		</tbody>
        </table>
    	
    </div><!-- opening body of panel -->
    
</div><!-- end of third default panel -->
</div>
</div>
<body>
</body>
</html>