<?php
session_start();
session_destroy();
setcookie("login",false,time()-100);
header("Location:index.php");
?>