<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author"      content="Sergey Pozhilov (GetTemplate.com)">
	
	<title>Réservation avec succès</title>

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


		<div class="row">
        <?php 
            foreach($client->result() as $row){
                $numCli = $row->numCli;
                $nomCli = $row->nomCli;
                $prenomCli = $row->prenomCli;
            }
        
            foreach($voyage->result() as $row){
                $numVoy = $row->numVoy;
                $typeVoy = $row->typeVoy;
                $date_dep = $row->date_dep;
                $heure_dep = $row->heure_dep;
            }


            foreach($voiture->result() as $row){
                $numVoit = $row->numVoit;
                $chauffeur = $row->chauffeur;
            }

            foreach($ville->result() as $row){
                $nomVille = $row->nomVille;
                $frais = $row->frais;
            }
            
            if($typeVoy == 'Tanav'){
                $typeVoy =  'Antananarivo vers '.$nomVille;
            }
            else{
                $typeVoy =  $nomVille.' vers Antananarivo';
            }

        ?>
			<!-- Article main content -->
			<article class="col-xs-12 maincontent">
				<header class="page-header">
					<h1 class="page-title">Félicitaton Mr/Mme: <?php echo $nomCli ?></h1>
				</header>
				<form action="" method="post">
					<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
						<div class="panel panel-default">
							<div class="panel-body">
								<h2 class="thin text-center">Billet du voyage</h2>
								<p class="text-center ">Numéro du voyage : <?php echo  $numVoy; ?></p>								
								<table class="table">
                                    <tr>
                                        <th>Numéro client: </th>
                                        <td><?php echo $numCli?></td>
                                    </tr>
                                    <tr>
                                        <th>Nom: </th>
                                        <td><?php echo $nomCli?></td>
                                    </tr>
                                    <tr>
                                        <th>Prenom: </th>
                                        <td><?php echo $prenomCli?></td>
                                    </tr>
                                    <tr>
                                        <th>Type du voyage: </th>
                                        <td><?php echo $typeVoy?></td>
                                    </tr>
                                    <tr>
                                        <th>Date du départ: </th>
                                        <td><?php echo $date_dep?></td>
                                    </tr>
                                    <tr>
                                        <th>à: </th>
                                        <td><?php echo $heure_dep?></td>
                                    </tr>
                                    <tr>
                                        <th>Avec la voiture ayant le numéro matricule: </th>
                                        <td><?php echo $numVoit?></td>
                                    </tr>
                                    <tr>
                                        <th>Chauffeur : </th>
                                        <td><?php echo $chauffeur?></td>
                                    </tr>
                                    <tr>
                                        <th>Sur la(s) place(s) n°: </th>
                                        <td><?php echo $numplace?></td>
                                    </tr>
                                    <tr>
                                        <th>Frais d'une place: </th>
                                        <td><?php echo $frais?> Ariary</td>
                                    </tr>
                                    <tr>
                                        <th>Frais total: </th>
                                        <td><?php echo $frais*$nbrplace;?> Ariary</td>
                                    </tr>
                                    
                                </table>
								<form>
									<div class="col-lg-8">
            
									</div>
									<div class="col-lg-4 text-right">
                                    <p class="text-right"><a class="btn btn-primary btn-large" href="<?php echo site_url('reservation/reserver') ?>">Ok</a></p>
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
	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="assets/js/headroom.min.js"></script>
	<script src="assets/js/jQuery.headroom.min.js"></script>
	<script src="assets/js/template.js"></script>
</body>
</html>