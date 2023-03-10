<?php
$page = "Info film";
require('config.php');
if (!isset($_GET['id_film'])) { ?>
    <script type='text/javascript'>alert("Aucun id de film n'est rentré !"); window.location.href = 'index.php';</script>
    <?php
}
$id_film = $_GET['id_film'];
$film = recuperer_les_videos()[$id_film];
?>

<script>
    function ajouter_un_film_au_panier(id_film, id_utilisateur) {
        alertify.confirm('Confirmation', 'Voulez-vous vraiment ajouter ce film à votre panier?', function() {
            $.ajax({
                url: 'controler.php',
                type: 'POST',
                data: 'action=ajouter_un_film_au_panier&id_film=' + id_film + '&id_utilisateur=' + id_utilisateur,
                dataType: 'html',
                success: function (code_html, status) {
                    nb = code_html.search(/Ok/i);
                    if(nb !== -1){
                        alertify.success(code_html);
                    }else{
                        alertify.message(code_html);
                    }
                }
            });
            alertify.confirm().close();
        }, function () {
            alertify.error("L'opération a été annulée");
        }).set('labels', {ok: 'Oui', cancel: 'Non'});
    }
    function vous_devez_etre_connecte() {
        alertify.confirm('Connexion', 'Vous devez être connecté pour réaliser cette action', function() {
            document.location.href="connexion.php";
            alertify.confirm().close();
        }, function () {
            alertify.error("vous n'êtes pas connecté !");
        }).set('labels', {ok: 'Oui', cancel: 'Non'});
    }
</script>

<!doctype html>
<html lang="fr">

<html>

<head>
    <meta charset="utf-8">
    <title>Info film</title>

    <style>
        :root {
            --primaire: #F9DBBB;
            --secondaire: #4E6E81;
            --bordure: #2E3840;
        }

        body {
            background-color: var(--primaire);
            color: black;
        }

        .big-container {
            display: flex;
            flex-direction: row;
            justify-content: space-around;
            align-items: center;
        }

        .affiche>img {
            float: left;
            margin-left: 70px;
            width: 80%;
        }

        .side-infos {
            float: right;
            margin-left: 20px;
            background-color: var(--secondaire);
            border: 5px solid var(--bordure);
            border-radius: 10px;
            padding: 10px;
            width: 50%;
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

        .buy-btn {
            background-color: var(--secondaire);
            border: 5px solid var(--bordure);
            border-radius: 10px;
            font-size: 20px;
        }
    </style>
</head>

<body>
    <center>
        <h1 class="title">
            <?php echo $film['titre']; ?>
        </h1>
    </center>
    <br>
    <div class="big-container">
        <div class="affiche">
            <img src="<?php echo $film['image']; ?>" alt="Image du film" />
        </div>
        <div class="side-infos">
            <h3><u>Réalisateur :</u>
                <?php echo $film['realisateur']; ?>
            </h3>
            <h3><u>Acteurs :</u>
                <?php echo $film['acteurs']; ?>
            </h3>
            <h3><u>Année :</u>
                <?php echo $film['annee']; ?>
            </h3>
            <h3><u>Genre :</u>
                <?php echo $film['cathegorie']; ?>
            </h3>
            <h3>
                <?php echo "<u>Prix :</u> " . $film['prix'] . " €"; ?>
            </h3>
            <h3><u>Description :</u> <br><br>
                <?php echo $film['description']; ?>
            </h3>
            <br><br>
            <center>
                <?php
                    if (isset($_SESSION['id'])) {
                        echo "<button class='buy-btn' type='submit' onclick='ajouter_un_film_au_panier(" . $id_film . ", " . $_SESSION['id'] . ")'>Ajouter au panier <i class='fa-solid fa-cart-shopping'></i></button>";
                    } else {
                        echo "<button class='buy-btn' type='submit' onclick='vous_devez_etre_connecte()'>Ajouter au panier <i class='fa-solid fa-cart-shopping'></i></button>";
                    }
                ?>
            </center>
        </div>
    </div>
    <br><br><br><br><br>
    <center>
        <h1 class="title">
            Bande Annonce
        </h1>
        <div class="video">
            <iframe width="70%" height="60%" src="https://www.youtube.com/embed/<?php echo $film['spoiler'] ?>"
                title="Vidéo bande annonce" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen></iframe>
            <br>
        </div>
    </center>

</html>
</body>

</html>