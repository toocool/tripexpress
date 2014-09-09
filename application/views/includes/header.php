
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="<?php echo base_url(); ?>images/favicon.ico">

    <title><?php echo $title ?> | Trip Express</title>

    <!-- Open sans google fonts -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,600,300,800' rel='stylesheet' type='text/css'>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>css/bootstrap.min.css" rel="stylesheet">

    <!-- METRO UI CSS 2.0 FONTS -->
    <link href="<?php echo base_url(); ?>css/iconFont.min.css" rel="stylesheet">
      
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url(); ?>css/dashboard.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>css/datetimepicker.min.css" rel="stylesheet">
  
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="<?php echo base_url(); ?>js/ie10-viewport-bug-workaround.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
<body>
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12 col-md-12 top-nav">
          <ul>
            <li> <a href="<?php echo base_url(); ?>login/logout"><span class="icon-switch"></span></a></li> 
            <li style="background:none;"> <p style="color: #FFF;padding-top: 5px;">Welcome, <?php echo  $this->session->userdata('username')?></p></li> 
          </ul>
           
        </div>
      </div>
     
          
 


