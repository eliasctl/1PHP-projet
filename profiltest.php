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

<html lang="en">

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

        .main-box {
            width: 70%;
            height: 40%;
            background-color: grey;
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

        .pp {
            margin: 30px;
            width: 100px;
        }
    </style>
</head>

<body>
    <center>
        <div class="main-box">
            <i class="fa-solid fa-user fa-2xl pp"></i>
        </div>
    </center>
</body>