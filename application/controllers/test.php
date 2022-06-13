<?php
 defined('BASEPATH') OR exit('No direct script access allowed');
class Test extends CI_Controller
{
    public function index()
    {
        //  Première requête
        $this->benchmark->mark('requete1_start');
        $query = $this->db->query('SELECT `numCli`, `nomCli`, `prenomCli` FROM `clients`')->result();
        $this->benchmark->mark('requete1_end');
         
        //  Deuxième requête
        $this->benchmark->mark('requete2_start');
        $query = $this->db->select('numCli, nomCli, prenomCli')->from('clients')->get()->result();
        $this->benchmark->mark('requete2_end');
        $this->output->enable_profiler(true);
    }
}
 
/* End of file test.php */
/* Location: ./application/controllers/test.php */