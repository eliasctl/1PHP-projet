<?php
function tableau($tableau){
    echo "<table>";
    foreach($tableau as $key => $value){
        echo "<tr>";
        echo "<td>".$key."</td>";
        echo "<td>".$value."</td>";
        echo "</tr>";
    }
    echo "</table>";
}

?>