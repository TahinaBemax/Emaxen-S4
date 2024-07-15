<?php
class Deconnexion extends CI_Controller
{
    public function index(){
        $this->session->unset_userdata("client");
        redirect("http://localhost/garage/");
    }
}