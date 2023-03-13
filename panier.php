<?php
$page = 'panier';
require('config.php');
doit_etre_connecte();
require('nav.php');
?>

<html lang="en">

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
                    <th>Total</th>
                </tr>
                <?php
                $panier = recuperer_le_panier($_SESSION['id']);
                $total = 0;
                foreach ($panier as $film) {
                    $total += $film['prix'];
                    echo '<tr>';
                    echo '<td>' . $film['titre'] . '</td>';
                    echo '<td>' . $film['prix'] . '€</td>';
                    echo '</tr>';
                }
                ?>
                <tr>
                    <td style="border: 0px"></td>
                    <td style="border: 0px"></td>
                    <td>
                        <?php echo $total; ?>€
                    </td>
                </tr>
        </center>
    </div>
</body>

</html>