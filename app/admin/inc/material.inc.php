<?php 

	session_start();
	
	if (!isset($_SESSION['username'])) {
		header("location: ../../");
	}

	include("../../../inc/connection.inc.php");

 	if(!$dbconnection){
		die("No database connection");
 	}
	
	$tbMATERIAL = $dbconnection->mis->material;
	$tbSUPPLIER = $dbconnection->mis->supplier;
	
	 //sanitation
	 foreach($_POST as $var){
		strip_tags($var);
	 }
	 
	 $dateAdded = date("Y-m-d G:i:s");

	 
	 //validate username existance
	 $checkmaterial = $tbMATERIAL->find(array(
	 	"material_code" => $_POST['code']
	 ));
	 
	 if($checkmaterial->hasNext()){
		die("Sorry but material is already existing. Update it instead.");
	 }
	 
	 $supplierid = "";
	 if(isset($_POST['bname']) && isset($_POST['address'])){

		$checkbname = $tbSUPPLIER->find(array(
	 		"material_code" => $_POST['code']
	 	));
	 
		 if($checkbname->hasNext()){
			die("Sorry but Supplier is already existing. Update it instead.");
		 }


	 	$supplierid = new MongoId();
		
		 $tbSUPPLIER->insert(array(
		  "address"=> $_POST['address'],
		  "name"=> $_POST['bname'],
		  "supplier_id"=> $supplierid
		 ));

	 }

	 if(isset($_POST['supplier'])){
	 	$supplierid = new MongoId($_POST['supplier']);
	 }
	 
	 $materialid = new MongoId();
	 
	 //insert in UA collection
	 $tbMATERIAL->insert(array(
	  "date_added"=> date("Y-m-d H:m:s"),
	  "material_code"=> $_POST['code'],
	  "material_id"=>  $materialid,
	  "name"=> $_POST['name'],
	  "price_of_quantity"=> $_POST['price'],
	  "quantity"=> $_POST['qty'],
	  "remarks"=> $_POST['comment'],
	  "supplier_id"=> $supplierid
	 ));
	 
?>