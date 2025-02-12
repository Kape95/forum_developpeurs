

<?php
session_start();
include 'config.php';

if (!isset($_SESSION["utilisateur_id"])) {
    header("Location: connexion.php");
    exit();
}

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titre = trim($_POST["titre"]);

    if (!empty($titre)) {
        $sql = "INSERT INTO sujets (titre, utilisateur_id, date_creation) VALUES (:titre, :utilisateur_id, NOW())";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'titre' => $titre,
            'utilisateur_id' => $_SESSION["utilisateur_id"]
        ]);

        header("Location: accueil.php");
        exit();
    } else {
        $message = "Le titre du sujet ne peut pas être vide.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un Sujet</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Créer un Nouveau Sujet</h1>
    <form method="post">
        <label for="titre">Titre du sujet :</label>
        <input type="text" id="titre" name="titre" required>
        <button type="submit">Créer</button>
    </form>
    <?php if ($message): ?>
        <p style="color:red;"><?php echo $message; ?></p>
    <?php endif; ?>
    <a href="accueil.php">Retour à l'accueil</a>
</body>
</html>
