

<?php
session_start();
session_destroy(); // Détruit toutes les sessions actives
header("Location: connexion.php"); // Redirection vers la page de connexion
exit();
?>
