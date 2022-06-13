<!DOCTYPE html>
<html>
    <head>
        <link href="../../asset/bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
        <title>Inscription</title>
    </head>
    <style>
        .container{
            height: auto;
            margin: 10px 50px 10px 50px;
            background: rgb(220, 220, 231);
            border-radius:30px;
            padding:10px 10px 10px 10px;
            border: 2px;
            border-color:black;
        }
        input[type="text"],[type="date"],[type="tel"],select,[type="time"]
        {
            height:30px;
            width:400px;
            border-radius:10px;
            color:gray;
        }
        input[type="submit"],[type="reset"]
        {
            height: 25px;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            font-size:16px;
            background: #dee2e6;
            border-radius:10px;
            border-style:none;
        }
        input[type="submit"]:hover,[type="reset"]:hover
        {
            height: 25px;
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            font-size:16px;
            background: #495057;
            border-radius:10px;
            border-style:none;
        }
        fieldset{
            border-color:gray;
            border-radius:20px;
        }
        label,legend
        {
            font-size: 18px;
            font-family:'Courier New', Courier, monospace;
            color:black;
        }
        .container1{
            height:auto;
            width:600px;
            padding:30px 30px 30px 30px;
            margin-top:1px;
            margin-left:30%;
            margin-right:30%;
            background: #adb5bd;
            border-radius:20px;
        }
    </style>
    <body>
            <div class="container1">
                <form action="" method="POST" >

                    <!--    CLIENT -->
                    <fieldset>
                        <legend>CLIENT</legend>
                        <table cellspacing="20px">
                            <tr>
                                <td><label for="id_nom"><strong>NOM</strong></label></td>
                                <td><input type="text" name="nompers" value="<?php echo set_value('nompers'); ?>" size="20px" id="id_nom" />
                                <?php echo form_error('nompers'); ?></td>
                            </tr>
                            <tr>
                                <td><label for="id_prenom"><strong>PRENOM</strong></label></td>
                                <td><input type="text" name="prenompers" value="<?php echo set_value('prenompers'); ?>" id="id_prenom" />
                                <?php echo form_error('prenompers'); ?></td>
                            </tr>
                            <tr>
                                <td><label for="id_ddn"><strong>DATE DE NAISSANCE</strong></label></td>
                                <td><input type="date" name="datenaiss" id="id_ddn" value="<?php echo set_value('datenaiss')?>">
                                <?php echo form_error('datenaiss'); ?></td>
                            </tr>
                            <tr>
                                <td><label for="id_tel"><strong>TELEPHONE</strong></label></td>
                                <td><input type="tel" name="telephone" id="id_tel" value="<?php echo set_value('telephone')?>">
                                <?php echo form_error('telephone'); ?></td>
                            </tr>
                        </table>
                    </fieldset>

                        <!--        VOYAGE          -->
                    <fieldset>
                        <legend>VOYAGE</legend>
                        <table cellspacing="20px">
                            <tr>
                                <td><label><strong>VOYAGER :</strong></label></td>
                                <td><input type="radio" name="type_voy" value="vTana" id="vTana"/>
                                <label for="vTana"><strong>Vers Antananarivo</strong> </label><br>
                                <input type="radio" name="type_voy" value="Tanav" id="Tanav"/>
                                <label for="Tanav"><strong>Antananarivo vers</strong></label>
                                <?php echo form_error('type_voy'); ?></td>
                            </tr>
                            <tr>
                                <td><label><strong>VILLE DE DEPART et/ou D'ARRIVER : </strong></label></td>
                                <td>
                                    <select name="ville">
                                        <option value="A">Toamasina</option>                                            
                                        <option value="M">Mahajanga</option>
                                        <option value="F">Fianarantsoa</option>
                                        <option value="U">Toliara</option>
                                        <option value="D">Diego</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label><strong>SELECTIONNER VOTRE PLACE</strong></label>
                                </td>                                    <td>
                                    <span>Ch</span>
                                    <input type="checkbox" name="2" value="2">
                                    <input type="checkbox" name="3" value="3"><br>
                                    <input type="checkbox" name="4" value="4">
                                    <input type="checkbox" name="5" value="5">
                                    <input type="checkbox" name="6" value="6">
                                    <input type="checkbox" name="7" value="7"><br>
                                    <input type="checkbox" name="8" value="8">
                                    <input type="checkbox" name="9" value="9">
                                    <input type="checkbox" name="10" value="10">
                                    <input type="checkbox" name="11" value="11"><br>
                                    <input type="checkbox" name="12" value="12">
                                    <input type="checkbox" name="13" value="13">
                                    <input type="checkbox" name="14" value="14">
                                    <input type="checkbox" name="15" value="15"><br>
                                    <input type="checkbox" name="16" value="16">
                                    <input type="checkbox" name="17" value="17">
                                    <input type="checkbox" name="18" value="18">
                                    <input type="checkbox" name="19" value="19"><br>
                                    <input type="checkbox" name="20" value="20">
                                    <input type="checkbox" name="21" value="21">
                                    <input type="checkbox" name="22" value="21">
                                    <input type="checkbox" name="23" value="23"><br>
                                    <input type="checkbox" name="24" value="24">
                                    <input type="checkbox" name="25" value="25">
                                    <input type="checkbox" name="26" value="26">
                                    <input type="checkbox" name="27" value="27">
                                    
                                </td>
                            </tr>
                            <tr>
                                <td><Label for="id_ddep"><strong>DATE DE DEPART</strong></Label></td>
                                <td>
                                    <input type="date" name="ddep" id="id_ddep" value="<?php echo set_value('ddep'); ?>">
                                    <?php echo form_error('ddep');?>
                                </td>
                            </tr>
                            <tr>
                                <td><label for="id_tdep"><b>HEURE DE DEPART</b></label></td>
                                <td>
                                    <input type="time" name="hdep" id="id_tdep" value="<?php echo set_value('hdep'); ?>">
                                    <?php echo form_error('hdep');?>
                                </td>
                            </tr>
                        </table>
                    </fieldset> 
                    
                    
                    <br>
                    <input type="submit" value="Valider" name="submit">
                    <input type="reset" value="Annuler">
                </form>
            </div>
        </div>
    </body>
</html>