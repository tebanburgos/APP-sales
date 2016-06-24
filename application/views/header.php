<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
		 <meta name="description" content="">
		<meta name="author" content="Imacom">
		<link rel="icon" href="<?php echo base_url('assets/img/favicon-imacom.ico'); ?>">
		
		<title>Imacom SALES</title>
		<link href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>" rel="stylesheet">
		<link href="<?php echo base_url('assets/custom-theme/jquery-ui-1.10.0.custom.css'); ?>" rel="stylesheet">
		<!--[if IE]>
		  <link href="<?php echo base_url('assets/custom-theme/jquery.ui.1.10.0.ie.css'); ?>" rel="stylesheet">
		<![endif]-->
		<link href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet">
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300,400italic,800' rel='stylesheet' type='text/css'>
		<link href="<?php echo base_url('assets/style.css'); ?>" rel="stylesheet">
		<link href="<?php echo base_url('assets/style-responsive.css'); ?>" rel="stylesheet">
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		<script src="<?php echo base_url('assets/jquery.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/jquery-ui/jquery-ui.min.js'); ?>"></script>
<!--		<script src="<?php // echo base_url('assets/jquery-ui/jquery.tablesorter.min.js'); ?>"></script> -->
<!--		<script src="<?php // echo base_url('assets/jquery-ui/jquery.tablesorter.js'); ?>"></script> -->
<!--		<script src="<?php echo base_url('assets/jquery-ui/jquery-latest.js'); ?>"></script> -->
		<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/bootbox.min.js'); ?>"></script>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300,400italic,800' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.css'); ?>">
	<!--[if lt IE 8]><link rel="stylesheet" href="assets/bootstrap/css/bootstrap-ie7buttonfix.css"><![endif]-->
	<!--[if IE 8]><link rel="stylesheet" href="assets/bootstrap/css/bootstrap-ie8buttonfix.css"><![endif]-->
	</head>
  
	<body>
		<header class="header white-bg">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="<?php echo base_url() ?>"><img src="<?php echo base_url('assets/img/logo-imacom-agencia-digital.png'); ?>"></a>
			</div>
			<div class="top-nav ">
				<ul class="nav pull-right top-menu">
					<li><a href="<?php echo base_url() ?>"><i class="fa fa-home"></i> Inicio</a></li>
					<li class="dropdown">
					<a data-toggle="dropdown" class="dropdown-toggle" href="#">
						<img alt="" src="<?php echo base_url('assets/img/avatar.png'); ?>">
						<span class="username"><?php echo$this->session->userdata('nombre'); ?></span>
						<b class="caret"></b>
					</a>
					<ul class="dropdown-menu">
						<div class="log-arrow-up"></div>
						<!--<li><a href="#"><i class=" icon-suitcase"></i>Perfil</a></li>-->
						<!-- <li><a href="<?php echo site_url('/usuario/cambiar_clave/'); ?>"><i class="fa fa-lock"></i> Cambiar contraseña</a></li> -->
						<?php if ($this->session->userdata('tipo') == "1"){ ?>
						<li><a href="<?php echo site_url('usuario/ingresar/'); ?>"><i class="fa fa-plus"></i> Nuevo usuario</a></li>
						<!-- <li><a href="<?php echo site_url('usuario/administrar/'); ?>"><i class="fa fa-cog fa-fw"></i> Config. de usuarios</a></li> -->
						<?php } ?>
						<li><a href="<?php echo site_url('usuario/salir/'); ?>"><i class="fa fa-sign-out"></i> Salir</a></li>
					</ul>
					</li>
				</ul>
				
			</div><!--/.nav-collapse -->
        </header>