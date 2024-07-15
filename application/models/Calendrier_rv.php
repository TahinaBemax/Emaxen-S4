<?php
class Calendrier_rv extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    // Fonction pour obtenir la liste des rendez-vous
    public function get_all_rendez_vous() {
        $query = $this->db->query("
            SELECT rendez_vous.*, voiture.numero, type_service.type as service, slot.nomSlot
            FROM rendez_vous
            JOIN voiture ON rendez_vous.idVoiture = voiture.idVoiture
            JOIN type_service ON rendez_vous.idTypeService = type_service.idTypeService
            JOIN slot ON rendez_vous.idSlot = slot.idSlot
        ");
        return $query->result_array();
    }

    // Fonction pour insérer un nouveau rendez-vous
    public function insert_rendez_vous($date_debut, $date_fin, $idSlot, $idClient, $idTypeService) {
        $data = array(
            'date_debut' => $date_debut,
            'date_fin' => $date_fin,
            'idSlot' => $idSlot,
            'idClient' => $idClient,
            'idTypeService' => $idTypeService
        );

        return $this->db->insert('rendez_vous', $data);
    }
}
?>
