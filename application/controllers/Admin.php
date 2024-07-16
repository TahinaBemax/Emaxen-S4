<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function index()
    {
        try {
            $this->load->model('Service', 's');
            $data['services'] = $this->s->getAll();
            $this->load->view('admin/header', ['title' => "Service"]);
            $this->load->view('admin/navbar');
            $this->load->view('admin/services', $data);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function delete($idTypeServicee)
    {
        try {
            $this->load->model('Service', 's');
            if ($this->s->delete_type_service($idTypeServicee)) {
                redirect("http://localhost/garage/Admin/");
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function getServiceToUpdate($id){
        try {
            $this->load->model('Service', 'c');
            $data['service'] = $this->c->get_type_service_by_id($id);
            $this->load->view('admin/form_service', $data);
        } catch (Exception $e) {
            echo json_encode($e->getMessage());
        }
    }
    public function nouveauService(){
        try {
            $this->load->view('admin/form_service');
        } catch (Exception $e) {
            echo json_encode($e->getMessage());
        }
    }
    public function update()
    {
        //--- Load ---
        $this->load->helper(array('form', 'url'));
        $this->load->model('Service', 'c');

        $reponse = ["success" => false, "message" => ''];

        try {
            $duree = $this->input->post('duree');
            $id = $this->input->post('id');
            $montant = $this->input->post('montant');
            $type = $this->input->post('type');
            $reponse['success'] = $this->c->update_type_service($id, array("type" => $type, "duree" => $duree, "montant" => $montant));

            if ($reponse['success']) {
                $reponse['message'] = "modification réussie";
            } else {
                $reponse['message'] = "Echec de modification";
            }
        } catch (Exception $e) {
            $reponse['message'] = $e->getMessage();
        }
        echo json_encode($reponse);
    }
    public function insert()
    {
        //--- Load ---
        $this->load->helper(array('form', 'url'));
        $this->load->model('Service', 'c');

        $reponse = ["success" => false, "message" => ''];

        try {
            $duree = $this->input->post('duree');
            $montant = $this->input->post('montant');
            $type = $this->input->post('type');
            $reponse['success'] = $this->c->create_type_service(array($type, $duree,$montant));

            if ($reponse['success']) {
                $reponse['message'] = "Insertion réussie";
            } else {
                $reponse['message'] = "Echec d'insertion";
            }
        } catch (Exception $e) {
            $reponse['message'] = $e->getMessage();
        }
        echo json_encode($reponse);
    }

    /* ------ DEVIS ----------- */
    public function devis()
    {
        try {

            $this->load->model('Devis', 'd');
            $data['devis'] = $this->d->get_all_devis();
            $this->load->view('admin/header', ['title' => "Devis"]);
            $this->load->view('admin/navbar');
            $this->load->view('admin/devis', $data);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    public function devisByDatePaiement()
    {
        try {
            //--- Load ---
            $this->load->helper(array('form', 'url'));
            $this->load->model('Service', 'c');

            $date = $this->input->post('date');

            $this->load->model('Devis', 'd');
            $data['devis'] = $this->d->getByDatePaiement($date);
            $this->load->view('admin/header', ['title' => "Devis"]);
            $this->load->view('admin/navbar');
            $this->load->view('admin/devis', $data);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }


    public function calendar()
    {
        try {
            $this->load->model('RendezVous', 'd');
            $data['rdvs'] = $this->d->getAll();
            $this->load->view('admin/header', ['title' => "Calendar"]);
            $this->load->view('admin/navbar');
            $this->load->view('admin/calendar', $data);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
}