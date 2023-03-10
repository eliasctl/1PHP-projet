<?php
$page = 'panier';
require('config.php');

$liste_des_videos = recuperer_les_videos();
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
            height: 90%;
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
    </center>
    <!-- une grille contenant les images des films que l'on a acheté -->
    <div class="grid">
        <?php
        foreach ($liste_des_videos as $une_video) {
            echo '<div class="grid-item">';
            echo '<a href="info_un_film.php?id_film=' . $une_video['id'] . '">';
            echo '<img src="' . $une_video['image'] . '" alt="" width="75%">';
            echo '</a>';
            echo '</div>';
        }
        ?>
    </div>

</body>

</html>