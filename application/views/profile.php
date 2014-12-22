<!DOCTYPE html>
<html>
<head>
	<title>Project Lawesbra</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<!-- css -->
	<!-- <link rel="stylesheet" href="<?php echo base_url(); ?>assets/libs/jqm/jquery.mobile-1.4.5.min.css"> -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/libs/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/libs/css/material.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/styles.css">
	
	<!-- js -->
	<script src="<?php echo base_url(); ?>assets/libs/js/jquery.min.js"></script>
	<!-- <script src="<?php echo base_url(); ?>assets/libs/jqm/jquery.mobile-1.4.5.min.js"></script> -->
	<script src="<?php echo base_url(); ?>assets/libs/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/libs/js/material.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
</head>
<body>

	<!-- <h1> <?php echo $cust_id; ?> </h1> -->
	
	<div class="container"> <!-- main container -->

		<div class="navbar navbar-default row">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<!-- <a class="navbar-brand link_home" href="#">Project Lawesbra</a> -->
				<a class="navbar-brand link_home" href="#"><i class="mdi-maps-restaurant-menu" style="font-size: 28px;"></i></a>
				<div class="page_header_title">Categories</div>
			</div>

			<div class="navbar-collapse collapse navbar-responsive-collapse">
				<ul class="nav navbar-nav">
					<li class="nav_link active link_orders"><a href="#">Orders <span class="badge orders_count"></span></a></li>
					<li class="nav_link link_categories"><a href="#">Categories</a></li>
				</ul>
				<form class="navbar-form navbar-left">
					<input type="text" class="form-control col-lg-8" placeholder="Search a Product">
				</form>
				<!-- logout -->
				<ul class="nav navbar-nav navbar-right">
					<li class="link_logout"><a href="<?php echo base_url(); ?>">Logout</a></li>
				</ul>
			</div>
		</div>


		<!-- categories page-->
		<div class="container categories">
			<div class="row">
				<h3><center>CATEGORIES</center></h3>
				<div class="list-group">

					<?php foreach ($categories as $category) { ?>
					<div class="list-group-item category_container" data-url="<?php echo base_url(); ?>main/get_prods" id="<?php echo $category['cat_id']; ?>">
						<div class="row-picture">
							<?php 
							echo "<img src='data:image/jpeg;base64,".base64_encode( $category['cat_img'] )."' class='circle'/>";
							?>
						</div>
						<div class="row-content">
							<h4 class="list-group-item-heading category-name" style="color: rgba(255,255,255,.84);"><?php echo $category['cat_name'] ?></h4>
							<i class="mdi-navigation-expand-less category-chevron"></i>
						</div>
					</div>

					<?php } ?>	

				</div><!-- @end list-group -->
			</div> <!-- @end row -->
		</div> <!-- @end container : categories -->



		<!-- per category -->
		<div class="container category">
			
		</div>

		<!-- orders -->
		<div class="container orders">
			<div class="row">
				<div class="list-group">
				    <div class="list-group-item" style="background-color: gray;">
				        <div class="row-action-primary">
				            <a href="javascript:void(0)" class="btn btn-danger btn-fab btn-raised mdi-action-grade"></a>
				        </div>
				        <div class="row-content">
				            <div class="least-content">15m</div>
				            <h4 class="list-group-item-heading">Tile with a label</h4>
				            <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus.</p>
				        </div>
				    </div>
				    <div class="list-group-separator"></div>
				    <div class="list-group-item">
				        <div class="row-action-primary">
				            <a href="javascript:void(0)" class="btn btn-danger btn-fab btn-raised mdi-action-grade"></a>
				        </div>
				        <div class="row-content">
				            <div class="least-content">15m</div>
				            <h4 class="list-group-item-heading">Tile with a label</h4>
				            <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus.</p>
				        </div>
				    </div>
				    <div class="list-group-separator"></div>
				    <div class="list-group-item">
				        <div class="row-action-primary">
				            <a href="javascript:void(0)" class="btn btn-danger btn-fab btn-raised mdi-action-grade"></a>
				        </div>
				        <div class="row-content">
				            <div class="least-content">15m</div>
				            <h4 class="list-group-item-heading">Tile with a label</h4>
				            <p class="list-group-item-text">Donec id elit non mi porta gravida at eget metus.</p>
				        </div>
				    </div>
				    <div class="list-group-separator"></div>
				</div>
			</div>
		</div>

	</div> <!-- @end main container -->


<!-- modals -->
		<div class="modal test_modal">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Please Input Quantity <span class="hidden selected_item"></span></h4>
					</div>
					<div class="modal-body">

						<div class="numpad"><center>
							<a href="javascript:void(0)" class="btn btn-warning btn-fab btn-raised num">1</a>
							<a href="javascript:void(0)" class="btn btn-warning btn-fab btn-raised num">2</a>
							<a href="javascript:void(0)" class="btn btn-warning btn-fab btn-raised num">3</a>
							<a href="javascript:void(0)" class="btn btn-warning btn-fab btn-raised num">4</a>
							<a href="javascript:void(0)" class="btn btn-warning btn-fab btn-raised num">5</a>
							<a href="javascript:void(0)" class="btn btn-warning btn-fab btn-raised num">6</a>
							<a href="javascript:void(0)" class="btn btn-warning btn-fab btn-raised num">7</a>
							<a href="javascript:void(0)" class="btn btn-warning btn-fab btn-raised num">8</a>
							<a href="javascript:void(0)" class="btn btn-warning btn-fab btn-raised num">9</a>
						</center></div>

					</div>
					<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
					</div>
				</div>
			</div>
		</div>

</body>
</html>