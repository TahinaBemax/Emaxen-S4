<?php
require_once APPPATH . 'third_party/fpdf185/fpdf.php';
class Devis extends CI_Model {
    public function insert($montant, $idRdv){
        $query = "INSERT INTO devis (montant, statut, idRendezVous) 
        VALUES (?, ?, ?)";
        $this->db->query($query, array($montant, false, $idRdv));
        return $this->db->affected_rows() > 0;
    }
    public function generate_devis_pdf($data) {
        // Initialiser FPDF
        $this->load->library('FPDF'); // Charge la bibliothèque FPDF
        $pdf = new FPDF();
        $pdf->AddPage();

        // Titre du devis
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 10, 'Devis pour le service', 0, 1, 'C');

        // Informations sur le véhicule
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(0, 10, 'Informations sur le vehicule', 0, 1);
        $pdf->Cell(50, 10, 'Numero : ' . $data['numero'], 0, 1);
        $pdf->Cell(50, 10, 'Type : ' . $data['type_voiture'], 0, 1);

        // Informations sur le service
        $pdf->Cell(0, 10, 'Informations sur le service', 0, 1);
        $pdf->Cell(50, 10, 'Date debut : ' . $data['date_debut'], 0, 1);
        $pdf->Cell(50, 10, 'Date fin : ' . $data['date_fin'], 0, 1);
        $pdf->Cell(50, 10, 'Duree : ' . $data['duree'] . ' minutes', 0, 1);
        $pdf->Cell(50, 10, 'Montant : ' . $data['montant'] . ' Ar', 0, 1);

        // Sortie du PDF
        $pdf->Output('D', 'devis_' . $data['numero'] . '.pdf');
    }

    /**
     * @throws Exception
     */
    public function getById($idRendezVous){
        // Récupérer les informations du rendez-vous, de la voiture et du service
        $query = $this->db->query(" SELECT * FROM garage.v_devis WHERE idRendezVous = ?", array($idRendezVous));

        if ($query->num_rows() == 1) {
            return $query->row_array();;
        }
        throw new Exception("Rendez vous introuvable");
    }


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
