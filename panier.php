<?php
$page = 'panier';
require('config.php');
doit_etre_connecte();
require('nav.php');
?>

<div>
    <center>
        <i class="fa-solid fa-cart-shopping fa-2xl"></i>
        <br>
        <h1>Mon panier</h1>
        <table>
            <tr>
                <th>Titre</th>
                <th>Prix</th>
                <th>Total</th>
            </tr>
            <?php
            $panier = recuperer_le_panier($_SESSION['id']);
            $total = 0;
            foreach ($panier as $film) {
                $total += $film['prix'];
                echo '<tr>';
                echo '<td>' . $film['titre'] . '</td>';
                echo '<td>' . $film['prix'] . '€</td>';
                echo '</tr>';
            }
            ?>
            <tr>
                <td colspan="2">Total</td>
                <td><?php echo $total; ?>€</td>
            </tr>
    </center>
</div>


