<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>/system/application/views/home/img/favicon.png">

    <title>SISFO DATA OBAT PUSKESMAS</title>

    <!-- Bootstrap CSS -->    
    <link href="<?php echo base_url(); ?>/system/application/views/home/css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="<?php echo base_url(); ?>/system/application/views/home/css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="<?php echo base_url(); ?>/system/application/views/home/css/elegant-icons-style.css" rel="stylesheet" />
    <link href="<?php echo base_url(); ?>/system/application/views/home/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="<?php echo base_url(); ?>/system/application/views/home/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>/system/application/views/home/css/style-responsive.css" rel="stylesheet" />

	<style type="text/css">
			body { background: url(<?php echo base_url(); ?>system/application/views/home/img/bg2.jpg) !important; }
		</style>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

  <body class="login-img3-body">

    <div class="container">

      <form class="login-form" action="<?php echo "".base_url()."index.php/web/login" ?>" method="post">        
        <div class="login-wrap">
            <p class="login-img"><i class="icon_lock_alt"></i></p>
            <div class="input-group">
              <span class="input-group-addon"><i class="icon_profile"></i></span>
              <input type="text" class="form-control" name="username" id="username" placeholder="type username" autofocus>
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
				<input type="password" class="form-control" name="password" id="password" placeholder="type password">
            </div>
            
            <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
           
        </div>
      </form>

    </div>


  </body>
</html>
