<style>
.search-form-container
{
	margin: 8px 0px;	
}
</style>
<?php $this->load->helper("db");$functions = getFunctionsForSearch();?>
<nav class="navbar navbar-green">
<div class="container">
<div class="col-lg-12">
	<ul class="nav navbar-nav col-md-7">
    	<li><a href="<?php echo site_url("")?>">Home</a></li>
    	<li><a href="#" data-toggle="modal" data-target="#profile"> Job Search</a></li>
        <div class="modal fade col-md-12" id="profile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        	<div class="modal-dialog">
                                <div class="modal-content">
                                	<div class="modal-body">
                                        <input type="text" id="item" class="form-control" placeholder="Search Item: Programmer, Manager">
                                        </div>
                                    <div class="modal-footer">
                                    <a href="#" class="label label-success gobuttonn go">Go</a>
                                	</div>
                                </div>
                        	</div>
                        </div>
    	<li><a href="<?php echo site_url("AboutUs/view")?>">About Us</a></li>
    	<li><a href="<?php echo site_url("Contact")?>">Contact</a></li>
    	<li><a href="<?php echo site_url("Help/view")?>">Help</a></li>
    </ul>
    <div class="search-form-container col-md-5 pull-right" >            
   <form name="quick_search" method="post" action="<?php echo site_url("search"); ?>">
        <div class="input-group">
                <input type="text" class="form-control" style="margin-right:10px;" name="keyword">
                <div class="input-group-btn" style="margin-right:5px">
                
                <select class="btn btn-success" name="industry_type">
                <option value="-1">Select Category</option>
                <?php foreach ($functions as $function):?>
                <option value="<?php echo $function->function_id;?>"><?php echo $function->function_name;?></option>
                
                <?php endforeach;?>
                </select>
                
                </div>
                <input type="submit" class="btn btn-success"  name="submit" value="Go!" />
                
                </div>
    </form>
<script>
    $(document).ready(function(e) {
        $('.go').click(function(e) {
            var keyword = $('#item').val();
			$.ajax( { 
				url:"<?php echo site_url("search");?>",
				cache:false,
				type:'POST',
				data:{item:keyword},
				success: function() {}
			});
        });
    });       
</script>               
</div>
</div>

</div>
</nav>
