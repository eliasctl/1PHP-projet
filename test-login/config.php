<?php
// Informations d'identification
define('DB_SERVEUR', 'eliascastel.ddns.net');
define('DB_PSEUDO', 'pi');
define('DB_CODE', '@root123');
define('DB_NOM', '1php');
 
// Connexion à la base de données MySQL 
$conn = mysqli_connect(DB_SERVEUR, DB_PSEUDO, DB_CODE, DB_NOM);
 
// Vérifier la connexion
if($conn === false){
    die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
}
?>