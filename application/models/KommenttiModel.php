<?php
class KommenttiModel extends CI_Model{
    public function __construct() {
        parent::__construct();
    }
    
    public function tallennaKommentti($kommentti)
    {
        $this->db->insert("kommentti", $kommentti);
    }
    
    public function poistaKommentti($kommenttiID)
    {
        $this->db->where("kommentti_id=", $kommenttiID);
        $this->db->delete("kommentti");    
    }
    
    public function haeKommentit($kirjoitusID)
    {
        $this->db->select("*");
        $this->db->from("kommentti");
        $this->db->where("kirjoitus_id=" . $kirjoitusID);
        $this->db->join("kayttaja", "kommentti.kayttaja_id = kayttaja.id");
        
        return $this->db->get()->result();
    }    
}