<?php
require('config.php');
?>

<!-- Fait un bouton qui affiche un message de confirmation avec alertifyJS et qui a l'aide d'un poste renvoie "bla" à fonction php test() qui est dans le fichier fonctions.php-->

<button onclick="test()">Test</button>
<a onclick="ajouter_un_film_au_panier('3', '1')"><i class="fa-solid fa-cart-shopping"></i>film</a>

<script>
    function test() {
        alertify.confirm('Confirmation', 'Voulez-vous vraiment supprimer ce produit?', function() {
            alertify.success('Vous avez cliqué sur Oui');
            $.ajax({
                url: 'controler.php',
                type: 'POST',
                data: 'action=btn',
                dataType: 'html',
                success: function (code_html, status) {
                    alertify.success(code_html);
                }
            });
            alertify.confirm().close();
        }, function () {
            alertify.error("L'opération a été annulée");
        }).set('labels', {ok: 'Oui', cancel: 'Non'});
    }

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
</script>


<?php
echo supprimer_un_film_du_panier(3, 1);
?>