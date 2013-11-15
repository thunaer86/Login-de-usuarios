<?php
header("Cache-Control: no-store, no-cache, must-revalidate");
include("verifica.php");
session_start();
session_destroy();
header('Location: index.php');
?>