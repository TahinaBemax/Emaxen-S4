<?php

class Login extends CI_Controller
{
    public function index()
    {
        $this->load->model('Voiture', 'v');
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

            $reponse['success'] = $this->c->login($type, $numero);

            if ($reponse['success']){
                //$this->session->set_userdata('client', serialize($this->User->getUtilisateur($login, $motdepasse)));
                $this->session->set_userdata('client', 1);
            } else {
                $reponse['message'] = "Le numero de matriculation ne correspond pas avec le type de voiture";
            }

            if (1==2) {
                $reponse['success'] = $this->c->registrer($type, $numero);
            }

        } catch (Exception $e){
            $reponse['message'] = $e->getMessage();
        }
        echo json_encode($reponse);
    }
}