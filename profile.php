<?php
$page = 'profile';
require('config.php');
require('nav.php');
doit_etre_connecte();
$utilisateur = recuperer_les_utilisateurs()[$_SESSION['id']];
if (isset($_GET['id_utilisateur'])) {
    if ($_SESSION['type'] === 'admin') {
        $utilisateur = recuperer_les_utilisateurs()[$_GET['id_utilisateur']];
    }
}
?>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>

    <style>
        :root {
            --primaire: #F9DBBB;
            --secondaire: #4E6E81;
            --bordure: #2E3840;
        }

        body {
            background-color: var(--primaire);
            font-family: 'Roboto', sans-serif;
        }

        .main-box {
            width: 70%;
            height: 40%;
            background-color: var(--secondaire);
            color: white;
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            align-content: center;
            justify-content: space-evenly;
            align-items: center;
            border: 3px solid var(--bordure);
            border-radius: 10px;
        }

        .achats {
            width: 70%;
            background-color: var(--secondaire);
            border: 3px solid var(--bordure);
            border-radius: 10px;
            color: white;
            display: flex;
            flex-direction: column;
            flex-wrap: nowrap;
            justify-content: flex-start;
            align-items: center;
        }

        /* de la  */

        .titre {
            width: 100%;
            background-color: var(--bordure);
            border-radius: 10px 10px 0px 0px;
            display: flex;
            flex-direction: row;
            flex-wrap: nowrap;
            justify-content: center;
            align-items: center;
        }

        .titre h1 {
            font-size: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background-color: var(--bordure);
            color: white;
            font-size: 20px;
            padding: 10px;
        }

        .achat-infos {
            background-color: var(--bordure);
            color: white;
            font-size: 20px;
        }

        .infos {
            width: 50%;
            display: flex;
            flex-direction: column;
            flex-wrap: nowrap;
            justify-content: center;
            align-items: center;
        }

        tr {
            display: flex;
            flex-direction: row;
            flex-wrap: nowrap;
            justify-content: space-around;
            align-items: center;
        }

        td,
        th {
            width: 33%;
            padding: 10px;
            display: flex;
            flex-direction: column;
            flex-wrap: nowrap;
            justify-content: center;
            align-items: center;
        }

        td>a {
            text-decoration: none;
            color: white;
        }

        .pp {
            font-size: 200px;
        }

        .mdp {
            background-color: var(--primaire);
            border: 2px solid var(--bordure);
            border-radius: 5px;
            font-size: 20px;
        }

        .mdp:hover {
            background-color: red;
            color: white;
        }

        @media screen and (max-width: 500px) {
            .pp {
                font-size: 40px;
            }

            .main-box {
                width: 95%;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }

            .achats {
                width: 95%;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }
        }
    </style>
</head>

<script>
    function modifierCode(id) {
        alertify.prompt('Chagement de mot de passe', 'Entrez votre nouveau mot de passe', 'Mot de passe', function (evt, value) {
            //alertify.success(value);
            if (value.length < 5) {
                alertify.error("Le mot de passe doit contenir au moins 5 caractères");
                return;
            }
            $.ajax({
                url: 'controler.php',
                type: 'POST',
                data: 'action=changer_de_code&id_utilisateur=' + id + '&code=' + value,
                dataType: 'html',
                success: function (code_html, status) {
                    nb = code_html.search(/Ok/i);
                    if (nb !== -1) {
                        alertify.success(code_html);
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

<body>
    <center>
        <div class="main-box">
            <i class="fa-solid fa-user fa-2xl pp"></i>
            <div class="infos">
                <h1>
                    <?php echo $utilisateur['pseudo'] ?>
                </h1>
                <h2>
                    <?php echo $utilisateur['email']; ?>
                    <br>
                    <br>
                    <i class="fa-solid fa-wallet"></i>
                    <?php echo $utilisateur['argent'] . "€"; ?>
                </h2>
                <?php
                if ($_SESSION['type'] === 'admin') {
                    echo "<h2>Type: " . $utilisateur['type'] . "</h2>";
                }
                ?>
                <button class="mdp" onclick="modifierCode(<?php echo $utilisateur['id']; ?>)">
                    Modifier mon mot de passe
                </button>
            </div>
        </div>
        <br>
        <br>
        <div class="achats">
            <div class="titre">
                <h1>Historique des achats</h1>
            </div>
            <table>
                <tr class="achat-infos">
                    <th>Titre</th>
                    <th>Image</th>
                    <th>Télécharger</th>
                </tr>
                <?php
                $achats = recuperer_les_achats($utilisateur['id']);
                foreach ($achats as $un_film) {
                    echo "<tr class'achat-content'>";
                    echo "<td><a href='info_un_film.php?id_film=" . $un_film['id'] . "'>" . $un_film['titre'] . "</a></td>";
                    echo "<td><img src='" . $un_film['image'] . "' width='100px' height='100px'></td>";
                    echo "<td><a href='videos/" . $un_film['telechargement'] . ".mp4' download><i class='fa-solid fa-download'></i></a></td>";
                    echo "</tr>";
                }
                ?>
            </table>
        </div>
    </center>

</body>