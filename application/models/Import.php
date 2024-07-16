<?php
class Import extends CI_Model {
    // Fonction pour importer les données du fichier CSV des services
    public function import_service_csv($filePath) {

        $rep = false;
        $file = fopen($filePath, 'r');
        fgetcsv($file); // Skip header
        while (($row = fgetcsv($file, 1000, ',')) !== FALSE) {
            $data = array(
                'type' => $row[0],
                'duree' => $row[1],
                'montant' => 0 // Montant par défaut, vous pouvez ajuster cela si nécessaire
            );
            $this->db->insert('type_service', $data);
            $rep = ($this->db->affected_rows() > 0);
        }
        fclose($file);
        return $rep;
    }

    // Fonction pour importer les données du fichier CSV des travaux
    public function import_travaux_csv($filePath) {
        try {
            // Charger les données existantes des tables pertinentes
            $table_voiture = $this->getAllVoiture();
            $table_typeVoiture = $this->getAll();

            $file = fopen($filePath, 'r');
            fgetcsv($file); // Skip header

            while (($row = fgetcsv($file, 1000, ',')) !== FALSE) {
                // Insérer les données de type voiture si elles n'existent pas déjà
                $in = false;
                if (count($table_typeVoiture) > 0){
                    foreach ($table_typeVoiture as $t){
                        if (strtolower($t['type']) === strtolower($row[1])){
                            $in = true;
                            break;
                        }
                    }
                }

                if (!$in) {
                    $table_typeVoiture[]['type'] = $row[1];
                    $voiture_data = array('type' => $row[1]);
                    $this->db->insert('type_voiture', $voiture_data);
                }


                /*-------------------------------------------------*/

                // Insérer les données de voiture si elles n'existent pas déjà
                $in = false;
                    foreach ($table_voiture as $t){
                        if((isset($t['numero']) && isset($row[0]) && strtolower($t['numero']) === strtolower($row[0]))) {
                                $in = true;
                                break;
                        }
                    }

                if (!$in) {
                    $table_voiture[]['numero'] = $row[0];
                    $voiture_data = array(
                        'numero' => $row[0],
                        'idTypeVoiture' => $this->get_type_voiture_id($row[1]),
                        'idClient' => $this->get_client_id($row[0])
                    );
                    $this->db->insert('voiture', $voiture_data);
                    // Mettre à jour $table_voiture avec le nouvel idVoiture inséré
                    $table_voiture[] = $this->db->insert_id();
                }


                // Insérer les données de rendez-vous
                $date_rdv = DateTime::createFromFormat('d/m/Y H:i', $row[2] . ' ' . $row[3]);
                $this->load->model('RendezVous', 'rdv');
                $duree = $this->getDuree($row[6]);
                $available_slots = $this->rdv->check_availability($date_rdv->format("d/m/Y"), $date_rdv->format("H:i"), $duree);
                $idSlot = array_shift($available_slots);

                $rendez_vous_data = array(
                    'date_debut' => $date_rdv->format('Y-m-d H:i:s'),
                    'idSlot' => $idSlot,
                    'idClient' => $this->get_client_id($row[0]),
                    'idTypeService' => $this->get_type_service_id($row[4])
                );

                $this->db->insert('rendez_vous', $rendez_vous_data);
                $idRendezVous = $this->db->insert_id();

                // Insérer les données de devis
                $date_paiement = null;
                if (isset($row[6])) {
                    $date_paiement = DateTime::createFromFormat('d/m/Y', $row[6]);
                }

                $devis_data = array(
                    'idRendezVous' => $idRendezVous,
                    'montant' => $row[5],
                    'date_paiement' => ($date_paiement !== null && !is_bool($date_paiement)) ? $date_paiement->format('Y-m-d') : null,
                    'statut' => ($date_paiement !== null && !is_bool($date_paiement)) // Statut par défaut, 0 pour non payé
                );
                $this->db->insert('devis', $devis_data);
            }
            fclose($file);
        } catch (Exception $e) {
            throw $e;
        }
        return true;
    }


    // Fonction pour obtenir l'ID du type de voiture
    private function get_type_voiture_id($type) {
        // Apply where condition before executing the query
        $this->db->where('type', $type);
        $query = $this->db->get('type_voiture');

        if ($query->num_rows() > 0) {
            // If type exists, return its idTypeVoiture
            return $query->row()->idTypeVoiture;
        } else {
            // If type does not exist, insert it and return the inserted id
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
    private function get_client_id($voiture) {
        $this->db->select('client.idClient');
        $this->db->from('voiture');
        $this->db->join('client', 'voiture.idClient = client.idClient', 'left');
        $this->db->where('voiture.numero', $voiture);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            return $query->row()->idClient;
        } else {
            // Insérer un nouveau type de service si non existant
            $this->db->insert('client', array('nom' => 'default'));
            return $this->db->insert_id();
        }
    }
    private function getDuree($servie) {
        $this->db->where('type', $servie);
        $query = $this->db->get('type_service');
        if ($query->num_rows() > 0) {
            return $query->row()->duree;
        }
    }
    public function getAll() {
        $query = $this->db->get('type_voiture');
        return $query->result_array();
    }
    public function getAllVoiture() {
        $query = $this->db->get('voiture');
        return $query->result_array();
    }
}
?>
