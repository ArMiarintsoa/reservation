<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Information client</title>
</head>
<body>
    <?php
        foreach($info_cli->result() as $row){
            $num = $row->numCli;
            $nom = $row->nomCli;
            $prenom = $row->prenomCli;
            $ddn = $row->ddnCli;
            $tel = $row->telCli;
        }
    ?>
    <div class="container">
        <div class="row">
            
            <!-- Article main content -->
            <article class="col-sm-11 maincontent">
                <header class="page-header">
                    <h1 class="page-title">Modifier/supprimer</h1>
                </header>
                <form action="" method="post">
					<div class="row">
						<div class="col-sm-4">
							<label for="id_num">Numero client:</span></label>
						</div>
							<div class="col-sm-6">
									<input type="text" name="nompers" readonly value="<?php echo $num;?>" id="id_nom" class="form-control"/>
									<?php echo form_error('nompers'); ?>
							</div>
					</div>
					<div class="row">
						<div class="col-sm-4">
							<label for="id_nom">Nom:</span></label>
						</div>
							<div class="col-sm-6">
									<input type="text" name="nompers"  value="<?php echo $nom;?>" id="id_nom" class="form-control"/>
									<?php echo form_error('nompers'); ?>
							</div>
					</div>
					<div class="row">
						<div class="col-sm-4">
							<label for="id_prenom">Prenom(s):</label>
						</div>
						<div class="col-sm-6">
							<input type="text" name="prenompers" value="<?php echo $prenom;?>" id="id_prenom" class="form-control"/>
							<?php echo form_error('prenompers'); ?>
					    </div>
					</div>
							
					<div class="row">
						<div class="col-sm-4">
							<label for="id_ddn">Date de naissance:  </label>
						</div>
						<div class="col-sm-6">
							<input type="date" name="datenaiss" id="id_ddn" value="<?php echo $ddn?>" class="form-control">
                            <?php echo form_error('datenaiss'); ?>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-4">
							<label for="id_tel">Téléphone:</label>
						</div>
						<div class="col-sm-6">
							<input type="tel" name="telephone" id="id_tel" value="<?php echo $tel;?>" class="form-control" placeholder="033 56 193 74">
							<?php echo form_error('telephone'); ?>
						</div>
					</div>
            
                    <div class="row">
						<div class="col-sm-3">
							<h5> <span class="text-danger"></span></h5>
						</div>
						<div class="col-sm-6 text-right">
							<input class="btn btn-success" type="submit" value="Modifier">
						</div>
                        <div class="col-sm-3">
								<!--ITO NO MI SUPPRIME ANLE-->
                            <a href="<?php echo base_url('admin/client').'/supprimer/'.$row->numCli?>"><div class="btn btn-danger">Supprimer</div></a>
						</div>
					</div>
                </form>
            </article>
        </div>
    </div>	<!-- /container -->
</body>
</html>