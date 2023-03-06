<?php
    $page = 'admin_liste_utilisateurs';
	require('config.php');
	require('nav.php');
	doit_etre_admin();
?>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css" />
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>
    </head>
    <body>
        <script type="text/javascript">
            $(document).ready(function() {
                $('#utilisateurs').DataTable({
                    "paging":   false,
                    "info":     false,
                    "language": {
                        "zeroRecords": "Aucun résultat trouvé",
                        "search": "Rechercher :",
                    }
                });
            } );
        </script>
        <table id="utilisateurs" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Id</th>
					<th>Type</th>
                    <th>Pseudo</th>
                    <th>Mail</th>
					<th>Code Crypté</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach(recuperer_les_utilisateurs() as $id => $utilisateur){
                        echo "<tr>";
                        echo "<td>".$id."</td>";
						echo "<td>".$utilisateur['type']."</td>";
                        echo "<td>".$utilisateur['pseudo']."</td>";
						echo "<td>".$utilisateur['email']."</td>";
						echo "<td>".$utilisateur['code']."</td>";
                        echo "</tr>";
                    }
                ?>
            </tbody>
        </table>    
    </body>
    
</html>