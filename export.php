
<?php
/*
Auteur : Maroua KHALQANI
Objectif : Exporter les données en JSON et manipuler les dates.
Date : 17/10/2026
*/

$fichierCSV = __DIR__ . "/data/notes.csv";
$fichierJSON = __DIR__ . "/data/notes.json";

if (!file_exists($fichierCSV)) {
    exit("Fichier CSV introuvable. Ajoutez des apprenants d'abord.");
}

$handle = fopen($fichierCSV, "r");

if ($handle === false) {
    exit("Impossible d'ouvrir le CSV.");
}

$resultats = [];

while (($ligne = fgetcsv($handle, 0, ";")) !== false) {
    if (count($ligne) < 3) {
        continue;
    }

    [$nom, $info, $math] = $ligne;

    if (!is_numeric($info) || !is_numeric($math)) {
        continue;
    }

    $moyenne = ((float)$info + (float)$math) / 2;

    $resultats[] = [
        "nom" => $nom,
        "note_info" => (float)$info,
        "note_math" => (float)$math,
        "moyenne" => round($moyenne, 2)
    ];
}

fclose($handle);

// Écriture JSON

$json = json_encode(
    $resultats,
    JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE
);

if ($json === false) {
    exit("Erreur de conversion JSON.");
}

if (file_put_contents($fichierJSON, $json) === false) {
    exit("Erreur d'écriture JSON.");
}

// Lecture JSON

$contenu = file_get_contents($fichierJSON);
$donnees = json_decode($contenu, true);

echo "<h2>Résultats JSON</h2><pre>";
echo htmlspecialchars(print_r($donnees, true));
echo "</pre>";

// Comparaison avec serialize()

echo "<h2>Résultat de serialize()</h2><pre>";
echo htmlspecialchars(serialize($resultats));
echo "</pre>";

// Exercice 6.3 : DateTime et diff()

$aujourdhui = new DateTime();
$finSemestre = new DateTime("2027-01-31");

echo "<h2>Date de fin de semestre</h2>";

if ($aujourdhui > $finSemestre) {
    echo "La date de fin du semestre est dépassée.";
} else {
    $difference = $aujourdhui->diff($finSemestre);
    echo "Jours restants : " . $difference->days;
}

// Validation d'une date avec checkdate()

$jour = 14;
$mois = 10;
$annee = 2026;

echo "<h2>Validation de date</h2>";

if (checkdate($mois, $jour, $annee)) {
    echo "Date valide";
} else {
    echo "Date invalide";
}
?>
