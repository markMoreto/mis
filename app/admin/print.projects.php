<?php 
	session_start();
	$name = basename($_SERVER['REQUEST_URI'],".php"); 
	if (!isset($_SESSION['username'])) {
		header("location: ../../");
	}
	
	include '../../inc/connection.inc.php';
	
	//$_SESSION['currentuser'] = $_GET['user'];
	//
	//die(var_dump($_POST));
	//
	//
	//// $projectExist - project tb
// $profileResult - engineer profile 
// $profileResultcli - Client profile
// $timelineResult - timeline tb
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
													<span class="invoice-info-label">Date Started:</span>
													<span class="red">#121212</span>

													<br />
													<span class="invoice-info-label">Date End:</span>
													<span class="blue">03/03/2013</span>
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
																		<b class="red">3,123,123.00</b>
																	</li>

																	<li>
																		<i class="icon-caret-right blue"></i>
																		Project Name:
																		<b class="red">Burgundy Tower</b>
																	</li>

																	<li>
																		<i class="icon-caret-right blue"></i>
																		Project Address location:
																		<b class="red">101 St. Burgundy Tower, Ayala, Makati City</b>
																	</li>

																	<li>
																		<i class="icon-caret-right blue"></i>
																		Project Status:
																		<b class="red">Approved</b>
																	</li>

																	<li class="divider"></li>
																	
																	<li>
																		<i class="icon-caret-right blue"></i>
																		Engineer Assigned:
																		<b class="red">Engr. Joel Cruz</b>
																	</li>

																	<li>
																		<i class="icon-caret-right blue"></i>
																		Team Assigned:
																		<b class="red">Fast Worker</b>
																	</li>
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
																		<b class="red">Bill Gates</b>
																	</li>

																	<li>
																		<i class="icon-caret-right green"></i>
																		Email:
																		<b class="red">bgates@hotmail.com</b>
																	</li>

																	<li>
																		<i class="icon-caret-right green"></i>
																		Contact Info:
																		<b class="red">+63 (918) 444-4444</b>
																	</li>

																	<li class="divider"></li>

																	<li>
																		<i class="icon-caret-right green"></i>
																		Remarks:
																		<b class="red">Microsoft Group of Company</b>
																	</li>
																</ul>
															</div>
														</div><!-- /span -->
													</div><!-- row -->

													<div class="space"></div>

													<div>
														<table class="table table-striped table-bordered">
															<thead>
																<tr>
																	<th class="center">Qty</th>
																	<th>Material</th>
																	<th class="hidden-xs">Supplier</th>
																	<th class="hidden-480">Item Code</th>
																	<th>Total</th>
																</tr>
															</thead>

															<tbody>
																<tr>
																	<td class="center">140</td>

																	<td>
																		4x4 Plywood
																	</td>
																	<td class="hidden-xs">
																		Ace Hardware
																	</td>
																	<td class="hidden-480"> ply44 </td>
																	<td>200,000 PHP</td>
																</tr>
															</tbody>
														</table>
													</div>

													<div class="hr hr8 hr-double hr-dotted"></div>

													<div class="row">
														<div class="col-sm-5 pull-right">
															<h4 class="pull-right">
																Total amount :
																<span class="red">$395</span>
															</h4>
														</div>
														<div class="col-sm-7 pull-left"> Extra Information </div>
													</div>

													<div class="space-6"></div>
													<div class="well">
														Thank you for choosing Ace Company products.
					We believe you will be satisfied by our services.
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

		<!-- page specific plugin scripts -->

		<!-- ace scripts -->

		<script src="../../assets/js/ace-elements.min.js"></script>
		<script src="../../assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
	</body>
</html>
