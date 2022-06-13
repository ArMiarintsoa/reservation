<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Voyage_model extends CI_Model{

    protected $tb_voyages = 'voyages';
    protected $tb_places = 'places';
    protected $tb_clients = 'clients';

    public function __construct(){
        parent:: __construct();
    }

    public function add_voy($numVoy, $typeVoy, $date_dep, $heure_dep, $idVille,  $numVoit){

        $this->db->set('numVoy',$numVoy);
        $this->db->set('typeVoy',$typeVoy);
        $this->db->set('date_dep',$date_dep);
        $this->db->set('heure_dep',$heure_dep);
        $this->db->set('f_idVille',$idVille);
        $this->db->set('f_idVoit',$numVoit);
        

        return $this->db->insert($this->tb_voyages);
    }
    
    public function supprimer($idvoy){
        $this->load->model('place_model');
        $result= $this->place_model->supprimer_p_voy($idvoy);
        return $this->db->where('numVoy',$idvoy)
                        ->delete($this->tb_voyages);
    }

    public function compter_voy($where = array()){ //$where est tableau associatif permettant de definir des conditions

        return (int) $this->db->where($where)
                              ->count_all_results($this->tb_voyages);
    }
    public function lister(){
        return $this->db->get($this->tb_voyages);
    }

    public function get_voy($idvoy){
        $this->db->select('*')
                 ->from($this->tb_voyages)
                 ->where('numVoy',$idvoy);
        $query = $this->db->get();
        return $query;
    }

    public function get_numVoy($where = array()){
        $this->db->select('numVoy')
                ->from($this->tb_voyages)
                ->where($where);
        $query = $this->db->get();
        return $query;
    }
    public function effectuer($numcli, $numVoy, $d_dep, $h_dep, $numplace){
        $this->db->set('f_numCli',$numcli);
        $this->db->set('f_numVoy',$numVoy);
        $this->db->set('date_dep',$d_dep);
        $this->db->set('heure_dep',$h_dep);
        $this->db->set('numPlace',$numplace);

        return $this->db->insert($this->table2);
    }

    public function get_place($voyage){
        $this->db->select('*') 
                ->from($this->tb_places,$this->tb_voyages)
                //->join($this->tb_voyages)
                //->on('numVoy','f_idVoy')
                ->where('f_idVoy',$voyage)
                ->order_by('numPlace','asc');
        //SELECT `numPlace` FROM `places` JOIN `voyages` ON `numVoy` = `f_idVoy` WHERE `f_idVoy` = `V10`;
        $query = $this->db->get();
        return $query;
    }

    public function get_place_cli($numcli){
        $this->db->select('*') 
                ->from($this->tb_clients,$this->tb_places)
                //->join($this->tb_voyages)
                //->on('numVoy','f_idVoy')
                ->where('numCli',$numcli);
        //SELECT `numPlace` FROM `places` JOIN `voyages` ON `numVoy` = `f_idVoy` WHERE `f_idVoy` = `V10`;
        $query = $this->db->get();
        return $query;
    }
}
?>