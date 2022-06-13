<head>
    <!--<link rel="stylesheet" href="../../asset/css/header.css">-->
    <link rel="shortcut icon" href="http://localhost/ci/assets/images/icon.png">
	
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="http://localhost/ci/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="http://localhost/ci/assets/css/font-awesome.min.css">

	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="http://localhost/ci/assets/css/bootstrap-theme.css" media="screen" >
	<link rel="stylesheet" href="http://localhost/ci/assets/css/main.css">
</head>
<html>
    <?php $this->load->helper('url'); ?>
    <div class="navbar navbar-inverse navig" >
    <nav class="">
        <div class="container">
            <div class="navbar-header">
                <!-- Button for smallest screens -->
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                <a class="navbar-brand" href="<?php echo site_url('home'); ?>"><img id="logo" src="http://localhost/ci/assets/images/logo.png" alt="Logo dago transport" ></a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav pull-right"> 
                    <li><a href="<?php echo site_url('admin/client'); ?>">Client</a></li>
                    <li><a href="<?php echo site_url('admin/voiture'); ?>">Voiture</a></li>
                    <li><a href="<?php echo site_url('admin/ville'); ?>">Ville</a></li>
                    <li><a href="<?php echo site_url('admin/voyage'); ?>">Voyage</a></li>
                    <li><a class="btn" href="<?php echo site_url('home'); ?>" >Deconnecter</a></li>
                </ul>
            </div>
        </div>    
    </nav>
</div>
</html>