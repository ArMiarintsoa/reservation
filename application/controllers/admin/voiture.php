<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Voiture extends CI_Controller
{
    public function index(){


        $this->load->model('voiture_model');//modele du client
        $this->load->helpers('url');
        $this->load->library('form_validation');

        $data = array();
        $data['voit'] = $this->voiture_model->lister();
        
        $this->form_validation->set_rules('numVoit','"Numero"','required');
        $this->form_validation->set_rules('chauf','"Chauffeur"','required');
        $this->form_validation->set_rules('nb_pl','"Nombre de place"','required');

        if($this->form_validation->run())
        {
            $idVoit = 'Voit'.$this->voiture_model->compter_voit() + 1;
            $num = $this->input->post('numVoit');
			$chauf = $this->input->post('chauf');
		    $nb_p = $this->input->post('nb_pl');
            $lic = $this->input->post('ville');

            $resultat = $this->voiture_model->ajouter($idVoit, $num, $chauf, $nb_p, $lic);

            $this->load->view('admin/head_admin');
            $this->load->view('admin/voiture_vue',$data);
            $this->load->view('admin/pieds_admin');
            
        }else{
            $this->load->view('admin/head_admin');
            $this->load->view('admin/voiture_vue',$data);
            $this->load->view('admin/pieds_admin');
        }
        
    }
    public function info($id){
        $this->load->model('voiture_model');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('numVoit','"Numero"','required');
        $this->form_validation->set_rules('chauf','"Chauffeur"','required');
        $this->form_validation->set_rules('nb_pl','"Nombre de place"','required');

        $data = array();
        $data['info_voit'] = $this->voiture_model->get_voit_id($id);
        if($this->form_validation->run()){
            $num = $this->input->post('numVoit');
			$chauf = $this->input->post('chauf');
		    $nb_p = $this->input->post('nb_pl');
            $lic = $this->input->post('ville');
            //ITO LE MI-MODIFIER
            $resultat = $this->voiture_model->modifier($id,$num,$chauf,$nb_p,$lic);
            $data['info_voit'] = $this->voiture_model->get_voit_id($id);
            $this->load->view('admin/head_admin');
            $this->load->view('admin/info_voiture',$data);
            $this->load->view('admin/pieds_admin');
        }            
        else{
            $this->load->view('admin/head_admin');
            $this->load->view('admin/info_voiture',$data);
            $this->load->view('admin/pieds_admin');
        }
    }
    public function supprimer($idVoit){
        $this->load->model('voiture_model');
        $this->load->model('voyage_model');
        $data = $this->voyage_model->get_numVoy(array('f_idVoit'=>$idVoit));
        foreach($data->result() as $row){
            $resultat = $this->voyage_model->supprimer($row->numVoy);//supprimer tout les voyages reliees a cette voiture
        }
        $resultat = $this->voiture_model->supprimer($idVoit);//supprimer le voiture
        $this->index();
    }
}
?>