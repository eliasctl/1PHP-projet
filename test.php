<?php
    session_start();
    require('config.php');
    $liste = array();
    foreach(recuperer_les_videos() as $id => $video){
        if ($video['titre'] == "Kung Fu Panda"){
            $liste[] = $id;
        }
    }
    var_dump($liste);

?>