<?php
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

if ($action != 'btn') {
    echo "haiiiillll";
    exit();
}

switch ($action) {
    case 'btn':
        echo "OK blabla!";
        break;
}
?>