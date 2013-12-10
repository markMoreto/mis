<?php 
	session_start();
	
	if (!isset($_SESSION['username'])) {
		header("location: ../../");
	}
	
	include '../../inc/connection.inc.php';
	
	//select collection [table]
	$db = $dbconnection->mis;
	$collection = $db->ua;
	
	$query = array('ua_user_name' => $_SESSION['username']);
	$cursor = $collection->find( $query );
	
	while ( $cursor->hasNext() ){
	    $accountdata = $cursor->getNext();
		$db->trail->update(array('ua_id' => $accountdata["ua_id"]), array('$set' => array("time_out" => date("Y-m-d G:i:s"))));
		session_destroy();
		header("location: ../../");		
		exit();
	}
	
?>