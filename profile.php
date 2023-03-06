<?php
$page = 'profile';
require('config.php');
require('nav.php');
doit_etre_connecte();
$utilisateur = recuperer_les_utilisateurs()[$_SESSION['id']];
?>

<html>
    <body>
        <center>
            <h1><i class="fa-solid fa-user fa-2xl"></i></h1>
            <br>
            <h1>Mon Profile</h1>
            <h2>Pseudo: <?php echo $utilisateur['pseudo']; ?></h2>
            <h2>Email: <?php echo $utilisateur['email']; ?></h2>

        </center>
    </body>
</html>