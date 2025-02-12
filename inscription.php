

<?php
include 'config.php'; // Connexion à la base de données
include 'Utilisateur.php'; // Classe Utilisateur

$utilisateur = new Utilisateur($pdo);

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = trim($_POST["nom"]);
    $email = trim($_POST["email"]);
    $mot_de_passe = $_POST["mot_de_passe"];

    if (!empty($nom) && !empty($email) && !empty($mot_de_passe)) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $resultat = $utilisateur->inscrire($nom, $email, $mot_de_passe);
            if ($resultat) {
                $message = "Inscription réussie ! Vous pouvez vous connecter.";
            } else {
                $message = "Erreur : L'email est déjà utilisé.";
            }
        } else {
            $message = "Email invalide.";
        }
    } else {
        $message = "Tous les champs doivent être remplis.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Inscription</title>
</head>
<body>
<div class="container">
        <h2>Inscription</h2>
        <p class="message"><?php echo $message; ?></p>
        <form method="POST" action="">
            <label for="nom">Nom :</label>
            <input type="text" name="nom" required><br>
            
            <label for="email">Email :</label>
            <input type="email" name="email" required><br>
            
            <label for="mot_de_passe">Mot de passe :</label>
            <input type="password" name="mot_de_passe" required><br>
            
            <button type="submit">S'inscrire</button>
        </form>
    </div>
</body>
</html>
