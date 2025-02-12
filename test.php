

<?php
$mot_de_passe_saisi = "1234567890"; // Mets ici le mot de passe que tu as saisi à l'inscription

// Remplace par le mot de passe haché récupéré dans phpMyAdmin
$mot_de_passe_enregistre = '$2y$10$PpCOmhdQRYamyH3KmUmp2.e7/hx3GkHV7pkcGqqkum5';

if (password_verify($mot_de_passe_saisi, $mot_de_passe_enregistre)) {
    echo "Mot de passe correct !";
} else {
    echo "Mot de passe incorrect !";
}
?>