<?php
session_start();
require('config.php');
?>

<!-- include the script -->
<script src="assets/alertifyjs/alertify.min.js"></script>
<!-- include the style -->
<link rel="stylesheet" href="assets/alertifyjs/css/alertify.min.css" />
<!-- include a theme -->
<link rel="stylesheet" href="assets/alertifyjs/css/themes/default.min.css" />

<!-- Fait un bouton qui affiche un message de confirmation avec alertifyJS et qui a l'aide d'un poste renvoie "bla" à fonction php test() qui est dans le fichier fonctions.php-->
<button onclick="test()">Test</button>

<script>
    function test() {
        alertify.confirm('Confirmation', 'Voulez-vous vraiment supprimer ce produit?', function () {
            alertify.success('OK');
            $.post("fonctions.php", {
                action: "btn"
            }, function (code_html, status) {
                alertify.success(code_html);
            });
        }, function () {
            alertify.error('Annulé');
        });
    }
</script>