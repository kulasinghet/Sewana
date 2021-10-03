<?php
session_start();
unset($_SESSION['Email']);
unset($_SESSION['password']);
session_destroy();
$_SESSION=array();
header("Location: /Sewana/index.php");
?>