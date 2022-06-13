<head>
    <link rel="stylesheet" type="text/css" href="http://localhost/ci/assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="http://localhost/ci/assets/css/bootstrap.min.css">
   <!-- <style>
        body {
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            font-size: 14px;
            line-height: 1.42857143;
            color: #333;
            background-color: #dee2e6;
        }
        p {
            margin: 0 0 10px;
        }
        h1,h2,h3,h4,h5,h6,
        {
            font-family: inherit;
            font-weight: 500;
            line-height: 1.1;
            color: inherit;
        }
        h1{
            font-size: 36px;
        }
        h2{
            font-size: 30px;
        }
        h3{
            font-size: 24px;
        }
        h4{
            font-size: 18px;
        }
        h5{
            font-size: 14px;
        }
        h6{
            font-size: 12px;
        }

        h1,h2,h3{
            margin-top: 20px;
            margin-bottom: 10px;
        }
        h4,h5,h6{
            margin-top: 10px;
            margin-bottom: 10px;
        }

        ul,ol {
            margin-top: 0;
            margin-bottom: 10px;
        }
        .navliste{
            float:right;
            margin-right:100px;
        }
        .list-inline {
            padding-left: 0;
            margin-left: -5px;
            list-style: none;
        }
        .list-inline > li {
            display: inline-block;
            padding-right: 5px;
            padding-left: 5px;
        }
        
        nav{
            background:  #343a40;
            height: 90px;
            text-align: center;
            /*border-radius:40px;*/
            }
        li{
            display: inline-flex;
            padding: 25px;
        }
        a {
            text-decoration:none;
            color: #f8f9fa;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            font-size: 18px;
        }
        button{
            background:rgb(123, 206, 221);
            border-style:none;
            border-radius: 10px;
        }
        a:hover{
            color: #ffc800;
        }

    </style>-->
   
    
</head>
<html>
    <?php $this->load->helper('url'); ?>
    <table class="table table-bordered table-striped"><!--table = table
    table-bordered = table avec bordure
    table-striped = couleur gris pour les lignes impaires
    -->
   <caption>
      <h4>Les menaces pour les tigres</h4>
   </caption>
   <thead>
      <tr>
            <th>Lieu</th>
            <th>Menace</th>
      </tr>
   </thead>
   <tbody>
          <tr>
            <td>Grand Mekong</td>
            <td>Demande croissante de certaines parties de l’animal pour la médecine chinoise traditionnelle 
et fragmentation des habitats du fait du développement non durable d’infrastructures</td>
          </tr>
          <tr>
            <td>Île de Sumatra</td>
            <td>Production d’huile de palme et de pâtes à papiers</td>
          </tr>
          <tr>
            <td>Indonésie et Malaisie</td>
            <td>Pâte à papier, l’huile de palme et le caoutchouc</td>
          </tr>
          <tr>
            <td>États-Unis</td>
            <td>Les tigres captifs représentent un danger pour les tigres sauvages</td>
          </tr>
          <tr>
            <td>Europe</td>
            <td>Gros appétit pour l’huile de palme</td>
          </tr>
          <tr>
            <td>Népal</td>
            <td>Commerce illégal de produits dérivés de tigres</td>
          </tr>
    </tbody>
</table>
    <nav class="mainNav">
        <div class="row">
            <ul class=""> 
                <li><a href="<?php echo site_url('home'); ?>" >MENU</a></li>
                <li><a href="<?php echo site_url('reservation/reserver'); ?>">RESEVATION</a></li>
                <li><a href="<?php echo site_url('#'); ?>">AIDE</a></li>
                <li><a href="<?php echo site_url('admin/login'); ?>">Sign up</a></li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <div class="col-2">
                coucou
            </div>
            <div class="col-4">
                coucou6
            </div>
            <div class="col-4">
                coucou
            </div>
        </div>
    </div>
</html>