<!DOCTYPE html>
<html>
    <head>
        <title>Voiture</title>
        <link rel="shortcut icon" href="http://localhost/ci/assets/images/icon.png">
        
        <link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
        <link rel="stylesheet" href="http://localhost/ci/assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="http://localhost/ci/assets/css/font-awesome.min.css">

        <!-- Custom styles for our template -->
        <link rel="stylesheet" href="http://localhost/ci/assets/css/bootstrap-theme.css" media="screen" >
        <link rel="stylesheet" href="http://localhost/ci/assets/css/main.css">
    </head>
    <body>
       
            <div class="row">
                <div class="col-sm-12">
                    <h4><u>Nombres des villes:</u><?php echo $ville->num_rows();?></h4>
                    <table class="table table-hover table-striped">
                        <thead >
                            <th scope="">ID Ville</th>
                            <th scope="row">Nom</th>
                            <th>FRAIS(Ariary)</th>
                            <th>DISTANCE (km)</th>
                            <th>Plus</th>
                        </thead>
                        <tbody>
                            <?php
                                foreach($ville->result() as $row){
                            ?>
                                <tr class="bg-info">
                                    <th scope="row"><?php echo $row->idVille;?></th>
                                    <td><?php echo $row->nomVille;?></td>
                                    <td><?php echo $row->frais;?></td>
                                    <td><?php echo $row->distance;?></td>
                                    <td><a href="<?php echo base_url('admin/ville').'/info/'.$row->idVille?>"><i class="fa fa-info fa-2"></i></a></td>
                                </tr>
                            <?php 
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-1"></div>
                <article class="col-sm-10 maincontent">
				    <header class="page-header">
				    	<h1 class="page-title">Ajouter une ville</h1>
				    </header>

                    <!--				<p>
					We’d love to hear from you. Interested in working together? Fill out the form below with some info about your project and I will get back to you as soon as I can. Please allow a couple days for me to respond.
				    </p>-->
				    <br>
					<form method="POST" action="#">
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="id_idville">Id ville:</label>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" name="idville" value="<?php echo set_value('idville'); ?>" id="id_idville" class="form-control"/>
                                <?php echo form_error('idville'); ?>
                            </div>    
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="id_nom">Ville:</label>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" name="nom" value="<?php echo set_value('nom'); ?>" id="id_nom" class="form-control"/>
                                <?php echo form_error('nom'); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="id_frais">Frais:</label>
                            </div>
                            <div class="col-sm-6">
                                <input type="number" name="frais" id="id_frais" value="<?php echo set_value('frais')?>" class="form-control">
                                <?php echo form_error('frais'); ?>
                            </div>
						</div>
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="id_dist">Distance:</label>
                            </div>
                            <div class="col-sm-6">
                                <input type="number" name="dist" id="id_dist" value="<?php echo set_value('dist')?>" class="form-control">
                                <?php echo form_error('dist'); ?>
                            </div>
                        </div>
                        <br>
                        <div class="row"></div>
                        <div class="row">
							<div class="col-sm-3"></div>
							<div class="col-sm-3"></div>
							<div class="col-sm-4 text-right">
								<input class="btn btn-action" type="submit" value="Valider">
                                <input class="btn btn-action" type="reset" value="Annuler">
							</div>                        
						</div>
					</form>
			    </article>                            
            </div> 
    </body>
</html>