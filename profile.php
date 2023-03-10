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

<script>

    function modifierCode(id) {
        alertify.prompt( 'Chagement de mot de passe', 'Entrez votre nouveau mot de passe', 'Mot de passe'
               , function(evt, value) { alertify.success('Vous avez entré: ' + value + ' -' +id) }
               , function() { alertify.error('Annuler') });
        $.post("fonctions.php", {
            action: "modifierCode",
            id: id,
            code: value
        }, function (code_html, status) {
            alertify.success(code_html);
        }).set('labels', {ok: 'Valider', cancel: 'Annuler'});


    }

</script>

<html>
    <body>
        <center>
            <h1><i class="fa-solid fa-user fa-2xl"></i></h1>
            <br>
            <h1>Mon Profile</h1>
            <h2>Pseudo: <?php echo $utilisateur['pseudo']; ?></h2>
            <h2>Email: <?php echo $utilisateur['email']; ?></h2>
            <button onclick="modifierCode(<?php echo $utilisateur['id']; ?>)">Test</button>

            <?php
                if ($_SESSION['type'] === 'admin') {
                    echo "<h2>Type: ".$utilisateur['type']."</h2>";
                }
            ?>
            <!-- fait une zone de texte avec un bouton qui modifie une ligne sql -->
            <form action="profile.php" method="post">
                <input type="hidden" name="id_utilisateur" value="<?php echo $utilisateur['id']; ?>">
                <input type="hidden" name="action" value="modifier">
                <input type="password" name="password" placeholder="Nouveau mot de passe">
                <input type="submit" value="Modifier">
            </form>

        </center>
    </body>
</html>