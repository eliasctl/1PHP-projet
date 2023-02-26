<?php

function doit_etre_connecte(){
    // cette fonction permet de vérifier si une personne est connecté
    // si elle n'est pas connecté on la renvoie sur la page de connexion
    if(!isset($_SESSION["pseudo"])){
        header("Location: connexion.php");
        exit(); 
    }
}

function doit_etre_admin(){
    // on vérifie si la personne est admin pour lui autoriser l'accès à la page
    // si elle ne l'est pas alors on affiche un popup alert et redirection vers la page d'accueil
    if($_SESSION["type"] !== 'admin'){
        echo "<script type='text/javascript'>alert('Cette page est réservée aux administrateurs'); window.location.href='index.php';</script>";
    }
}


?>