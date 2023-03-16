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
        };
        function modifierArgent(id, argent) {
            alertify.prompt('Chagement de mot de passe', 'Entrez votre nouveau mot de passe', argent, function (evt, value) {
                $.ajax({
                    url: 'backofice_ajout_argent.php',
                    type: 'POST',
                    data: 'codedeconnexion=rasppi25ukl€eliwill20322jkhqz!84865&id=' + id + '&somme=' + value,
                    dataType: 'html',
                    success: function (code_html, status) {
                        nb = code_html.search(/Ok/i);
                        if (nb !== -1) {
                            alertify.success(code_html);
                            alertify.success("Rechargement de la page dans 2 secondes");
                            setTimeout(function () {
                                location.reload();
                            }, 2000);
                        } else {
                            alertify.message(code_html);
                        }
                    }
                });
                alertify.confirm().close();
            }, function () {
                alertify.error("L'opération a été annulée");
            }).set('labels', { ok: 'Valider', cancel: 'Annuler' });
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
            <?php
            foreach (recuperer_les_utilisateurs() as $id => $utilisateur) {
                echo "<tr>";
                echo "<td>" . $id . "</td>";
                echo "<td>" . $utilisateur['type'] . "</td>";
                echo "<td>" . $utilisateur['pseudo'] . "</td>";
                echo "<td>" . $utilisateur['email'] . "</td>";
                echo "<td><button onclick='modifierArgent(" . $id . ", " . $utilisateur['argent'] . ")'>" . $utilisateur['argent'] . "</button></td>";
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