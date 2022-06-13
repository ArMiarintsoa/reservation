<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Place_model extends CI_Model
{
    protected $table = 'places';

    public function __construct()
    {
        parent::__construct();
    }
    public function ajouter($voiture, $numPlace, $numVoy, $numCli){

        $this->db->set('f_idVoy',$numVoy);
        $this->db->set('f_idCli',$numCli);
        $this->db->set('numPlace',$numPlace);
        $this->db->set('ff_idVoit',$voiture);

        return $this->db->insert($this->table);
    }

    //public function modifier($idVoit, $numVoy, $numPlace){

        //ety no apetraka ny modification izay ilaina 
        /*
        $this_>db->set('nomChamp','N_valeur');
        */

      /*  $this->db->where('idVoit',$id)
                 ->where('numVoy',$numVoy)   
                 ->where('numPlace',$numPlace)
        return $this->db->update($this->table);*/
    //}

    public function supprimer($numVoy, $numPlace){

        return $this->db->where('ff_idVoit',$id)
                        ->where('f_numVoy',$numVoy)   
                        ->where('numPlace',$numPlace)
                        ->delete($this->table);
    }

    public function supprimer_p_cli($idcli){
        return $this->db->where('f_idCli',$idcli)
                        ->delete($this->table);
    }

    public function supprimer_p_voy($idvoy){
        return $this->db->where('f_idVoy',$idvoy)
                        ->delete($this->table);
    }
    public function compter_place($where = array()){ //$where est tableau associatif permettant de definir des conditions

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

        $this->db->select('numPlace','nomCli','prenomCli')
                 ->from($this->table)
                 ->join('clients')
                 ->on('f_idCli','numCli')
                 ->where('f_idVoy',$voyage)
                 ->order_by('numPlace','asc');
        $query = $this->db->get();
        return $query;
                
                
    }
}
?>