<?php
$page = 'panier';
require('config.php');
doit_etre_connecte();
var_dump($_SESSION);

var_dump(recuperer_le_panier($_SESSION['id']));
?>

