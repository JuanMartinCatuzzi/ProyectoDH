<?php
include_once "functions.php";
session_destroy();
setcookie("mantenerme",null,-1);
header ("Location:home.php");
 ?>
