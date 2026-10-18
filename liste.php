
<?php
/*
Auteur : Maroua KHALQANI
Objectif : Lire le fichier CSV et afficher la liste des apprenants et leurs notes.
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

$fichier = __DIR__ . "/data/notes.csv";

if (!file_exists($fichier)) {
    exit("Aucun fichier CSV. Ajoutez d'abord des apprenants.");
}

$handle = fopen($fichier, "r");

if ($handle === false) {
    exit("Impossible d'ouvrir le fichier CSV.");
}

// Exercice 5.2 : lecture avec fgetcsv()

$total = 0;
$nombre = 0;

echo "<h2>Liste des apprenants</h2>";
echo "<table border='1' cellpadding='6'>";
echo "<tr>
<th>Nom</th><th>Info</th><th>Math</th>
<th>Moyenne</th><th>Mention</th>
</tr>";

while (($ligne = fgetcsv($handle, 0, ";")) !== false) {
    if (count($ligne) < 3) {
        continue;
    }

    [$nom, $info, $math] = $ligne;

    if (!is_numeric($info) || !is_numeric($math)) {
        continue;
    }

    $moyenne = ((float)$info + (float)$math) / 2;

    $total += $moyenne;
    $nombre++;

    echo "<tr>";
    echo "<td>" . htmlspecialchars($nom) . "</td>";
    echo "<td>" . htmlspecialchars($info) . "</td>";
    echo "<td>" . htmlspecialchars($math) . "</td>";
    echo "<td>" . round($moyenne, 2) . "</td>";
    echo "<td>" . mention($moyenne) . "</td>";
    echo "</tr>";
}

echo "</table>";
fclose($handle);

if ($nombre > 0) {
    echo "<p>Moyenne générale : " .
         round($total / $nombre, 2) . "</p>";
}

// Exercice 5.3 : lecture bas niveau

echo "<h2>Lecture avec fgets() et explode()</h2>";

$handle = fopen($fichier, "r");

if ($handle === false) {
    exit("Impossible de relire le fichier CSV.");
}

echo "<pre>";

while (!feof($handle)) {
    $ligne = fgets($handle);

    if ($ligne === false) {
        break;
    }

    $ligne = trim($ligne);

    if ($ligne === "") {
        continue;
    }

    $donnees = explode(";", $ligne);
    print_r($donnees);
}

echo "</pre>";

fclose($handle);
?>
