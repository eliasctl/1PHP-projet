<?php
$page = 'admin_home';
// Initialiser la session
session_start();
// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
require('config.php');
doit_etre_admin();
?>
<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="style.css" />
</head>

<body>
	<div class="sucess">
		<h1>Bienvenue
			<?php echo $_SESSION['pseudo']; ?>!
		</h1>
		<p>C'est votre espace admin.</p>
		<a href="admin_add_user.php">Add user</a> |
		<a href="#">Update user</a> |
		<a href="#">Delete user</a> |
		<a href="deconnection.php">Déconnexion</a>
		</ul>
	</div>
</body>

</html>