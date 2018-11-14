<?php

class KirjoitusModel extends CI_Model 
{
    public function __construct() 
    {
        parent::__construct();        
    }
   
    public function haeKirjoitukset()            
    {
        //Hakee kaikki kirjoitukset.
        $this->db->select("*");
        $this->db->from("kirjoitus");
        
        //Liittää kyselyyn kayttaja pöydältä kayttajan joka on kirjoittanut kirjoituksen.
        $this->db->join("kayttaja", "kirjoitus.kayttaja_id = kayttaja.id");
        
        //Palauttaa tulokset.
        return $this->db->get()->result();        
    }
    
    public function lisaaKirjoitus($kirjoitus)
    {
        $this->db->insert("kirjoitus", $kirjoitus);
    }
    
    public function poistaKirjoitus($kirjoitusID)
    {
        $this->db->where("kirjoitus_id=", $kirjoitusID);
        $this->db->delete("kommentti");
        
        $this->db->where("kirjoitus_id=", $kirjoitusID);
        $this->db->delete("kirjoitus");
        
    }
    
    public function haeKirjoitus($kirjoitusID)
    {
        $this->db->select("*");
        $this->db->from("kirjoitus");
        $this->db->where("kirjoitus_id", $kirjoitusID);
        $this->db->join("kayttaja", "kirjoitus.kayttaja_id = kayttaja.id");
        
        //Palauttaa tulokset.
        return $this->db->get()->result();    
    }
    
}