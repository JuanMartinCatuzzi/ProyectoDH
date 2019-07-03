<?php
session_start();
session_destroy();
setcookie("mantenerme",null,-1);
header ("Location:home.php");
 ?>
