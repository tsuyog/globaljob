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
                        	<div class="panel-default">
                            	<div class="panel-body backgroundgray"><?php //testArray($temp); die; ?>
                                <?php if($temp==array()){?>
                                	<div class="col-md-12">
                                    <div class="decor">You do not have prepared you Responder Template</div>
                                       <form action="" method="post" role="form" enctype="multipart/form-data">
                                         <textarea class="ckeditor" name="createtemplate" id="template"> </textarea> 
                                        <div class="col-md-3 pull-right">
                                        <button type="submit" name="save" class="pull-right btn btn-success" style="margin-top:5px;" >Save</button>
                                        </div>
                                        </form>
                                    </div>
                                    <?php } 
									else {?>
                                    	<div class="decor">Your Responder Template</div>
                                        	<form action="" method="post" role="form" enctype="multipart/form-data">
                                         <textarea class="ckeditor" name="template" id="template"><?php echo $temp->template;?> </textarea> 
                                        <div class="col-md-3 pull-right">
                                        <button type="submit" name="update" class="pull-right btn btn-success" style="margin-top:5px;" >Update</button>
                                        </div>
                                        </form>
                                    <?php } ?>
                                </div>
                            </div>
                        
					</div>
    			</div>
        	</div>
			<?php $this->load->view("company/companynav");?>
        </div>
	</div>
</body>