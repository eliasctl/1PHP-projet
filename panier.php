<?php
$page = 'panier';
require('config.php');
doit_etre_connecte();
require('nav.php');
?>

<html lang="fr">
<script>
    function supprimer_un_film_du_panier(id_film, id_utilisateur) {
        alertify.confirm('Confirmation', 'Voulez-vous vraiment supprimer ce film de votre panier', function () {
            $.ajax({
                url: 'controler.php',
                type: 'POST',
                data: 'action=supprimer_un_film_du_panier&id_film=' + id_film + '&id_utilisateur=' + id_utilisateur,
                dataType: 'html',
                success: function (code_html, status) {
                    nb = code_html.search(/Ok/i);
                    if (nb !== -1) {
                        alertify.success(code_html);
                        location.reload();
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
    function payer(id_utilisateur) {
        alertify.confirm('Confirmation', 'Voulez-vous valider votre panier? Cette action vous débitera la somme si vous avez le nécessaire pour payer le panier!', function () {
            $.ajax({
                url: 'controler.php',
                type: 'POST',
                data: 'action=payer&id_utilisateur=' + id_utilisateur,
                dataType: 'html',
                success: function (code_html, status) {
                    nb = code_html.search(/Ok/i);
                    if (nb !== -1) {
                        alertify.success(code_html);
                        alertify.success("Vous allez être redirigé vers votre profil dans 3 secondes!");
                        setTimeout(function () {
                            window.location.href = "profile.php";
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

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panier</title>

    <style>
        :root {
            --primaire: #F9DBBB;
            --secondaire: #4E6E81;
            --bordure: #2E3840;
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

        body {
            background-color: var(--primaire);
            color: black;
        }


        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            text-align: left;
            padding: 8px;
            border: 1px solid var(--bordure);
        }

        th {
            background-color: var(--secondaire);
            color: black;
        }

        .payement {
            background-color: var(--secondaire);
            border: 5px solid var(--bordure);
            border-radius: 10px;
            font-size: 40px;
            position: fixed;
            right: 20px;
            bottom: 20px;
        }
    </style>
</head>

<body>
    <div>
        <center>
            <br>
            <h1 class="title">Mon Panier</h1>
            <table>
                <tr>
                    <th>Titre</th>
                    <th>Prix</th>
                    <th>Supprimer</th>
                </tr>
                <?php
                $panier = recuperer_le_panier($_SESSION['id']);
                $total = 0;
                foreach ($panier as $film) {
                    $total += $film['prix'];
                    echo '<tr>';
                    echo '<td>' . $film['titre'] . '</td>';
                    echo '<td>' . $film['prix'] . '€</td>';
                    echo '<td><a onclick="supprimer_un_film_du_panier(' . $film['id'] . ', ' . $_SESSION['id'] . ')"><i class="fa-solid fa-rectangle-xmark fa-xl"></i></a></td>';
                    echo '</tr>';
                }
                ?>
                <tr>
                    <th>Total</th>
                    <td colcolspan="">
                        <?php echo $total; ?>€
                    </td>
                </tr>
        </center>
    </div>
    <!-- bouton pour valider le pannier -->
    <button class="payement" onclick="payer(<?php echo $_SESSION['id']?>)">Valider le panier</button>
</body>

</html>