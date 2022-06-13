<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author"      content="Sergey Pozhilov (GetTemplate.com)">
	
	<title>Place non disponible</title>

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
	<!-- container -->
	<div class="container">

		<ol class="breadcrumb">
			<li  class="text-danger">Message d'avertissement</li>
		</ol>

		<div class="row">
			
			<!-- Article main content -->
			<article class="col-xs-12 maincontent">
				<header class="page-header">
					<h1 class="page-title">Désolé Mr/Mme: <?php echo $nom_cli ?></h1>
				</header>
				<form action="" method="post">
					<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
						<div class="panel panel-default">
							<div class="panel-body">
								<h3 class="thin text-center">Erreur des places que vous avez réservé</h3>
								<p class="text-center text-muted">Place: <?php echo $place_non_dispo; ?> sont indisponible pour le voyage <?php echo $voyage; ?></p>
								<hr>
								
								<form>
									<div class="col-lg-8">
										<b><a href="">Vous voulez réserver d'autres places ou d'autre voyage ? cliquer sur ce bouton</a></b>
									</div>
									<div class="col-lg-4 text-right">
									<p class="text-right"><a class="btn btn-primary btn-large" href="<?php echo site_url('reservation/reserver') ?>">Réserver</a></p>
									</div>
								</form>
							</div>
						</div>

					</div>
				</form>
			</article>
			<!-- /Article -->

		</div>
	</div>	<!-- /container -->
</body>
</html>