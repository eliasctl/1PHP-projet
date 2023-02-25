<?php
// Informations d'identification
define('DB_SERVER', 'eliascastel.ddns.net');
define('DB_USERNAME', 'pi');
define('DB_PASSWORD', '@root123');
define('DB_NAME', '1php');
 
// Connexion à la base de données MySQL 
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Vérifier la connexion
if($conn === false){
    die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
}
?>