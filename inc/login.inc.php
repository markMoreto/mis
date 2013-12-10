<?php
	session_start();

	include("connection.inc.php");
	include("../func/login.func.php");

	$_POST['username'] = "admin";
	$_POST['password'] = "admin";
	$_POST['checkbox'] = true;
	
	if( isset( $_POST['username'] ) && isset( $_POST['password'] ) ){

		//intialize
		$username = trim($_POST['username']);
		$password = trim($_POST['password']);
		$checkbox = $_POST['checkbox'];
		$returnResult = "nothing happened";
		$errors =  array();

		// Precautions of Variables
		$username = strip_tags( $_POST['username'] );
		$password = strip_tags( $_POST['password'] );

		// We'll check and see if any of the required fields are empty.
		// We use an array to store the required fields.
		$required = array( 'Username' => 'username', 'Password' => 'password' );

		// Loops through each required $_POST value
		// Checks to ensure it is not empty.
		foreach ( $required as $key => $value ) {
			if ( empty( $_POST[$value] ) )
				$errors[] = $key . ' cannot left blank. ';
			else
				continue;
		}

		// Loops through each required $_POST value
		// Checks to ensure it is not Letters and numbers.
		foreach ( $required as $key => $value ) {
			if ( !preg_match( " ~[a-zA-Z0-9]~ ", $_POST[$value] ) )
				$errors[] = $key . ' only allowed letters and numbers. ';
			else
				continue;
		}
		
		$result = _confirmUser($username,$password);

		if(empty($result) || !empty($errors)){
			$returnResult = "failed";
		}

		if ( empty( $errors ) ) {

			if( isset($_SESSION['username']) && $_SESSION['username'] != $username){
				if( isset($checkbox) && $checkbox == "true" ){
					$_SESSION['username'] = $username;
					setcookie("MIS-auth", $_SESSION['username'], time()+3600*24*30, "/");
				}
			}

			if($result["ua_level"] == 'A'){
				$returnResult = "app/admin/?user=".$result["ua_id"]."&page=dashboard";
				$_SESSION['userpage'] = "Admin Page";
				$_SESSION['username'] = $username;
				$dbconnection->mis->trail->update(array('ua_id' => $result["ua_id"]), array('$set' => array("time_in" => date("Y-m-d G:i:s"))));
			}else{
				$returnResult = "failed after ua_level";
			}
		}

		die($returnResult);
	} else {
		die("Oooppsss.. accessing this file directly is not allowed.");
	}
?>