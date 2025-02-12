

<?php
class Message {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function ajouterMessage($contenu, $utilisateur_id, $sujet_id) {
        $stmt = $this->pdo->prepare("INSERT INTO messages (contenu, utilisateur_id, sujet_id) VALUES (?, ?, ?)");
        return $stmt->execute([$contenu, $utilisateur_id, $sujet_id]);
    }

    public function obtenirMessagesParSujet($sujet_id) {
        $stmt = $this->pdo->prepare("SELECT messages.*, utilisateurs.nom FROM messages 
                                     JOIN utilisateurs ON messages.utilisateur_id = utilisateurs.id 
                                     WHERE messages.sujet_id = ? ORDER BY messages.date_post ASC");
        $stmt->execute([$sujet_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
