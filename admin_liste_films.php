
<?php
	// Initialiser la session
	session_start();
	// Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
	require('config.php');
	doit_etre_admin();
?>
<!doctype html>

<html lang="fr">
    <body>
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>titre</th>
                    <th>realisateur</th>
                    <th>acteurs</th>
                    <th>description</th>
                    <th>image</th>
                    <th>prix</th>
                    <th>spoiler</th>
                    <th>telechargement</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach(recuperer_les_videos() as $id => $video){
                        echo "<tr>";
                        echo "<td>".$id."</td>";
                        echo "<td>".$video['titre']."</td>";
                        echo "<td>".$video['realisateur']."</td>";
                        echo "<td>".$video['acteurs']."</td>";
                        echo "<td>".$video['description']."</td>";
                        echo "<td><img src='".$video['image']."' width='60' height'60'></td>";
                        echo "<td>".$video['prix']."</td>";
                        echo "<td>".$video['spoiler']."</td>";
                        echo "<td>".$video['telechargement']."</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
            <tfoot>
                <tr>
                    <th>id</th>
                    <th>titre</th>
                    <th>realisateur</th>
                    <th>acteurs</th>
                    <th>description</th>
                    <th>image</th>
                    <th>prix</th>
                    <th>spoiler</th>
                    <th>telechargement</th>
                </tr>
                </tfoot>
        </table>    
    </body>
</html>