

<?php
session_start();
include 'config.php';
include 'Message.php';

if (!isset($_SESSION["utilisateur_id"])) {
    header("Location: connexion.php");
    exit();
}

// Vérifier si l'ID du sujet est bien présent dans l'URL
if (!isset($_GET["id"]) || empty($_GET["id"])) {
    header("Location: accueil.php");
    exit();
}

$id_sujet = $_GET["id"];
$message = "";

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST["contenu"])) {
        $contenu = trim($_POST["contenu"]);
        $utilisateur_id = $_SESSION["utilisateur_id"];

        $messageObj = new Message($pdo);
        $messageObj->ajouterMessage($id_sujet, $utilisateur_id, $contenu);

        // Rediriger vers la page du sujet après l'ajout du message
        header("Location: sujet.php?id=" . $id_sujet);
        exit();
    } else {
        $message = "Veuillez écrire un message avant d'envoyer.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Répondre au sujet</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Répondre au sujet</h1>
        <nav>
            <a href="accueil.php">Accueil</a> |
            <a href="deconnexion.php">Déconnexion</a>
        </nav>
    </header>
    
    <main>
        <h2>Écrire une réponse</h2>
        <form method="POST">
            <textarea name="contenu" placeholder="Votre message ici..." required></textarea>
            <button type="submit">Envoyer</button>
        </form>
        <p><?php echo $message; ?></p>
    </main>
</body>
</html>
