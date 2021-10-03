<?php
session_start();
unset($_SESSION['Email']);
unset($_SESSION['password']);
session_destroy();
$_SESSION=array();
echo "<h3>ACCESS FORBIDDEN!</h3>";
?>