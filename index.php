<?php
	// Initialiser la session
	session_start();
	// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
	require('config.php');
	doit_etre_connecte();
?>
<!DOCTYPE html>
<html>
	<head>
	<link rel="stylesheet" href="style.css" />
	</head>
	<body>
		<div class="sucess">
		<h1>Bienvenue <?php echo $_SESSION['pseudo']; ?>!</h1>
		<p>C'est votre espace utilisateur.</p>
		<a href="deconnection.php">Déconnexion</a>
		</div>
	</body>
</html>