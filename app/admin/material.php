<?php 
	include("../../inc/header.inc.php"); 
	include("inc/sidebar.inc.php");
?>
		 <div class="main-content">
					<?php include "inc/breadcrumbs.inc.php"; ?>
					<div class="page-content">
						<div class="page-header">
							<h1>
								Material
								<small>
									<i class="icon-double-angle-right"></i>
									creation of material
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
												<h4 class="lighter">Create New Material</h4>

												<div class="widget-toolbar">
													<label>
														<small class="green">
															<b>Create Material</b>
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
																<span class="title">Materials Info</span>
															</li>

															<li data-target="#step2">
																<span class="step">2</span>
																<span class="title">Supplier Info</span>
															</li>

															<li data-target="#step3">
																<span class="step">3</span>
																<span class="title">Save</span>
															</li>
														</ul>
													</div>

													<hr />
													<div class="step-content row-fluid position-relative" id="step-container">
														<div class="step-pane active" id="step1">
															<div id="hidemelater">
																<h3 class="lighter block green">Simply turn on the form to Create Material.</h3>
																<div class="hr hr-18 hr-double dotted"></div>
															</div>
															
															<form class="form-horizontal hide" id="validation-form" method="get">
																<h4 class="lighter block green">Material Info</h4>
																<div class="form-group">
																	<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Material Code:</label>

																	<div class="col-xs-12 col-sm-9">
																		<div class="clearfix">
																			<input type="text" name="code" id="code" />
																		</div>
																	</div>
																</div>

																<div class="space-2"></div>

																<div class="form-group">
																	<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Material Name:</label>

																	<div class="col-xs-12 col-sm-9">
																		<div class="clearfix">
																			<input type="text" name="name" id="name" class="col-xs-12 col-sm-4" />
																		</div>
																	</div>
																</div>

																<div class="space-2"></div>

																<div class="form-group">
																		<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password2">Quantity:</label>
	
																		<div class="col-xs-12 col-sm-9">
																			<div class="clearfix">
																				<select class="input-medium" id="qty" name="qty">
																					<?php
																						for ($i=1; $i <= 1000; $i++) { 
																							echo "<option value='".$i."'>".$i."</option>";
																						}
																					?>
																				</select>
																			</div>
																		</div>
																</div>


																<div class="space-2"></div>
																
																<div class="form-group">
																	<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password">Price of selected Quantity:</label>

																	<div class="col-xs-12 col-sm-9">
																		<div class="clearfix">
																			<input type="text" name="price" id="price" />
																		</div>
																	</div>
																</div>

																

															
																
																<div class="space-2"></div>

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

														<!-- STEP 2 -->
														<div class="step-pane" id="step2">
															<h4 class="lighter block green">Supplier Info: Choose Supplier OR Create New</h4>
															
															<form id="sec-page-form-validation">
															<div class="row-fluid">
																
																<div class="form-group">
																		<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="password2">Choose Supplier:</label>
	
																		<div class="col-xs-12 col-sm-9">
																			<div class="clearfix">
																				<select class="input-large" id="supplier" name="supplier">
																				<option value="">Not yet on the list</option>
																					<?php
																						$result = $dbconnection->mis->supplier->find();
																						foreach ($result as $key => $value) {
																							echo "<option value='".$value['supplier_id']."'>".$value['name']."</option>";
																						}
																					?>
																				</select>
																			</div>
																		</div>
																</div>
																<br />
																<div class="space-2"></div>
																<br />
																<div class="form-group">
																	<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Supplier Business Name:</label>

																	<div class="col-xs-12 col-sm-9">
																		<div class="clearfix">
																			<input type="text" name="bname" id="bname" class="col-xs-12 col-sm-6" />
																		</div>
																	</div>
																</div>
																
																<div class="hr hr-dotted"></div>
																
																<div class="space-2"></div>
																<br />
																<div class="form-group">
																	<label class="control-label col-xs-12 col-sm-3 no-padding-right" for="email">Supplier Address:</label>

																	<div class="col-xs-12 col-sm-9">
																		<div class="clearfix">
																			<input type="text" name="address" id="address" class="col-xs-12 col-sm-7" />
																		</div>
																	</div>
																</div>
															</div>
															</form>
														</div>

														<!-- STEP 3 -->
														<div class="step-pane" id="step3">
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
														<span class="title">Basic Info</span>
													</li>

													<li data-target="#modal-step2">
														<span class="step">2</span>
														<span class="title">Supplier Info</span>
													</li>

													<li data-target="#modal-step3">
														<span class="step">3</span>
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

												<div class="step-pane" id="modal-step3">
													<div class="center">
														<h4 class="blue">Step 3</h4>
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

		<script type="text/javascript">
			function forceNumeric() {
    			this.value = this.value.replace(/\D/g, '');
			}

			jQuery(function($) {
			
				$('[data-rel=tooltip]').tooltip();
			
				$(".select2").css('width','200px').select2({allowClear:true})
				.on('change', function(){
					$(this).closest('form').validate().element($(this));
				}); 
			
			
				$('#price').keyup(forceNumeric).change(forceNumeric).click(forceNumeric);

				var $validation = false;
				$('#fuelux-wizard').ace_wizard().on('change' , function(e, info){
					if(info.step == 1 && $validation) {
						if(!$('#validation-form').valid()) return false;
					}
				}).on('finished', function(e) {
					
					var data = "";
					if($("#supplier").val() == ""){
						var data = {
							code: $("#code").val(), 
							name: $("#name").val(), 
							price: $("#price").val(), 
							qty: $("#qty").val(), 
							comment: $("#comment").val(), 
							bname: $("#bname").val(), 
							address: $("#address").val()
						};
					}else{
						var data = {
							code: $("#code").val(), 
							name: $("#name").val(), 
							price: $("#price").val(), 
							qty: $("#qty").val(), 
							comment: $("#comment").val(),
							supplier: $("#supplier").val() 
						};
					}
					//debugger;
					$.ajax({
						url: 'inc/material.inc.php',  //server script to process data
						type: 'POST',
						data: data,
						success: function(msg) {
							if(msg.length > 0){
								alert(msg);
							}
						},
				        error: function(xhr, msg) {
				     		alert("Something went wrong in AJAX call in creating material. Error Message: " + msg);
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
			
				$('#validation-form').validate({
					errorElement: 'div',
					errorClass: 'help-block',
					focusInvalid: false,
					rules: {
						code: 'required',
						name: 'required',
						price: 'required',
						qty: 'required'
					},
			
					messages: {
						price: {
							required: "Please provide price of the quantity."
						}
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
			
				
				$('#skip-validation').click(function(){
					if($('#hidemelater').is(":visible")){
						$('#hidemelater').hide();
					}else{
						$('#hidemelater').show();
					}
				});
				
				$(".row-fluid wizard-actions > .btn-next").click(function(){
					if($("#step2").is(":visible")){
						$('#sec-page-form-validation').validate({
							errorElement: 'div',
							errorClass: 'help-block',
							focusInvalid: false,
							rules: {
								bname: 'required',
								address: 'required',
							}
						});
					}
				});
			})
		</script>
		
		<?php
			if(isset($_GET['edit'])){
				$email = "";
				$username = "";
				$password = "";
				$firstname = "";
				$lastname = "";
				$dob = "";
				$mobile = "";
				$address = "";
				$sss = "";
				$tin = "";
				$status = "";
				$gender = "";
				$remarks = "";
				$team = "";
				$position = "";

				$db = $dbconnection->mis;
				$result = $db->profile->find(array('ua_id' => new MongoId($_GET['edit'])));
				if ( $result->hasNext() ){
					$profile = $result->getNext();
					
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
					//check ua table
					$uaresult = $db->ua->find(array('ua_id' => $profile["ua_id"]));

					if($uaresult->hasNext()){
						$ua = $uaresult->getNext();

						/*
						
						{
{
  "address": "Ayala Makati",
  "name": "Asian China Supplies",
  "supplier_id": ObjectId("52aa349cf91dd85019000011")
}
}
		
						 * 
						 * 
						 * 
						 * 
{
  "action": "in",
  "date_stamp": [
    
  ],
  "inventory_id": "",
  "material_id": ""
}				 */
						 
						 
						$email = $profile['email'];
						$username = $ua['ua_user_name'];
						$password = $ua['ua_password'];
						$firstname = $profile['first_name'];
						$lastname = $profile['last_name'];
						$dob = $profile['birth_date'];
						$mobile = $profile['contact_number'];
						$address = $profile['address'];
						$sss = $profile['gov_id']["sss"];
						$tin = $profile['gov_id']["tin"];
						$status = $profile['marital_status'];
						$gender = $profile['gender'];
						$remarks = $profile['remarks'];
						$team = $profile['team_id'];
						$position = $ua['ua_level'];
					}
				}	
		?>
			<script type="text/javascript">
				//updates
				jQuery(function($) {
					$(".page-header small").html("<i class='icon-double-angle-right'></i> update your user");
					$(".widget-header h4.lighter").text("Update your user");
					$("div.widget-toolbar small.green b").text("Update User");
					$("#hidemelater h3").text("Simply turn on the form to Update the User.");

					$("#email").val("<?php echo $email; ?>"); 
					$("#username").val("<?php echo $username; ?>");
					$("#password").val("<?php echo $password; ?>");
					$("#password2").val("<?php echo $password; ?>");
					$("#fname").val("<?php echo $firstname; ?>");
					$("#lname").val("<?php echo $lastname; ?>");
					$("#dob").val("<?php echo $dob; ?>");
					$("#phone").val("<?php echo $mobile; ?>");
					$("#address").val("<?php echo $address; ?>");
					$("#sss").val("<?php echo $sss; ?>");
					$("#tin").val("<?php echo $tin; ?>");
					$("#status").val("<?php echo $status; ?>");
					$("input[name='gender']").each(function(){
						var i = "<?php echo $gender; ?>";
						if(this.value == i){
							$(this).trigger("click");
						}
					});
					$("#comment").val("<?php echo $remarks; ?>");
					$("#team").val("<?php echo $team; ?>");
					$("#level").val("<?php echo $position; ?>");

					$("#username, #dob, input[name='gender']").attr("disabled","disabled");
				})
			</script>
		<?php
			}
		?>
	</body>
</html>
