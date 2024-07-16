<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller
{
    public function index(){
        try {
            $this->load->model('Service', 's');
            $data['services'] = $this->s->getAll();
            $this->load->view('inc/header', ['title' => "Home"]);
            $this->load->view('inc/navbar');
            $this->load->view('home', $data);
            $this->load->view('inc/footer');
        } catch (Exception $e){
            echo $e->getMessage();
        }
    }


    
}