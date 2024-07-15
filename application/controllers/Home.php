<?php

class Home extends CI_Controller
{
    public function index(){
        try {
            $this->load->view('inc/header', ['title' => "Home"]);
            $this->load->view('inc/navbar');
            $this->load->view('home');
            $this->load->view('inc/footer');
        } catch (Exception $e){
            echo $e->getMessage();
        }
    }
}