<?php
/*
Auteur : Maroua KHALQANI
Objectif : Afficher le profil de l'utilisateur connecté après vérification de la session.
Date : 17/10/2026
*/

session_start();

if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

$login = $_SESSION["login"];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Profil</title>
</head>
<body>
<h2>Bienvenue <?= htmlspecialchars($login) ?> !</h2>

<p>Vous êtes connecté.</p>

<a href="deconnexion.php">Se déconnecter</a>
</body>
</html>
