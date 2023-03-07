<?php
$page = 'deconnection';
// Initialiser la session
session_start();
$_SESSION = array();
// Détruire la session.
if (session_destroy()) {
	// Redirection vers la page de connexion
	header("Location: connexion.php");
}
?>