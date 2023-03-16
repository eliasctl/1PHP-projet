<?php
$page = 'panier';
require('config.php');
require('nav.php');

if (!empty($_GET['recherche'])) {
    $recherche = htmlentities($_GET['recherche'], ENT_QUOTES, "UTF-8");
    $liste_des_videos = recherche_liste_film($recherche);
    
    if (empty($liste_des_videos)) {
        $recherche = "Aucun résultat pour la recherche : " . $recherche;
    }
} else {
    $liste_des_videos = recuperer_les_videos();
    $recherche = "Aucune recherche n'a été effectuée !";
}
?>

<html lang="fr">

<head>
    <style>
        :root {
            --primaire: #F9DBBB;
            --secondaire: #4E6E81;
            --bordure: #2E3840;
        }

        body {
            background-color: var(--primaire);
            color: black;
        }

        .grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            grid-gap: 10px;
            grid-auto-rows: minmax(100px, auto);
        }

        .grid-item {
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            background-color: var(--secondaire);
            border: 2px solid var(--bordure);
            padding: 15px;
            font-size: 30px;
            border-radius: 10px;
            width: 90%;
            margin-left: 5%;
        }

        .title {
            background-color: var(--secondaire);
            border: 5px solid var(--bordure);
            border-radius: 10px;
            padding: 10px;
            width: 50%;
            font-size: 50px;
            font-family: 'Courier New', Courier, monospace;
        }

        a {
            filter: grayscale(1);
        }

        .a:hover {
            filter: grayscale(0);
        }

        /* css de la bare de recherche */
        input[type=text] {
            width: 50%;
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
            border: 2px solid var(--bordure);
            border-radius: 4px;
        }


        input[type=submit] {
            width: 10%;
            background-color: var(--secondaire);
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: var(--bordure);
        }

        button {
            width: 10%;
            background-color: var(--secondaire);
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: var(--bordure);
        }

        /* pour le redimentionnement de la page */

        @media (max-width: 1375px) {
            .grid {
                grid-template-columns: repeat(3, 1fr);
            }
        }

        @media (max-width: 1000px) {
            .grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .title {
                width: 90%;
            }
        }

        @media (max-width: 500px) {
            .grid {
                grid-template-columns: repeat(1, 1fr);
            }
        }
    </style>
</head>

<body>
    <center>
        <h1 class="title">
            Movies DataBase & co
        </h1>
        <form action="index.php" method="get">
            <input type="text" name="recherche" placeholder="Rechercher un film">
            <input type="submit" value="Rechercher">
            <button type="button" onclick="window.location.href='index.php'">Effacer</button>
        </form>

    </center>
    <!-- une grille contenant les images des films que l'on a acheté -->
    <div class="grid">
        <?php
        foreach ($liste_des_videos as $une_video) {
            echo '<div class="grid-item">';
            echo '<a class="a" href="info_un_film.php?id_film=' . $une_video['id'] . '">';
            echo '<img src="' . $une_video['image'] . '" alt="" width="75%">';
            echo '</a>';
            echo '</div>';
        }
        ?>
    </div>

</body>

</html>