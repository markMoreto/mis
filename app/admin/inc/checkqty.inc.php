<?php 
	session_start();
	
	if (!isset($_SESSION['username'])) {
		header("location: ../../");
	}

	include("../../../inc/connection.inc.php");

 	if(!$dbconnection){
		die("No database connection");
 	}
	
	$dbmis = $dbconnection->mis;
	/*
	{
	  "date_added": "2013-12-12 23:12:40",
	  "material_code": "steel-wall",
	  "material_id": ObjectId("52aa349cf91dd85019000013"),
	  "name": "Steel Wall",
	  "price_of_quantity": "10000",
	  "quantity": "12",
	  "remarks": "",
	  "supplier_id": ObjectId("52aa349cf91dd85019000011")
	}
	*/
	$materialid = new MongoId($_GET['material_id']);
	$get = $dbmis->material->find(array("material_id" => $materialid));
	if($get->hasNext()){
		$result = $get->getNext();
		
		die($result['quantity']);
	}
?>