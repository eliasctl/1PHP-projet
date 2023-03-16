<?php
if (!isset($_POST['codedeconnexion'])) {
    echo "Erreur de connexion";
}
if ($_POST['codedeconnexion'] != "rasppi25ukl€eliwill20322jkhqz!84865") {
    echo "Erreur de connexion";
}
if (!isset($_POST['id'])) {
    echo "Erreur de connexion";
}
if (empty($_POST['id'])) {
    echo "Erreur de connexion";
}
if (!isset($_POST['somme'])) {
    echo "Erreur de connexion";
}
if (empty($_POST['somme'])) {
    echo "Erreur de connexion";
}
$id=$_POST['id'];
$somme=$_POST['somme'];
$conn = mysqli_connect('eliascastel.ddns.net', '1php', '1php-proj!45AH', '1php');
if ($conn == false) {
    die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
}
$query = "UPDATE utilisateurs SET argent = $somme WHERE id = $id";
if (mysqli_query($conn, $query)) {
    echo "Ok! L'argent a bien été modifiée ! €".$somme;
} else {
    echo "Erreur: " . $query . "<br>" . mysqli_error($conn);
}