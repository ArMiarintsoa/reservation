<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Connect extends CI_Controller{

    public function index(){
        $this->load->library('form_validation');
        $this->load->helpers('url');
        $this->load->model('admin_model');
        $this->form_validation->set_rules('username','"Nom d utilisateur"','required');
        $this->form_validation->set_rules('mdp','"Mots de passe"','required');
                
        //if(($this->form_validation->run()) && ($nomUt == 'Miarintsoa') && ($mdp == '1234'))
        //ETO LE MVERIFIER ANLE USERNAME SY MDP 
        if($this->form_validation->run())
        {
            $nomUt = $this->input->post('username');
            $mdp = $this->input->post('mdp');
            $mdp = md5($mdp);
            $resultat = $this->admin_model->get_adm($nomUt);
            foreach($resultat->result() as $row){
                $nom_admin = $row->nom_admin;
                $mdp_admin = $row->mdp_admin;
            }
            if(($nomUt == $nom_admin) && ($mdp == $mdp_admin)){
                // RAHA MARINA DE MIDITRA AMN'IO CONTROLLEUR IO 
                // DE IO CONTROLLEUR IO NO MIANTSO NY VUE ANY
                redirect('admin/client');
            }
            else{
                $this->load->view('templ/connect');
            }
        }
        else{
            $this->load->view('templ/connect');
        }
    }
}
?>