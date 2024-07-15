<?php
class Devis_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    // Fonction pour obtenir tous les devis
    public function get_all_devis() {
        $query = $this->db->query("
            SELECT devis.*, voiture.numero, type_service.type as service, rendez_vous.date_debut
            FROM devis
            JOIN rendez_vous ON devis.idRendezVous = rendez_vous.idRendezVous
            JOIN voiture ON rendez_vous.idVoiture = voiture.idVoiture
            JOIN type_service ON rendez_vous.idTypeService = type_service.idTypeService
        ");
        return $query->result_array();
    }

    // Fonction pour payer un devis
    public function payer_devis($idDevis, $date_paiement) {
        $query = $this->db->query("
            SELECT rendez_vous.date_debut
            FROM devis
            JOIN rendez_vous ON devis.idRendezVous = rendez_vous.idRendezVous
            WHERE devis.idDevis = ?
        ", array($idDevis));
        $devis = $query->row_array();

        if ($devis && strtotime($date_paiement) >= strtotime($devis['date_debut'])) {
            $this->db->query("
                UPDATE devis
                SET date_paiement = ?, statut = 'payee'
                WHERE idDevis = ?
            ", array($date_paiement, $idDevis));
            return true;
        }
        return false;
    }
}
?>
