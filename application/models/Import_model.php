<?php
class Import_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    // Fonction pour importer les données du fichier CSV des services
    public function import_service_csv($filePath) {
        $file = fopen($filePath, 'r');
        fgetcsv($file); // Skip header
        while (($row = fgetcsv($file, 1000, ',')) !== FALSE) {
            $data = array(
                'type' => $row[0],
                'duree' => $row[1],
                'montant' => 0 // Montant par défaut, vous pouvez ajuster cela si nécessaire
            );
            $this->db->insert('type_service', $data);
        }
        fclose($file);
    }

    // Fonction pour importer les données du fichier CSV des travaux
    public function import_travaux_csv($filePath) {
        $file = fopen($filePath, 'r');
        fgetcsv($file); // Skip header
        while (($row = fgetcsv($file, 1000, ',')) !== FALSE) {
            // Insérer les données de voiture
            $voiture_data = array(
                'numero' => $row[0],
                'idTypeVoiture' => $this->get_type_voiture_id($row[1]),
                'idClient' => 0 // ID client par défaut, vous pouvez ajuster cela si nécessaire
            );
            $this->db->insert('voiture', $voiture_data);
            $idVoiture = $this->db->insert_id();

            // Insérer les données de rendez_vous
            $date_rdv = DateTime::createFromFormat('d/m/Y H:i', $row[2] . ' ' . $row[3]);
            $rendez_vous_data = array(
                'date_debut' => $date_rdv->format('Y-m-d H:i:s'),
                'idSlot' => 1, // ID slot par défaut, vous pouvez ajuster cela si nécessaire
                'idClient' => 0, // ID client par défaut, vous pouvez ajuster cela si nécessaire
                'idTypeService' => $this->get_type_service_id($row[4])
            );
            $this->db->insert('rendez_vous', $rendez_vous_data);
            $idRendezVous = $this->db->insert_id();

            // Insérer les données de devis
            $date_paiement = DateTime::createFromFormat('d/m/Y', $row[6]);
            $devis_data = array(
                'idRendezVous' => $idRendezVous,
                'montant' => $row[5],
                'date_paiement' => $date_paiement->format('Y-m-d'),
                'statut' => 0 // Statut par défaut, 0 pour non payé
            );
            $this->db->insert('devis', $devis_data);
        }
        fclose($file);
    }

    // Fonction pour obtenir l'ID du type de voiture
    private function get_type_voiture_id($type) {
        $this->db->where('type', $type);
        $query = $this->db->get('type_voiture');
        if ($query->num_rows() > 0) {
            return $query->row()->idTypeVoiture;
        } else {
            // Insérer un nouveau type de voiture si non existant
            $this->db->insert('type_voiture', array('type' => $type));
            return $this->db->insert_id();
        }
    }

    // Fonction pour obtenir l'ID du type de service
    private function get_type_service_id($type) {
        $this->db->where('type', $type);
        $query = $this->db->get('type_service');
        if ($query->num_rows() > 0) {
            return $query->row()->idTypeService;
        } else {
            // Insérer un nouveau type de service si non existant
            $this->db->insert('type_service', array('type' => $type, 'duree' => '00:00:00', 'montant' => 0));
            return $this->db->insert_id();
        }
    }
}
?>
