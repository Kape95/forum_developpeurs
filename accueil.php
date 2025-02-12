

<?php
session_start();
if (!isset($_SESSION["utilisateur_id"])) {
    header("Location: connexion.php");
    exit();
}
include 'config.php';
include 'Utilisateur.php';
$utilisateur = new Utilisateur($pdo);
$nom_utilisateur = $_SESSION["nom"];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Bienvenue, <?php echo htmlspecialchars($nom_utilisateur); ?> !</h1>
        <nav>
            <a href="deconnexion.php">Déconnexion</a>
        </nav>
    </header>
    <main>
        <h2>Liste des sujets</h2>
        <a href="ajouter_sujet.php" class="btn">Créer un nouveau sujet</a>
        <section>
            <?php
            $sql = "SELECT * FROM sujets ORDER BY date_creation DESC";
            $stmt = $pdo->query($sql);
            while ($sujet = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "<div class='sujet'>";
                echo "<h3><a href='sujet.php?id=" . $sujet['id'] . "'>" . htmlspecialchars($sujet['titre']) . "</a></h3>";
                echo "<p>Posté le " . $sujet['date_creation'] . "</p>";
                echo "</div>";
            }
            ?>
        </section>
    </main>
</body>
</html>
