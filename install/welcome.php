<?php 
  $redir = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == "on") ? "https" : "http");
      $redir .= "://".$_SERVER['HTTP_HOST'];
      $redir .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
      $redir = str_replace('install/','',$redir); 
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="style.css">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Welcome | Trip Express</title>
	</head>
	<body>
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3"><center><h1>Welcome</h1></center></div>
				<div class="col-md-6 col-md-offset-3" >
					  	<div id="install_form">
						  <p>You have successfully installed Trip Express! <br/>
						  	You can now log in to your Trip express system with the following log in details:</p>
						  <p>username: <strong>admin</strong></p>
						  <p>password: <strong>shift</strong></p>
						  <p><a target="_new" href="<?php echo $redir; ?>">go to the administraton panel</a></p>
						  	
						  	<br/>
						  	
						  	<div class="alert alert-danger" role="alert">
								  <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
								  <span class="sr-only">Error:</span>
								  Please delete the Install folder, and change the admin password 
								  
							</div>

						</div>
				  
				</div>
			</div>
		    
		    
		</div>
	</body>
</html>
