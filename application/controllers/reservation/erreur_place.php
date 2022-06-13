<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Reserver extends CI_Controller
    {
        //const nbr_place_max = 27;

        public function index(){
            //Charger le model à utiliser, ici c'est le model du client
            $this->load->model('client_model');
            $this->load->model('voyage_model');
            $this->load->model('voiture_model');
            $this->load->model('place_model');
            $this->connexion();
        }
        public function connexion(){
            $this->load->library('form_validation');

            //les regles des champs client et voyage
            $this->form_validation->set_rules('nompers', '"Nom"', 'trim|required|min_length[5]|max_length[52]|alpha_dash|encode_php_tags');
            $this->form_validation->set_rules('prenompers',  '"Prenom"','trim|required|min_length[5]|max_length[52]|alpha_dash|encode_php_tags');
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
                    foreach($data as $key){
                        foreach($key as $val){
                            $numCli = $val ;
                        }
                    }                           
                }
                //INSERTION DANS LA TABLE VOYAGES
                    //compter le nombre du voyage

                             
                $typeVoy = $this->input->post('type_voy');
                $ville =  $this->input->post('ville');
                $d_dep = $this->input->post('ddep');
                $h_dep = $this->input->post('hdep');  //cle etranger de table ville
                $data = $this->voiture_model->get_voit($ville);
                foreach($data as $key){
                    foreach($key as $val){
                        $voiture = $val ;
                    }
                } 
                
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
                    foreach($data as $key){
                        foreach($key as $val){
                            $numVoy = $val ;
                        }
                    }                               
                    
                }
                //INSERTION DANS LA TABLE PLACES
                $data = $this->client_model->get_num($telcli);
                //recuperation du numero du client dans le tableau du base de donnée
                foreach($data as $key){
                    foreach($key as $val){
                        $numCli = $val ;
                    }
                }
                           // echo "Mbola dispo";
                        if($this->get_place_non_disponible()==''){
                            for($i=2;$i<=27;$i++)
                            {
                                if($this->input->post($i)!= NULL){ // si le champ est coché
                                    $num_place = $this->input->post($i); // ajouter dans le table le numero du place coché
                                    if($this->place_model->compter_place(array(
                                                                               'ff_idVoit'=>$voiture,
                                                                               'f_numVoy'=>$numVoy,
                                                                               'numPlace'=>$num_place
                                                                                ))==0){
                                        $resultat = $this->place_model->ajouter($voiture, $num_place, $numVoy, $numCli);
                                    } 
                                }
                            }
                        }else{
                            $data = array();
                            $nomcli =$this->input->post('nompers');
                            echo $this->input->post('nompers');
                            $prenomcli =$this->input->post('prenompers');
                            $typeVoy = $this->input->post('type_voy');
                            $ville =  $this->input->post('ville');
                            if($typeVoy =='vTana'){
                                $desti = $ville.' vers Antananarivo';
                            }else{
                                $desti = 'Antananarivo vers '.$ville;
                            }
                            $d_dep = $this->input->post('ddep');
                            $h_dep = $this->input->post('hdep');

                            $data['nom_cli'] = $nomcli.' '.$prenomcli;
                            $data['voyage'] = $desti.' du '.$d_dep.' à '.$h_dep;// fanambara ilay voyage
                            $data['place_non_dispo'] = $this->get_place_non_disponible();
                            
                            $this->load->view('templ/place_non_dispo',$data);
                            $resultat = $this->client_model->supprimer($numCli);
                        }
                $this->load->view('home');
            }
            else{
                $this->load->view('templ/reservation');
                //$this->load->view('reservation/voyager');
            }          
        }


        public function get_place_non_disponible(){
            $p_non_dispo = '';
            for($i=2;$i<=27;$i++)
            {
                if($this->input->post($i)!= NULL){ // si le champ est coché
                    $num_place = $this->input->post($i); 
                    if($this->place_model->compter_place(array(
                                                                'ff_idVoit'=>$voiture,
                                                                'f_numVoy'=>$numVoy,
                                                                'numPlace'=>$num_place
                                                                    ))!=0){
                        $p_non_dispo .=', '. $i;                                                                                                                 
                    }
                }
            }
            return $p_non_dispo;
        }
        public function test_place(){
            $table = array();
            $place = '';
            for($i=2;$i<23;$i++)
            {
                $tmp = $i; //name dans code html
                if($this->input->post($tmp)!==NULL){ // si le champ est coché
                    $table = $this->input->post($tmp); // ajouter dans le table le numero du place coché
                    $place .=', '.$this->input->post($tmp);
                }
            }
            return $place;
        }
    }
?>