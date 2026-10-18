
<?php
/*
Auteur : Maroua KHALQANI
Objectif : Présenter les conditions, les boucles et les fonctions en PHP.
Date : 16/10/2026
*/

require "config.php";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Partie 2 - Structures de contrôle</title>
</head>
<body>

<h1>Partie 2 : Structures de contrôle et boucles</h1>

<h2>Exercice 2.1 : </h2>

<?php
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

$notes = [18, 15, 13, 10, 7];

foreach ($notes as $note) {
    echo "Note : " . $note . " - " . mention($note) . "<br>";
}
?>

<h2>Exercice 2.2 : </h2>

<?php
$mois = date("m");

switch ($mois) {
    case "01":
        $nom = "Janvier";
        break;
    case "02":
        $nom = "Février";
        break;
    case "03":
        $nom = "Mars";
        break;
    case "04":
        $nom = "Avril";
        break;
    case "05":
        $nom = "Mai";
        break;
    case "06":
        $nom = "Juin";
        break;
    case "07":
        $nom = "Juillet";
        break;
    case "08":
        $nom = "Août";
        break;
    case "09":
        $nom = "Septembre";
        break;
    case "10":
        $nom = "Octobre";
        break;
    case "11":
        $nom = "Novembre";
        break;
    case "12":
        $nom = "Décembre";
        break;
    default:
        $nom = "Mois inconnu";
}

echo "Mois courant : " . $nom . "<br>";

// Sans break, PHP continue dans les cases suivants
// jusqu'à rencontrer un break ou la fin du switch.
?>

<h2>Exercice 2.3 : </h2>

<h3>1. Triangle avec deux boucles for</h3>

<?php
for ($i = 1; $i <= 6; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo "*";
    }
    echo "<br>";
}
?>

<h3>2. Nombres de 0 à 20 avec while</h3>

<?php
$i = 0;

while ($i <= 20) {
    if ($i == 10) {
        echo "<strong>" . $i . "</strong><br>";
    } else {
        echo $i . "<br>";
    }
    $i += 2;
}
?>

<h3>3. Nombres pairs avec for et continue</h3>

<?php
for ($i = 0; $i <= 10; $i++) {
    if ($i % 2 != 0) {
        continue;
    }
    echo $i . "<br>";
}
?>

<h3>4. while, switch et break 2</h3>

<?php
$i = 1;

while ($i <= 10) {
    switch ($i) {
        case 5:
            echo "At 5<br>";
            break;

        case 10:
            echo "At 10; quitting<br>";
            break 2;
    }

    $i++;
}
?>

<h3>5. do-while</h3>

<?php
$i = 0;

do {
    if ($i == 10) {
        echo "<strong>" . $i . "</strong><br>";
    } else {
        echo $i . "<br>";
    }

    $i += 2;
} while ($i <= 20);

// do-while exécute le bloc au moins une fois.
// while vérifie la condition avant l'exécution.
?>

</body>
</html>
