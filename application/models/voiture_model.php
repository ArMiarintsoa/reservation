<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Voiture_model extends CI_Model
{
    protected $table = 'voitures';

    public function __construct()
    {
        parent::__construct();
    }
    
    public function ajouter($idVoit, $numVoit, $chauffeur, $nbrplace, $licence){

        $this->db->set('idVoit',$idVoit);
        $this->db->set('numVoit',$numVoit);
        $this->db->set('chauffeur',$chauffeur);
        $this->db->set('nbrPlace',$nbrplace);
        $this->db->set('licence',$licence);

        return $this->db->insert($this->table);
    }
    public function modifier($id,$numVoit,$chauffeur,$nbrplace,$licence){

        //ety no apetraka ny modification izay ilaina 

        $this->db->where('idVoit',$id);
        $this->db->set('numVoit',$numVoit);
        $this->db->set('chauffeur',$chauffeur);
        $this->db->set('nbrPlace',$nbrplace);
        $this->db->set('licence',$licence);
        return $this->db->update($this->table);
    }
    public function get_voit_id($id){
        $this->db->select('*')
                 ->from($this->table)
                 ->where('idVoit',$id);
        $query = $this->db->get();
        return $query;
    }
    
    public function supprimer($id){

        return $this->db->where('idVoit', $id)
                        ->delete($this->table);
    }

    public function compter_voit($where = array()){ //$where est tableau associatif permettant de definir des conditions

        return (int) $this->db->where($where)
                              ->count_all_results($this->table); //count_all_result est un fonction dans codeigniter

        /*          EXEMPLE:dans un controlleur
        public function accueil()
        {
            $this->load->model('client_model','clientManager');

            $nbr_client = $this->clientManager->count();
            $nbr = $this->clientManager->count(array('ddnCli' => '11/11/02'));

                nombre des clients nés le 11 novembre 2002

        }
        */
    }

    public function lister(){

        return $this->db->get($this->table);
    }

    public function get_voit($ville){
        $this->db->select('*')
                 ->from($this->table)
                 ->where('licence',$ville);
        $query = $this->db->get();
        return $query;                        
    }
}
?>