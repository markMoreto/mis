<?php 
	include("../../inc/header.inc.php"); 
	include("inc/sidebar.inc.php");
?>
		 <div class="main-content">
					<?php include "inc/breadcrumbs.inc.php"; ?>
					<div class="page-content">
						<div class="page-header">
							<h1>
								Project
								<small>
									<i class="icon-double-angle-right"></i>
									create a project
								</small>
							</h1>
						</div><!-- /.page-header -->
						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->

					
								<div class="hr hr-18 hr-double dotted"></div>

								<div class="row-fluid">
									<div class="span12">
										<div class="widget-box">
											<div class="widget-header widget-header-blue widget-header-flat">
												<h4 class="lighter">Create New Project</h4>

												<div class="widget-toolbar">
													<label>
														<small class="green">
															<b>Create Project</b>
														</small>

														<input id="skip-validation" type="checkbox" class="ace ace-switch ace-switch-4" />
														<span class="lbl"></span>
													</label>
												</div>
											</div>
											<div class="widget-body">
												<div class="widget-main">
													<div id="fuelux-wizard" class="row-fluid" data-target="#step-container">
														<ul class="wizard-steps">
															<li data-target="#step1" class="active">
																<span class="step">1</span>
																<span class="title">Project Info</span>
															</li>

															<li data-target="#step2">
																<span class="step">2</span>
																<span class="title">Save</span>
															</li>
														</ul>
													</div>

													<hr />
													<div class="step-content row-fluid position-relative" id="step-container">
														<div class="step-pane active" id="step1">
															<div id="hidemelater">
																<h3 class="lighter block green">Simply turn on the form to Project.</h3>
																<div class="hr hr-18 hr-double dotted"></div>
															</div>
															
															<form class="form-horizontal hide" id="validation-form" method="get">
																<h4 class="lighter block green">Project Info</h4>
																
																<div class="space-2"></div>

																<div class="form-group">
																	<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Project Name:</label>

																	<div class="col-xs-12 col-sm-9">
																		<div class="clearfix">
																			<input type="text" name="name" id="name" class="col-xs-12 col-sm-4" />
																		</div>
																	</div>
																</div>
																
																<div class="space-2"></div>
																
																<div class="form-group">
																	<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Project Budget:</label>

																	<div class="col-xs-12 col-sm-9">
																		<div class="clearfix">
																			<input type="text" name="budget" id="budget" />
																		</div>
																	</div>
																</div>

																<div class="space-2"></div>
																
																<div class="form-group">
																	<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Project Address Location:</label>

																	<div class="col-xs-12 col-sm-9">
																		<div class="clearfix">
																			<input type="text" name="address" id="address" class="col-xs-12 col-sm-6"/>
																		</div>
																	</div>
																</div>

																<div class="space-2"></div>
																
																<div class="form-group">
																	<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password">Project Status:</label>

																	<div class="col-xs-12 col-sm-9">
																		<div class="clearfix">
																			<select id="status">
																				<?php 
																					$status = array("Pending","For Approval","Approved","On progress");
																					foreach ($status as $key => $value) {
																						echo "<option value='".$value."'>".$value."</option>";
																					}
																				?>
																			</select>
																		</div>
																	</div>
																</div>

																<div class="space-2"></div>

																<div class="form-group">
																	<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="name">Date Start:</label>

																	<div class="col-xs-12 col-sm-9">
																		<div class="input-group">
																			<span class="input-group-addon">
																				<i class="icon-calendar"></i>
																			</span>
																			
																			<input class="date-picker" id="start" name="start" type="text" data-date-format="dd-mm-yyyy">
																		</div>
																	</div>
																</div>
																
																<div class="form-group">
																	<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="name">Date End:</label>

																	<div class="col-xs-12 col-sm-9">
																		<div class="input-group">
																			<span class="input-group-addon">
																				<i class="icon-calendar"></i>
																			</span>
																			
																			<input class="date-picker" id="end" name="end" type="text" data-date-format="dd-mm-yyyy">
																		</div>
																	</div>
																</div>
																
																<div class="space-2"></div>
																
																<div class="form-group">
																	<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="platform">Team: </label>

																	<div class="col-xs-12 col-sm-9">
																		<div class="clearfix">
																			<select class="input-medium" id="team" name="team">
																			<option value="">Not Applicable</option>
																				<?php
																					//die(var_dump($dbconnection));
																					$results = $dbconnection->mis->team->find();
																						foreach ($results as $result) {
																					    	echo "<option value='".$result['team_id']."'>".ucfirst($result['team_name'])."</option>";
																						}
																				?>
																			</select>
																		</div>
																	</div>
																</div>
																
																<div class="space-2"></div>
																
																<div class="form-group">
																	<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Engineer Assigned:</label>

																	<div class="col-xs-12 col-sm-9">
																		<div class="clearfix">
																			<select class="input-medium" id="engr" name="engr">
																				<?php
																					//die(var_dump($dbconnection));
																					$engrID = $dbconnection->mis->ua->find(array("ua_level" =>"E"));
																					foreach ($engrID as $result) {
																				    	$engrID = $result['ua_id'];
																						
																						$results = $dbconnection->mis->profile->find(array("ua_id" => $engrID));
																						foreach ($results as $result) {
																					    	echo "<option value='".$result['ua_id']."'>".ucfirst($result['last_name']).", ".ucfirst($result['first_name'])."</option>";
																						}
																					}
																				?>
																			</select>
																		</div>
																	</div>
																</div>

																<div class="space-2"></div>
																
																<div class="form-group">
																	<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Client:</label>

																	<div class="col-xs-12 col-sm-9">
																		<div class="clearfix">
																			<select class="input-medium" id="cli" name="cli">
																				<?php
																					//die(var_dump($dbconnection));
																					$cliID = $dbconnection->mis->ua->find(array("ua_level" =>"cli"));
																					foreach ($cliID as $result) {
																				    	$cliID = $result['ua_id'];
																						
																						$results = $dbconnection->mis->profile->find(array("ua_id" => $cliID));
																						foreach ($results as $result) {
																					    	echo "<option value='".$result['ua_id']."'>".ucfirst($result['last_name']).", ".ucfirst($result['first_name'])."</option>";
																						}
																					}
																				?>
																			</select>
																		</div>
																	</div>
																</div>
																
																<div class="space-2"></div>
																
																<div class="form-group">
																	<h3 class="header smaller lighter blue">Choose Materials</h3>
																	<div class="table-header">
																		Tick the checkbox on left to include the material(s) you need
																		while providing desire quantity per item.
																	</div>
							
																	<div class="table-responsive">
																		<table id="materialstb" class="table table-striped table-bordered table-hover">
																			<thead>
																				<tr>
																					<th class="center">
																						<label>
																							<!--<input type="checkbox" class="ace" />-->
																							<span class="lbl"></span>
																						</label>
																					</th>
																					<th>Remaining Stocks</th>
																					<th>Item Name</th>
																					<th class="hidden-480">Desire Quantity</th>
																					<th>Supplier</th>
																					<th class="hidden-480">Status</th>
							
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
																																					
																						
																						include("inc/tabletr.project.materials.inc.php");
																					}
																				
																				 
																				?>
																			</tbody>
																		</table>
																	</div>
																</div>

																<div class="form-group">
																	<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="comment">Remarks:</label>

																	<div class="col-xs-12 col-sm-9">
																		<div class="clearfix">
																			<textarea class="input-xlarge" name="comment" id="comment"></textarea>
																		</div>
																	</div>
																</div>

																<div class="space-8"></div>
															</form>
														</div>
														
														<!-- STEP 3 -->
														<div class="step-pane" id="step2">
															<div class="center">
																<div class="center">
																	<p id="statusMsg">
																		<h3 class="green">Click "Finish" button to save</h3>
																	</p>
																</div>
															</div>
														</div>
													</div>

													<hr />
													<div class="row-fluid wizard-actions">
														<button class="btn btn-prev">
															<i class="icon-arrow-left"></i>
															Prev
														</button>

														<button class="btn btn-success btn-next" data-last="Finish ">
															Next
															<i class="icon-arrow-right icon-on-right"></i>
														</button>
													</div>
												</div><!-- /widget-main -->
											</div><!-- /widget-body -->
										</div>
									</div>
								</div>

								<div id="modal-wizard" class="modal">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header" data-target="#modal-step-contents">
												<ul class="wizard-steps">
													<li data-target="#modal-step1" class="active">
														<span class="step">1</span>
														<span class="title">Project Info</span>
													</li>

													<li data-target="#modal-step2">
														<span class="step">2</span>
														<span class="title">Save</span>
													</li>
												</ul>
											</div>

											<div class="modal-body step-content" id="modal-step-contents">
												<div class="step-pane active" id="modal-step1">
													<div class="center">
														<h4 class="blue">Step 1</h4>
													</div>
												</div>

												<div class="step-pane" id="modal-step2">
													<div class="center">
														<h4 class="blue">Step 2</h4>
													</div>
												</div>
											</div>

											<div class="modal-footer wizard-actions">
												<button class="btn btn-sm btn-prev">
													<i class="icon-arrow-left"></i>
													Prev
												</button>

												<button class="btn btn-success btn-sm btn-next" data-last="Finish ">
													Next
													<i class="icon-arrow-right icon-on-right"></i>
												</button>

												<button class="btn btn-danger btn-sm pull-left" data-dismiss="modal">
													<i class="icon-remove"></i>
													Cancel
												</button>
											</div>
										</div>
									</div>
								</div><!-- PAGE CONTENT ENDS -->
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
</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->

		<script src="../../assets/js/jquery-2.0.3.min.js"></script>

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
			if("ontouchend" in document) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="../../assets/js/bootstrap.min.js"></script>
		<script src="../../assets/js/typeahead-bs2.min.js"></script>

		<!-- page specific plugin scripts -->

		<script src="../../assets/js/fuelux/fuelux.wizard.min.js"></script>
		<script src="../../assets/js/jquery.validate.min.js"></script>
		<script src="../../assets/js/additional-methods.min.js"></script>
		<script src="../../assets/js/bootbox.min.js"></script>
		<script src="../../assets/js/jquery.maskedinput.min.js"></script>
		<script src="../../assets/js/select2.min.js"></script>
		<script src="../../assets/js/date-time/bootstrap-datepicker.min.js"></script>
		<script src="../../assets/js/date-time/bootstrap-timepicker.min.js"></script>
		<script src="../../assets/js/date-time/moment.min.js"></script>
		<script src="../../assets/js/date-time/daterangepicker.min.js"></script>

		<!-- ace scripts -->

		<script src="../../assets/js/ace-elements.min.js"></script>
		<script src="../../assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
		<script src="assets/js/jquery.dataTables.min.js"></script>
		<script src="assets/js/jquery.dataTables.bootstrap.js"></script>

		<script type="text/javascript">
			function forceNumeric() {
    			this.value = this.value.replace(/\D/g, '');
			}

			//user tables
			jQuery(function($) {
				var oTable1 = $('#materialstb').dataTable( {
				"aoColumns": [
			      { "bSortable": false },
			      null, null,null, null, null,
				  { "bSortable": false }
				] } );
				
				$('#budget').keyup(forceNumeric).change(forceNumeric).click(forceNumeric);
				
				$('table th input:checkbox').on('click' , function(){
					var that = this;
					$(this).closest('table').find('tr > td:first-child input:checkbox')
					.each(function(){
						this.checked = that.checked;
						$(this).closest('tr').toggleClass('selected');
					});
						
				});

				//$('#skip-validation').trigger("click");
				$('#skip-validation').on('click' , function(){
					if($('#hidemelater').is(":visible")){
						$('#hidemelater').hide();
					}else{
						$('#hidemelater').show();
					}
				});
			
			
				$('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('table')
					var off1 = $parent.offset();
					var w1 = $parent.width();
			
					var off2 = $source.offset();
					var w2 = $source.width();
			
					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}
			});
			
			
			jQuery(function($) {
			
				$('[data-rel=tooltip]').tooltip();
			
				$(".select2").css('width','200px').select2({allowClear:true})
				.on('change', function(){
					$(this).closest('form').validate().element($(this));
				}); 
			
			
				var $validation = false;
				$('#fuelux-wizard').ace_wizard().on('change' , function(e, info){
					if(info.step == 1 && $validation) {
						if(!$('#validation-form').valid()) return false;
					}
				}).on('finished', function(e) {
					var materials = $('.materialschk:checkbox:checked');
					var materialsWithQty = [];
					var tmp;
					
					for(var i=0;i<materials.length;i++){
						tmp = materials[i].value;
						materialsWithQty.push({"material_id": tmp, "quantity": $("#"+tmp).val()});
					}

					//console.log(materialsWithQty);
					
				
					var data = {
						name: $("#name").val(),
						budget: $("#budget").val(),
						address: $("#address").val(),
						status: $("#status").val(),
						start: $("#start").val(),
						end: $("#end").val(),
						team: $("#team").val(),
						engr: $("#engr").val(),
						cli: $("#cli").val(),
						materials: materialsWithQty,
						comment: $("#comment").val()
					};
					
					//debugger;
					$.ajax({
						url: 'inc/project.inc.php',  //server script to process data
						type: 'POST',
						data: data,
						success: function(msg) {
							if(msg.length > 0){
								alert(msg);
							}
						},
				        error: function(xhr, msg) {
				     		alert("Something went wrong in AJAX call in creating project. Error Message: " + msg);
				        }
					});				
					
					bootbox.dialog({
						message: "Thank you! Information was successfully saved!", 
						buttons: {
							"success" : {
								"label" : "OK",
								"className" : "btn-sm btn-primary"
							}
						}
					});
				}).on('stepclick', function(e){
					//return false;//prevent clicking on steps
				});
			
			
				$('#skip-validation').removeAttr('check-+c ed').on('click', function(){
					$validation = this.checked;
					if(this.checked) {
						$('#sample-form').hide();
						$('#validation-form').removeClass('hide');
					}
					else {
						$('#validation-form').addClass('hide');
						$('#sample-form').show();
					}
				});

				//check quantity

				$('.materialschk').on('click' , function(){
					var qty = this.value;
					var that = this;
					if($("#"+qty).val() === "0"){
						alert("Please input Desire Quantity");
					}else{
						var data = {material_id: qty};
						$.ajax({
							url: 'inc/checkqty.inc.php',  //server script to process data
							type: 'GET',
							data: data,
							success: function(msg) {
								if(msg.length > 0){
									jQuery("."+qty).text(msg);
									var a = Number($("#"+qty).val());
									var b = Number(msg);
									//console.log("a:"+a+" b:"+b);
									if(a > b){
										alert("Sorry but your selected quantity is larger than what is in stocks.");
										$("#"+qty).val("0");
									}
								}
							},
					        error: function(xhr, msg) {
					     		alert("Something went wrong in AJAX call in checking qty of material. Error Message: " + msg);
					        }
						});		
					}
				});
				
				//check remaning stocks .change(forceNumeric).click(forceNumeric)
				$('.itemQty').change(function(){
					//debugger;
					var qty = this.value;
					var id = jQuery(this).attr("id");
					var data = {material_id: id};
						$.ajax({
							url: 'inc/checkqty.inc.php',  //server script to process data
							type: 'GET',
							data: data,
							success: function(msg) {
								if(msg.length > 0){
									jQuery("."+qty).text(msg);
									var a = Number(qty);
									var b = Number(msg);
									//console.log("a:"+a+" b:"+b);
									if(a > b){
										alert("Sorry but your selected quantity is larger than what is in stocks.");
										$("#"+id).val("0");
									}
								}
							},
					        error: function(xhr, msg) {
					     		alert("Something went wrong in AJAX call in checking qty of material. Error Message: " + msg);
					        }
						});
				});
			
				$('#validation-form').validate({
					errorElement: 'div',
					errorClass: 'help-block',
					focusInvalid: false,
					rules: {
						name: 'required',
						budget: 'required',
						address: 'required',
						start: 'required',
						end: 'required'
					},
			
					invalidHandler: function (event, validator) { //display error alert on form submit   
						$('.alert-danger', $('.login-form')).show();
					},
			
					highlight: function (e) {
						$(e).closest('.form-group').removeClass('has-info').addClass('has-error');
					},
			
					success: function (e) {
						$(e).closest('.form-group').removeClass('has-error').addClass('has-info');
						$(e).remove();
					},
			
					errorPlacement: function (error, element) {
						if(element.is(':checkbox') || element.is(':radio')) {
							var controls = element.closest('div[class*="col-"]');
							if(controls.find(':checkbox,:radio').length > 1) controls.append(error);
							else error.insertAfter(element.nextAll('.lbl:eq(0)').eq(0));
						}
						else if(element.is('.select2')) {
							error.insertAfter(element.siblings('[class*="select2-container"]:eq(0)'));
						}
						else if(element.is('.chosen-select')) {
							error.insertAfter(element.siblings('[class*="chosen-container"]:eq(0)'));
						}
						else error.insertAfter(element.parent());
					},
			
					submitHandler: function (form) {
					},
					invalidHandler: function (form) {
					}
				});
			
				
			
				
				$('#modal-wizard .modal-header').ace_wizard();
				$('#modal-wizard .wizard-actions .btn[data-dismiss=modal]').removeAttr('disabled');
				
				$('.date-picker').datepicker({autoclose:true}).next().on(ace.click_event, function(){
					$(this).prev().focus();
				});
				
				//skip-validation
			
				setTimeout(function(){
					$('#skip-validation').click(function(){
						$('#hidemelater').hide();
					});

				},1000);  //1 second
			
				
			
				
			})
		</script>
	</body>
</html>
