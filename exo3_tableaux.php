
<?php
/*
Auteur : Maroua KHALQANI
Objectif : Manipuler les tableaux indexés et associatifs en PHP.
Date : 16/10/2026
*/

require "config.php";
include "includes/entete_inc.php";
include "includes/menu_inc.php";

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

$notes = [
    "Mohamed" => 16,
    "Ahmed" => 14,
    "Hind" => 13,
    "Aicha" => 15,
    "Samir" => 13,
    "Zakaria" => 13,
    "Rafik" => 10,
    "Ilham" => 9,
    "Hamza" => 7,
    "Sami" => 7,
    "Noura" => 14
];

$modules = ["PHP", "HTML", "Linux"];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Partie 3 - Tableaux</title>
</head>
<body>

<h1>Partie 3 : Tableaux</h1>

<h2>Exercice 3.1 : </h2>

<h3>Affichage avec foreach</h3>

<?php
foreach ($modules as $module) {
    echo $module . "<br>";
}
?>

<h3>Affichage avec les indices</h3>

<?php
echo $modules[0] . "<br>";
echo $modules[1] . "<br>";
echo $modules[2] . "<br>";
?>

<h2>Exercice 3.2 : </h2>

<table border="1" cellpadding="5">
    <tr>
        <th>Nom</th>
        <th>Note</th>
        <th>Mention</th>
    </tr>

    <?php foreach ($notes as $nom => $note) { ?>
        <tr style="<?php echo ($note < SEUIL) ? 'color:red;' : ''; ?>">
            <td><?php echo $nom; ?></td>
            <td><?php echo $note; ?></td>
            <td><?php echo mention($note); ?></td>
        </tr>
    <?php } ?>
</table>

<h2>Exercice 3.3 </h2>

<?php
$somme = 0;
$meilleure = $notes["Mohamed"];
$faible = $notes["Mohamed"];
$nombre = 0;

foreach ($notes as $note) {
    $somme += $note;
    $nombre++;

    if ($note > $meilleure) {
        $meilleure = $note;
    }

    if ($note < $faible) {
        $faible = $note;
    }
}

$moyenne = $somme / $nombre;

echo "Somme des notes : " . $somme . "<br>";
echo "Moyenne : " . round($moyenne, 2) . "<br>";
echo "Meilleure note : " . $meilleure . "<br>";
echo "Note la plus faible : " . $faible . "<br>";

echo "<h3>Vérification avec les fonctions PHP</h3>";

echo "Somme : " . array_sum($notes) . "<br>";
echo "Nombre d'apprenants : " . count($notes) . "<br>";
echo "Note maximale : " . max($notes) . "<br>";
echo "Note minimale : " . min($notes) . "<br>";

$effectifs = [
    "Très bien" => 0,
    "Bien" => 0,
    "Assez bien" => 0,
    "Passable" => 0,
    "Ajourné" => 0
];

foreach ($notes as $note) {
    $m = mention($note);
    $effectifs[$m]++;
}

echo "<h3>Effectifs par mention</h3>";

foreach ($effectifs as $m => $effectif) {
    echo $m . " : " . $effectif . "<br>";
}
?>

<h2>Exercice 3.4 </h2>

<?php
function afficher($tab) {
    echo "<table border='1' cellpadding='5'>";
    echo "<tr><th>Nom</th><th>Note</th></tr>";

    foreach ($tab as $nom => $note) {
        echo "<tr>";
        echo "<td>" . $nom . "</td>";
        echo "<td>" . $note . "</td>";
        echo "</tr>";
    }

    echo "</table><br>";
}

echo "<h3>1. Noms croissants</h3>";
$tab = $notes;
ksort($tab);
afficher($tab);

echo "<h3>2. Notes décroissantes</h3>";
$tab = $notes;
arsort($tab);
afficher($tab);

echo "<h3>3. Noms décroissants</h3>";
$tab = $notes;
krsort($tab);
afficher($tab);

echo "<h3>4. Notes croissantes</h3>";
$tab = $notes;
asort($tab);
afficher($tab);

// Pour un tableau indexé, on peut utiliser sort().
?>

<h2>Exercice 3.5 </h2>

<?php
$a = ["x" => 1, "y" => 2];
$b = ["y" => 2, "x" => 1];

// Prédictions :
// $a + $b donne le tableau de gauche avec les clés réunies.
// $a == $b donne true.
// $a === $b donne false car l'ordre est différent.

echo "<h3>Résultats</h3>";

echo "<pre>";
var_dump($a + $b);
var_dump($a == $b);
var_dump($a === $b);
echo "</pre>";

echo "<h3>Explication</h3>";

echo "+ : réunit les tableaux, en gardant les valeurs du premier tableau pour les clés communes.<br>";
echo "== : compare les clés et les valeurs sans tenir compte de l'ordre.<br>";
echo "=== : compare les clés, les valeurs et leur ordre.<br>";
?>

<?php include "includes/pied_inc.php"; ?>

</body>
</html>
