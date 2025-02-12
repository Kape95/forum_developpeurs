

<?php
class Utilisateur {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function inscrire($nom, $email, $mot_de_passe) {
        $mot_de_passe_hash = password_hash($mot_de_passe, PASSWORD_DEFAULT);
        $sql = "INSERT INTO utilisateurs (nom, email, mot_de_passe) VALUES (:nom, :email, :mot_de_passe)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute(['nom' => $nom, 'email' => $email, 'mot_de_passe' => $mot_de_passe_hash]);
    }

    public function connecter($email, $mot_de_passe) {
        $sql = "SELECT * FROM utilisateurs WHERE email = :email";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(['email' => $email]);
        $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($utilisateur && password_verify($mot_de_passe, $utilisateur["mot_de_passe"])) {
            return $utilisateur;
        } else {
            return false;
        }
    }
}
?>
