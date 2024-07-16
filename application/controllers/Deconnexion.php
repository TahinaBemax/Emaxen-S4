<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Deconnexion extends CI_Controller
{
    public function index(){
        $this->session->unset_userdata("client");
        redirect("http://localhost/garage/");
    }
}