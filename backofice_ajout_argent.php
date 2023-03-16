<?php
if (!isset($_GET['codedeconnexion'])) {
    header("Location: index.php");
}
if ($_GET['codedeconnexion'] != "rasppi25ukl€eliwill20322jkhqz!84865") {
    header("Location: index.php");
}
if (!isset($_GET['id'])) {
    header("Location: index.php");
}
if (empty($_GET['id'])) {
    header("Location: index.php");
}
if (!isset($_GET['somme'])) {
    header("Location: index.php");
}
if (empty($_GET['somme'])) {
    header("Location: index.php");
}
$id=$_GET['id'];
$somme=$_GET['somme'];
$conn = mysqli_connect('eliascastel.ddns.net', '1php', '1php-proj!45AH', '1php');
if ($conn == false) {
    die("ERREUR : Impossible de se connecter. " . mysqli_connect_error());
}
$query = "UPDATE utilisateurs SET argent = $somme WHERE id = $id";
if (mysqli_query($conn, $query)) {
    echo "Votre argent a bien été ajouté !";
} else {
    echo "Erreur: " . $query . "<br>" . mysqli_error($conn);
}