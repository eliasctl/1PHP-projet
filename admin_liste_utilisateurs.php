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
    <style>
        body {
            background-color: #F9DBBB;
        }
    </style>

</head>

<body>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#utilisateurs').DataTable({
                scrollX: true,
                "paging": false,
                "info": false,
                "language": {
                    "zeroRecords": "Aucun résultat trouvé",
                    "search": "Rechercher :",
                }
            });
        });
        function supprimer_un_utilisateur(id_utilisateur) {
            alertify.confirm('Confirmation', 'Voulez-vous supprimer cette utilisateur? ', function () {
                if (id_utilisateur == 1) {
                    alertify.error("Vous ne pouvez pas supprimer l'administrateur");
                    return;
                } else if (id_utilisateur == 2) {
                    alertify.error("Vous ne pouvez pas supprimer le compte de l'utilisateur test, il s'agit d'une base d'un site de test");
                    return;
                }
                $.ajax({
                    url: 'controler.php',
                    type: 'POST',
                    data: 'action=supprimer_un_utilisateur&id_utilisateur=' + id_utilisateur,
                    dataType: 'html',
                    success: function (code_html, status) {
                        nb = code_html.search(/Ok/i);
                        if (nb !== -1) {
                            alertify.success(code_html);
                            alertify.success("Rechargement de la page dans 3 secondes");
                            setTimeout(function () {
                                location.reload();
                            }, 3000);
                        } else {
                            alertify.message(code_html);
                        }
                    }
                });
                alertify.confirm().close();
            }, function () {
                alertify.error("L'opération a été annulée");
            }).set('labels', { ok: 'Oui', cancel: 'Non' });
        }
    </script>
    <table id="utilisateurs" class="display" style="width:100%">
        <thead>
            <tr>
                <th>Id</th>
                <th>Type</th>
                <th>Pseudo</th>
                <th>Mail</th>
                <th>Argent</th>
                <th>Code Crypté</th>
                <th>Voir son profil</th>
                <th>Supprimer</th>
            </tr>
        </thead>
        <tbody>
            <!-- Possibilité d'ajout utilisateur
            <tr>
                <td></td>
                <td>
                    <form action="controler.php" method="post">
                        <input type="hidden" name="action" value="ajouter_un_utilisateur">
                        <select name="type">
                            <option value="user">User</option>
                            <option value="admin">Admin</option>
                        </select>
                </td>
                <td><input type="text" name="pseudo" placeholder="Pseudo"></td>
                <td><input type="text" name="email" placeholder="Email"></td>
                <td><input type="text" name="argent" placeholder="Argent" value=0></td>
                <td><input type="text" name="code" placeholder="Code non crypté"></td>
                <td><button type="submit"><i class="fa-solid fa-plus"></i></button></td>
                </form>
            </tr> -->

            <?php
            foreach (recuperer_les_utilisateurs() as $id => $utilisateur) {
                echo "<tr>";
                echo "<td>" . $id . "</td>";
                echo "<td>" . $utilisateur['type'] . "</td>";
                echo "<td>" . $utilisateur['pseudo'] . "</td>";
                echo "<td>" . $utilisateur['email'] . "</td>";
                // echo "<td><form action='controler.php' method='post'><input type='text' name='argent' placeholder='Argent' value=".$utilisateur['argent']."></td>";
                echo "<td>" . $utilisateur['argent'] . "</td>";
                echo "<td>" . $utilisateur['code'] . "</td>";
                echo "<td><a href='profile.php?id_utilisateur=" . $id . "'><i class='fa-solid fa-user'></i></a></td>";
                echo "<td><a href='#' onclick='supprimer_un_utilisateur(" . $id . ")'><i class='fa-solid fa-trash'></i></a></td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>

</html>