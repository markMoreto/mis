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
	$tbTEAM = $dbconnection->mis->team;
	
	 
	 //sanitation
	 foreach($_POST as $var){
		strip_tags($var);
	 }
	 
	 $_POST['password'] = md5($_POST['password']);
	 
	 $dateAdded = date("Y-m-d G:i:s");
	 
	 //validate username existance
	 $checkusername = $tbUA->find(array(
	 	"ua_user_name" => $_POST['username']
	 ));
	 
	 if($checkusername->hasNext()){
		die("Sorry but username is already existing");
	 }
	 //end of username validation
	 $thisuserid = new MongoId();
	 
	 //insert in UA collection
	 $tbUA->insert(array(
	 	"date_added" => $dateAdded,
	 	"ua_id" => $thisuserid,
	 	"ua_level" => $_POST['level'],
	 	"ua_password" => $_POST['password'],
	 	"ua_user_name" => $_POST['username']
	 ));
	 
	  //insert	
	 $tbPROFILE->insert(array(
		  "address" => $_POST['address'],
		  "birth_date"=> date("Y-m-d",strtotime($_POST['dob'])),
		  "contact_number"=> $_POST['phone'],
		  "date_created"=> date("Y-m-d H:m:s"),
		  "first_name"=> $_POST['fname'],
		  "gender"=> $_POST['gender'],
		  "email"=> $_POST['email'],
		  "gov_id"=> array("sss"=> $_POST['sss'],"tin"=>$_POST['tin']),
		  "img_name"=> "",
		  "last_name"=> $_POST['lname'],
		  "marital_status"=> $_POST['status'],
		  "remarks"=> $_POST['comment'],
		  "team_id"=> $_POST['team'],
		  "ua_id"=> $thisuserid
	 ));
?>