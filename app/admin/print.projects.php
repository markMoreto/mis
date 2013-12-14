<?php 
	session_start();
	$name = basename($_SERVER['REQUEST_URI'],".php"); 
	if (!isset($_SESSION['username'])) {
		header("location: ../../");
	}
	
	include '../../inc/connection.inc.php';
	
	if(!isset($dbconnection)){
		die("No database connection");
	}
	
	
	if(!isset($_POST) || !isset($_POST['project_id'])){
		die("No data to print");
	}

	$dbmis = $dbconnection->mis;
?>

<!DOCTYPE html>
<html lang="en">
	
<head>
		<meta charset="utf-8" />
		<title>PHILCONSPECS - Project Report</title>

		<meta name="description" content="" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<!-- basic styles -->

		<link href="../../assets/css/bootstrap.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="../../assets/css/font-awesome.min.css" />

		<!--[if IE 7]>
		  <link rel="stylesheet" href="../../assets/css/font-awesome-ie7.min.css" />
		<![endif]-->

		<!-- page specific plugin styles -->

		<!-- fonts -->

		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />

		<!-- ace styles -->

		<link rel="stylesheet" href="../../assets/css/ace.min.css" />
		<link rel="stylesheet" href="../../assets/css/ace-rtl.min.css" />
		<link rel="stylesheet" href="../../assets/css/ace-skins.min.css" />

		<!--[if lte IE 8]>
		  <link rel="stylesheet" href="../../assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->

		<script src="../../assets/js/ace-extra.min.js"></script>

		<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->

		<!--[if lt IE 9]>
		<script src="../../assets/js/html5shiv.js"></script>
		<script src="../../assets/js/respond.min.js"></script>
		<![endif]-->

		<link rel="icon" href="../../assets/images/favicon.ico" type="image/x-icon"/>
	</head>

	<body>
		<div class="main-container" id="main-container">

			<div class="main-container-inner">
				<a class="menu-toggler" id="menu-toggler" href="#">
					<span class="menu-text"></span>
				</a>

				<div class="main-content" style="margin-left:0!important;">

					<div class="page-content">
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

								<div class="space-6"></div>

								<div class="row">
									<div class="col-sm-10 col-sm-offset-1">
										<div class="widget-box transparent invoice-box">
											<div class="widget-header widget-header-large">
												<h3 class="grey lighter pull-left position-relative">
													<i><img src="../../assets/images/favicon.ico" height="70"></i>
													PHILCONSPECS - Project Report
												</h3>

												<div class="widget-toolbar no-border invoice-info">
													<span class="invoice-info-label">Date Start:</span>
													<span class="red"><?php echo date("m/d/Y",strtotime($_POST['timeline_start'])); ?></span>

													<br />
													<span class="invoice-info-label">Date End:</span>
													<span class="blue"><?php echo date("m/d/Y",strtotime($_POST['timeline_end'])); ?></span>
													
												</div>

												<div class="widget-toolbar hidden-480">
													<a href="#" onclick="window.print()">
														<i class="icon-print"></i>
													</a>
												</div>
											</div>

											<div class="widget-body">
												<div class="widget-main padding-24">
													<div class="row">
														<div class="col-sm-6">
															<div class="row">
																<div class="col-xs-11 label label-lg label-info arrowed-in arrowed-right">
																	<b>Project Details</b>
																</div>
															</div>

															<div class="row">
																<ul class="list-unstyled spaced">
																	<li>
																		<i class="icon-caret-right blue"></i>
																		Budget:
																		<b class="red" id="budget"><?php echo $_POST['project_budget']; ?></b>
																	</li>

																	<li>
																		<i class="icon-caret-right blue"></i>
																		Project Name:
																		<b class="red"><?php echo $_POST['project_name']; ?></b>
																	</li>

																	<li>
																		<i class="icon-caret-right blue"></i>
																		Project Address location:
																		<b class="red"><?php echo $_POST['project_address']; ?></b>
																	</li>

																	<li>
																		<i class="icon-caret-right blue"></i>
																		Project Status:
																		<b class="red"><?php echo $_POST['project_status']; ?></b>
																	</li>

																	<li class="divider"></li>
																	
																	<li>
																		<i class="icon-caret-right blue"></i>
																		Engineer Assigned:
																		<b class="red"><?php echo $_POST['engr_fullname']; ?></b>
																	</li>

																	<?php
																		if(isset($_POST['project_team'])){
																			$find = $dbmis->team->find(array('team_id' => $_POST['project_team'])); //team is not wrapped in mongo id
																			if($find->hasNext()){
																				$result = $find->getNext();

																				echo "<li>";
																				echo "<i class='icon-caret-right blue'></i>";
																				echo "Team Assigned: ";
																				echo " <b class='red'>".$result['team_name']."</b>";
																				echo "</li>";
																			}
																		}
																	?>

																	<!--
																	<li>
																		<i class="icon-caret-right blue"></i>
																		Team Assigned:
																		<b class="red"></b>
																	</li>
																	-->
																</ul>
															</div>
														</div><!-- /span -->

														<div class="col-sm-6">
															<div class="row">
																<div class="col-xs-11 label label-lg label-success arrowed-in arrowed-right">
																	<b>Client Details</b>
																</div>
															</div>

															<div>
																<ul class="list-unstyled  spaced">
																	<li>
																		<i class="icon-caret-right green"></i>
																		Full Name:
																		<b class="red"><?php echo $_POST['cli_fullname']; ?></b>
																	</li>

																	<li>
																		<i class="icon-caret-right green"></i>
																		Email:
																		<b class="red"><?php echo $_POST['cli_email']; ?></b>
																	</li>

																	<li>
																		<i class="icon-caret-right green"></i>
																		Contact Info:
																		<b class="red">+63 <?php echo $_POST['cli_phone']; ?></b>
																	</li>

																	<li class="divider"></li>
																	
																	<?php
																		if(isset($_POST['cli_remarks']) && !empty($_POST['cli_remarks'])){
																	?>
																	<li>
																		<i class="icon-caret-right green"></i>
																		Remarks:
																		<b class="red"><?php echo $_POST['cli_remarks'] ?></b>
																	</li>
																	<?php } ?>
																</ul>
															</div>
														</div><!-- /span -->
													</div><!-- row -->

													<div class="space"></div>

													<div>
														<h4>Required Materials: </h4>
														<table class="table table-striped table-bordered">
															<thead>
																<tr>
																	<th class='center'>Qty</th>
																	<th>Price per Unit</th>
																	<th>Material</th>
																	<th class="hidden-xs">Supplier</th>
																	<th class="hidden-480">Item Code</th>
																	<th>Total</th>
																</tr>
															</thead>

															<tbody>
																<?php 
																	$materialsCollection = $dbmis->material;
																	$suppliersCollection = $dbmis->supplier;
																	$thisProject = $dbmis->project->find(array("project_id" => new MongoId($_POST['project_id'])));
																	if ($thisProject->hasNext()) {
																		$projectMaterials = $thisProject->getNext();
																		$allTotalPrice = 0;
																		for ($i=0; $i < count($projectMaterials['project_materials']) ; $i++) { 
																			$materialid = new MongoId($projectMaterials['project_materials'][$i]['material_id']);
																			$projectQty = $projectMaterials['project_materials'][$i]['quantity'];
																			
																			$material = $materialsCollection->find(array("material_id" => $materialid));
																			if($material->hasNext()){
																				$material = $material->getNext();

																				echo "<tr>";
																				//if($i == 0){
																					echo "<td class='center'>". $projectQty ."</td>";
																				//}/else{
																					//echo "<td>". $projectQty ."</td>";
																				//}
																				$pricePerUnit = $material['price_of_quantity'] * 0.01;
																				echo "<td class='priceperunit'>". $pricePerUnit ."</td>";

																				//Qty	price per unit Material	Supplier	Item Code	Total
																				echo "<td>".$material['name']."</td>";

																				$supplier = $suppliersCollection->find(array("supplier_id" => new MongoId($material['supplier_id'])));
																				if($supplier->hasNext()){
																					$supplier = $supplier->getNext();
																					echo "<td>".$supplier['name']."</td>";
																				}else{
																					echo "<td> - </td>";
																				}

																				echo "<td>".$material['material_code']."</td>";

																				$totalPrice = $pricePerUnit * $projectQty;
																				$allTotalPrice += $totalPrice;
																				$lasttd = "<td class='totalperitem'";
																				if($i + 1 == count($projectMaterials['project_materials'])){
																					$lasttd .= "value='{$allTotalPrice}'";
																				} 
																				$lasttd .= "> {$totalPrice} </td>";
																				echo $lasttd;
																			}
																		}
																	}
																?>
															</tbody>
														</table>
													</div>

													<div class="hr hr8 hr-double hr-dotted"></div>

													<div class="row">
														<div class="col-sm-5 pull-right">
															<h4 class="pull-right">
																Materials total cost :
																<span class="red" id="totalCost"></span>
															</h4>
														</div>
														<div class="col-sm-7 pull-left"> </div>
													</div>

													<div class="space-6"></div>
													<div class="well">
														APPROVED BY: ______________________________ 
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div><!-- /.main-content -->

			</div><!-- /.main-container-inner -->

		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->

		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<![endif]-->

		<!--[if !IE]> -->

		<script type="text/javascript">
			window.jQuery || document.write("<script src='../../assets/js/jquery-2.0.3.min.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='../../assets/js/jquery-1.10.2.min.js'>"+"<"+"/script>");
</script>
<![endif]-->

		<script type="text/javascript">
			if("ontouchend" in document) document.write("<script src='../../assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="../../assets/js/bootstrap.min.js"></script>
		<script src="../../assets/js/typeahead-bs2.min.js"></script>
		
		<script src="../../assets/js/currency/jQuery-Currency/jquery.currency.js"></script>

		<!-- page specific plugin scripts -->

		<!-- ace scripts -->

		<script src="../../assets/js/ace-elements.min.js"></script>
		<script src="../../assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function(){
				jQuery("#totalCost").text(jQuery(".totalperitem:last").attr("value"));

				jQuery("b#budget, .priceperunit, .totalperitem, #totalCost").currency({
					region: 'PHP', // The 3 digit ISO code you want to display your currency in
				    thousands: ',', // Thousands separator
				    decimal: '.',   // Decimal separator
				});
			});
		</script>
	</body>
</html>
