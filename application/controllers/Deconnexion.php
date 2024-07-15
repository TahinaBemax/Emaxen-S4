<?php
class Deconnexion extends CI_Controller
{
    public function index(){
        $this->session->unset_userdata("utilisateur");
        redirect("http://localhost/tp-supermarket/");
    }
}