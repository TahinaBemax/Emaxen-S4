<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Rdv extends CI_Controller
{
    public function faireRendezVous()
    {
        //--- Load ---
        $this->load->helper(array('form', 'url'));
        $this->load->model('RendezVous', 'rdv');
        $this->load->helper('validation');
        $reponse = array(
            "success" => false,
            "message" => array("error" => false, "date" => '', "heure" => '', "service" => '', "autre" => ''),
            "reponse" => ''
        );

        try {
            //--- data -------
            $date = "";
            $heure_debut = "";
            try {
                $date = $this->input->post('date');
                verifierDateValide($date);
            } catch (Exception $e) {
                $reponse["message"]["error"] = true;
                $reponse["message"]["date"] = $e->getMessage();
            }

            try {
                $heure_debut = $this->input->post('heure');
                verifierHeureValide($heure_debut);
            } catch (Exception $e) {
                $reponse["message"]["error"] = true;
                $reponse["message"]["heure"] = $e->getMessage();
            }

            $idClient = $this->input->post('idClient');
            $idTypeService = $this->input->post('service');
            if (trim($idTypeService) === ''){
                $reponse["message"]["error"] = true;
                $reponse["message"]["service"] = "Veuillez choisir une type de service";
            }

            if (!$reponse["message"]["error"]){
                $service = $this->rdv->get_service_details($idTypeService);

                if ($service) {
                    if($this->rdv->estHeureTravail($heure_debut)){
                        // Vérifier les créneaux disponibles
                        $available_slots = $this->rdv->check_availability($date, $heure_debut, $service['duree']);
                        if (!empty($available_slots)) {
                            $reponse["reponse"] = "Rendez-vous validée";
                            $reponse["success"] = $this->rdv->book_appointment($date, $heure_debut, $idTypeService, $idClient, $service, $available_slots);
                        } else {
                            $reponse["message"]["autre"] = "Aucun créneau disponible pour la date et l'heure demandées.";
                        }
                    } else {
                        $reponse["message"]["autre"] = "Veuillez faire un rendez-vous dans les heures de travails uniquement 8h-18h";
                    }
                } else {
                    $reponse["message"]["autre"] = 'Service inconnu'; // Service non valide
                }
            }
        } catch (Exception $e) {
            $reponse["message"] = $e->getMessage();
        }
        echo json_encode($reponse);
    }
}