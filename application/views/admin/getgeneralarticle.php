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
    List of Article <a class="btn btn-xs btn-success pull-right" href="<?php echo site_url("admin/general_article/addarticle");?>"><i class="glyphicon glyphicon-plus"></i></a>
    </div>
    <div class="panel-body">
    <table class="table table-striped datatable" id="datatable">
	<thead>
    <tr>
    	<td>Sn</td>
        <td>Article Title</td>
        <td>Article Text</td>
        <td>Posted By</td>
        <td>Status</td>
        <td width="120">Action</td>
    </tr>
    </thead>
    <tbody>
    <?php $a=0;foreach($article as $Article):$a++;?>
    <tr>
    	<td><?php echo $a?></td>
        <td><?php echo $Article->general_article_title;?></td>
        <td><?php echo $Article->general_article_text;?></td>
        <td><?php echo $Article->posted_by;?></td>
        <td><?php echo $Article->status;?></td>
        <td><a class="btn btn-primary btn-sm" href="<?php echo site_url("admin/general_article/delete/".$Article->general_article_id);?>"><i class="glyphicon glyphicon-trash"></i></a>
             <a class="btn btn-primary btn-sm" href="<?php echo site_url("admin/general_article/edit/".$Article->general_article_id);?>"><i class="glyphicon glyphicon-pencil"></i></a></td>
    </tr>
    <?php endforeach;?>
    </tbody>
    </table>
    </div>
</div>
</div>
</div>
    