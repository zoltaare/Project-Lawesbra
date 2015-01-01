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
	
	<div class="container main_content" id="<?php echo $cust_id; ?>"> <!-- main container -->
		<!-- <div class="row"> -->
		<div class="navbar navbar-default navbar-fixed-top">
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
					<li class="nav_link active link_orders"><a href="#">Orders <span class="badge orders_count">0</span></a></li>
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
		</div><br/><br/><br/>
		<!-- </div> -->
		<!-- categories page-->
		<div class="container categories">
			<div class="row">
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
			<div class="row order_list"><br/>
				
			</div>
			<footer class="footer">
		      <!-- <div class="container"> --><center>
		      	<div class="well well-sm" style="padding: 1px; margin-bottom: 0px;">
					<h5>Total Payable : <span class="text-success" style="font-size: 20px;">&#8369;<span id="total_payable"></span>.00</span></h5>
				</div>
		        <a href="javascript:void(0)" class="btn btn-success btn-raised queue_order" data-url="<?php echo base_url(); ?>main/">Queue</a>
		        <a href="javascript:void(0)" class="btn btn-warning btn-raised table_num">Tbl # <span class='the_tnum'></span></a>
		        <a href="javascript:void(0)" class="btn btn-primary btn-raised cash">Cash (Optional) &#8369;<span class='the_cash'></span>.00</a>
		      <!-- </div> --></center>
		    </footer>
		</div>

	</div> <!-- @end main container -->


	<!-- modals -->
	<!-- ajax loader -->
	<div class="ajax_loader">
		<img src="<?php echo base_url(); ?>assets/img/ajax-loader.gif">
	</div>
	<!-- modal quantity -->
	<div class="modal test_modal">
		<div class="modal-dialog" style="margin-top: 80px;">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title"><center>Please Input Quantity</center><span class="hidden selected_item"></span></h4>
				</div>
				<div class="modal-body">

					<div class="numpad"><center>
						<a href="javascript:void(0)" class="btn btn-primary btn-fab btn-raised num" data-price-id="" data-url="<?php echo base_url(); ?>main/add_to_order">1</a>
						<a href="javascript:void(0)" class="btn btn-primary btn-fab btn-raised num" data-price-id="" data-url="<?php echo base_url(); ?>main/add_to_order">2</a>
						<a href="javascript:void(0)" class="btn btn-primary btn-fab btn-raised num" data-price-id="" data-url="<?php echo base_url(); ?>main/add_to_order">3</a>
						<a href="javascript:void(0)" class="btn btn-primary btn-fab btn-raised num" data-price-id="" data-url="<?php echo base_url(); ?>main/add_to_order">4</a>
						<a href="javascript:void(0)" class="btn btn-primary btn-fab btn-raised num" data-price-id="" data-url="<?php echo base_url(); ?>main/add_to_order">5</a>
						<a href="javascript:void(0)" class="btn btn-primary btn-fab btn-raised num" data-price-id="" data-url="<?php echo base_url(); ?>main/add_to_order">6</a>
						<a href="javascript:void(0)" class="btn btn-primary btn-fab btn-raised num" data-price-id="" data-url="<?php echo base_url(); ?>main/add_to_order">7</a>
						<a href="javascript:void(0)" class="btn btn-primary btn-fab btn-raised num" data-price-id="" data-url="<?php echo base_url(); ?>main/add_to_order">8</a>
						<a href="javascript:void(0)" class="btn btn-primary btn-fab btn-raised num" data-price-id="" data-url="<?php echo base_url(); ?>main/add_to_order">9</a>
					</center></div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
				</div>
			</div>
		</div>
	</div>

	<!-- product image modal -->
	<div class="modal modal_show_image">
		<div class="modal-dialog" style="margin-top: 100px;" data-dismiss="modal">
			<div class="modal-content" style="border-radius: 10px;">
				<div class="modal-body" style="padding: 10px;">
					<img class="put_image" src="" height="100%" width="100%">
				</div>
			</div>
		</div>
	</div>

	<!-- modal table num -->
	<div class="modal modal_table_num">
		<div class="modal-dialog" style="margin-top: 20px;">
			<div class="modal-content">
				<div class="modal-header">
					<!-- <h4 class="modal-title"><center>Please Input Your Table Number</center><span class="hidden selected_item"></span></h4> -->
				</div>
				<div class="modal-body"><center>
					<div class="table_input_box">
					
					</div></center>
					<div class="table_numpad"><center>
						<a href="javascript:void(0)" class="btn btn-primary btn-fab btn-raised select_table">1</a>
						<a href="javascript:void(0)" class="btn btn-primary btn-fab btn-raised select_table">2</a>
						<a href="javascript:void(0)" class="btn btn-primary btn-fab btn-raised select_table">3</a>
						<a href="javascript:void(0)" class="btn btn-primary btn-fab btn-raised select_table">4</a>
						<a href="javascript:void(0)" class="btn btn-primary btn-fab btn-raised select_table">5</a>
						<a href="javascript:void(0)" class="btn btn-primary btn-fab btn-raised select_table">6</a>
						<a href="javascript:void(0)" class="btn btn-primary btn-fab btn-raised select_table">7</a>
						<a href="javascript:void(0)" class="btn btn-primary btn-fab btn-raised select_table">8</a>
						<a href="javascript:void(0)" class="btn btn-primary btn-fab btn-raised select_table">9</a>
						<a href="javascript:void(0)" class="btn btn-success btn-fab btn-raised select_table">OK</a>
						<a href="javascript:void(0)" class="btn btn-primary btn-fab btn-raised select_table">0</a>
						<a href="javascript:void(0)" class="btn btn-primary btn-fab btn-raised select_table">C</a>
					</center></div>

				</div>
				<div class="modal-footer"><center>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
				</center></div>
			</div>
		</div>
	</div>

	<!-- modal cash -->
	<div class="modal modal_cash">
		<div class="modal-dialog" style="margin-top: 20px;">
			<div class="modal-content">
				<div class="modal-header">
					<!-- <h4 class="modal-title"><center>Please Input Your Table Number</center><span class="hidden selected_item"></span></h4> -->
				</div>
				<div class="modal-body"><center>
					<div class="cash_input_box">
					
					</div></center>
					<div class="cashpad"><center>
						<a href="javascript:void(0)" class="btn btn-primary btn-fab btn-raised input_cash">1</a>
						<a href="javascript:void(0)" class="btn btn-primary btn-fab btn-raised input_cash">2</a>
						<a href="javascript:void(0)" class="btn btn-primary btn-fab btn-raised input_cash">3</a>
						<a href="javascript:void(0)" class="btn btn-primary btn-fab btn-raised input_cash">4</a>
						<a href="javascript:void(0)" class="btn btn-primary btn-fab btn-raised input_cash">5</a>
						<a href="javascript:void(0)" class="btn btn-primary btn-fab btn-raised input_cash">6</a>
						<a href="javascript:void(0)" class="btn btn-primary btn-fab btn-raised input_cash">7</a>
						<a href="javascript:void(0)" class="btn btn-primary btn-fab btn-raised input_cash">8</a>
						<a href="javascript:void(0)" class="btn btn-primary btn-fab btn-raised input_cash">9</a>
						<a href="javascript:void(0)" class="btn btn-success btn-fab btn-raised input_cash">OK</a>
						<a href="javascript:void(0)" class="btn btn-primary btn-fab btn-raised input_cash">0</a>
						<a href="javascript:void(0)" class="btn btn-primary btn-fab btn-raised input_cash">C</a>
					</center></div>

				</div>
				<div class="modal-footer"><center>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
				</center></div>
			</div>
		</div>
	</div>

	<!-- success add order alert -->
	<div class="alert alert-dismissable alert-success success_add_alert">
	    
	</div>

</body>
</html>