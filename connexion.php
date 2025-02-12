

<?php
session_start();
include 'config.php'; // Connexion à la base de données
include 'utilisateur.php'; // Classe Utilisateur

$utilisateur = new Utilisateur($pdo);
$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $mot_de_passe = $_POST["mot_de_passe"];

    if (!empty($email) && !empty($mot_de_passe)) {
        $utilisateurConnecte = $utilisateur->connecter($email, $mot_de_passe);
        
        if ($utilisateurConnecte) {
            $_SESSION["utilisateur_id"] = $utilisateurConnecte["id"];
            $_SESSION["nom"] = $utilisateurConnecte["nom"];
            header("Location: accueil.php"); // Redirection vers la page d'accueil
            exit();
        } else {
            $message = "Email ou mot de passe incorrect.";
        }
    } else {
        $message = "Veuillez remplir tous les champs.";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            text-align: center;
        }
        h2 {
            color: #333;
        }
        input {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        button {
            background: #007bff;
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background: #0056b3;
        }
        .message {
            color: red;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Connexion</h2>
        <p class="message"><?php echo $message; ?></p>
        <form method="POST" action="">
            <label for="email">Email :</label>
            <input type="email" name="email" required><br>
            
            <label for="mot_de_passe">Mot de passe :</label>
            <input type="password" name="mot_de_passe" required><br>
            
            <button type="submit">Se connecter</button>
        </form>
    </div>
</body>
</html>
