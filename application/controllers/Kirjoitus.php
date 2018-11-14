<?php

class Kirjoitus extends CI_Controller
{    
    public function __construct() 
    {
        parent::__construct();
        $this->load->model("kirjoitusmodel");      
        $this->load->model("kommenttimodel");
        $this->load->library("form_validation");   
        
    }
    //Lataa kirjoituksen näkymän.
    public function index($kirjoitusID = "")
    {                
        $data["content"] = "kirjoitus_view";        
        $kirjoitusData = $this->kirjoitusmodel->haeKirjoitus($kirjoitusID);
        $kommenttiData = $this->kommenttimodel->haeKommentit($kirjoitusID);
         
        //Laitetaan kirjoituksen datan viewille ystävällisempään taulukkoon.
        $data["kirjoitus"] = array(
            "id"            => $kirjoitusData[0]->kirjoitus_id,
            "otsikko"       => $kirjoitusData[0]->otsikko,
            "teksti"        => $kirjoitusData[0]->teksti,
            "kirjoittaja_id"   => $kirjoitusData[0]->kayttaja_id,
            "paivays"       => $kirjoitusData[0]->paivays,
            "kirjoittaja"   => $kirjoitusData[0]->tunnus
        );
        
        $data["kommentit"] = $kommenttiData;
    
        $this->load->view("template", $data);         
    }
    
    static function lisaa_kirjoitus()
    {
        $data["content"] = "lisaakirjoitus";
        $this->load->view("template", $data);        
    }
    
    public function tallenna_kirjoitus()
    {
        $data = array(
            "otsikko"       => $this->input->post("otsikko"),
            "teksti"        => $this->input->post("teksti"),
            "kayttaja_id"   => $this->session->userdata("loggedin")->id        
        );
        
        $this->kirjoitusmodel->lisaaKirjoitus($data);
        redirect("blogi/index");
    }    
    
    public function poista_kirjoitus($kirjoitusID)
    {        
        $this->kirjoitusmodel->poistaKirjoitus($kirjoitusID);
        redirect("blogi/index");
        
    }
    
    
    public function lisaa_kommentti()
    {
        $data = array(
            "teksti"        => $this->input->post("kommenttiTeksti"),
            "kirjoitus_id"  => $this->input->post("kirjoitusID"),
            "kayttaja_id"   => $this->session->userdata("loggedin")->id
        );
        
        $this->kommenttimodel->tallennaKommentti($data);
        
        redirect("kirjoitus/index/" . $data['kirjoitus_id']);        
    }
    
    public function poista_kommentti($kommenttiID, $kirjoitusID)
    {
        $this->kommenttimodel->poistaKommentti($kommenttiID);
        redirect("kirjoitus/index/" . $kirjoitusID);
    }        
}