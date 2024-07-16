class Graphe_model extends CI_Model {
    
    public function __construct() {
        $this->load->database();
    }

    // Méthode pour obtenir la liste des devis payés et non payés
    public function get_devis_status() {
        $query = $this->db->query("
            SELECT 
                SUM(CASE WHEN statut = TRUE THEN montant ELSE 0 END) AS montant_paye,
                SUM(CASE WHEN statut = FALSE THEN montant ELSE 0 END) AS montant_non_paye
            FROM devis
        ");
        return $query->row_array();
    }

    // Méthode pour obtenir les devis payés et non payés par date
    public function get_devis_status_by_date($date_reference) {
        $query = $this->db->query("
            SELECT 
                SUM(CASE WHEN statut = TRUE THEN montant ELSE 0 END) AS montant_paye,
                SUM(CASE WHEN statut = FALSE THEN montant ELSE 0 END) AS montant_non_paye
            FROM devis
            WHERE date_debut = ?", array($date_reference));
        return $query->row_array();
    }
}
