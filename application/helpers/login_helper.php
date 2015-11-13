<?php
function isLoggedIn()
{
	$CI=& get_instance();
	if($CI->session->userdata('admin_logged')=="true"):
		return true;
	else:
		redirect("admin/login");
		return false;
	endif;	
}
function checkLoginState()
{
	$CI=& get_instance();
	if($CI->session->userdata('LoggedIn')=="true"):
		return true;
	else:
		
		return false;
	endif;		
}
