				<div class="sidebar" id="sidebar">
					<script type="text/javascript">
						try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
					</script>

					<div class="sidebar-shortcuts hidden" id="sidebar-shortcuts">
						<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">
							<button class="btn btn-success">
								<i class="icon-signal"></i>
							</button>

							<button class="btn btn-info">
								<i class="icon-pencil"></i>
							</button>

							<button class="btn btn-warning">
								<i class="icon-group"></i>
							</button>

							<button class="btn btn-danger">
								<i class="icon-cogs"></i>
							</button>
						</div>

						<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
							<span class="btn btn-success"></span>

							<span class="btn btn-info"></span>

							<span class="btn btn-warning"></span>

							<span class="btn btn-danger"></span>
						</div>
					</div><!-- #sidebar-shortcuts -->

					<ul class="nav nav-list">
						<li <?php echo $_GET['page'] == 'dashboard' ? "class='active'" : ""; ?>>
							<a href="index.php?user=<?php echo $_SESSION["currentuser"]; ?>&page=dashboard">
								<i class="icon-dashboard"></i>
								<span class="menu-text"> Dashboard </span>
							</a>
						</li>
						<?php //this should for employee only since admin doesn't have project assigned ?>
						<li <?php echo $_GET['page'] == 'project' ? "class='active'" : ""; ?>>
							<a href="project.php?user=<?php echo $_SESSION["currentuser"]; ?>&page=project">
								<i class="icon-book"></i>
								<span class="menu-text"> Project </span>
							</a>
						</li>
						<li <?php echo $_GET['page'] == 'users' ? "class='active'" : ""; ?>>
							<a href="user.php?user=<?php echo $_SESSION["currentuser"]; ?>&page=users">
								<i class="icon-group"></i>
								<span class="menu-text"> Users </span>
							</a>
						</li>
						<li <?php echo $_GET['page'] == 'materials' ? "class='active'" : ""; ?>>
							<a href="material.php?user=<?php echo $_SESSION["currentuser"]; ?>&page=materials">
								<i class="  icon-legal"></i>
								<span class="menu-text"> Materials </span>
							</a>
						</li>
						<li <?php echo $_GET['page'] == 'reports' ? "class='active'" : ""; ?>>
							<a href="#?user=<?php echo $_SESSION["currentuser"]; ?>&page=reports">
								<i class=" icon-flag"></i>
								<span class="menu-text"> Reports </span>
							</a>
							<ul class="submenu" style="display: block;">
								<li>
									<a href="print.materials.php?print=yes">
										<i class="icon-double-angle-right"></i>
										Materials
									</a>
								</li>
							</ul>
						</li>
					</ul><!-- /.nav-list -->

					<div class="sidebar-collapse" id="sidebar-collapse">
						<i class="icon-double-angle-left" data-icon1="icon-double-angle-left" data-icon2="icon-double-angle-right"></i>
					</div>

					<script type="text/javascript">
						try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
					</script>
				</div>