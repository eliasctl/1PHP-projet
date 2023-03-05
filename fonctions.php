<?php

function doit_etre_connecte()
{
    // cette fonction permet de vérifier si une personne est connecté
    // si elle n'est pas connecté on la renvoie sur la page de connexion
    if (!isset($_SESSION["pseudo"])) {
        header("Location: connexion.php");
        exit();
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

    global $conn;
    $query = "SELECT * FROM `utilisateurs`";
    $res = mysqli_query($conn, $query);
    $tableau_de_utilisateurs = array();
    while ($row = mysqli_fetch_assoc($res)) {
        $tableau_de_utilisateurs[$row['id']]['pseudo'] = $row['pseudo'];
        $tableau_de_utilisateurs[$row['id']]['email'] = $row['email'];
        $tableau_de_utilisateurs[$row['id']]['type'] = $row['type'];
        $tableau_de_utilisateurs[$row['id']]['code'] = $row['code'];
    }
    return $tableau_de_utilisateurs;
}

?>