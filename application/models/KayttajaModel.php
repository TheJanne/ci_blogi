<?php
class KayttajaModel extends CI_Model{
    
    public function __construct() {
        parent::__construct();
    }
    
    //Tässä funkkarissa kysymme databaselta että 
    //löytyykö käyttäjää jolla on täsmäävä salasana.
    //Jos löytyy, palautamme arrayn datasta, jos ei, palautamme falsen.
    public function login($data)
    {
        $ehto = "tunnus=" . "'" . $data['tunnus'] 
            . "' AND " 
            . "salasana=" . "'" . $data['salasana'] . "'";
        
        $this->db->select("*");
        $this->db->from("kayttaja");
        $this->db->where($ehto);
        $this->db->limit(1);
        
        $kysely = $this->db->get();
        
        if($kysely->num_rows() == 1)
        {             
            //Palauta datan
            return $kysely->result();
        }
        else
        {
            return false;
        }
        
    }
    public function rekistoroidy($data)
    {
        $table = "kayttaja";
        $this->db->insert($table, $data);
    }
    
    public function logout($id)
    {
        $this->session->unset_userdata("loggedin");
    }
}