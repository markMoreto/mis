<?php 
	session_start();
	
	if (!isset($_SESSION['username'])) {
		header("location: ../../");
	}

	include("../../../inc/connection.inc.php");

 	if(!$dbconnection){
		die("No database connection");
 	}

	$tbUA = $dbconnection->mis->ua;
	$tbPROFILE =  $dbconnection->mis->profile;
	
	//die($_POST['password']);
	//$_POST['password'] = new MongoId($_POST['password']);
	//die("19");
	 //validate username existance
	 $checkusername = $tbUA->find(array("ua_user_name" => $_POST['username']));

	 if($checkusername->hasNext()){
	 	$tmp = $checkusername->getNext();
	 	$userid = $tmp['ua_id'];
		
		if($_POST['password'] != $tmp['ua_password']){
			$tbUA->update(
				array("ua_user_name" => $_POST['username']),
				array(
					'$set' => array(
				 	"ua_level" => $_POST['level'],
				 	"ua_password" => md5($_POST['password']))
				));
		}else{
			$tbUA->update(
				array("ua_user_name" => $_POST['username']),
				array('$set' => array("ua_level" => $_POST['level'])
			));	
		}
	 }else{
	 	die("Sorry but username do not exist");
	 }
	 //$userid
	//die(var_dump($userid));
	$tbPROFILE->update(
		array("ua_id" => $userid),
		array(
			'$set' => array(
		 	"address" => $_POST['address'],
		 	"email" => $_POST['email'],
		  	"contact_number"=> $_POST['phone'],
		  	"first_name"=> $_POST['fname'],
		  	"gender"=> $_POST['gender'],
		  	"gov_id"=> array("sss"=> $_POST['sss'],"tin"=>$_POST['tin']),
		  	"img_name"=> "",
		  	"last_name"=> $_POST['lname'],
		  	"marital_status"=> $_POST['status'],
		  	"remarks"=> $_POST['comment'],
		  	"team_id"=> $_POST['team'])
		)
	);
?>