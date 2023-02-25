<?php
	// Initialiser la session
	session_start();
	// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
	if(!isset($_SESSION["username"])){
		header("Location: login.php");
		// ajouter une vérification pour savoir si l'utilisateur est un admin ou un utilisateur ⚠️
		exit(); 
	}
?>
<!DOCTYPE html>
<html>
	<head>
	<link rel="stylesheet" href="../style.css" />
	</head>
	<body>
		<div class="sucess">
		<h1>Bienvenue <?php echo $_SESSION['username']; ?>!</h1>
		<p>C'est votre espace admin.</p>
		<a href="add_user.php">Add user</a> | 
		<a href="#">Update user</a> | 
		<a href="#">Delete user</a> | 
		<a href="../deconnection.php">Déconnexion</a>
		</ul>
		</div>
	</body>
</html>