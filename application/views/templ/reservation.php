<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author"      content="Sergey Pozhilov (GetTemplate.com)">
	
	<title>Reservation</title>

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
					<li class="active"><a href="">Réservation</a></li>
					<li><a href="<?php echo site_url('contact'); ?>">Contact</a></li>
					<<li><a class="btn" href="<?php echo site_url('admin/connect'); ?>">ADMIN</a></li>
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
			<li class="active">Réservation</li>
		</ol>

		<div class="row">
			<div class="col-sm-1">

			</div>
			<article class="col-sm-10 maincontent">
				<header class="page-header">
					<h1 class="page-title">Réservation</h1>
				</header>

<!--				<p>
					We’d love to hear from you. Interested in working together? Fill out the form below with some info about your project and I will get back to you as soon as I can. Please allow a couple days for me to respond.
				</p>-->
				<br>
					<form method="POST" action="#">
						<fieldset>
						<legend>Client</legend>
							<div class="row">
								<div class="col-sm-4">
									<label for="id_nom">Nom:<span class="text-danger">*</span></label>
								</div>
								<div class="col-sm-6">
									<input type="text" name="nompers" value="<?php echo set_value('nompers'); ?>" placeholder="RANDRIA" id="id_nom" class="form-control"/>
									<?php echo form_error('nompers'); ?>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4">
									<label for="id_prenom">Prénom(s):<span class="text-danger">*</span></label>
								</div>
								<div class="col-sm-6">
									<input type="text" name="prenompers" value="<?php echo set_value('prenompers'); ?>" id="id_prenom" class="form-control" placeholder="Manana"/>
									<?php echo form_error('prenompers'); ?>
								</div>
							</div>
							
							<div class="row">
								<div class="col-sm-4">
									<label for="id_ddn">Date de naissance:<span class="text-danger">*</span></label>
								</div>
								<div class="col-sm-6">
									<input type="date" name="datenaiss" id="id_ddn" value="<?php echo set_value('datenaiss')?>" class="form-control">
                                	<?php echo form_error('datenaiss'); ?>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4">
									<label for="id_tel">Téléphone:<span class="text-danger">*</span></label>
								</div>
								<div class="col-sm-6">
									<input type="tel" name="telephone" id="id_tel" value="<?php echo set_value('telephone')?>" class="form-control" placeholder="033 56 193 74">
									<?php echo form_error('telephone'); ?>
								</div>
							</div>
						</fieldset>
						<br>
						<fieldset>
							<legend>Voyage</legend>
							<div class="row">
								<div class="col-sm-4">
									<label for="id_nom">Voyager:<span class="text-danger">*</span></label>
								</div>
								<div class="col-sm-6">
                                	<input type="radio" name="type_voy" value="vTana" id="vTana" />
                                	<label for="vTana">Vers Antananarivo</label><br>
                                	<input type="radio" name="type_voy" value="Tanav" id="Tanav"/>
                                	<label for="Tanav">Antananarivo vers</label>
                                	<?php echo form_error('type_voy'); ?></td>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4">
									<label>Ville de départ et/ou d'arrivé:<span class="text-danger">*</span></label>
								</div>
								<div class="col-sm-6">
									<select name="ville" class="form-control">
                                        <option value="A">Toamasina</option>                                            
                                        <option value="M">Mahajanga</option>
                                        <option value="F">Fianarantsoa</option>
                                        <option value="U">Toliara</option>
                                        <option value="D">Diego</option>
                                    </select>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4">
									<label for="id_ddn">Sélectionner votre(s) place(s):<span class="text-danger">*</span></label>
								</div>
								<div class="col-sm-6">
									<span>Ch</span>
                                    <input type="checkbox" name="2" value="2"><input type="checkbox" name="3" value="3"><br>
                                    <input type="checkbox" name="4" value="4">
                                    <input type="checkbox" name="5" value="5">
                                    <input type="checkbox" name="6" value="6">
                                    <input type="checkbox" name="7" value="7"><br>
                                    <input type="checkbox" name="8" value="8">
                                    <input type="checkbox" name="9" value="9">
                                    <input type="checkbox" name="10" value="10">
                                    <input type="checkbox" name="11" value="11"><br>
                                    <input type="checkbox" name="12" value="12">
                                    <input type="checkbox" name="13" value="13">
                                    <input type="checkbox" name="14" value="14">
                                    <input type="checkbox" name="15" value="15"><br>
                                    <input type="checkbox" name="16" value="16">
                                    <input type="checkbox" name="17" value="17">
                                    <input type="checkbox" name="18" value="18">
                                    <input type="checkbox" name="19" value="19"><br>
                                    <input type="checkbox" name="20" value="20">
                                    <input type="checkbox" name="21" value="21">
                                    <input type="checkbox" name="22" value="21">
                                    <input type="checkbox" name="23" value="23"><br>
                                    <input type="checkbox" name="24" value="24">
                                    <input type="checkbox" name="25" value="25">
                                    <input type="checkbox" name="26" value="26">
                                    <input type="checkbox" name="27" value="27">
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4">
									<label for="id_ddep">Date de départ:<span class="text-danger">*</span></label>
								</div>
								<div class="col-sm-6">
									<input type="date" name="ddep" id="id_ddep" value="<?php echo set_value('ddep'); ?>" class="form-control">
                                    <?php echo form_error('ddep');?>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-4">
									<label for="id_tdep">Heure de départ:<span class="text-danger">*</span></label>
								</div>
								<div class="col-sm-6">
									<input type="time" name="hdep" id="id_tdep" value="<?php echo set_value('hdep'); ?>" class="form-control">
                                    <?php echo form_error('hdep');?>
								</div>
							</div>
						</fieldset>
						<br>
						<div class="row">
							<div class="col-sm-3">
								<h5><span class="text-danger">* :champs obligatoires</span></h5>
							</div>
							<div class="col-sm-3">
								<h5> <span class="text-danger"> Ch: place du chauffeur</span></h5>
							</div>
							<div class="col-sm-6 text-right">
								<input class="btn btn-action" type="submit" value="Valider">
							</div>
						</div>
					</form>

			</article>
		</div>

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
		




	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="assets/js/headroom.min.js"></script>
	<script src="assets/js/jQuery.headroom.min.js"></script>
	<script src="assets/js/template.js"></script>
</body>
</html>