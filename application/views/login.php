<!DOCTYPE html>
<html>
<head>
	<title>Project Lawesbra</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
	<!-- css -->
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/libs/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/libs/css/material.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/styles.css">
	
	<!-- js -->
	<script src="<?php echo base_url(); ?>assets/libs/js/jquery.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/libs/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/libs/js/material.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/js/scripts.js"></script>
</head>
<body>

	<div class="container">
		<div class="container site_heading">
			<small>logo and tag line here</small>	
		</div>
		<div class="container">
			<form class="form-horizontal form_login" action="<?php echo base_url(); ?>main/login" >
				<fieldset>
					<legend>Please Login</legend>
					<!-- error -->
					<div class="alert alert-danger hidden errormsg_login">
					    <!-- <button type="button" class="close" data-dismiss="alert">×</button> -->
					    Invalid Username/Password.
					</div>
					<!-- username -->
					<div class="form-group">
						<label for="username" class="col-lg-2 control-label">Username</label>
						<div class="col-lg-10">
							<input type="text" class="form-control" name='username' id="login_username" required autofocus>
						</div>
					</div>
					<!-- pass -->
					<div class="form-group">
						<label for="password" class="col-lg-2 control-label">Password</label>
						<div class="col-lg-10">
							<input type="password" class="form-control" name='password' id="login_password" required>
						</div>
					</div>
					<!-- submit -->
					<div class="form-group">
						<div class="col-lg-10 col-lg-offset-2">
							<button type="submit" class="btn btn-primary submit_login">Submit</button>
						</div>
					</div>
				</fieldset>
			</form>
		</div>
	</div>


</div>
</body>
</html>