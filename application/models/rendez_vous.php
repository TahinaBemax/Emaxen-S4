<?php
class Garage_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    // Fonction pour obtenir les heures d'ouverture et de fermeture
    private function get_garage_hours() {
        $query = $this->db->query("SELECT heure_ouverture, heure_fermeture FROM heure LIMIT 1");
        return $query->row_array();
    }

    // Fonction pour vérifier les créneaux disponibles
    public function check_availability($date, $heure_debut, $duree) {
        $heure_fin = date('H:i:s', strtotime("$heure_debut + $duree minutes"));

        $query = "SELECT idSlot FROM rendez_vous 
                  WHERE DATE(date_debut) = ? 
                  AND TIME(date_debut) < ? 
                  AND TIME(date_fin) > ?";
        $query = $this->db->query($query, array($date, $heure_fin, $heure_debut));

        $booked_slots = array_column($query->result_array(), 'idSlot');
        $available_slots = $this->get_all_slots();

        return array_diff($available_slots, $booked_slots);
    }

    // Fonction pour obtenir tous les créneaux
    private function get_all_slots() {
        $query = $this->db->query("SELECT idSlot FROM slot");
        return array_column($query->result_array(), 'idSlot');
    }

    // Fonction pour réserver un rendez-vous
    public function book_appointment($date, $heure_debut, $idTypeService, $idClient) {
        $service = $this->get_service_details($idTypeService);
        if (!$service) {
            return false; // Service non valide
        }

        // Heure de fermeture et d'ouverture du garage
        $hours = $this->get_garage_hours();
        $heure_fermeture = $hours['heure_fermeture'];
        $heure_ouverture = $hours['heure_ouverture'];
        
        // Calculer l'heure de fin initiale
        $heure_fin = date('H:i:s', strtotime("$heure_debut + {$service['duree']} minutes"));

        // Vérifier si l'heure de fin dépasse l'heure de fermeture
        if (strtotime($heure_fin) > strtotime($heure_fermeture)) {
            $date_fin = date('Y-m-d H:i:s', strtotime("$date $heure_fermeture"));
            $duree_reste = (strtotime($heure_fin) - strtotime($heure_fermeture)) / 60;
        } else {
            $date_fin = date('Y-m-d H:i:s', strtotime("$date $heure_fin"));
            $duree_reste = 0;
        }

        // Vérifier les créneaux disponibles
        $available_slots = $this->check_availability($date, $heure_debut, $service['duree']);
        if (empty($available_slots)) {
            return "Aucun créneau disponible pour la date et l'heure demandées.";
        }

        $idSlot = array_shift($available_slots);

        // Réserver le créneau
        $query = "INSERT INTO rendez_vous (date_debut, date_fin, idSlot, idClient, idTypeService) 
                  VALUES (?, ?, ?, ?, ?)";
        $this->db->query($query, array("$date $heure_debut", $date_fin, $idSlot, $idClient, $idTypeService));

        // Si le service dépasse l'heure de fermeture, réserver le créneau pour le lendemain
        if ($duree_reste > 0) {
            $date_debut_reste = date('Y-m-d H:i:s', strtotime("$date +1 day $heure_ouverture"));
            $date_fin_reste = date('Y-m-d H:i:s', strtotime("$date_debut_reste + $duree_reste minutes"));

            $available_slots = $this->check_availability(date('Y-m-d', strtotime("$date +1 day")), $heure_ouverture, $duree_reste);
            if (empty($available_slots)) {
                return "Aucun créneau disponible pour terminer le service le lendemain.";
            }

            $idSlot_reste = array_shift($available_slots);

            $query = "INSERT INTO rendez_vous (date_debut, date_fin, idSlot, idClient, idTypeService) 
                      VALUES (?, ?, ?, ?, ?)";
            $this->db->query($query, array($date_debut_reste, $date_fin_reste, $idSlot_reste, $idClient, $idTypeService));
        }

        return "Rendez-vous réservé avec succès.";
    }

    // Fonction pour obtenir les détails du service
    private function get_service_details($idTypeService) {
        $query = "SELECT duree, montant FROM type_service WHERE idTypeService = ?";
        $result = $this->db->query($query, array($idTypeService));

        if ($result->num_rows() == 1) {
            return $result->row_array();
        } else {
            return false;
        }
    }
}
?>
