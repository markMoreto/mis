<?php 
	if (!isset($materialExist)) {
		die("Cannot access this file directly");
	}

?>
<tr>
	<td class="center">
		<label>
			<input type="checkbox" class="ace materialschk" value="<?php echo $materialExist["material_id"]; ?>"/>
			<span class="lbl"></span>
		</label>
	</td>

	<td class="<?php echo $materialExist["material_id"]; ?>">
		<?php echo $materialExist["quantity"]; ?>
	</td>
	<td><?php echo $materialExist["name"]; ?></td>
	<td class="hidden-480">
		<select class='itemQty' name="<?php echo $materialExist["material_code"]; ?>"  id="<?php echo $materialExist["material_id"]; ?>" class="materialqty">
			<?php 
				for ($i=0; $i <= 1000; $i++) { 
					echo "<option value='".$i."'>".$i."</option>";
				}
			?>
		</select>
	</td>
	<td>
		<?php 
			if ($supplierResult == "-") {
				echo "-";
			} else {
				echo $supplierResult["name"];
			}
		?>
	</td>

	<td class="hidden-480">
		<?php 
			if((integer)$materialExist["quantity"] < 0){
				echo "<span class='label label-sm label-warning'>Out of Stock</span>";
			}else{
				echo "<span class='label label-sm label-success'>In-Stock</span>";
			}
		?>
	</td>

	<td>
		<div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
			<a class="green" href="#">
				<i class="icon-pencil bigger-130"></i>
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