<?php
session_start();
unset($_SESSION['publisherid']);
session_destroy();
header("Location: index.php");
?>

