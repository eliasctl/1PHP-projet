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

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0px;
            font-family: 'segoe ui';
        }

        .nav {
            height: 50px;
            width: 100%;
            background-color: var(--bordure);
            position: relative;
        }

        .nav>.nav-header {
            display: inline;
        }

        .nav>.nav-header>.nav-title {
            display: inline-block;
            font-size: 22px;
            padding: 10px 10px 10px 10px;
        }

        .nav>.nav-btn {
            display: none;
        }

        .nav>.nav-links {
            display: inline;
            float: right;
            font-size: 18px;
        }

        .nav>.nav-links>a {
            display: inline-block;
            padding: 13px 10px 13px 10px;
            text-decoration: none;
            color: #efefef;
        }

        .nav>.nav-links>a:hover {
            background-color: var(--secondaire);
        }

        .nav>#nav-check {
            display: none;
        }
    </style>
</head>

<body>
    <div class="nav">
        <input type="checkbox" id="nav-check">
        <div class="nav-header">
            <div class="nav-title">
                <a href="index.php" title="Accueil"><i class="fa-solid fa-home" style="color: #fff"></i></a>
            </div>
        </div>

        <div class="nav-links">
            <?php
            if (!empty($_SESSION['pseudo'])) {
                if ($_SESSION['type'] === 'admin') {
                    echo '<a href="admin_liste_films.php" title="Admin liste film"><i class="fa-solid fa-screwdriver-wrench"></i> <i class="fa-solid fa-ticket"></i></a>'; // Liste des films
                    echo '<a href="admin_liste_utilisateurs.php" title="Admin liste utilisateurs"><i class="fa-solid fa-screwdriver-wrench"></i> <i class="fa-solid fa-users"></i></a>'; // Liste des utilisateurs
                }
                echo '<a href="profile.php" title="Profil"><i class="fa-solid fa-user"></i></a>'; // Profil
                echo '<a href="panier.php" title="Panier"><i class="fa-solid fa-cart-shopping"></i></a>'; // Panier
                echo '<a href="deconnexion.php" title="Déconnexion"><i class="fa-solid fa-right-from-bracket"></i></a>'; // Déconnexion
            } else {
                echo '<a href="connexion.php" title="Connexion"><i class="fa-solid fa-link"></i></a>'; // Connexion
                echo '<a href="inscription.php" title="Inscription"><i class="fa-solid fa-user-plus"></i></a>'; // Inscription
            }
            ?>
            &emsp;
        </div>
    </div>
    <br>

</html>