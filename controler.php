<?php
require('config.php');
if(empty($_POST['action'])) {
    echo "Argument invalide !";
    //exit();
}
$action = $_POST['action'];

if (isset($_POST['id_film'])) {
    $id_film = $_POST['id_film'];
}

if (isset($_POST['id_utilisateur'])) {
    $id_utilisateur = $_POST['id_utilisateur'];
}


switch ($action) {
    case 'btn':
        echo "OK blabla";
        break;
    case 'ajouter_un_film_au_panier':
        $retour = "Erreur de traitement !";
        if (!empty($id_utilisateur) || !empty($id_film)) {
            $retour = ajouter_un_film_au_panier($id_film, $id_utilisateur);
        }
        echo $retour;
        break;



}
?>