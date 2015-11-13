<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/bootstrap-theme.css">
<script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery-ui-1.10.4.custom.min"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>ckeditor/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>ckeditor/ckeditor/adapters/jquery.js"></script>
<script type="text/javascript">
	$(document).ready(function (e) {
		$(".datepicker").datepicker();
		$(".ckeditor").ckeditor({
			toolbar:
            [
                ['Bold', 'Italic', 'Underline', '-', 'NumberedList', 'BulletedList', '-']
             ]
		});
	  
	});
</script>
