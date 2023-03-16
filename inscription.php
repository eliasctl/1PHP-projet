<?php
$page = 'inscription';
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
            font-family: 'Roboto', sans-serif;
            font-weight: 700;
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
            font-size: 20px;
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

        .success-message {
            color: green;
            font-size: 20px;
            font-family: 'Roboto', sans-serif;
            font-weight: 700;
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

        // si le formulaire a été envoyé, on vérifie que tous les champs sont remplis correctement et on insert l'utilisateur dans la base de données
        if (isset($_POST['pseudo'], $_POST['code'], $_POST['email'])) {
            if (empty($_POST['pseudo']) || empty($_POST['code']) || empty($_POST['email'])) {
                echo "Veuillez remplir tous les champs.";
            } else {
                $Pseudo = htmlentities($_POST['pseudo'], ENT_QUOTES, "UTF-8");
                $Email = htmlentities($_POST['email'], ENT_QUOTES, "UTF-8");
                $Code = hash('sha256', $_POST['code']);
                if (!preg_match("#^[a-z0-9]+$#", $Pseudo)) {
                    echo "Le Pseudo doit être renseigné en lettres minuscules sans accents, sans caractères spéciaux.";
                } elseif (strlen($Pseudo) < 3) {
                    echo "Le pseudo est trop court, il doit faire au moins 3 caractères.";
                } elseif (!filter_var($Email, FILTER_VALIDATE_EMAIL)) { // Les email c'est ça https://www.youtube.com/watch?v=xxX81WmXjPg !!!
                    echo "L'adresse email n'est pas valide.";
                } elseif (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM utilisateurs WHERE email='" . $Email . "'")) == 1) {
                    echo "Cette email est déjà utilisé.";
                } elseif (strlen($Pseudo) > 25) {
                    echo "Le pseudo est trop long, il dépasse 25 caractères.";
                } elseif (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM utilisateurs WHERE pseudo='" . $Pseudo . "'")) == 1) {
                    echo "Ce pseudo est déjà utilisé.";
                } else {
                    if (!mysqli_query($conn, "INSERT INTO utilisateurs SET pseudo='" . $Pseudo . "', code='" . $Code . "', email='" . $Email . "', type='user'")) {
                        echo "Une erreur s'est produite: " . mysqli_error($conn);
                    } else {
                        echo "<p class='success-message'>Vous êtes inscrit avec succès ! </p>";
                        echo "Cliquez ici pour retourner a la page d'accueil<a href='connexion.php'>connecter</a>";
                        $AfficherFormulaire = 0;
                    }
                }
            }
        }
        if ($AfficherFormulaire == 1) {
            ?>
        </center>
        <center>
            <br>
            <div class="container">
                <h1>Inscription</h1>
                <form method="post" action="inscription.php">
                    Email : <input type="text" name="email">
                    <br />
                    Pseudo : <input type="text" name="pseudo">
                    <br />
                    Mot de passe : <input type="password" name="code">
                    <br />
                    <input type="submit" value="S'inscrire">
                </form>
                <a href="connexion.php">Se connecter</a>
                <br>
            </div>
        </center>
        <?php
        }
        ?>
</body>

</html>