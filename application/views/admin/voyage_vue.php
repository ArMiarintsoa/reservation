<!DOCTYPE html>
<html>
    <head>
        <title>Voyage</title>
    </head>
    <link rel="shortcut icon" href="http://localhost/ci/assets/images/icon.png">
	
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="http://localhost/ci/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="http://localhost/ci/assets/css/font-awesome.min.css">

	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="http://localhost/ci/assets/css/bootstrap-theme.css" media="screen" >
	<link rel="stylesheet" href="http://localhost/ci/assets/css/main.css">
    <body>
        
        <h4><u>Nombre des voyages:</u><?php echo $voyage->num_rows();?></h4>
        <div class="col-sm-1">

        </div>
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-hover table-striped">
                    <thead >
                        <th>Numero voyage</th>
                        <th>Type du voyage</th>
                        <th>Voyageur</th>
                        <th>Date de départ</th>
                        <th>Heure de départ</th>
                        <th>Voiture</th>

                        <th>Info</th>
                    </thead>
                    <tbody>
                        <?php
                           
                                foreach($voyage->result() as $row){
                        ?>
                                <tr class="bg-info">
                                    <th scope="row"><?php echo $row->numVoy;?></th>
                                    <?php 
                                                                       
                                    ?>
                                    <td><?php 
                                        switch($row->f_idVille){
                                            case 'A': {
                                                $row->f_idVille = 'Toamasina';
                                                break;
                                            }
                                            case 'M':{
                                                $row->f_idVille = 'Mahajanga';
                                                break;
                                            }
                                            case 'U':{
                                                $row->f_idVille = 'Toliara';
                                                break;
                                            }
                                            case 'F':{
                                                $row->f_idVille = 'Fianarantsoa';
                                                break;
                                            }
                                            case 'D':{
                                                $row->f_idVille = 'Diego';
                                                break;
                                            }
                                        }
                                        if($row->typeVoy == 'Tanav'){
                                            echo 'Antananarivo vers '.$row->f_idVille;
                                        }
                                        else{
                                            echo $row->f_idVille.' vers Antananarivo';
                                        }
                                        ?>
                                    </td>
                                    <td><?php 
                                        $this->load->model('voyage_model'); 
                                        $data = $this->voyage_model->get_place($row->numVoy);
                                        foreach($data->result() as $val){
                                            echo $val->numPlace.'- N° '.$val->f_idCli;;                                            
                                            $cli = $this->voyage_model->get_place_cli($val->f_idCli);
                                            foreach($cli->result() as $key){
                                                echo ' '.$key->nomCli.' '.$key->prenomCli.'</br>';
                                            }
                                        }
                                    
                                    ?></td>
                                    <td><?php echo $row->date_dep;?></td>
                                    <td><?php echo $row->heure_dep;?></td>
                                    <td><?php echo$row->f_idVoit;?></td>
                                    <td><a class="btn btn-danger" href="http://localhost/ci/index.php/admin/voyage/supprimer/<?php echo $row->numVoy?>">Suppr</a></td>
                                </tr>
                        <?php                            
                        }                            
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>