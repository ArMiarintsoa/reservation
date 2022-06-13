<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class client_model extends CI_Model
{
    protected $table = 'clients';

    public function __construct()
    {
        parent::__construct();
    }
    
    public function ajouter($nom, $prenom, $ddn, $tel){

        $this->db->set('nomCli',$nom);
        $this->db->set('prenomCli',$prenom);
        $this->db->set('ddnCli',$ddn);
        $this->db->set('telCli',$tel);

        return $this->db->insert($this->table);
    }

    public function modifier($id,$nom,$prenom,$ddn,$tel){

        //ety no apetraka ny modification izay ilaina 

        $this->db->where('numCli',$id);
        $this->db->set('nomCli',$nom);
        $this->db->set('prenomCli',$prenom);
        $this->db->set('ddnCli',$ddn);
        $this->db->set('telCli',$tel);
        return $this->db->update($this->table);
    }

    public function supprimer($id){

        return $this->db->where('numCli',(int) $id)
                        ->delete($this->table);
    }

    public function compter_cli($where = array()){ //$where est tableau associatif permettant de definir des conditions

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
        return $this->db->get('clients');
    }

    public function lister_by_nom($nomclient){
        $this->db->select('*')
                 ->from($this->table)
                 ->where('nomCli',$nomclient)
                 ->order_by('numCli','asc');
        $query = $this->db->get();
        return $query;
    }

    public function get_num($telCli){
        $this->db->select('numCli')
                 ->from($this->table)
                 ->where('telCli',$telCli);
        $query = $this->db->get();
        return $query;
    }

    public function get_cli($id){
        $this->db->select('*')
                 ->from($this->table)
                 ->where('numCli',$id);
        $query = $this->db->get();
        return $query;
    }

    public function exemple($telCli){
        $sql = "SELECT  `numCli`
                FROM    `clients`
                WHERE   `telCli` = ?
                LIMIT   0,1
                ;";
        
        // Les valeurs seront automatiquement échappées
        $data = array($telCli);
        
        //  On lance la requête
        $query = $this->db->query($sql, $data);
        
        //  On récupère le nombre de résultats
        $nb_resultat = $query->num_rows();
        
        //  On parcourt l'ensemble des résultats
        foreach($query->result() as $ligne)
        {
            echo $ligne->id;
        }
        
        //  On libère la mémoire de la requête (fortement conseillé pour lancer une seconde requête)
        $query->free_result();
    }
}
?>