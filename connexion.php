<?php
$page = 'connexion';
require('config.php');
require('nav.php');
?>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        :root {
            --primaire: #F9DBBB;
            --secondaire: #4E6E81;
            --bordure: #2E3840;
        }

        body {
            background-color: var(--primaire);
            font-family: 'Roboto', sans-serif;
            font-weight: 700;
        }

        h1 {
            text-align: center;
            font-size: 50px;
            color: var(--bordure);
            margin-top: 50px;
        }

        input {
            margin-top: 10px;
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid var(--bordure);
            border-radius: 5px;
            font-size: 20px;
            font-family: 'Roboto', sans-serif;
            font-weight: 700;
        }

        input[type="submit"] {
            background-color: var(--bordure);
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: var(--secondaire);
            color: #fff;
            border: 1px solid #000;
        }

        a {
            text-decoration: none;
            color: var(--bordure);
        }

        a:hover {
            color: var(--secondaire);
        }

        form {
            display: flex;
            flex-direction: column;
            flex-wrap: nowrap;
            align-content: space-around;
            justify-content: space-around;
            align-items: stretch;
        }

        .container {
            background-color: var(--primaire);
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 50%;
            border: 5px solid var(--bordure);
        }

        .error-message {
            color: red;
            font-size: 20px;
            font-family: 'Roboto', sans-serif;
            font-weight: 700;
        }

        .sucess-message {
            color: green;
            font-size: 20px;
            font-family: 'Roboto', sans-serif;
            font-weight: 700;
        }

        .methode-con {
            /* display: none; */
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin-top: 20px;
        }

        .methode-con-small {
            display: flex;
            flex-direction: row;
            align-items: baseline;
            justify-content: space-around;
            margin-top: 20px;
            flex-wrap: nowrap;
        }

        .methode-con-btn {
            margin-left: 10px;
            margin-right: 10px;
        }

        @media screen and (max-width: 600px) {
            .container {
                width: 90%;
            }
        }
    </style>
</head>

<body>
    <center class="error-message">
        <?php
        // si l'utilisateur est déjà connecté, on le redirige vers la page d'accueil
        $AfficherFormulaire = 1;
        if (isset($_SESSION['pseudo'])) {
            echo "Vous êtes déjà connecter <a href='index.php'>cliquez-ici</a> !";
            $AfficherFormulaire = 0;
            exit();
        }

        // si le formulaire a été envoyé, on vérifie que tous les champs sont remplis correctement et que l'tilisateur existe dans la base de données
        if (isset($_POST['post'])) {
            if (!isset($_POST['pseudo'], $_POST['code'])) {
                echo "Veuillez remplir tous les champs";
            } else {
                $Pseudo = htmlentities($_POST['pseudo'], ENT_QUOTES, "UTF-8");
                $Code = hash('sha256', $_POST['code']);
                $query = "SELECT * FROM utilisateurs WHERE pseudo='" . $Pseudo . "' AND code='" . $Code . "'";
                $result = mysqli_query($conn, $query) or die(mysql_error());
                if (mysqli_num_rows($result) == 1) {
                    $row = mysqli_fetch_assoc($result);
                    $_SESSION['pseudo'] = $row['pseudo'];
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['type'] = $row['type'];
                    echo "<p class='sucess-message'>Vous êtes bien connecter <a href='index.php'>cliquez-ici</a> !</p>";
                    $AfficherFormulaire = 0;
                    exit();
                } else {
                    echo "Le pseudo ou le mot de passe est incorrect !";
                }
            }
        }
        if ($AfficherFormulaire == 1) {
            ?>
        </center>
        <center>
            <div class="container">
                <h1>Connexion</h1>
                <br />
                <form method="post" action="connexion.php">
                    Pseudo :
                    <input type="text" name="pseudo">
                    <br />
                    Mot de passe : <input type="password" name="code">
                    <br />
                    <input type="submit" name="post" value="Se connecter">
                </form>
                <div class="methode-con">
                    Se connecter en tant que :
                    <div class="methode-con-small">
                        <form class="methode-con-btn" method="post" action="connexion.php">
                            <input type="text" name="pseudo" value="user" style="display: none">
                            <input type="password" name="code" value="user" style="display: none">
                            <input type="submit" name="post" value="user">
                        </form>
                        ou
                        <form class="methode-con-btn" method="post" action="connexion.php">
                            <input type="text" name="pseudo" value="admin" style="display: none">
                            <input type="password" name="code" value="admin" style="display: none">
                            <input type="submit" name="post" value="admin">
                        </form>
                    </div>
                </div>
                <a href="inscription.php">S'inscrire</a>
                <br>
            </div>
        </center>
        <?php
        }
        ?>
</body>

</html>