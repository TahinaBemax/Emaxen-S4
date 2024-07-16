<?php
class Slot_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    // Fonction pour obtenir l'utilisation de chaque slot pour une date donnée
    public function get_slot_usage($date) {
        $sql = "
            SELECT 
                slot.nomSlot, 
                rendez_vous.date_debut, 
                rendez_vous.date_fin, 
                voiture.numero, 
                type_service.type as service
            FROM 
                rendez_vous
            JOIN 
                slot ON rendez_vous.idSlot = slot.idSlot
            JOIN 
                voiture ON rendez_vous.idClient = voiture.idClient
            JOIN 
                type_service ON rendez_vous.idTypeService = type_service.idTypeService
            WHERE 
                DATE(rendez_vous.date_debut) = ?
        ";

        $query = $this->db->query($sql, array($date));
        
        return $query->result_array();
    }
}
?>
