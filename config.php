<?php
session_start();
require('fonctions.php');
require('assets/assets.php');
//require('nav.php');

// Connexion a la base de donnees MySQL 
$local_DB = false;
if ($local_DB === true) {
    $conn = mysqli_connect('localhost', 'root', 'root', '1php-proj');
} else {
    $conn = mysqli_connect('eliascastel.ddns.net', '1php', '1php-proj!45AH', '1php'); // merci de ne pas se connecter a la base de donnees
}

// Verifier la connexion
if ($conn === false) {
    die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
}
if (isset($page)) {
    echo "<title>MDB&co | " . $page . "</title>";
} else {
    echo "<title>MDB&co</title>";
}
?>

<link rel="stylesheet" href="assets/style.css" />
<meta charset="utf-8" />