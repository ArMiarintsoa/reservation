<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Reserver extends CI_Controller
    {
        //const nbr_place_max = 27;

        public function index(){
            //Charger le model à utiliser, ici c'est le model du client
            $this->load->model('client_model');
            $this->load->model('ville_model');
            $this->load->model('voyage_model');
            $this->load->model('voiture_model');
            $this->load->model('place_model');
            $this->connexion();
        }
        public function connexion(){
            $this->load->library('form_validation');

            //les regles des champs client et voyage
            $this->form_validation->set_rules('nompers', '"Nom"', 'trim|required|min_length[5]|max_length[52]');
            $this->form_validation->set_rules('prenompers',  '"Prenom"','trim|required|min_length[2]|max_length[52]');
            $this->form_validation->set_rules('datenaiss', '"Date de naissance"', 'trim|required');
            $this->form_validation->set_rules('telephone', '"Telephone"', 'trim|required|min_length[10]|max_length[10]');

            $this->form_validation->set_rules('type_voy', '"Voyager"', 'trim|required');
            $this->form_validation->set_rules('ville',  '"Ville"','trim|required');
            $this->form_validation->set_rules('ddep','"Date de depart"','required');
            $this->form_validation->set_rules('hdep','"Heure de depart"','required');
            $num_place = $this->test_place();
            if(($this->form_validation->run()) && ($num_place !==''))
            {
                    
                //INSERTION DANS LA TABLE CLIENTS
                //Données à stocker dans le table clients
                $nomcli = $this->input->post('nompers');
			    $prenomcli = $this->input->post('prenompers');
			    $ddncli = $this->input->post('datenaiss');
			    $telcli = $this->input->post('telephone');
                //pour ajouter les clients au base de donnée rehefa voahaja ny regles
                $nbr = $this->client_model->compter_cli(array(
                                                            'nomCli'=>$nomcli,
                                                            'prenomCli'=>$prenomcli,
                                                            'ddnCli'=>$ddncli,
                                                            'telCli'=>$telcli));
                //TESTE si le client était déja inseré dans la table clients
                if($nbr == 0){
                    //RAHA MBOLA TSISY AN'IO CLIENT IO TAO DE AMPIDIRINA
                    //pour ajouter le voyage au base de donnée rehefa voahaja ny regles
                    $resultat = $this->client_model->ajouter($nomcli, $prenomcli, $ddncli, $telcli);
                }else{
                    //FA RAHA EFA NISY DE LE TALOHA IANY NO AMPINA
                    $data = $this->client_model->get_num($telcli);
                    //recuperation du numero du client dans le tableau du base de donnée
                    foreach($data->result() as $row){
                        $numCli = $row->numCli;
                    }                   
                }


                //INSERTION DANS LA TABLE VOYAGES         
                $typeVoy = $this->input->post('type_voy');
                $ville =  $this->input->post('ville');
                $d_dep = $this->input->post('ddep');
                $h_dep = $this->input->post('hdep');  //cle etranger de table ville
                $data = $this->voiture_model->get_voit($ville);
                //Recuperer la voiture ayant la licence du ville que le client veut y aller
                foreach($data->result() as $row){                
                        $voiture = $row->idVoit;            
                } 
                //compter le nombre du voyage
                $nbr = $this->voyage_model->compter_voy(array(
                                                        'typeVoy'=>$typeVoy,
                                                        'date_dep'=>$d_dep,
                                                        'f_idVille'=>$ville,
                                                        'f_idVoit'=>$voiture,
                                                        'heure_dep'=>$h_dep));
                //TESTE si ce voyage était déja inseré dans la table voyages
                if($nbr == 0){
                    //RAHA MBOLA TSISY AN'IO VOYAGE IO TAO DE MAMORONA IDENTIFIANT VAOVAO
                    $numVoy = 'V'.$this->voyage_model->compter_voy() + 1;
                    //pour ajouter le voyage au base de donnée rehefa voahaja ny regles
                    $resultat = $this->voyage_model->add_voy($numVoy, $typeVoy, $d_dep, $h_dep, $ville, $voiture);
                    
                }else{
                    //FA RAHA EFA NISY DE LE TALOHA IANY NO AMPINA
                    $data = $this->voyage_model->get_numVoy(array(
                                                                    'typeVoy'=>$typeVoy,
                                                                    'date_dep'=>$d_dep,
                                                                    'f_idVille'=>$ville,
                                                                    'f_idVoit'=>$voiture,
                                                                    'heure_dep'=>$h_dep));     
                    foreach($data->result() as $row){                        
                            $numVoy = $row->numVoy ;                    
                    }                               
                    
                }


                //INSERTION DANS LA TABLE PLACES
                $resultat = $this->client_model->get_num($telcli);
                //recuperation du numero du client dans le tableau du base de donnée
                foreach($resultat->result() as $row){
                    $numCli = $row->numCli;
                }

                //Test si les places sont encore disponibles ou non
                if($this->get_place_non_disponible($voiture,$numVoy)==''){
                    for($i=2;$i<=27;$i++)
                    {
                        if($this->input->post($i)!= NULL){ // si le champ est coché
                            $num_place = $this->input->post($i); // ajouter dans le table le numero du place coché
                            if($this->place_model->compter_place(array(
                                                                        'ff_idVoit'=>$voiture,
                                                                        'f_idVoy'=>$numVoy,
                                                                        'numPlace'=>$num_place
                                                                        ))==0){            
                                $resultat = $this->place_model->ajouter($voiture, $num_place, $numVoy, $numCli);
                            } 
                        }
                    }
                     /*  RESERVATION AVEC SUCCES */

                    $donnee['client'] = $this->client_model->get_cli($numCli);
                    $donnee['voyage'] = $this->voyage_model->get_voy($numVoy);
                    $donnee['voiture'] = $this->voiture_model->get_voit_id($voiture);
                    $donnee['ville'] = $this->ville_model->get_ville_id($ville);
                    $donnee['numplace'] = $this->test_place();
                    $donnee['nbrplace'] = $this->compter_place();

                    $this->load->view('reserve_succ',$donnee);
                }else{
                    $data = array();
                    $nomcli =$this->input->post('nompers');
                    $prenomcli =$this->input->post('prenompers');
                    $typeVoy = $this->input->post('type_voy');
                    $ville =  $this->input->post('ville');
                    switch($ville){
                        case 'A': {
                            $v = 'Toamasina';
                            break;
                        }
                        case 'M':{
                            $v = 'Mahajanga';
                            break;
                        }
                        case 'U':{
                            $v = 'Toliara';
                            break;
                        }
                        case 'F':{
                            $v = 'Fianarantsoa';
                            break;
                        }
                        case 'D':{
                            $v = 'Diego';
                            break;
                        }
                    }
                    if($typeVoy =='vTana'){
                        $desti = $v.' vers Antananarivo';
                    }else{
                        $desti = 'Antananarivo vers '.$v;
                    }
                    $d_dep = $this->input->post('ddep');
                    $h_dep = $this->input->post('hdep');

                    $data['nom_cli'] = $nomcli.' '.$prenomcli;
                    $data['voyage'] = $desti.' du '.$d_dep.' à '.$h_dep;// fanambara ilay voyage
                    $data['place_non_dispo'] = $this->get_place_non_disponible($voiture,$numVoy);
                            
                    $this->load->view('templ/place_non_dispo',$data);
                    $resultat = $this->client_model->supprimer($numCli);
                }


               

            }
            else{
                $this->load->view('templ/reservation');
                //$this->load->view('reservation/voyager');
            }          
        }


        public function get_place_non_disponible($voiture,$numVoy){
            $p_non_dispo = '';
            for($i=2;$i<=27;$i++)
            {
                if($this->input->post($i)!= NULL){ // si le champ est coché
                    $num_place = $this->input->post($i); 
                    if($this->place_model->compter_place(array(
                                                                'ff_idVoit'=>$voiture,
                                                                'f_idVoy'=>$numVoy,
                                                                'numPlace'=>$num_place
                                                                    ))!=0){
                        $p_non_dispo .=$i.', ';                                                                                                                 
                    }
                }
            }
            return $p_non_dispo;
        }
        public function test_place(){
            $place = '';
            for($i=2;$i<27;$i++)
            {
                //name dans code html
                if($this->input->post($i)!==NULL){ // si le champ est coché
                    $place .=', '.$this->input->post($i);
                }
            }
            return $place;
        }
        public function compter_place(){
            $cmp = 0;
            for($i=2;$i<27;$i++)
            {
                if($this->input->post($i)!==NULL){ // si le champ est coché
                    $cmp++;
                }
            }
            return $cmp;
        }
    }
?>