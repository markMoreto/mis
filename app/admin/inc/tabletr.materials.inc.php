<?php 
	if (!isset($materialExist)) {
		die("Cannot access this file directly");
	}

?>
<tr>

	<td class="center">
		<label>
			<input type="checkbox" class="ace materialschk" />
			<span class="lbl"></span>
		</label>
	</td>

	<td>
		<?php echo $materialExist["material_code"]; ?>
	</td>
	<td><?php echo $materialExist["name"]; ?></td>
	<td class="hidden-480"><?php echo $materialExist["quantity"]; ?></td>
	<td>
		<?php 
			//die(var_dump($supplierResult));
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
				echo "Out of Stock";
			}else{
				echo "In-Stock";
			}
		?>
	</td>
		<?php if(!isset($_GET['print'])){ ?>
	<td>
		<div class="visible-md visible-lg hidden-sm hidden-xs action-buttons">
			<a class="green" href="#">
				<i class="icon-pencil bigger-130"></i>
			</a>

			<a class="delete red" id="<?php echo $materialExist["material_id"]; ?>" table="material" col="material_id" match="<?php echo $materialExist["material_id"]; ?>">
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
		<?php } ?>
</tr>