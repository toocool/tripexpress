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

		<div class="container">
			<?php $att = array('class' => 'form-signin');?>
			<?php echo form_open('login/validate_credentials', $att); ?>
				<h1 class="form-signin-heading text-muted">Trip Express</h1>
				<input type="text" class="form-control" name="username" placeholder="Username" required="" autofocus="">
				<input type="password" class="form-control" name="password" placeholder="Password" required="">
				<button class="btn btn-lg btn-primary btn-block" type="submit">
					Sign In
				</button>
			</form>

		</div>
	</body>
</html>
