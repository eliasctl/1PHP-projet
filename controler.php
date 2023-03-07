<?php
if (isset($_POST['action'])) {
    $action = $_POST['action'];
}

if ($action != 'btn') {
    echo "haiiiillll";
    exit();
}

switch ($action) {
    case 'btn':
        echo "OK blabla";
        break;
}
?>