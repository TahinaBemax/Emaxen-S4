<?php

class Login extends CI_Controller
{
    public function index()
    {
        $this->load->model('TypeVoiture', 'v');
        try {
            $data['typeVoiture'] =$this->v->getAll();
            $this->load->view('login', $data);
        } catch (Exception $e){
            echo $e->getMessage();
        }
    }
    public function authetification(){
        //--- Load ---
        $this->load->helper(array('form', 'url'));
        $this->load->model('Client', 'c');

        $reponse = ["success" => false, "message" => ''];

        try {
            $type = $this->input->post('types');
            $numero = $this->input->post('matricule');

            if ($this->c->isNumeroVoitureExist($numero)) {
                $reponse['success'] = $this->c->login($numero, $type);

                if ($reponse['success']){
                    $this->session->set_userdata('client', serialize($this->c->getClient($numero, $type)));
                } else {
                    $reponse['message'] = "Le numero de matriculation ne correspond pas avec le type de voiture";
                }
            } else {
                $reponse['success'] = $this->c->register($numero, $type);
                if ($reponse['success']) $this->session->set_userdata('client', serialize($this->c->getClient($numero, $type)));
            }

        } catch (Exception $e){
            $reponse['message'] = $e->getMessage();
        }
        echo json_encode($reponse);
    }
}