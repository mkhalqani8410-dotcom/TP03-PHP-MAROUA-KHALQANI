
<?php
/*
Auteur : Maroua KHALQANI
Objectif : Récupérer et afficher les informations envoyées par formulaire avec GET.
Date : 16/10/2026
*/


if (isset($_GET["nom"], $_GET["prenom"], $_GET["sexe"])) {

    $nom = htmlspecialchars($_GET["nom"]);
    $prenom = htmlspecialchars($_GET["prenom"]);
    $sexe = $_GET["sexe"];

    if ($sexe == "M") {
        echo "Bonjour Monsieur ";
    } elseif ($sexe == "F") {
        echo "Bonjour Madame ";
    } else {
        exit("Sexe invalide.");
    }

    echo $prenom . " " . $nom;

} else {
    echo "Veuillez remplir le formulaire.";
}

?>
