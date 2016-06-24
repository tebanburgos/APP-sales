<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="author" content="Imacom">
		<link rel="icon" href="<?php echo base_url('assets/img/favicon-imacom.ico'); ?>">

		<title>Ingreso - Imacom SALES</title>

		<!-- Bootstrap core CSS -->
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
		<script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
		<script src="<?php echo base_url('assets/bootbox.min.js'); ?>"></script>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,300,400italic,800' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.css'); ?>">
	<!--[if lt IE 8]><link rel="stylesheet" href="assets/bootstrap/css/bootstrap-ie7buttonfix.css"><![endif]-->
	<!--[if IE 8]><link rel="stylesheet" href="assets/bootstrap/css/bootstrap-ie8buttonfix.css"><![endif]-->
	</head>

	<body class="login-body">
		<div class="container">
			<form class="form-signin" action="<?php echo site_url('usuario/entrar'); ?>" method="post">
				<h2 class="form-signin-heading">Ingresar</h2>
				<div class="login-wrap">
					<div class="col-md-12">
						<div class='<?=$this->session->flashdata('mensaje_clase'); ?>'> <?=$this->session->flashdata('mensaje'); ?> </div>
					</div>
					<input type="text" name="usuario" class="form-control" placeholder="Usuario" autofocus required>
					<input type="password" name="password" class="form-control" placeholder="Contraseña" required>
					<!-- <div class="pull-right"><small><a href="<?php echo site_url('usuario/recuperar_clave'); ?>">Olvidé mi contraseña</a></small></div> -->
					<button class="btn btn-lg btn-login btn-block" type="submit">Entrar</button>
				</div>
			</form>
		</div>
	</body>
</html>