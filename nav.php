<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
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
            background-color: #e66262;
            position: relative;
        }

        .nav>.nav-header {
            display: inline;
        }

        .nav>.nav-header>.nav-title {
            display: inline-block;
            font-size: 22px;
            color: #fff;
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
            background-color: rgba(0, 0, 0, 0.3);
        }

        .nav>#nav-check {
            display: none;
        }

        @media (max-width:600px) {
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
                background-color: rgba(0, 0, 0, 0.3);
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
                background-color: #333;
                height: 0px;
                transition: all 0.3s ease-in;
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
                Movies DataBase & co
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
            <a href="#" title="Films"><i class="fa-solid fa-film"></i></a>
            <a href="#" title="Panier"><i class="fa-solid fa-cart-shopping"></i></a>

            <!-- Fait un menu déroulant de liens -->
            <a href="#">
                <ul class="navbar">
                    <li>
                        <a href="#">Liste des articles</a>
                        <ul>
                            <li><a href="#">Liste des articles</a></li>
                            <li><a href="#">Ajouter un article</a></li>
                        </ul>
                    </li>
                </ul>
            </a>


            <?php
            if (!empty($_SESSION['pseudo'])) {
                if ($_SESSION['type'] === 'admin'){
                    echo '<a href="admin_liste_films.php" title="Menu admin"><i class="fa-solid fa-screwdriver-wrench"></i></a>';
                }
                echo '<a href="deconnexion.php" title="Déconnexion"><i class="fa-solid fa-right-from-bracket"></i></a>';
            } else {
                echo '<a href="connexion.php">Connexion</a>';
                echo '<a href="inscription.php">Inscription</a>';
            }
            ?>
            &emsp;
        </div>
    </div>
    <br>

</html>