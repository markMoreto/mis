<?php 
	if (!isset($accountExist)) {
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
		<?php echo $accountExist["first_name"]; ?>
	</td>
	<td><?php echo $accountExist["last_name"]; ?></td>
	<td class="hidden-480">
		<?php 
			if ($teamResult == "-") {
				echo $teamResult;
			}else{
				echo $teamResult['team_name'];
			}
		?>
	</td>
	<td>
		<?php 
			if($timeResult == "-"){
				echo $timeResult;
			}else{
				echo date("F jS \of  Y | h:m:s A", strtotime($timeResult["time_in"])); 
			}
		?>
	</td>

	<td class="hidden-480">
		<?php 
			echo (date("Y") - substr($accountExist["birth_date"], 0, 4)); 
		?>
	</td>

	<td>
		<div class="tbusers visible-md visible-lg hidden-sm hidden-xs action-buttons">
			<a class="green edit" href="user.php?user=1&page=users&edit=<?php echo $accountExist["ua_id"]; ?>">
				<i class="icon-pencil bigger-130"></i>
			</a>

			<a class="delete red" id="<?php echo $accountExist["ua_id"]; ?>" table="ua" col="ua_id" match="<?php echo $accountExist["ua_id"]; ?>">
				<i class="icon-trash bigger-130"></i>
			</a>
		</div>

		<!-- RESERVED -->
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