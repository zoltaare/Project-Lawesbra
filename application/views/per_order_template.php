<div class="list-group the_orders"><?php foreach($product as $product){ ?>
	<div class="list-group-item per_order" id="<?php echo $product['price_id'];?>"> <!-- price ID -->
		<div class="row-picture">
			<?php 
			echo "<img src='data:image/jpeg;base64,".base64_encode( $product['prod_img'] )."' class='circle'/>";
			?>
		</div>
		<div class="row-content">
			<div class="least-content edit_order">Edit</div>
			<h4 class="list-group-item-heading"><?php 
				if($product['size_name'] === 'Regular'){
					echo "<span class='p_name'>". $product['prod_name'] ."</span>";
				}else{
					echo "<span class='p_name'>". $product['prod_name']."</span> (".$product['size_name'].")"; 
				}
				?></h4>
				<p class="list-group-item-text">
					<span class="label label-info">&#8369;<span class="order_prod_price"><?php echo $product['price']; ?></span>.00 x <span class="order_qty"><?php echo $qty; ?></span> orders</span>&nbsp;<span class="label label-warning">@<span class="order_subtotal"><?php echo ($product['price'] * $qty); ?></span>.00</span>
				</p>
			</div>
		</div>
			<?php } ?><!-- 
			<div class="list-group-separator"></div> -->
		</div>

		<!-- modal edit order -->
		<div class="modal modal_edit_order" >
			<div class="modal-dialog" style="margin-top: 100px;">
				<div class="modal-content">
					<div class="modal-body" id="">
						<center>
						<h3><span class='edit_pname'>PName</span> x <span class='pqty'>0</span></h3> 
						<a href="javascript:void(0)" class="btn btn-warning btn-raised edit_reduce" style="width: 40%; text-align: center;">Reduce</a>
						<a href="javascript:void(0)" class="btn btn-primary btn-raised edit_add" style="width: 40%; text-align: center;">Add</a>
						<a href="javascript:void(0)" class="btn btn-success btn-raised edit_ok" style="width: 40%; text-align: center;">OK</a>
						<a href="javascript:void(0)" class="btn btn-danger btn-raised edit_remove" style="width: 40%; text-align: center;">Remove</a>
						</center>
					</div>
					<!-- <div class="modal-footer"><center>
						<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
					</center></div> -->
				</div>
			</div>
		</div>