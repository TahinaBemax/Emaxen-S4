<?php
require('/fpdf.php');

class Devis_model extends CI_Model {

    public function __construct() {
        $this->load->database();
    }

    // Fonction pour générer le PDF du devis
    public function generate_devis_pdf($idRendezVous) {
        // Récupérer les informations du rendez-vous, de la voiture et du service
        $query = $this->db->query("
            SELECT 
                rv.date_debut, rv.date_fin, rv.idSlot, 
                v.numero as voiture_numero, tv.type as voiture_type, 
                ts.duree, ts.montant
            FROM rendez_vous rv
            JOIN voiture v ON rv.idClient = v.idClient
            JOIN type_voiture tv ON v.idTypeVoiture = tv.idTypeVoiture
            JOIN type_service ts ON rv.idTypeService = ts.idTypeService
            WHERE rv.idRendezVous = ?
        ", array($idRendezVous));
        
        if ($query->num_rows() != 1) {
            return false; // Rendez-vous non trouvé
        }

        $data = $query->row_array();

        // Initialiser FPDF
        $pdf = new FPDF();
        $pdf->AddPage();

        // Titre du devis
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Cell(0, 10, 'Devis pour le service', 0, 1, 'C');

        // Informations sur le véhicule
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(0, 10, 'Informations sur le vehicule', 0, 1);
        $pdf->Cell(50, 10, 'Numero : ' . $data['voiture_numero'], 0, 1);
        $pdf->Cell(50, 10, 'Type : ' . $data['voiture_type'], 0, 1);

        // Informations sur le service
        $pdf->Cell(0, 10, 'Informations sur le service', 0, 1);
        $pdf->Cell(50, 10, 'Date debut : ' . $data['date_debut'], 0, 1);
        $pdf->Cell(50, 10, 'Date fin : ' . $data['date_fin'], 0, 1);
        $pdf->Cell(50, 10, 'Duree : ' . $data['duree'] . ' minutes', 0, 1);
        $pdf->Cell(50, 10, 'Montant : ' . $data['montant'] . ' Ar', 0, 1);

        // Sortie du PDF
        $pdf->Output('D', 'devis_' . $idRendezVous . '.pdf');
    }
}
?>
