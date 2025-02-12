

<?php
class Message {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Fonction pour ajouter un message à un sujet
    public function ajouterMessage($id_sujet, $utilisateur_id, $contenu) {
        $sql = "INSERT INTO messages (id_sujet, id_utilisateur, contenu, date_creation) 
                VALUES (:id_sujet, :id_utilisateur, :contenu, NOW())";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([
            'id_sujet' => $id_sujet,
            'id_utilisateur' => $utilisateur_id,
            'contenu' => $contenu
        ]);
    }

    // Fonction pour récupérer tous les messages d'un sujet donné
    public function recupererMessages($id_sujet) {
        $sql = "SELECT m.contenu, m.date_creation, u.nom 
                FROM messages m
                JOIN utilisateurs u ON m.id_utilisateur = u.id
                WHERE m.id_sujet = :id_sujet
                ORDER BY m.date_creation ASC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['id_sujet' => $id_sujet]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
