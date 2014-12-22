<div class="row">
	<div class="list-group">
	<?php foreach ($products as $product) { ?>
		<div class="list-group-item">
			<div class="row-picture">
				<?php 
				echo "<img src='data:image/jpeg;base64,".base64_encode( $product['prod_img'] )."' class='circle'/>";
				?>
				<div class="least-content prod_price lead text-warning"><?php echo $product['price'].".00"; ?></div>
			</div>
			<div class="row-content">
				<div class="least-content">
				<?php 
					if($product['size_name'] === 'Regular'){

					}else{
						echo "<span class='label label-info'>".$product['size_name']."</span>";
					}
				?>
				</div>
				<h4 class="list-group-item-heading prod_name"><?php echo $product['prod_name']; ?></h4>
				<!-- <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus</p> -->
				<a href="javascript:void(0)" class="btn btn-primary btn-raised add_to_order" id="<?php echo $product['price_id']; ?>">Add to Order</a>
			</div>
		</div>
		<div class="list-group-separator"></div> 
	<?php } ?>
	</div>
</div>