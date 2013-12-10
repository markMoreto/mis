<?php

include('systemBlock.func.php');

//function for confirming the user
function _confirmUser($username,$password){
	global $dbconnection;

	$accountExist = "account do not exist";

	//select collection [table]
	$db = $dbconnection->mis;
	$collection = $db->ua;

	$vars = array($username, $password);

	foreach($vars as $var){
		strip_tags($var);
	}

	//set password in encrypted format
	$vars[1] = md5($var[1]);

    $query = array('ua_user_name' => $vars[0], 'ua_password' => $vars[1] );
    $cursor = $collection->find( $query );
	
	while ( $cursor->hasNext() ){
	    $accountExist = $cursor->getNext();
	}

	return $accountExist;
}

?>

