<?php
class Devis extends CI_Model {
    // Fonction pour obtenir tous les devis
    public function get_all_devis() {
        $query = $this->db->query("SELECT * FROM v_devis");
        $resultat = array();
        foreach ($query->result_array() as $row){
            $resultat[] = $row;
        };
        return $resultat;
    }
    public function getByDatePaiement($date) {
        $query = $this->db->query("SELECT * FROM v_devis where date_paiement >= ?", array($date));
        $resultat = array();
        foreach ($query->result_array() as $row){
            $resultat[] = $row;
        };
        return $resultat;
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
                SET date_paiement = ?, statut = true
                WHERE idDevis = ?
            ", array($date_paiement, $idDevis));
            return true;
        }
        return false;
    }
}
?>
