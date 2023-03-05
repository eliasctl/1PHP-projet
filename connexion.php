<!DOCTYPE html>
<html>

<head>
	<link rel="stylesheet" href="style.css" />
</head>

<body>
	<?php
	$page = 'connexion';
	require('config.php');
	session_start();

	if (isset($_POST['pseudo'])) {
		$pseudo = stripslashes($_REQUEST['pseudo']);
		$pseudo = mysqli_real_escape_string($conn, $pseudo);
		$code = stripslashes($_REQUEST['code']);
		$code = mysqli_real_escape_string($conn, $code);
		$query = "SELECT * FROM `utilisateurs` WHERE pseudo='$pseudo' and code='" . hash('sha256', $code) . "'";
		$result = mysqli_query($conn, $query) or die(mysql_error());

		if (mysqli_num_rows($result) == 1) {
			$utilisateur = mysqli_fetch_assoc($result);
			$_SESSION['pseudo'] = $pseudo;
			$_SESSION['type'] = $utilisateur['type'];
			// vérifier si l'utilisateur est un administrateur ou un utilisateur
			if ($utilisateur['type'] == 'admin') {
				header('location: admin/home.php');
			} else {
				header('location: index.php');
			}
		} else {
			$message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
		}
	}
	?>
	<form class="box" action="" method="post" name="login">
		<h1 class="box-logo box-title"><a href="#">Movies DataBase & co</a></h1>
		<h1 class="box-title">Connexion</h1>
		<input type="text" class="box-input" name="pseudo" placeholder="Nom d'utilisateur">
		<input type="password" class="box-input" name="code" placeholder="Mot de passe">
		<input type="submit" value="Connexion " name="submit" class="box-button">
		<p class="box-register">Vous êtes nouveau ici? <a href="inscription.php">S'inscrire</a></p>

		<?php if (!empty($message)) { ?>
			<p class="errorMessage">
				<?php echo $message; ?>
			</p>
		<?php } ?>
	</form>
</body>

</html>