<?php

function doit_etre_connecte()
{
    // cette fonction permet de vérifier si une personne est connecté
    // si elle n'est pas connecté on la renvoie sur la page de connexion
    if (!isset($_SESSION["pseudo"])) {
        echo "<script type='text/javascript'>alert('Vous devez être connecter pour accéder à cette page'); window.location.href='connexion.php';</script>";
    }
}

function doit_etre_admin()
{
    // on vérifie si la personne est admin pour lui autoriser l'accès à la page
    // si elle ne l'est pas alors on affiche un popup alert et redirection vers la page d'accueil
    if ($_SESSION["type"] !== 'admin') {
        echo "<script type='text/javascript'>alert('Cette page est réservée aux administrateurs'); window.location.href='index.php';</script>";
    }
}

function recuperer_les_videos()
{
    // cette fonction permet de récupérer les vidéos de la base de données
    // Sortie: tableau_de_videos['id']['cathegorie']
    //                              ['annee']
    //                              ['titre']
    //                              ['realisateur']
    //                              ['acteurs']
    //                              ['description']
    //                              ['image']
    //                              ['prix']
    //                              ['spoiler']
    //                              ['telechargement']
    //                              ['id']

    global $conn;
    $query = "SELECT * FROM `videos`";
    $res = mysqli_query($conn, $query);
    $tableau_de_videos = array();
    while ($row = mysqli_fetch_assoc($res)) {
        $tableau_de_videos[$row['id']]['cathegorie'] = $row['cathegorie'];
        $tableau_de_videos[$row['id']]['annee'] = $row['annee'];
        $tableau_de_videos[$row['id']]['titre'] = $row['titre'];
        $tableau_de_videos[$row['id']]['realisateur'] = $row['realisateur'];
        $tableau_de_videos[$row['id']]['acteurs'] = $row['acteurs'];
        $tableau_de_videos[$row['id']]['description'] = $row['description'];
        $tableau_de_videos[$row['id']]['image'] = $row['image'];
        $tableau_de_videos[$row['id']]['prix'] = $row['prix'];
        $tableau_de_videos[$row['id']]['spoiler'] = $row['spoiler'];
        $tableau_de_videos[$row['id']]['telechargement'] = $row['telechargement'];
        $tableau_de_videos[$row['id']]['id'] = $row['id'];
    }
    return $tableau_de_videos;
}

function recuperer_les_utilisateurs()
{
    // cette fonction permet de récupérer les utilisateurs de la base de données
    // Sortie: tableau_de_utilisateurs[id][pseudo]
    //                                  [email]
    //                                  [type]
    //                                  [code]
    //                                  [id]
    //                                  [panier]
    //                                  [achats]
    //                                  [argent]

    global $conn;
    $query = "SELECT * FROM `utilisateurs`";
    $res = mysqli_query($conn, $query);
    $tableau_de_utilisateurs = array();
    while ($row = mysqli_fetch_assoc($res)) {
        $tableau_de_utilisateurs[$row['id']]['pseudo'] = $row['pseudo'];
        $tableau_de_utilisateurs[$row['id']]['email'] = $row['email'];
        $tableau_de_utilisateurs[$row['id']]['type'] = $row['type'];
        $tableau_de_utilisateurs[$row['id']]['code'] = $row['code'];
        $tableau_de_utilisateurs[$row['id']]['id'] = $row['id'];
        $tableau_de_utilisateurs[$row['id']]['panier'] = $row['panier'];
        $tableau_de_utilisateurs[$row['id']]['achats'] = $row['achats'];
        $tableau_de_utilisateurs[$row['id']]['argent'] = $row['argent'];
    }
    return $tableau_de_utilisateurs;
}

function recuperer_le_panier($id_utilisateur)
{
    // cette fonction permet de récupérer le panier d'un utilisateur
    // Entrée: id de l'utilisateur
    // Sortie: tableau_de_panier[id_film][id]
    //                              [titre]
    //                              [image]
    //                              [prix]

    global $conn;
    $query = "SELECT `panier` FROM `utilisateurs` WHERE `id` = '" . $id_utilisateur . "'";
    $res = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($res);
    $panier = $row['panier'];
    if ($panier == "") {
        return array();
    }
    $tableau_panier = explode(",", $panier);
    $tableau_de_panier = array();
    foreach ($tableau_panier as $id_film) {
        $id_film = intval($id_film);
        if ($id_film != 0) {
            $query = "SELECT * FROM `videos` WHERE `id` = '" . $id_film . "'";
            $res = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($res);
            $tableau_de_panier[$id_film]['id'] = $row['id'];
            $tableau_de_panier[$id_film]['titre'] = $row['titre'];
            $tableau_de_panier[$id_film]['image'] = $row['image'];
            $tableau_de_panier[$id_film]['prix'] = $row['prix'];
        }
    }
    return $tableau_de_panier;
}

function ajouter_un_film_au_panier($id_film, $id_utilisateur)
{
    // cette fonction permet d'ajouter un film au panier
    // Entrée: id du film
    //         id de l'utilisateur
    // Sortie: true si l'ajout s'est bien passé
    //         false si l'ajout n'a pas pu se faire
    global $conn;
    $query = "SELECT `panier` FROM `utilisateurs` WHERE `id` = '" . $id_utilisateur . "'";
    $res = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($res);
    $panier = $row['panier'];
    $tableau_panier = explode(",", $panier);
    if (in_array($id_film, $tableau_panier)) {
        echo "Le film est déjà dans le panier";
    } else {
        $panier = $panier . "," . $id_film;
        $query = "UPDATE `utilisateurs` SET `panier` = '" . $panier . "' WHERE `id` = '" . $id_utilisateur . "'";
        $res = mysqli_query($conn, $query);
        if ($res) {
            echo "Ok! Le film a été ajouté au panier";
        } else {
            echo "Une erreur est survenue";
        }
    }
}

function supprimer_un_film_du_panier($id_film, $id_utilisateur)
{
    // cette fonction permet de supprimer un film du panier
    // Entrée: id du film
    //         id de l'utilisateur
    // Sortie: true si la suppression s'est bien passée
    //         false si la suppression n'a pas pu se faire
    global $conn;
    $query = "SELECT `panier` FROM `utilisateurs` WHERE `id` = '" . $id_utilisateur . "'";
    $res = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($res);
    $panier = $row['panier'];
    $tableau_panier_temp = explode(",", $panier);
    $tableau_panier = array();
    foreach ($tableau_panier_temp as $un_id_film) {
        if ($un_id_film != 0) {
            $tableau_panier[] = intval($un_id_film);
        }
    }
    if (in_array($id_film, $tableau_panier)) {
        $tableau_panier = array_diff($tableau_panier, array($id_film));
        $panier = implode(",", $tableau_panier);
        $query = "UPDATE `utilisateurs` SET `panier` = '" . $panier . "' WHERE `id` = '" . $id_utilisateur . "'";
        $res = mysqli_query($conn, $query);
        if ($res) {
            echo "Ok! Le film a été supprimé du panier";
        } else {
            echo "Une erreur est survenue";
        }
    } else {
        echo "Le film n'est pas dans le panier";
    }
}

function recherche_liste_film($text)
{
    // cette fonction permet de rechercher un film
    // Entrée: texte à rechercher
    // Sortie: tableau_de_recherche[id][id]
    //                              [titre]
    //                              [image]
    //                              [prix]
    global $conn;
    $query = "SELECT * FROM `videos` WHERE `titre` LIKE '%" . $text . "%'";
    $res = mysqli_query($conn, $query);
    $tableau_de_recherche = array();
    while ($row = mysqli_fetch_assoc($res)) {
        $tableau_de_recherche[$row['id']]['id'] = $row['id'];
        $tableau_de_recherche[$row['id']]['titre'] = $row['titre'];
        $tableau_de_recherche[$row['id']]['image'] = $row['image'];
        $tableau_de_recherche[$row['id']]['prix'] = $row['prix'];
    }
    $query = "SELECT * FROM `videos` WHERE `realisateur` LIKE '%" . $text . "%'";
    $res = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($res)) {
        $tableau_de_recherche[$row['id']]['id'] = $row['id'];
        $tableau_de_recherche[$row['id']]['titre'] = $row['titre'];
        $tableau_de_recherche[$row['id']]['image'] = $row['image'];
        $tableau_de_recherche[$row['id']]['prix'] = $row['prix'];
    }
    $query = "SELECT * FROM `videos` WHERE `cathegorie` LIKE '%" . $text . "%'";
    $res = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_assoc($res)) {
        $tableau_de_recherche[$row['id']]['id'] = $row['id'];
        $tableau_de_recherche[$row['id']]['titre'] = $row['titre'];
        $tableau_de_recherche[$row['id']]['image'] = $row['image'];
        $tableau_de_recherche[$row['id']]['prix'] = $row['prix'];
    }
    return $tableau_de_recherche;
}

function achat_du_panier($id_utilisateur)
{
    // cette fonction permet de vider le panier
    // Entrée: id de l'utilisateur
    // Sortie: true si le panier a été vidé
    //         false si le panier n'a pas pu être vidé
    global $conn;
    $query = "SELECT `panier` FROM `utilisateurs` WHERE `id` = '" . $id_utilisateur . "'";
    $res = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($res);
    $panier = $row['panier'];
    $tableau_panier_temp = explode(",", $panier);
    $tableau_panier = array();
    foreach ($tableau_panier_temp as $un_id_film) {
        if (intval($un_id_film) != 0) {
            $tableau_panier[] = intval($un_id_film);
        }
    }
    $prix_panier = 0;
    foreach ($tableau_panier as $un_id_film) {
        $query = "SELECT `prix` FROM `videos` WHERE `id` = '" . $un_id_film . "'";
        $res = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($res);
        $prix_panier = $prix_panier + $row['prix'];
    }
    $query = "SELECT `argent` FROM `utilisateurs` WHERE `id` = '" . $id_utilisateur . "'";
    $res = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($res);
    $argent = $row['argent'];
    if ($argent >= $prix_panier) {
        $argent = $argent - $prix_panier;
        $query = "UPDATE `utilisateurs` SET `argent` = '" . $argent . "' WHERE `id` = '" . $id_utilisateur . "'";
        $res = mysqli_query($conn, $query);
        if ($res) {
            $query = "UPDATE `utilisateurs` SET `panier` = '' WHERE `id` = '" . $id_utilisateur . "'";
            $res = mysqli_query($conn, $query);
            $achats = implode(",", $tableau_panier);
            $query = "SELECT `achats` FROM `utilisateurs` WHERE `id` = '" . $id_utilisateur . "'";
            $res = mysqli_query($conn, $query);
            $row = mysqli_fetch_assoc($res);
            $achats = $achats . "," . $row['achats'];
            $query = "UPDATE `utilisateurs` SET `achats` = '" . $achats . "' WHERE `id` = '" . $id_utilisateur . "'";
            $res = mysqli_query($conn, $query);
            if ($res) {
                echo "Ok! Le panier a été vidé";
            } else {
                echo "Une erreur est survenue";
            }
        } else {
            echo "Une erreur est survenue";
        }
    } else {
        echo "Vous n'avez pas assez d'argent";
    }

}

function recuperer_les_achats($id_utilisateur)
{
    // cette fonction permet de récupérer les achats d'un utilisateur
    // Entrée: id de l'utilisateur
    // Sortie: tableau_achats[id][id]
    //                         [titre]
    //                         [image]
    //                         [telechargement]
    global $conn;
    $query = "SELECT `achats` FROM `utilisateurs` WHERE `id` = '" . $id_utilisateur . "'";
    $res = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($res);
    if ($row['achats'] == "") {
        return array();
    }
    $achats = $row['achats'];
    $tableau_achats_temp = explode(",", $achats);
    $tableau_achats = array();
    foreach ($tableau_achats_temp as $un_id_film) {
        if (intval($un_id_film) != 0) {
            $tableau_achats[] = intval($un_id_film);
        }
    }
    $tableau_achats = array_unique($tableau_achats);
    $tableau_achats = array_reverse($tableau_achats);
    $tableau_achats_final = array();
    foreach ($tableau_achats as $un_id_film) {
        $query = "SELECT * FROM `videos` WHERE `id` = '" . $un_id_film . "'";
        $res = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($res);
        $tableau_achats_final[$row['id']]['id'] = $row['id'];
        $tableau_achats_final[$row['id']]['titre'] = $row['titre'];
        $tableau_achats_final[$row['id']]['image'] = $row['image'];
        $tableau_achats_final[$row['id']]['telechargement'] = $row['telechargement'];
    }
    return $tableau_achats_final;
}

function changer_de_code($id_utilisateur, $nouveau_code)
{
    $Code = hash('sha256', $nouveau_code);
    global $conn;
    $query = "UPDATE `utilisateurs` SET `code` = '" . $Code . "' WHERE `id` = '" . $id_utilisateur . "'";
    $res = mysqli_query($conn, $query);
    if ($res) {
        echo "Ok! Le code a été changé";
    } else {
        echo "Une erreur est survenue";
    }
}

function supprimer_un_utilisateur($id_utilisateur)
{
    global $conn;
    $query = "DELETE FROM `utilisateurs` WHERE `id` = '" . $id_utilisateur . "'";
    $res = mysqli_query($conn, $query);
    if ($res) {
        echo "Ok! L'utilisateur a été supprimé";
    } else {
        echo "Une erreur est survenue";
    }
}
?>