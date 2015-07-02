<!DOCTYPE html>
<html>
	<head>
		<title><?php echo $title; ?> | Trip Express</title>
		<!-- Bootstrap core CSS -->
    	<link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">

    	<!-- Login form CSS -->
   		<link href="<?php echo base_url(); ?>css/login.css" rel="stylesheet">
   		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
	    <script src="<?php echo base_url(); ?>js/ie10-viewport-bug-workaround.js"></script>

	    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	    <!--[if lt IE 9]>
	      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	    <![endif]-->
	</head>
	<body>
		<div id="fullscreen_bg" class="fullscreen_bg"/>
		<div id="logo" style="height: 200px; text-align: center; padding: 50px"><img src="/images/logo.png" style="height: 200px;"></div>
		<div class="container" role="form">
			<?php $att = array('class' => 'form-signin');?>
			<?php echo form_open('login/validate_credentials', $att); ?>
			<h3 class="form-signin-heading text-muted"></br>Welcome Back! Please Sign In</h3>
					<hr class="colorgraph"><br>
					<div class="input-group">
					 	<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
						<input type="text" class="form-control" name="username" placeholder="Username" required="" autofocus="">
					</div>

					<div class="input-group">
						<span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
						<input type="password" class="form-control" name="password" placeholder="Password" required="">
					</div>

				<p style="color: #ff0000; text-align: center;"><?php echo $error ?></p>
				<button class="btn btn-lg btn-primary btn-block" type="submit">
					Sign In
				</button>
				<a href="forgot"><h5 align="center">Forgot your password?</h5>
			</form>
		</div>
	</body>
</html>
