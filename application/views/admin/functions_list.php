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
                	List of Functions <a class="pull-right btn btn-primary btn-sm" href="<?php echo site_url("admin/functions/add");?>"><i class="glyphicon glyphicon-plus-sign"></i></a>
                </div>
                <div class="panel-body">
                	<table class="table table-striped datatable" id="datatable">
                    	<thead>
                        	<tr>
                            	<td width="20">Sn</td>
                                <td>Function Name</td>
                                <td width="120">Action</td>
                            </tr>
                        </thead>
                        <tbody>
                        <?php $a=0; foreach($Functions as $Function): $a++;?>
                        	<tr>
                            	<td><?php echo $a; ?></td>
                                <td><?php echo $Function->function_name; ?></td>
                                <td><a class="btn btn-primary btn-sm" href="<?php echo site_url("admin/functions/delete/".$Function->function_id);?>"><i class="glyphicon glyphicon-trash"></i></a>
                                	<a class="btn btn-primary btn-sm" href="<?php echo site_url("admin/functions/edit/".$Function->function_id);?>"><i class="glyphicon glyphicon-pencil"></i></a>
                                    </td>
                                                                                            
                            </tr>
                        <?php endforeach; ?>
                        
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>