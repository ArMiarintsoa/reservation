<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Information voiture</title>
</head>
<body>
    <?php
        foreach($info_ville->result() as $row){
            $idVille = $row->idVille;
            $nomVille = $row->nomVille;
            $frais = $row->frais;
            $distance = $row->distance;
        }       
    ?>
    <div class="container">
    <div class="row">
        <div class="col-sm-1"></div>
            <article class="col-sm-10 maincontent">
				
            <header class="page-header">
                    <h1 class="page-title">Modifier/supprimer</h1>
                </header>
				<form method="POST" action="#">
                    <div class="row">
                        <div class="col-sm-4">
                            <label for="idville">Id ville:</span></label>
                        </div>
                        <div class="col-sm-6">
                            <input type="text" name="idville" readonly value="<?php echo $idVille;?>" id="idville" class="form-control"/>
                                        <?php echo form_error('idville'); ?>
                                </div>
                        </div>
                        <div class="row">
							<div class="col-sm-4">
								<label for="nom">Nom de la ville:</label>
							</div>
							<div class="col-sm-6">
                                <input type="text" name="nom" id="idville" value="<?php echo $nomVille; ?>" class="form-control" />
                                <?php echo form_error('nom'); ?>
							</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="frais">Frais:</label>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" name="frais" value="<?php echo $frais; ?>" id="frais" class="form-control" />
                                <?php echo form_error('frais'); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="dist">Distance par rapport à la capitale:</label>
                            </div>
                            <div class="col-sm-6">
                                <input type="number" name="dist" id="dist" value="<?php echo $distance;?>" class="form-control">
                                <?php echo form_error('dist'); ?>
                            </div>
						</div>                        
                        <br>
                        <div class="row"></div>
                        <div class="row">
							<div class="col-sm-3"></div>
							<div class="col-sm-3"></div>
							<div class="col-sm-4 text-right">
								<input class="btn btn-success" type="submit" value="Modifier">
                                <a href="<?php echo base_url('admin/ville').'/supprimer/'.$idVille?>"><div class="btn btn-danger">Supprimer</div></a>
							</div>                        
						</div>
					</form>
			    </article>                            
            </div>  
    </div>
</body>
</html>