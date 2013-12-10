<?php

function _checkUnique($var){
	global $conNection;
	
	$q = "SELECT ua_user_name FROM ojaads_reg WHERE ua_user_name = '$var'";
	$p = mysql_query($q,$conNection) or _err();
	$count = mysql_num_rows($p) or _err();
	if($count > 0){
	    return 1;
	}else{
	    return 0;
	}
}
?>
