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
                    <h4><u>Nombre des voitures:</u><?php echo $voit->num_rows();?></h4>
                    <table class="table table-hover table-striped">
                        <thead >
                            <th scope="">ID Voiture</th>
                            <th scope="row">Numero</th>
                            <th>Chauffeur</th>
                            <th>Nombre des places</th>
                            <th>Licence</th>
                            <th>Plus</th>
                        </thead>
                        <tbody>
                            <?php
                                foreach($voit->result() as $row){
                            ?>
                                <tr class="bg-info">
                                    <th scope="row"><?php echo $row->idVoit;?></th>
                                    <td><?php echo $row->numVoit;?></td>
                                    <td><?php echo $row->chauffeur;?></td>
                                    <td><?php echo $row->nbrPlace;?></td>
                                    <td><?php echo$row->licence;?></td>
                                    <td><a href="<?php echo base_url('admin/voiture').'/info/'.$row->idVoit?>"><i class="fa fa-info fa-2"></i></a></td>
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
				    	<h1 class="page-title">Ajouter une voiture</h1>
				    </header>

                    <!--				<p>
					We’d love to hear from you. Interested in working together? Fill out the form below with some info about your project and I will get back to you as soon as I can. Please allow a couple days for me to respond.
				    </p>-->
				    <br>
					<form method="POST" action="#">
                        <div class="row">
							<div class="col-sm-4">
								<label for="id_nom">Numero:</label>
							</div>
							<div class="col-sm-6">
                                <input type="text" name="numVoit" value="<?php echo set_value('numVoit'); ?>" class="form-control" />
                                <?php echo form_error('numVoit'); ?>
							</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="id_chauf">Chauffeur:</label>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" name="chauf" value="<?php echo set_value('chauf'); ?>" class="form-control" />
                                <?php echo form_error('chauf'); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="id_npl">Nombre de places:</label>
                            </div>
                            <div class="col-sm-6">
                                <input type="number" name="nb_pl" id="id_npl" value="<?php echo set_value('nb_pl')?>" max="32" min="18" class="form-control">
                                <?php echo form_error('nb_pl'); ?>
                            </div>
						</div>
                        <div class="row">
                            <div class="col-sm-4">
                                <label>Licence:</label>
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