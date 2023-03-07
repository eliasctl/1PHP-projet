<?php
require('config.php');
?>



<!-- Fait un bouton qui affiche un message de confirmation avec alertifyJS et qui a l'aide d'un poste renvoie "bla" à fonction php test() qui est dans le fichier fonctions.php-->
<button onclick="test()">Test</button>

<script>
    function test() {
        alertify.confirm('Confirmation', 'Voulez-vous vraiment supprimer ce produit?', function () {
            $.ajax({
                url: "controler.php",
                type: "POST",
                data: "action=test",
                success: function (data) {
                    echo "bla";
                }
            });
        }, function () {
            alertify.error('Annulés');
        });
    }
</script>