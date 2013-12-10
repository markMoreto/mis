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
			<input name="project_id" value="" class="hidden" />
			<input name="project_budget" value="" class="hidden" />
			<input name="project_name" value="" class="hidden" />
			<input name="project_address" value="" class="hidden" />
			<input name="project_status" value="" class="hidden" />
			<input name="project_remarks" value="" class="hidden" />
			<input name="engr_fullname" value="" class="hidden" />
			<input name="cli_fullname" value="" class="hidden" />
			<input name="cli_email" value="" class="hidden" />
			<input name="cli_remarks" value="" class="hidden" />
			<input name="timeline_start" value="" class="hidden" />
			<input name="timeline_end" value="" class="hidden" />

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
				echo "<b>From:</b> " . $timelineResult["date_start"] . "| <b>To:</b> " . $timelineResult["date_end"];
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

			<a class="red" href="#">
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