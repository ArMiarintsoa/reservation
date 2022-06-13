<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author"      content="Sergey Pozhilov (GetTemplate.com)">
	
	<title>Contact</title>
	<link rel="shortcut icon" href="http://localhost/ci/assets/images/icon.png">	
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">

	<link rel="stylesheet" href="http://localhost/ci/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="http://localhost/ci/assets/css/font-awesome.min.css">

	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="http://localhost/ci/assets/css/bootstrap-theme.css" media="screen" >
	<link rel="stylesheet" href="http://localhost/ci/assets/css/main.css">

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body>
	<!-- Fixed navbar -->
	<div class="navbar navbar-inverse navbar-fixed-top headroom" >
		<div class="container">
			<div class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
				<a class="navbar-brand" href="<?php echo site_url('home'); ?>"><img id="logo" src="http://localhost/ci/assets/images/logo.png" alt="Logo dago transport" ></a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right">
					<li><a href="<?php echo site_url('home'); ?>" >Menu</a></li>
					<li><a href="<?php echo site_url('reservation/reserver'); ?>">Réservation</a></li>
					<li class="active"><a href="">Contact</a></li>
					<li><a class="btn" href="<?php echo site_url('admin/connect'); ?>">ADMIN</a></li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div> 
	<!-- /.navbar -->

	<header id="head" class="secondary"></header>

	<!-- container -->
	<div class="container">

		<ol class="breadcrumb">
			<li><a href="<?php echo site_url('home'); ?>" >Menu</a></li>
			<li class="active">Contact</li>
		</ol>

		<div class="row">
			
			<!-- Article main content -->
			<article class="col-xs-12 maincontent">
				<header class="page-header">
					<h1 class="page-title">Contactez nous</h1>
				</header>						
					<div class="row">
						<div class="col-md-6">
							<h2>Adresse</h2>
							<address>
								<h4>Lot X V 59 Ambodivoina Antananarivo Madagascar</h4>
							</address>
						</div>
						<div class="col-md-6 text-center" >
						<h2	>Téléphones</h2>
							<div class="row">
								<div class="col-md-4">
									<h3>Telma </h3>
									<address><h4>034 53 057 87</h4></address>											
								</div>
								<div class="col-md-4">
									<h3>Airtel</h3>
									<address><h4>033 74 747 18</h4></address>									
								</div>
								<div class="col-md-4">
									<h3>Orange</h3>
									<address><h4>032 45 908 56</h4></address>
								</div>
							</div>							
						</div>												
					</div>								
			</article>
		</div>
	</div>	<!-- /container -->
	
	

	<footer id="footer" class="top-space">

		<div class="footer1">
			<div class="container">
				<div class="row">
					
					<div class="col-md-4 widget">
						<h3 class="widget-title">Contact</h3>
						<div class="widget-body">
							<p>+263 34 53 057 87<br>
								<a href="mailto:miariitoki@gmail.com">miariitoki@gmail.com</a><br>
								<br>
								Lot X V 59 Ambodivoina Antananarivo Madagascar
							</p>	
						</div>
					</div>
					<div class="col-md-6"></div>
					<div class="col-md-2 widget">
						<h3 class="widget-title">Suivez nous</h3>
						<div class="widget-body">
							<p class="follow-me-icons text-right">								
								<a href="https://web.facebook.com/miartsoaitokiana.itokiana/"><i class="fa fa-facebook fa-2"></i></a>
							</p>	
						</div>
					</div>
				</div> <!-- /row of widgets -->
			</div>
		</div>

		<div class="footer2">
			<div class="container">
				<div class="row">
				<div class="col-md-6 widget">
					<div class="widget-body">
							<p class="simplenav">
								<a href="<?php echo site_url('home'); ?>" >Menu</a> | 
								<a href="<?php echo site_url('reservation/reserver'); ?>">Reservation</a> |
								<a href="<?php echo site_url('contact'); ?>">Contact</a> |
								<a href="<?php echo site_url('admin/connect');?>">ADMIN</a> |
							</p>			
						</div>
					</div>

					<div class="col-md-6 widget">
						<div class="widget-body">
							<p class="text-right">
								Copyright &copy; 2021, Miarintsoa.</a> 
							</p>
						</div>
					</div>

				</div>

				</div> <!-- /row of widgets -->
			</div>
		</div>

	</footer>		
		




	<!-- JavaScript libs are placed at the end of the document so the pages load faster 
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="assets/js/headroom.min.js"></script>
	<script src="assets/js/jQuery.headroom.min.js"></script>
	<script src="assets/js/template.js"></script>-->
	
	<!-- Google Maps 
	<script src="https://maps.googleapis.com/maps/api/js?key=&amp;sensor=false&amp;extension=.js"></script> 
	<script src="assets/js/google-map.js"></script>-->
	

</body>
</html>