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

        @media (max-width:1000px) {
            .nav>.nav-btn {
                display: inline-block;
                position: absolute;
                right: 0px;
                top: 0px;
            }

            .nav>.nav-btn>label {
                display: inline-block;
                width: 50px;
                height: 50px;
                padding: 13px;
            }

            .nav>.nav-btn>label:hover,
            .nav #nav-check:checked~.nav-btn>label {
                background-color: var(--secondaire);
            }

            .nav>.nav-btn>label>span {
                display: block;
                width: 25px;
                height: 10px;
                border-top: 2px solid #eee;
            }

            .nav>.nav-links {
                position: absolute;
                display: block;
                width: 100%;
                background-color: var(--bordure);
                height: 0px;
                transition: all 0.2s ease-in;
                overflow-y: hidden;
                top: 50px;
                left: 0px;
            }

            .nav>.nav-links>a {
                display: block;
                width: 100%;
            }

            .nav>#nav-check:not(:checked)~.nav-links {
                height: 0px;
            }

            .nav>#nav-check:checked~.nav-links {
                height: calc(100vh - 50px);
                overflow-y: auto;
            }
        }

        /* Liste déroulante */
        .navbar {
            position: absolute;
        }

        .navbar li {
            height: auto;
            float: left;
            text-align: center;
            list-style: none;
            font: normal bold 13px/1em Arial, Verdana, Helvetica;
        }

        .navbar a {
            text-decoration: none;
            display: block;
        }

        .navbar li ul {
            display: none;
            height: auto;
            margin: 0;
            padding: 0;
        }

        .navbar li:hover ul {
            display: block;
        }
    </style>
</head>

<body>
    <div class="nav">
        <input type="checkbox" id="nav-check">
        <div class="nav-header">
            <div class="nav-title">
                <a href="accueil.php" title="Accueil"><i class="fa-solid fa-home" style="color: #fff"></i></a>
            </div>
        </div>
        <div class="nav-btn">
            <label for="nav-check">
                <span></span>
                <span></span>
                <span></span>
            </label>
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