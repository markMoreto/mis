<?php 
	if (!isset($projectExist)) {
		die("Cannot access this file directly");
	}
?>
<tr>
	<td class="center">
		<label>
			<input type="checkbox" class="ace" />
			<span class="lbl"></span>
		</label>
	</td>

	<td>
		<form action="print.projects.php" method="post" target="_blank">
			<!-- hidden values of form fields here -->
			<?php 
			//TODO:
			//Change budget format to pure digit for JS quantity price calc
			//check material id
			//
				// $projectExist - project tb
				// $profileResult - engineer profile 
				// $profileResultcli - Client profile
				// $timelineResult - timeline tb

			?>
			<input name="project_id" value="<?php echo  $projectExist['project_id']; ?>" class="hidden" />
			<input name="project_budget" value="<?php echo  $projectExist['budget']; ?>" class="hidden" />
			<input name="project_name" value="<?php echo  $projectExist['project_name']; ?>" class="hidden" />
			<input name="project_address" value="<?php echo  $projectExist['project_address']; ?>" class="hidden" />
			<input name="project_status" value="<?php echo  $projectExist['status']; ?>" class="hidden" />
			<input name="project_remarks" value="<?php echo  $projectExist['remarks']; ?>" class="hidden" />
			<input name="engr_fullname" value="<?php echo  $profileResult["first_name"] . " " . $profileResult["last_name"]; ?>" class="hidden" />
			<input name="cli_fullname" value="<?php echo  $profileResultcli["first_name"] . " " . $profileResultcli["last_name"]; ?>" class="hidden" />
			<input name="cli_email" value="<?php echo  $profileResultcli['email']; ?>" class="hidden" />
			<input name="cli_phone" value="<?php echo  $profileResultcli['contact_number']; ?>" class="hidden" />
			<input name="cli_remarks" value="<?php echo  $profileResultcli['remarks']; ?>" class="hidden" />
			<input name="timeline_start" value="<?php echo  $timelineResult["date_start"]; ?>" class="hidden" />
			<input name="timeline_end" value="<?php echo  $timelineResult["date_end"]; ?>" class="hidden" />
			<input name="project_team" value="<?php echo  $projectExist["team_id"]; ?>" class="hidden" />
			<!-- missing team -->
			<button class="btn" type="submit">
				<i class="icon-print"></i>
			</button>
				<?php echo $projectExist["project_name"]; ?>

		</form>
	</td>
	<td><?php echo $profileResult["first_name"] . " " . $profileResult["last_name"]; ?></td>
	<td class="hidden-480"><?php echo $profileResultcli["first_name"] . " " . $profileResultcli["last_name"]; ?></td>
	<td>
		<?php 
			echo "<b>From:</b> <span class='label label-info arrowed-right arrowed-in'>" . $timelineResult["date_start"] . "</span> <b>To:</b> <span class='label label-danger arrowed'>" . $timelineResult["date_end"] . "</span>";
		?>
	</td>

	<td class="hidden-480">
		<?php 
			echo $projectExist["status"]; 
		?>
	</td>

	<td>
		<div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
			<a class="green" href="#">
				<i class="icon-pencil bigger-130"></i>
			</a>

			<a class="delete red" id="<?php echo $projectExist["project_id"]; ?>" table="project" col="project_id" match="<?php echo $projectExist["project_id"]; ?>">
				<i class="icon-trash bigger-130"></i>
			</a>
		</div>

		<div class="visible-xs visible-sm hidden-md hidden-lg">
			<div class="inline position-relative">
				<button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown">
					<i class="icon-caret-down icon-only bigger-120"></i>
				</button>

				<ul class="dropdown-menu dropdown-only-icon dropdown-yellow pull-right dropdown-caret dropdown-close">
					<li>
						<a href="#" class="tooltip-info" data-rel="tooltip" title="View">
							<span class="blue">
								<i class="icon-zoom-in bigger-120"></i>
							</span>
						</a>
					</li>

					<li>
						<a href="#" class="tooltip-success" data-rel="tooltip" title="Edit">
							<span class="green">
								<i class="icon-edit bigger-120"></i>
							</span>
						</a>
					</li>

					<li>
						<a href="#" class="tooltip-error" data-rel="tooltip" title="Delete">
							<span class="red">
								<i class="icon-trash bigger-120"></i>
							</span>
						</a>
					</li>
				</ul>
			</div>
		</div>
	</td>
</tr>