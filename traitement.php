<?php
/*
Auteur : Maroua KHALQANI
Objectif : Valider les notes, calculer la moyenne et enregistrer les données dans un fichier CSV.
Date : 17/10/2026
*/

require_once "config.php";

function mention($note) {
    if ($note >= 16) {
        return "Très bien";
    } elseif ($note >= 14) {
        return "Bien";
    } elseif ($note >= 12) {
        return "Assez bien";
    } elseif ($note >= SEUIL) {
        return "Passable";
    } else {
        return "Ajourné";
    }
}

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    exit("Veuillez utiliser le formulaire.");
}

$champs = ["nom", "note_info", "note_math"];

foreach ($champs as $champ) {
    if (!isset($_POST[$champ])) {
        exit("Erreur : champ manquant.");
    }
}

$nom = trim($_POST["nom"]);
$infoBrut = trim((string) $_POST["note_info"]);
$mathBrut = trim((string) $_POST["note_math"]);

if ($nom === "" || $infoBrut === "" || $mathBrut === "") {
    exit("Erreur : tous les champs sont obligatoires.");
}

if (!is_numeric($infoBrut) || !is_numeric($mathBrut)) {
    exit("Erreur : les notes doivent être numériques.");
}

$noteInfo = (float) $infoBrut;
$noteMath = (float) $mathBrut;

if (
    $noteInfo < NOTE_MIN || $noteInfo > NOTE_MAX ||
    $noteMath < NOTE_MIN || $noteMath > NOTE_MAX
) {
    exit("Erreur : les notes doivent être entre 0 et 20.");
}

// Exercice 5.1 : écriture CSV

$fichier = __DIR__ . "/data/notes.csv";
$handle = fopen($fichier, "a");

if ($handle === false) {
    exit("Erreur d'ouverture du fichier CSV.");
}

$ok = fputcsv(
    $handle,
    [$nom, $noteInfo, $noteMath],
    ";",
    '"',
    ""
);

fclose($handle);

if ($ok === false) {
    exit("Erreur pendant l'écriture.");
}

// Récapitulatif

$moyenne = ($noteInfo + $noteMath) / 2;

echo "<h2>Récapitulatif</h2>";
echo "Nom : " . htmlspecialchars($nom) . "<br>";
echo "Informatique : $noteInfo<br>";
echo "Mathématiques : $noteMath<br>";
echo "Moyenne : " . round($moyenne, 2) . "<br>";
echo "Mention : " . mention($moyenne) . "<br>";

echo '<a href="saisie.html">Ajouter un autre apprenant</a><br>';
echo '<a href="liste.php">Voir la liste</a>';
?>
```