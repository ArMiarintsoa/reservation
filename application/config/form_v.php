<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config = array(
    'site/contact' => array(
    /* 
    Notez la clé 'site/contact' de notre tableau de configuration. 
    C'est elle qui va dire que les règles s'appliquent à la méthode « contact » du contrôleur « site »
    */
        array(
            'field' => 'nom',//le nom de input dans le code HTML
            'label' => 'Votre nom',//le label 
            'rules' => 'required'//
        ), 
        array(
            'field' => 'email',
            'label' => 'Votre e-mail',
            'rules' => array('valid_email', 'required')
        ), 
        array(
            'field' => 'title',
            'label' => 'Titre',
            'rules' => 'required'
        ), 
        array(
            'field' => 'message',
            'label' => 'Message',
            'rules' => 'required'
        )
    )
);