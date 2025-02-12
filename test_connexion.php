

<?php
include 'config.php';

if ($pdo) {
    echo "Connexion à la base de données réussie !";
} else {
    echo "Échec de la connexion.";
}
?>
