
<?php

/*
Auteur : Maroua KHALQANI
Objectif : Définir les constantes et les paramètres de configuration du projet.
Date : 16/10/2026
*/ 

require "config.php";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Partie 1 - PHP</title>
</head>
<body>

<h1>Partie 1 : Variables, constantes, types et chaînes</h1>

<h2>Exercice 1.1 : Noms de variables</h2>

<?php
// $x est valide
$x = 10;

// $_x est valide
$_x = 20;

// $2x est invalide car il commence par un chiffre.
// $x-y est invalide car le tiret n'est pas autorisé.

// $Prix_HT est valide
$Prix_HT = 60;

// $prix ht est invalide car il contient un espace.

// $état est valide
$état = "Maroc";

// $a et $A sont deux variables différentes.
$a = 1;
$A = 2;

echo "a = " . $a . "<br>";
echo "A = " . $A . "<br>";
?>

<h2>Exercice 1.2 : Constantes</h2>

<?php
echo "Etablissement : " . ETABLISSEMENT . "<br>";
echo "Note minimale : " . NOTE_MIN . "<br>";
echo "Note maximale : " . NOTE_MAX . "<br>";
echo "Seuil : " . SEUIL . "<br>";

echo "SEUIL existe : ";
var_dump(defined("SEUIL"));
echo "<br>";

echo "INCONNUE existe : ";
var_dump(defined("INCONNUE"));
echo "<br>";

// Une constante non définie provoque généralement un avertissement.
// const déclare une constante dans le code.
// define() crée une constante pendant l'exécution.
?>

<h2>Exercice 1.3 : Calcul</h2>

<?php
$prix_ht = 60;
$tva = 20;

$prix_ttc = $prix_ht + ($prix_ht * $tva / 100);

echo "Le prix TTC du produit est de " . $prix_ttc . " €.";
?>

<h2>Exercice 1.4 : Types et conversions</h2>

<?php
$test = 42;
$test = (string) $test;

echo "Conversion de 42 en string : ";
var_dump($test);
echo "<br><br>";

echo "Conversion en bool :<br>";

var_dump((bool) 0);
echo "<br>";
var_dump((bool) 0.0);
echo "<br>";
var_dump((bool) "0");
echo "<br>";
var_dump((bool) "");
echo "<br>";
var_dump((bool) "abc");
echo "<br>";
var_dump((bool) []);
echo "<br>";
var_dump((bool) null);
echo "<br><br>";

echo "Autres conversions :<br>";

var_dump((int) 3.9);
echo "<br>";
var_dump((int) "12abc");
echo "<br>";
var_dump((float) "1.5e3");
echo "<br>";
var_dump((int) true);
echo "<br><br>";

echo "Le nombre 255 dans quatre bases :<br>";

$decimal = 255;
$hexadecimal = 0xFF;
$octal = 0377;
$binaire = 0b11111111;

echo "Décimal : " . $decimal . "<br>";
echo "Hexadécimal : " . dechex($hexadecimal) . "<br>";
echo "Octal : " . decoct($octal) . "<br>";
echo "Binaire : " . decbin($binaire) . "<br>";
?>

<h2>Exercice 1.5 : Chaînes de caractères</h2>

<?php
$traitees = "égales à";
$ici = 2;

echo 'Ahmed a dit : "J\'ai réussi"' . "<br>";
echo 'Voulez-vous supprimer C:\*.*?' . "<br>";
echo 'Ceci n\'affichera pas \n de nouvelle ligne' . "<br>";
echo 'Les variables ne seront pas $traitees $ici' . "<br>";
echo "Les variables seront $traitees $ici" . "<br><br>";

$chaine = "*Bonjour les développeurs*";
$chaine = trim($chaine, "*");

echo $chaine . "<br><br>";

$lettres = preg_split('//u', $chaine, -1, PREG_SPLIT_NO_EMPTY);

for ($i = 0; $i < count($lettres); $i++) {
    echo $lettres[$i] . "<br>";
}
?>

</body>
</html>
