<?php 

	session_start();
	
	if (!isset($_SESSION['username'])) {
		header("location: ../../");
	}

	include("../../../inc/connection.inc.php");

 	if(!$dbconnection){
		die("No database connection");
 	}
	
	//die(var_dump($_POST['materials']));
	
	$dbmis = $dbconnection->mis;
	 
	//update the inventory
	$tbMATERIAL = $dbmis->material;
	$tbINVENTORY = $dbmis->inventory;
	$inventoryid = new MongoId();
	for ($i=0; $i < count($_POST['materials']); $i++) { 
		$get = $tbMATERIAL->find(array("material_id" => new MongoId($_POST['materials'][$i]['material_id'])));
		if($get->hasNext()){
			$result = $get->getNext();
			$newQty = $result['quantity'] - $_POST['materials'][$i]['quantity'];
			
			$tbMATERIAL->update(
				array("material_id" => new MongoId($_POST['materials'][$i]['material_id'])),
				array(
					'$set' => array("quantity" => $newQty)
				));
				
			$tbINVENTORY->insert(array(
			    "action"=> "out",
				"date_stamp"=> date("Y-m-d H:m:i"),
		  		"inventory_id"=> $inventoryid,
		  		"material_id"=> new MongoId($_POST['materials'][$i]['material_id'])
			));
		}
	}
	
	 
	$tbtimeline = $dbmis->timeline;
	$timelineid = new MongoId();
		
	$tbtimeline->insert(array(
	    "date_end"=> date("Y-m-d",strtotime($_POST['end'])),
		"date_start"=> date("Y-m-d",strtotime($_POST['start'])),
		"dates_in_between" => $_POST['milestone'],
  		"remarks"=> "",
  		"timeline_id"=> $timelineid
	));
	 
	$tbproject = $dbmis->project;
	$projectid = new MongoId();
	
	$tbproject->insert(array(
	  "budget"=> $_POST['budget'],
	  "client_id"=> new MongoId($_POST['cli']),
	  "engineer_id"=> new MongoId($_POST['engr']),
	  "project_address"=> $_POST['address'],
	  "project_id"=> $projectid,
	  "project_materials"=> $_POST['materials'],
	  "project_name"=> $_POST['name'],
	  "remarks"=> $_POST['comment'],
	  "status"=> $_POST['status'],
	  "team_id"=> $_POST['team'],
	  "timeline_id"=> $timelineid
	));
	 
?>