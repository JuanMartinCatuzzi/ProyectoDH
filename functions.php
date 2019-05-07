<?php
function ValidarDatos ($_POST){
  $errores=[];
  if ($_POST["name"]==""){
    $errores["name"]="Completar el campo.";
  }
  elseif (ctype_alpha($_POST["name"])==false) {
    $errores["name"]="Completar el campo sólo con caracteres alfabéticos.";
  }else{
//DEJAR COMPLETO EL CAMPO SI HAY ERRORES EN LOS SIGUIENTES.
}
if ($_POST["surname"]==""){
  $errores["surname"]="Completar el campo.";
}
elseif (ctype_alpha($_POST["name"])==false) {
  $errores["surname"]="Completar el campo sólo con caracteres alfabéticos.";
}else{
//DEJAR COMPLETO EL CAMPO SI HAY ERRORES EN LOS SIGUIENTES.
}
if ($_POST["username"]==""){
  $errores["username"]="Completar el campo";
}
// CORROBORAR QUE NO SE REPITA
if ($_POST["email"]==""){
  $errores["email"]="Completar el campo.";
}
elseif(!filter_var($_POST["email"],FILTER_VALIDATE_EMAIL)){
  $errores["email"]="Completar el campo con un formato email";
}
// CORROBORAR QUE NO SE REPITA
//DEJAR CAMPO COMPLETO SI HAY ERRORES EN LOS SIGUIENTES.
if ($_POST["password"]==""){
  $errores["password"]="Completar el campo";
}
//PONER CONDICIONES
//DEJAR CAMPO COMPLETO SI HAY ERRORES EN LOS SIGUIENTES.
if ($_POST["password-repeat"]!=$_POST["password"]){
  $errores["password-repeat"]="El campo no coincide con Contraseña";
}
if ($_POST["edad"]=="") {
  $errores["edad"]="Completar el campo";
}elseif (ctype_digit($_POST["edad"])==false) {
  $errores["edad"]="El campo debe ser completo con números.";
}
//DEJAR CAMPO COMPLETO SI HAY ERRORES EN LOS SIGUIENTES.
if ($_POST["ocupacion"]=="Seleccionar"){
  $errores["ocupacion"]="Seleccionar una ocupación";
}
//DEJAR CAMPO COMPLETO SI HAY ERRORES EN LOS SIGUIENTES.
}

?>
