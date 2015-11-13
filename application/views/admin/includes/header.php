<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/bootstrap-theme.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/custom/jquery-ui-1.10.4.custom.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>datatables/css/jquery.dataTables.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>datatables/css/demo_table_jui.css">
<script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery-ui-1.10.4.custom.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>ckeditor/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>ckeditor/ckeditor/adapters/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>datatables/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
	$(document).ready(function (e) {
		$(".datepicker").datepicker({dateFormat:'yy-mm-dd'});
		$(".ckeditor").ckeditor({
			toolbar:
            [
                ['Bold', 'Italic', 'Underline', '-', 'NumberedList', 'BulletedList', '-']
             ]
		});
	  $('.datatable').dataTable({
		  "bSort": false,
		 "bJQueryUI": true,  
	  });
	});
	var tableToExcel = (function() {
	  var uri = 'data:application/vnd.ms-excel;base64,'
		, template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--></head><body><table>{table}</table></body></html>'
		, base64 = function(s) { return window.btoa(unescape(encodeURIComponent(s))) }
		, format = function(s, c) { return s.replace(/{(\w+)}/g, function(m, p) { return c[p]; }) }
	  return function(table, name) {
		if (!table.nodeType) table = document.getElementById(table)
		var ctx = {worksheet: name || 'Worksheet', table: table.innerHTML}
		window.location.href = uri + base64(format(template, ctx))
	  }
	})()
</script>
