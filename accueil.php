<?php
$page = 'panier';
require('config.php');
?>

<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MDB&co | Panier</title>
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
        <div class="grid-item">
            <img src="https://images-na.ssl-images-amazon.com/images/S/pv-target-images/4c8b6c0f9b929fa057f14048c20ffb2047ed3a55761de22b21d9f4ac3eff1d92._RI_V_TTW_.jpg"
                alt="" width='200'>
        </div>
        <div class="grid-item">
            <img src="https://images-na.ssl-images-amazon.com/images/S/pv-target-images/4c8b6c0f9b929fa057f14048c20ffb2047ed3a55761de22b21d9f4ac3eff1d92._RI_V_TTW_.jpg"
                alt="" width='200'>
        </div>
        <div class="grid-item">
            <img src="https://images-na.ssl-images-amazon.com/images/S/pv-target-images/4c8b6c0f9b929fa057f14048c20ffb2047ed3a55761de22b21d9f4ac3eff1d92._RI_V_TTW_.jpg"
                alt="" width='200'>
        </div>
        <div class="grid-item">
            <img src="https://images-na.ssl-images-amazon.com/images/S/pv-target-images/4c8b6c0f9b929fa057f14048c20ffb2047ed3a55761de22b21d9f4ac3eff1d92._RI_V_TTW_.jpg"
                alt="" width='200'>
        </div>
        <div class="grid-item">
            <img src="https://images-na.ssl-images-amazon.com/images/S/pv-target-images/4c8b6c0f9b929fa057f14048c20ffb2047ed3a55761de22b21d9f4ac3eff1d92._RI_V_TTW_.jpg"
                alt="" width='200'>
        </div>
        <div class="grid-item">
            <img src="https://images-na.ssl-images-amazon.com/images/S/pv-target-images/4c8b6c0f9b929fa057f14048c20ffb2047ed3a55761de22b21d9f4ac3eff1d92._RI_V_TTW_.jpg"
                alt="" width='200'>
        </div>
    </div>

</body>

</html>