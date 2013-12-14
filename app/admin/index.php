<?php 
	
	include("../../inc/header.inc.php"); 
	include("inc/sidebar.inc.php");
?>
		 <div class="main-content">
					<?php include "inc/breadcrumbs.inc.php"; ?>
					<div class="page-content">
						<div class="page-header">
							<h1>
								Dashboard
								<small>
									<i class="icon-double-angle-right"></i>
									reports &amp; configurations
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS 

								<div class="alert alert-block alert-success">
									<button type="button" class="close" data-dismiss="alert">
										<i class="icon-remove"></i>
									</button>

									<i class="icon-ok green"></i>

									Welcome to
									<strong class="green">
										Ace
										<small>(v1.2)</small>
									</strong>
									,
	the lightweight, feature-rich and easy to use admin template.
								</div>-->

								<div class="row">
									<div class="col-xs-12">
										<h3 class="header smaller lighter blue">System Users</h3>
										<div class="table-header">
											All System Registered Users
										</div>

										<div class="table-responsive">
											<table id="sample-table-2" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th class="center">
															<label>
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</th>
														<th>First Name</th>
														<th>Last Name</th>
														<th class="hidden-480">Team</th>
														<th>
															<i class="icon-time bigger-110 hidden-480"></i>
															Last Time-In
														</th>
														<th class="hidden-480">User Type</th>

														<th>Action</th>
													</tr>
												</thead>

												<tbody>
													<?php 
														/*
														 * THIS CODE IS FOR EMPLOYEE
														$query = array('ua_id' => new MongoId($_SESSION['currentuser']));
														$result = $dbconnection->mis->profile->find($query);
													
														while ( $result->hasNext() ){
															$accountExist = $result->getNext();
															
															$teamResult = $dbconnection->mis->team->find(array('team_id' => $accountExist["team_id"]));
															if ( $teamResult->hasNext() ){
																$teamResult = $teamResult->getNext();
															}else{
																$teamResult = "No result.";
															}
															
															$timeResult = $dbconnection->mis->trail->find(array('ua_id' => $accountExist["ua_id"]));
															//die(var_dump($timeResult->hasNext()));
															if ( $timeResult->hasNext() ){
																$timeResult = $timeResult->getNext();
															}else{
																$timeResult = "No result.";
															}
															
															include("inc/tabletr.users.inc.php");
														}
														*/	
														$db = $dbconnection->mis;
														$result = $db->profile->find();
														while ( $result->hasNext() ){
															$accountExist = $result->getNext();
															
															//check ua table
															$uaresult = $db->ua->find(array('ua_id' => $accountExist["ua_id"]));

															if($uaresult->hasNext()){
																$uaresult = $uaresult->getNext();
																$teamResult = $db->team->find(array('team_id' => $accountExist["team_id"]));
																if ( $teamResult->hasNext() ){
																	$teamResult = $teamResult->getNext();
																}else{
																	$teamResult = "-";
																}
																
																$timeResult = $db->trail->find(array('ua_id' => $accountExist["ua_id"]));
																//die(var_dump($timeResult->hasNext()));
																if ( $timeResult->hasNext() ){
																	$timeResult = $timeResult->getNext();
																}else{
																	$timeResult = "-";
																}
																
																include("inc/tabletr.users.inc.php");
															}
														}	
													?>
												</tbody>
											</table>
										</div>
									</div>
								</div>

								<div class="hr hr32 hr-dotted"></div>

								<div class="row">
									<div class="col-xs-12">
										<h3 class="header smaller lighter blue">System Projects</h3>
										<div class="table-header">
											All System Projects
										</div>

										<div class="table-responsive">
											<table id="sample-table-3" class="table table-striped table-bordered table-hover">
												<thead>
													<tr>
														<th class="center">
															<label>
																<input type="checkbox" class="ace" />
																<span class="lbl"></span>
															</label>
														</th>
														<th>Project Name</th>
														<th>Engineer / Manager</th>
														<th class="hidden-480">Client</th>
														<th>
															<i class="icon-time bigger-110 hidden-480"></i>
															Timeline
														</th>
														<th class="hidden-480">Status</th>

														<th>Action</th>
													</tr>
												</thead>

												<tbody>
													<?php 
														$result = $dbconnection->mis->project->find();
													
														while ( $result->hasNext() ){
															$projectExist = $result->getNext();
															$engineerid =  $projectExist["engineer_id"]; 
															
															$profileResult = $dbconnection->mis->profile->find(array("ua_id" => $projectExist["engineer_id"]));
															if ( $profileResult->hasNext() ){
																$profileResult = $profileResult->getNext();
															}else{
																$profileResult = "-";
															}
															
															
															$profileResultcli = $dbconnection->mis->profile->find(array("ua_id" => $projectExist["client_id"]));
															if ( $profileResultcli->hasNext() ){
																$profileResultcli = $profileResultcli->getNext();
															}else{
																$profileResultcli = "-";
															}
															
															
															$timelineResult = $dbconnection->mis->timeline->find(array("timeline_id" => $projectExist["timeline_id"]));
															if ( $timelineResult->hasNext() ){
																$timelineResult = $timelineResult->getNext();
															}else{
																$timelineResult = "-";
															}
															
															include("inc/tabletr.projects.inc.php");
														}
													?>
												</tbody>
											</table>
										</div>
									</div>
								</div>

								<div class="hr hr32 hr-dotted"></div>

								<div class="row">
									<div class="col-xs-12">
										<h3 class="header smaller lighter blue">Project Materials</h3>
										<div class="table-header">
											All Materials listed
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
														<th class="hidden-480">Unit Stocks</th>
														<th>Supplier</th>
														<th class="hidden-480">Price per Unit</th>

														<th>Action</th>
													</tr>
												</thead>

												<tbody>
													<?php 
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
								
								<div class="hr hr32 hr-dotted"></div>

								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div><!-- /.main-content -->

				<div class="ace-settings-container" id="ace-settings-container">
					<div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
						<i class="icon-cog bigger-150"></i>
					</div>

					<div class="ace-settings-box" id="ace-settings-box">
						<div>
							<div class="pull-left">
								<select id="skin-colorpicker" class="hide">
									<option data-skin="default" value="#438EB9">#438EB9</option>
									<option data-skin="skin-1" value="#222A2D">#222A2D</option>
									<option data-skin="skin-2" value="#C6487E">#C6487E</option>
									<option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
								</select>
							</div>
							<span>&nbsp; Choose Skin</span>
						</div>

						<div>
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-navbar" />
							<label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
						</div>

						<div>
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-sidebar" />
							<label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
						</div>

						<div>
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-breadcrumbs" />
							<label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
						</div>

						<div>
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" />
							<label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
						</div>

						<div>
							<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-add-container" />
							<label class="lbl" for="ace-settings-add-container">
								Inside
								<b>.container</b>
							</label>
						</div>
					</div>
				</div><!-- /#ace-settings-container -->
			</div><!-- /.main-container-inner -->

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="icon-double-angle-up icon-only bigger-110"></i>
			</a>
<?php include("../../inc/footer.inc.php"); ?>