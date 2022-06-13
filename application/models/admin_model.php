<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_model extends CI_Model
{
    protected $table = 'administrateurs';

    public function __construct()
    {
        parent::__construct();
    }
    
    public function ajouter($nom, $mdp){

        $this->db->set('nom_admin',$nom);
        $this->db->set('mdp_admin',$mdp);        
        return $this->db->insert($this->table);
    }
    
    public function get_adm($id){
        $this->db->select('*')
                 ->from($this->table)
                 ->where('nom_admin',$id);
        $query = $this->db->get();
        return $query;
    }
}
?>