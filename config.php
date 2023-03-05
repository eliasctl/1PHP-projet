<?php
require('fonctions.php');
require('assets/assets.php');
require('nav.php');

// Informations d'identification
define('DB_SERVEUR', 'eliascastel.ddns.net');
define('DB_PSEUDO', 'pi');
define('DB_CODE', '@root123');
define('DB_NOM', '1php');



// Connexion a la base de donnees MySQL 
$local_DB = false;
if ($local_DB === true) {
    $conn = mysqli_connect('localhost', 'root', 'root', '1php-proj');
} else {
    $conn = mysqli_connect(DB_SERVEUR, DB_PSEUDO, DB_CODE, DB_NOM);
}

// Verifier la connexion
if ($conn === false) {
    die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
}

// echo "<title>MDB&co | " . $page . "</title>";
?>