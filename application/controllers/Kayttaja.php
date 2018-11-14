<?php
class Kayttaja extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model("kayttajamodel");
        
        //Needed libraries
        $this->load->library("session");
        $this->load->library("form_validation");      
    }
    
    //Lataa kirjautumis näkymän.
    public function kirjaudu_sisaan()
    {
        $data["content"] = "kirjauduviews/kirjaudu_view";
        $this->load->view("template", $data);
    }
    
    public function kirjaudu_ulos()
    {
        $this->session->unset_userdata("loggedin");
        redirect("blogi/index");
    }
    
    public function rekistoroidy()
    {
        //Käyttäjän syöttämä data.
        $data = array(
            "sukunimi"      => $this->input->post("sukunimi"),
            "etunimi"       => $this->input->post("etunimi"),
            "tunnus"        => $this->input->post("tunnus"),
            "salasana"      => $this->input->post("salasana"),
            "email"         => $this->input->post("email")           
        );
        
        //Aseta säännöt käyttäjän syöttämiin tietoihin.
        $this->form_validation->set_rules("sukunimi", "lastname", "required");
        $this->form_validation->set_rules("etunimi", "firstname", "required");
        $this->form_validation->set_rules("tunnus", "username", "required|min_length[5]");
        $this->form_validation->set_rules("salasana", "password", "required|min_length[5]");
        $this->form_validation->set_rules("email", "sahkoposti", "required");    
        
        if($this->form_validation->run() === TRUE)
        {
            $this->kayttajamodel->rekistoroidy($data);
            
            //Form validation on onnistunut, lähetämme datan kirjaudu funkkariin.            
            redirect("blogi/index");
        }
        
        else
        {
            //Form validation ei onnistunut. Menemme takaisin sivulle.
            $data["content"] = "kirjauduviews/rekistoroidy_view";
            $this->load->view("template", $data);
        }        
    }
    
    public function kirjautuminen()
    {
        $data = array(
            "tunnus" => $this->input->post("tunnus"),
            "salasana" => $this->input->post("salasana")            
        );
        
        //Asetamme säännöt kirjautumis formille
        $this->form_validation->set_rules("tunnus", "username", "required");
        $this->form_validation->set_rules("salasana", "password", "required");
        
        if($this->form_validation->run() === TRUE)
        {
            $kayttajaData = $this->kayttajamodel->login($data);
            
            //Form validation on onnistunut, lähetämme datan kirjautumis kirjaudu funkkariin.
            if($kayttajaData != false)
            {                
                $this->session->set_userdata('loggedin', $kayttajaData[0]);
                redirect("blogi/index");               
            }
            
            //Kirjautuminen ei onnistunut. Salasana tai tunnus on 
            else
            {
                $data["content"] = "kirjauduviews/kirjaudu_view";                
            }
        }
        
        else
        {
            //Form validation ei onnistunut.
            $data["content"] = "kirjauduviews/kirjaudu_view";
        }
        $this->load->view("template", $data);
    }    
}