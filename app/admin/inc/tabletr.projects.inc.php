<?php 
	if (!isset($projectExist)) {
		die("Cannot access this file directly");
	}
	/**
	 * {
  "budget": "3,123,123.00",
  "client_id": "zayala",
  "engineer": "Zobel Ayala",
  "project_address": "101 St. Burgundy Tower, Ayala, Makati City",
  "project_id": "1",
  "project_name": "Burgundy Tower",
  "remarks": "Executive Project in Ayala, Makati",
  "status": "approved",
  "supply_id": "1",
  "team_id": "1",
  "timeline_id": "1"
}
	 * 
	 * 	Project Name	Engineer / Manager	Client	 Timeline	Status
	 */
?>
<tr>
	<td class="center">
		<label>
			<input type="checkbox" class="ace" />
			<span class="lbl"></span>
		</label>
	</td>

	<td>
		<a href="reports/?project=<?php echo $projectExist["project_name"]; ?>" target="_blank">
			<?php echo $projectExist["project_name"]; ?>
		</a>
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