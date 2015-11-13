<link href='http://fonts.googleapis.com/css?family=Actor' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/bootstrap-theme.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/ui-lightness/jquery-ui-1.10.4.custom.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/font-awesome.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/style.css">
<script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery-ui-1.10.4.custom.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>ckeditor/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>ckeditor/ckeditor/adapters/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.nicescroll.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.validate.js"></script>
<script src="<?php echo base_url();?>js/jquery.Jcrop.min.js"></script>
<script src="<?php echo base_url();?>js/jquery.form.js"></script> 
<script type="text/javascript">
	$(document).ready(function (e) {
		$(".datepicker").datepicker({dateFormat:'yy-mm-dd'});
		$(".ckeditor").ckeditor({
			toolbar:
            [
                ['Bold', 'Italic', 'Underline', '-', 'NumberedList', 'BulletedList', '-']
             ]
		});
		$(".tooltip-example").tooltip({placement: 'bottom',trigger: 'manual', html: true}).tooltip();
		$.clicked=false;
		$(".tooltip-example").on('click',function(){
			if($.clicked)
			{
				$(this).removeClass("fa-minus-square-o").addClass("fa-plus-square-o");
				$(this).tooltip('hide');
				$.clicked=false;
			}
			else
			{
				$(this).removeClass("fa-plus-square-o").addClass("fa-minus-square-o");
				$(this).tooltip('show');$.clicked=true;
			}
			});
		$(".hot-jobs-container").niceScroll({touchbehavior:false,cursorcolor:"#222",cursoropacitymax:0.6,cursorwidth:8});
	  $(".validation_form").validate({
		rules: {
			confirm_password: {
				required: true,
				minlength: 5,
				equalTo: "#password"
			},
		},
		messages: {
			
			confirm_password: {
				required: "Please provide a password",
				minlength: "Your password must be at least 5 characters long",
				equalTo: "Please enter the same password as above"
			}
		}
	});
	});
</script>
