<?php
$page = 'panier';
require('config.php');

$liste_des_videos = recuperer_les_videos();
?>

<html lang="fr">

<head>
    <style>
        .grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-gap: 10px;
            grid-auto-rows: minmax(100px, auto);
        }

        @media (max-width: 1000px) {
            .grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 500px) {
            .grid {
                grid-template-columns: repeat(1, 1fr);
            }
        }

        .grid-item {
            background-color: rgba(255, 255, 255, 0.8);
            border: 1px solid rgba(0, 0, 0, 0.8);
            padding: 20px;
            font-size: 30px;
            text-align: center;
        }
    </style>
</head>

<body>
    <!-- une grille contenant les images des films que l'on a acheté -->
    <div class="grid">
        <?php
            foreach ($liste_des_videos as $une_video) {
                echo '<a href="info_un_film.php?id_film=' . $une_video['id'] . '">';
                echo '<div class="grid-item">';
                echo '<img src="' . $une_video['image'] . '" alt="" width="75%">';
                echo '</div>';
                echo '</a>';
            }
        ?>
    </div>

</body>

</html>