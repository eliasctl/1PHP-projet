<?php
require('config.php');

$query = "SELECT * FROM `videos`";
$result = mysqli_query($conn,$query) or die(mysql_error());
var_dump($query);
$test = mysqli_fetch_assoc($result);
var_dump($test);
?>