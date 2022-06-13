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
        foreach($info_voit->result() as $row){
            $idV = $row->idVoit;
            $numVoit = $row->numVoit;
            $chauf = $row->chauffeur;
            $nb_pl = $row->nbrPlace;
            $lic = $row->licence;
        }
        switch($lic){
            case 'A': {
                $Ville = 'Toamasina';
                break;
            }
            case 'M':{
                $Ville = 'Mahajanga';
                break;
            }
            case 'U':{
                $Ville = 'Toliara';
                break;
            }
            case 'F':{
                $Ville = 'Fianarantsoa';
                break;
            }
            case 'D':{
                $Ville = 'Diego';
                break;
            }
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
                            <label for="id_idVoit">Id voiture:</span></label>
                        </div>
                        <div class="col-sm-6">
                            <input type="text" name="idV" readonly value="<?php echo $idV;?>" id="id_idVoit" class="form-control"/>
                                        <?php echo form_error('nompers'); ?>
                                </div>
                        </div>
                        <div class="row">
							<div class="col-sm-4">
								<label for="id_num">Numero:</label>
							</div>
							<div class="col-sm-6">
                                <input type="text" name="numVoit" id="id_num" value="<?php echo $numVoit; ?>" class="form-control" />
                                <?php echo form_error('numVoit'); ?>
							</div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="id_chauf">Chauffeur:</label>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" name="chauf" value="<?php echo $chauf; ?>" class="form-control" />
                                <?php echo form_error('chauf'); ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="id_npl">Nombre de places:</label>
                            </div>
                            <div class="col-sm-6">
                                <input type="number" name="nb_pl" id="id_npl" value="<?php echo $nb_pl;?>" max="32" min="18" class="form-control">
                                <?php echo form_error('nb_pl'); ?>
                            </div>
						</div>
                        <div class="row">
                            <div class="col-sm-4">
                                <label>Licence:</label>
                            </div>
                            <div class="col-sm-6">
                                <select name="ville" class="form-control" >
                                    <option selected value="<?php echo $lic;?>"><?php echo $Ville ?></option>
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
								<input class="btn btn-success" type="submit" value="Modifier">
                                <a href="<?php echo base_url('admin/voiture').'/supprimer/'.$idV?>"><div class="btn btn-danger">Supprimer</div></a>
							</div>                        
						</div>
					</form>
			    </article>                            
            </div>  
    </div>
</body>
</html>