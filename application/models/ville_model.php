<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Ville_model extends CI_Model
{
    protected $table = 'villes';

    public function __construct()
    {
        parent::__construct();
    }
    
    public function ajouter($idville, $nom, $frais, $dist){

        $this->db->set('idVille',$idville);
        $this->db->set('nomVille',$nom);
        $this->db->set('frais',$frais);
        $this->db->set('distance',$dist);

        return $this->db->insert($this->table);
    }

    public function modifier($id,$nom, $frais, $dist){
        $this->db->where('idVille',$id);        
        $this->db->set('nomVille',$nom);
        $this->db->set('frais',$frais);
        $this->db->set('distance',$dist);
        return $this->db->update($this->table);
    }

    public function get_ville_id($id){
        $this->db->select('*')
                 ->from($this->table)
                 ->where('idVille',$id);
        $query = $this->db->get();
        return $query;
    }

    public function supprimer($id){

        return $this->db->where('idVille', $id)
                        ->delete($this->table);
    }

    public function compter_ville($where = array()){ //$where est tableau associatif permettant de definir des conditions

        return (int) $this->db->where($where)
                              ->count_all_results($this->table); //count_all_result est un fonction dans codeigniter     
    }

    public function lister(){
        return $this->db->get($this->table);
    }
}
?>