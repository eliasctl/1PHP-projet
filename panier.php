<?php
$page = 'panier';
require('config.php');
doit_etre_connecte();
var_dump($_SESSION);

var_dump(recuperer_le_panier($_SESSION['id']));
?>

<div>
    <center>
        <i class="fa-solid fa-cart-shopping fa-2xl"></i>
        <br>
        <h1>Mon panier</h1>
    </center>
</div>


