<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin extends CI_Controller
{
    public function index(){
        try {
            $this->load->model('Service', 's');
            $data['services'] = $this->s->getAll();
            $this->load->view('admin/header', ['title' => "Home"]);
            $this->load->view('admin/navbar');
            $this->load->view('admin/services', $data);
            $this->load->view('admin/footer');
        } catch (Exception $e){
            echo $e->getMessage();
        }
    }
}