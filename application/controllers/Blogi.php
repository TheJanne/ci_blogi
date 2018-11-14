<?php

//Index Controller
class Blogi extends CI_Controller 
{
    public function __construct() 
    {
        parent::__construct();
        //Needed models
        $this->load->model("kommenttimodel");
        $this->load->model("kirjoitusmodel");
             
    }
    
    public function index()
    {
        $data["kirjoitukset"] = $this->kirjoitusmodel->haeKirjoitukset();
        $data["content"] = "main";
        
        $this->load->view("template", $data);
    } 
}