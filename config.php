<?php
require('fonctions.php');

// Informations d'identification
define('DB_SERVEUR', 'eliascastel.ddns.net');
define('DB_PSEUDO', 'pi');
define('DB_CODE', '@root123');
define('DB_NOM', '1php');


 
// Connexion � la base de donn�es MySQL 
$local_DB = false;
if ($local_DB === true){
    $conn = mysqli_connect('localhost', 'root', 'root', '1php-proj');
} else {
    $conn = mysqli_connect(DB_SERVEUR, DB_PSEUDO, DB_CODE, DB_NOM);
}
 
// V�rifier la connexion
if($conn === false){
    die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
}
?>