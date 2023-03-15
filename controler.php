<?php
require('config.php');
if(empty($_POST['action'])) {
    echo "Argument invalide !";
    exit();
}
$action = $_POST['action'];

if (isset($_POST['id_film'])) {
    $id_film = $_POST['id_film'];
}

if (isset($_POST['id_utilisateur'])) {
    $id_utilisateur = $_POST['id_utilisateur'];
}

if (isset($_POST['code'])) {
    $code = $_POST['code'];
}

if (isset($_POST['pseudo'])) {
    $pseudo = $_POST['pseudo'];
}

if (isset($_POST['email'])) {
    $email = $_POST['email'];
}

if (isset($_POST['argent'])) {
    $argent = $_POST['argent'];
}

if (isset($_POST['type'])) {
    $type = $_POST['type'];
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
    case 'supprimer_un_film_du_panier':
        $retour = "Erreur de traitement !";
        if (!empty($id_utilisateur) || !empty($id_film)) {
            $retour = supprimer_un_film_du_panier($id_film, $id_utilisateur);
        }
        echo $retour;
        break;
    case 'payer':
        $retour = "Erreur de traitement !";
        if (!empty($id_utilisateur)) {
            $retour = achat_du_panier($id_utilisateur);
        }
        echo $retour;
        break;
    case 'changer_de_code':
        $retour = "Erreur de traitement !";
        if (!empty($id_utilisateur) || !empty($code)) {
            if ($id_utilisateur == 1 || $id_utilisateur == 2){
                $retour = "Vous ne pouvez pas modifier le mot de passe de cet utilisateur !";
            } else {
                $retour = changer_de_code($id_utilisateur, $code);
            }
        }
        echo $retour;
        break;
    case 'ajouter_un_utilisateur':
        $retour = "Erreur de traitement !";
        if (!empty($pseudo) || !empty($email) || !empty($code) || !empty($argent) || !empty($type)) {
            $retour = ajouter_un_utilisateur($pseudo, $email, $code);
        }
        echo $retour;
        break;
    case 'supprimer_un_utilisateur':
        $retour = "Erreur de traitement !";
        if (!empty($id_utilisateur)) {
            $retour = supprimer_un_utilisateur($id_utilisateur);
        }
        echo $retour;
        break;
}
?>