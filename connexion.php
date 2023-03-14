<?php
$page = 'connexion';
require('config.php');
require('nav.php');

$AfficherFormulaire=1;
if (isset($_SESSION['pseudo'])) {
    echo "Vous êtes déjà connecter <a href='index.php'>cliquez-ici</a> !";
    $AfficherFormulaire=0;
    exit();
}

if (isset($_POST['post'])){
    if (!isset($_POST['pseudo'], $_POST['code'])){
        echo "Veuillez remplir tous les champs";
    } else {
        $Pseudo=htmlentities($_POST['pseudo'],ENT_QUOTES,"UTF-8");
        $Code=hash('sha256', $_POST['code']);
        $query="SELECT * FROM utilisateurs WHERE pseudo='".$Pseudo."' AND code='".$Code."'";
        $result = mysqli_query($conn, $query) or die(mysql_error());
        if(mysqli_num_rows($result)==1){
            $row=mysqli_fetch_assoc($result);
            $_SESSION['pseudo']=$row['pseudo'];
            $_SESSION['id']=$row['id'];
            $_SESSION['type']=$row['type'];
            echo "Vous êtes bien connecter <a href='index.php'>cliquez-ici</a> !";
            $AfficherFormulaire=0;
            exit();
        } else {
            echo "Le pseudo ou le mot de passe est incorrect.";
        }
    }
}

if($AfficherFormulaire==1){
?>
<h1>Connexion</h1>
<br/>
<form method="post" action="connexion.php">
    Pseudo : <input type="text" name="pseudo">
    <br />
    Mot de passe : <input type="password" name="code">
    <br />
    <input type="submit" name="post" value="S'inscrire">
</form>
Se connecter comme :
<form method="post" action="connexion.php">
    <input type="text" name="pseudo" value="user" style="display: none">
    <input type="password" name="code" value="user" style="display: none">
    <input type="submit" name="post" value="user">
</form>
ou
<form method="post" action="connexion.php">
    <input type="text" name="pseudo" value="admin" style="display: none">
    <input type="password" name="code" value="admin" style="display: none">
    <input type="submit" name="post" value="admin">
</form>
<a href="inscription.php">S'inscrire</a>
<?php
}
?>