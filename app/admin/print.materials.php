<?php 
	session_start();
	$name = basename($_SERVER['REQUEST_URI'],".php"); 
	if (!isset($_SESSION['username'])) {
		header("location: ../../");
	}
	
	include '../../inc/connection.inc.php';
	
	//$_SESSION['currentuser'] = $_GET['user'];
?>

<!DOCTYPE html>
<html lang="en">
	
	<head>
		<meta charset="utf-8" />
		<title><?php echo strtoupper($name);  ?> - PHILCONSPECS</title>

		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />

		<!-- basic styles -->

		<link href="../../assets/css/bootstrap.min.css" rel="stylesheet" />
		<link rel="stylesheet" href="../../assets/css/font-awesome.min.css" />

		<!--[if IE 7]>
		  <link rel="stylesheet" href="../../assets/css/font-awesome-ie7.min.css" />
		<![endif]-->

		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="assets/css/select2.css" />
		<link rel="stylesheet" href="assets/css/jquery-ui-1.10.3.custom.min.css" />
		<link rel="stylesheet" href="assets/css/chosen.css" />
		<link rel="stylesheet" href="assets/css/datepicker.css" />
		<link rel="stylesheet" href="assets/css/bootstrap-timepicker.css" />
		<link rel="stylesheet" href="assets/css/daterangepicker.css" />
		<link rel="stylesheet" href="assets/css/colorpicker.css" />
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
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<div class="main-container-inner">
				<a class="menu-toggler" id="menu-toggler" href="#">
					<span class="menu-text"></span>
				</a>

				<div class="row">
					<div class="col-xs-12">
						<h3 class="header smaller lighter blue">Project Materials</h3>
						<div class="table-header">
							All Materials listed - - <button onclick="window.print()">PRINT THIS PAGE</button>
						</div>

						<div class="table-responsive">
							<table id="sample-table-4" class="table table-striped table-bordered table-hover">
								<thead>
									<tr>
										<th class="center">
											<label>
												<input type="checkbox" class="ace" />
												<span class="lbl"></span>
											</label>
										</th>
										<th>Item Code</th>
										<th>Item Name</th>
										<th class="hidden-480">Real time Stocks</th>
										<th>Supplier</th>
										<th class="hidden-480">Status</th>

										<th>Action</th>
									</tr>
								</thead>

								<tbody>
										<?php 
											$dbconnection = new MongoClient();

											$result = $dbconnection->mis->material->find();
																							
											while ( $result->hasNext() ){
												$materialExist = $result->getNext();
												$supplierid =  $materialExist["supplier_id"]; 
												
												$supplierResult = $dbconnection->mis->supplier->find(array("supplier_id" =>$supplierid));
												if ( $supplierResult->hasNext() ){
													$supplierResult = $supplierResult->getNext();
												}else{
													$supplierResult = "-";
												}
																											
												
												include("inc/tabletr.materials.inc.php");
											}
										?>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>