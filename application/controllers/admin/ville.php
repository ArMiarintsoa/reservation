<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ville extends CI_Controller
{
    public function index(){


        $this->load->model('ville_model');//modele du client
        $this->load->helpers('url');
        $this->load->library('form_validation');

        $data = array();
        $data['ville'] = $this->ville_model->lister();

        $this->form_validation->set_rules('idville','"ID VILLE"','required');
        $this->form_validation->set_rules('nom','"Nom"','required');
        $this->form_validation->set_rules('frais','"Frais"','required');
        $this->form_validation->set_rules('dist','"Distance"','required');

        if($this->form_validation->run())
        {
            $idville = $this->input->post('idville');
			$nom = $this->input->post('nom');
		    $frais = $this->input->post('frais');
            $dist = $this->input->post('dist');

            $resultat = $this->ville_model->ajouter($idville, $nom, $frais, $dist);

            $this->load->view('admin/head_admin');
            $this->load->view('admin/ville_vue',$data);
            $this->load->view('admin/pieds_admin');
            
        }else{
            $this->load->view('admin/head_admin');
            $this->load->view('admin/ville_vue',$data);
            $this->load->view('admin/pieds_admin');
        }
        
    }

    public function info($id){
        $this->load->model('ville_model');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('idville','"ID VILLE"','required');
        $this->form_validation->set_rules('nom','"Nom"','required');
        $this->form_validation->set_rules('frais','"Frais"','required');
        $this->form_validation->set_rules('dist','"Distance"','required');

        $data = array();
        $data['info_ville'] = $this->ville_model->get_ville_id($id);
        if($this->form_validation->run()){
            $idville = $this->input->post('idville');
			$nom = $this->input->post('nom');
		    $frais = $this->input->post('frais');
            $dist = $this->input->post('dist');
            //ITO LE MI-MODIFIER
            $resultat = $this->ville_model->modifier($idville, $nom, $frais, $dist);
            $data['info_ville'] = $this->ville_model->get_ville_id($id);
            $this->load->view('admin/head_admin');
            $this->load->view('admin/info_ville',$data);
            $this->load->view('admin/pieds_admin');
        }            
        else{
            $this->load->view('admin/head_admin');
            $this->load->view('admin/info_ville',$data);
            $this->load->view('admin/pieds_admin');
        }
    }

    public function supprimer($idville){
        $this->load->model('ville_model');
        $this->load->model('place_model');
        $this->load->model('voiture_model');
        $this->load->model('voyage_model');
        $data = $this->voyage_model->get_numVoy(array('f_idVille'=>$idville));
        foreach($data->result() as $row){
            $resultat = $this->voyage_model->supprimer($row->numVoy);//supprimer tout les voyages reliees a cette ville
        }
        $data = $this->voiture_model->get_voit($idville);
        foreach($data->result() as $row){
            $resultat = $this->voiture_model->supprimer($row->idVoit);//supprimer tout les voitures reliees a cette ville
        }   
        $resultat = $this->ville_model->supprimer($idville);
        $this->index();
        
    }
}
?>