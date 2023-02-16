<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body class="body">
    <div class="login">
        <header class="login_header">
            <h2>Welcom Back !</h2>
        </header>
        <form action="SigneUp.php" class="login_form" method="POST">
            <div>
                <label for="nom">Prenom</label>
                <input type="text" id="nom" name="nom" placeholder="Julien">
            </div>
            <div>
                <label for="prenom">Nom</label>
                <input type="text" id="prenom" name="prenom" placeholder="Dupont">
            </div>
            <div>
                <label for="email">E-mail address</label>
                <input type="email" id="email" name="email" placeholder="exemple@exemple.com">
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="example1234">
            </div>
            <div>
                <label for="password2">Confirme Password</label>
                <input type="password2" id="password2" name="password2" placeholder="example1234">
            </div>
            <div>
                <input class="button" type="submit" value="Login">
                <a class="register" href="Login.php">Or Login</a>
            </div>
        </form>

        <?php
        // on verifie que les deux mots de passe sont identiques
        if ($_POST['password'] == $_POST['password2']) {
            if (isset($_POST['prenom']) && isset($_POST['nom']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['password2'])) {
                header("Location: main.php");
                exit();
            } else {
                echo "<center>Meri de remplire touts les champs</center>";
            }
        }
        // on verifie que le mail n'est pas deja utilisé
        ?>
    </div>
</body>

</html>