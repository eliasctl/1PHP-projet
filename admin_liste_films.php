<?php
$page = 'admin_liste_films';
// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
require('config.php');
require('nav.php');
doit_etre_admin();
?>
<!doctype html>

<html lang="fr">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>

    <style>
        body {
            background-color: #F9DBBB;
        }
    </style>
</head>

<body>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#films').DataTable({
                scrollX: true,
                "paging": false,
                "info": false,
                "language": {
                    "zeroRecords": "Aucun résultat trouvé",
                    "search": "Rechercher :",
                }
            });
        });
    </script>
    <table id="films" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Cathégorie</th>
                <th>Titre & lien</th>
                <th>Réalisateur</th>
                <th>Acteurs</th>
                <th>Description</th>
                <th>Image</th>
                <th>Prix</th>
                <th>Spoiler</th>
                <th>Téléchargement</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach (recuperer_les_videos() as $id => $video) {
                echo "<tr>";
                echo "<td>" . $id . "</td>";
                echo "<td>" . $video['cathegorie'] . "</td>";
                echo "<td><a href='info_un_film.php?id_film=" . $id . "'>" . $video['titre'] . "</a></td>";
                echo "<td>" . $video['realisateur'] . "</td>";
                echo "<td>" . $video['acteurs'] . "</td>";
                echo "<td>" . $video['description'] . "</td>";
                echo "<td><img src='" . $video['image'] . "' width='60'></td>";
                echo "<td>" . $video['prix'] . "</td>";
                echo "<td>" . $video['spoiler'] . "</td>";
                echo "<td>" . $video['telechargement'] . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>

</html>