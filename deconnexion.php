
<?php
/*
Auteur : Maroua KHALQANI
Objectif : Détruire la session et rediriger l'utilisateur vers la page de connexion.
Date : 17/10/2026
*/

session_start();

session_unset();
session_destroy();

header("Location: login.php");
exit;
?>
