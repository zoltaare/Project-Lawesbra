<div class="list-group"><?php foreach($product as $product){ ?>
	<div class="list-group-item" id="<?php echo $product['price_id'];?>">
		<div class="row-picture">
			<?php 
				echo "<img src='data:image/jpeg;base64,".base64_encode( $product['prod_img'] )."' class='circle'/>";
				?>
			</div>
			<div class="row-content">
				<div class="least-content remove_order">x</div>
				<h4 class="list-group-item-heading"><?php 
					if($product['size_name'] === 'Regular'){
						echo $product['prod_name'];
					}else{
						echo $product['prod_name']." (".$product['size_name'].")"; 
					}
					?></h4>
					<p class="list-group-item-text">
						<span class="label label-info">&#8369;<span class="order_prod_price"><?php echo $product['price']; ?></span>.00 x <span class="order_qty"><?php echo $qty; ?></span> orders</span>&nbsp;<span class="label label-warning">@<span class="order_subtotal"><?php echo ($product['price'] * $qty); ?></span>.00</span>
					</p>
				</div>
			</div>
			<?php } ?>
			<div class="list-group-separator"></div>
		</div>