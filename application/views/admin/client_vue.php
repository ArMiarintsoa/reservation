<!DOCTYPE html>
<html>
    <head>
        <title>Client</title>
    </head>
    <link rel="shortcut icon" href="http://localhost/ci/assets/images/icon.png">
	
	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="http://localhost/ci/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="http://localhost/ci/assets/css/font-awesome.min.css">

	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="http://localhost/ci/assets/css/bootstrap-theme.css" media="screen" >
	<link rel="stylesheet" href="http://localhost/ci/assets/css/main.css">
    <body>
        
        <form action="#" method="post">
            <br>
            <div class="row">
                <div class="col-sm-4">
                    <input type="search" name="sc_cli" id="" class="form-control" placeholder="RANDRIA">
                    <?php echo form_error('sc_cli'); ?>
                </div>
                <div class="col-sm-2">
                    <input type="submit" value="Recherche" class="btn btn-action">
                </div>
        </form>
        </div>
        <!--        Affiche le nombre des clients -->
        <h4><u>Nombre des clients:</u><?php if($sc_client == NULL){ echo $client->num_rows(); }else{ echo $sc_client->num_rows();}?></h4>
        <div class="col-sm-1">

        </div>
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-hover table-responsive table-striped">
                    <thead >
                        <th scope="">Numero client</th>
                        <th scope="row">Nom</th>
                        <th>Prénoms</th>
                        <th>Date de naissance</th>
                        <th>telephone</th>
                        <th>Info</th>
                    </thead>
                    <tbody>
                        <?php
                            if($sc_client == NULL){
                                foreach($client->result() as $row){
                        ?>
                                <tr class="bg-info">
                                    <th scope="row"><?php echo $row->numCli;?></th>
                                    <td><?php echo $row->nomCli;?></td>
                                    <td><?php echo $row->prenomCli;?></td>
                                    <td><?php echo $row->ddnCli;?></td>
                                    <td><?php echo$row->telCli;?></td>
                                    <!-- ITO AMBANY ITO LE LIEN-->
                                    <td><a href="<?php echo base_url('admin/client').'/info/'.$row->numCli?>"><i class="fa fa-info fa-2"></i></a></td>
                                </tr>
                        <?php 
                                }
                            }else{
                                foreach($sc_client->result() as $row){
                        ?>
                                <tr class="bg-info">
                                
                                    <th scope="row"><?php echo $row->numCli;?></th>
                                    <td><?php echo $row->nomCli;?></td>
                                    <td><?php echo $row->prenomCli;?></td>
                                    <td><?php echo $row->ddnCli;?></td>
                                    <td><?php echo$row->telCli;?></td>
                                    <td><a href="<?php echo base_url('admin/client').'/info/'.$row->numCli?>"><i class="fa fa-info fa-2"></i></a></td>
                                </tr>
                        <?php
                                }
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>