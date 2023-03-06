<?php
$page = "Info film";
require('config.php');
if (!isset($_GET['id_film'])) {?>
    <script type='text/javascript'>alert("Aucun id de film n'est rentré !"); window.location.href='index.php';</script>
<?php
}
$id_film = $_GET['id_film'];
$film = recuperer_les_videos()[$id_film];
?>

<!-- <style>
    body {
        background-image: url( echo $film['image'] );
        background-repeat: no-repeat;
        background-attachment: fixed; 
        background-size: cover;
    }
</style> -->

<!doctype html>

<html>
    <center>
        <body>
            <h1><?php echo $film['titre']; ?></h1>
            <br>
            <iframe width="70%" height="60%" src="https://www.youtube.com/embed/<?php echo $film['spoiler'] ?>" title="Vidéo bande annonce" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
            <br>
            <h3><u>Réalisateur :</u> <?php echo $film['realisateur']; ?></h3>
            <h3><u>Acteurs :</u> <?php echo $film['acteurs']; ?></h3>
            <h3><u>Année :</u> <?php echo $film['annee']; ?></h3>
            <h3><u>Genre :</u> <?php echo $film['cathegorie']; ?></h3>
            <h3><u>Description :</u> <br><br> <?php echo $film['description']; ?></h3>
            <img src="<?php echo $film['image']; ?>" alt="Image du film" height="50%"/>
            <br><br>
            <h3><?php echo "<u>Prix :</u> ".$film['prix']; ?></h3>
            <i class="fa-solid fa-cart-shopping fa-2xl" style="color: green;"><sup>+</sup></i>
            <br><br>
        </body>
    </center>
</html>
