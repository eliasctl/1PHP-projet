<!DOCTYPE html>
<html>
<body class="color1c242d">
	<?php
	$page = 'inscription';
	require('config.php');

	if (isset($_SESSION['pseudo'])) {
		header("Location: index.php");
	}

	if (isset($_REQUEST['pseudo'], $_REQUEST['email'], $_REQUEST['code'])) {
		// récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
		$pseudo = stripslashes($_REQUEST['pseudo']);
		$pseudo = mysqli_real_escape_string($conn, $pseudo);
		// récupérer l'email et supprimer les antislashes ajoutés par le formulaire
		$email = stripslashes($_REQUEST['email']);
		$email = mysqli_real_escape_string($conn, $email);
		// récupérer le mot de passe et supprimer les antislashes ajoutés par le formulaire
		$code = stripslashes($_REQUEST['code']);
		$code = mysqli_real_escape_string($conn, $code);

		$query = "INSERT into `utilisateurs` (pseudo, email, type, code)
				VALUES ('$pseudo', '$email', 'user', '" . hash('sha256', $code) . "')";
		$res = mysqli_query($conn, $query);

		if ($res) {
			echo "<center><div class='sucess'>
             <h3>Vous êtes inscrit avec succès.</h3>
             <p>Cliquez ici pour vous <a href='connexion.php'>connecter</a></p>
			 </div></center>";
		}
	} else {
		?>
		<form class="box" action="" method="post">
			<h1 class="box-logo box-title"><a href="#">Movies DataBase & co</a></h1>
			<h1 class="box-title">S'inscrire</h1>
			<input type="text" class="box-input" name="pseudo" placeholder="Nom d'utilisateur" required />
			<input type="text" class="box-input" name="email" placeholder="Email" required />
			<input type="password" class="box-input" name="code" placeholder="Mot de passe" required />
			<input type="submit" name="submit" value="S'inscrire" class="box-button" />
			<p class="box-register">Déjà inscrit ?
				<br>
				<a href="connexion.php">Connectez-vous ici</a>
			</p>
		</form>
	<?php } ?>
</body>

</html>