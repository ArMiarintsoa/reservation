<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Voyage extends CI_Controller{

    public function index(){
        $this->load->model('voyage_model'); 
        $this->load->helpers('url');
        $data['voyage'] = $this->voyage_model->lister();
        
        $this->load->view('admin/head_admin');
        $this->load->view('admin/voyage_vue',$data);
        $this->load->view('admin/pieds_admin');
    }

    public function supprimer($idvoy){
        $this->load->model('voyage_model'); 
        $this->voyage_model->supprimer($idvoy);
        $this->index();
    }
}
?>