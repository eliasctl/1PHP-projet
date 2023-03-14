<?php
$page = 'achats';
require('config.php');
require('nav.php');
?>

<?php

$AfficherFormulaire=1;
if(isset($_POST['pseudo'],$_POST['code'],$_POST['email'])){
    if (empty($_POST['pseudo']) || empty($_POST['code']) || empty($_POST['email'])) {
        echo "Veuillez remplir tous les champs.";
    } else {
        $Pseudo=htmlentities($_POST['pseudo'],ENT_QUOTES,"UTF-8");
        $Email=htmlentities($_POST['email'],ENT_QUOTES,"UTF-8");
        $Code=hash('sha256', $_POST['code']);
        if(!preg_match("#^[a-z0-9]+$#",$Pseudo)){
            echo "Le Pseudo doit être renseigné en lettres minuscules sans accents, sans caractères spéciaux.";
        } elseif(strlen($Pseudo)<3){
            echo "Le pseudo est trop court, il doit faire au moins 3 caractères.";
        } elseif(!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#",$Email)){
            echo "L'adresse email n'est pas valide.";
        } elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM utilisateurs WHERE email='".$Email."'"))==1){
            echo "Cette email est déjà utilisé.";
        } elseif(strlen($Pseudo)>25){
            echo "Le pseudo est trop long, il dépasse 25 caractères.";
        } elseif(mysqli_num_rows(mysqli_query($conn,"SELECT * FROM utilisateurs WHERE pseudo='".$Pseudo."'"))==1){
            echo "Ce pseudo est déjà utilisé.";
        } else {
            if(!mysqli_query($conn,"INSERT INTO utilisateurs SET pseudo='".$Pseudo."', code='".$Code."', email='".$Email."', type='user'")){
                echo "Une erreur s'est produite: ".mysqli_error($conn);
            } else {
                echo "Vous êtes inscrit avec succès!";
                echo "Cliquez ici pour vous <a href='connexion.php'>connecter</a>";
                $AfficherFormulaire=0;
            }
        }
    }
}
if($AfficherFormulaire==1){
    ?>
    <h1>Inscription</h1>
    <br/>
    <form method="post" action="achats.php">
        Email : <input type="text" name="email">
        <br />
        Pseudo : <input type="text" name="pseudo">
        <br />
        Mot de passe : <input type="password" name="code">
        <br />
        <input type="submit" value="S'inscrire">
    </form>
    <?php
}
?>