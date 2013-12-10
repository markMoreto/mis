<?php 

//error handler
function _err($var=""){
	if(empty($var)){
		$output = '<p class="error">';
		$output .= "Please Contact the Administrator. <br />";
		$output .= "<code> &raquo; ". mysql_error() . "</code>";
		$output .= '</p>';
		return $output;
	}else{
		$output = '<p class="error">';
		$output .= "Ooooppssss. <br />";
		$output .= "<code> &raquo; ". $var . "</code>";
		$output .= '</p>';
		return $output;
	}
}

#system redirection if the user tries to put the same url in the address which should not be allowed.
function send_404(){
    //lets use the customized error messages.
    header("location: ../404.php");
}


?>
