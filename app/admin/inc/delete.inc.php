<?php

	session_start();
	
	if (!isset($_SESSION['username'])) {
		header("location: ../../");
	}

	include("../../../inc/connection.inc.php");

 	if(!$dbconnection){
		die("No database connection");
 	}

 	$db = $dbconnection->mis;
	
	if(!isset($_POST) || !isset($_POST['tables']) || !isset($_POST['cols']) || !isset($_POST['match'])){
		die("values was not set");
	}

	//sanitation
	//foreach($_POST as $var){
	//	strip_tags($var);
	//}

	//die(var_dump($db->$_POST['tables']));

	//single table
	if(gettype($_POST['tables']) == "string"){
		$table = $db->$_POST['tables'];
		$match = new MongoId($_POST['match']);

		$result = $table->find(array((string)$_POST['cols'] => $match));

		//die(var_dump(array((string)$_POST['cols'] => $match)));

		if($result->hasNext()){
			$db->$_POST['tables']->remove(array((string)$_POST['cols'] => $match));
			die("success");
		}else{
			die("Cannot find id you want to delete in database");
		}
	}

	//multiple tables
	if(gettype($_POST['tables']) == "array"){

	}

	die("nothing happened");
?>