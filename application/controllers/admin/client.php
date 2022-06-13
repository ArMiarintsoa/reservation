<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Client extends CI_Controller{
   
    public function index(){
        $this->load->model('client_model');//modele du client
        $this->load->helpers('url');
        $this->load->library('form_validation');

        $data = array();
        $data['client'] = $this->client_model->lister();    //lister tout les clients
        $data['sc_client'] = NULL;      //aucun client recherché

        $this->form_validation->set_rules('sc_cli','"Recherche"','required');

        if($this->form_validation->run())
        {
            $nom = $this->input->post('sc_cli');    
            $data['sc_client'] = $this->client_model->lister_by_nom($nom);  //lister le client à chercher  
            $this->load->view('admin/head_admin');
            $this->load->view('admin/client_vue',$data);
            $this->load->view('admin/pieds_admin');
        }else{
            $this->load->view('admin/head_admin');
            $this->load->view('admin/client_vue',$data);
            $this->load->view('admin/pieds_admin');
        }
    }

    public function info($id){
        $this->load->model('client_model');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('nompers', '"Nom"', 'trim|required|min_length[5]|max_length[52]|alpha_dash|encode_php_tags');
        $this->form_validation->set_rules('prenompers',  '"Prenom"','required|min_length[2]|max_length[52]');
        $this->form_validation->set_rules('datenaiss', '"Date de naissance"', 'trim|required');
        $this->form_validation->set_rules('telephone', '"Telephone"', 'trim|required|min_length[9]|max_length[9]');

        $data = array();
        $data['info_cli'] = $this->client_model->get_cli($id);
        if($this->form_validation->run()){
            $nomcli = $this->input->post('nompers');
			$prenomcli = $this->input->post('prenompers');
		    $ddncli = $this->input->post('datenaiss');
		    $telcli = $this->input->post('telephone');
            //ITO LE MI-MODIFIER
            $resultat = $this->client_model->modifier($id,$nomcli,$prenomcli,$ddncli,$telcli);
            $data['info_cli'] = $this->client_model->get_cli($id);
            $this->load->view('admin/head_admin');
            $this->load->view('admin/info_client',$data);
            $this->load->view('admin/pieds_admin');
        }            
        else{
            $this->load->view('admin/head_admin');
            $this->load->view('admin/info_client',$data);
            $this->load->view('admin/pieds_admin');
        }            
    }
    public function supprimer($id){
        $this->load->model('client_model');
        $this->load->model('place_model');
        $this->place_model->supprimer_p_cli($id);
        $this->client_model->supprimer($id);
        $this->index();
    }
}
?>