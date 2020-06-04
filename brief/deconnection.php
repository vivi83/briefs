<?php
session_start();
$_SESSION = array();
session_destroy();
header("Localisation: index.php");
?>