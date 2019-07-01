<?php

class Validador {

  public static function ValidarDatos ($datos){
    global $DBAll;
    $errores=[];
    $DatosCorrectos=[];
    foreach ($datos as $posicion => $valor) {
    if (!is_array($datos[$posicion]) && ($posicion!="password" || $posicion!="password-repeat")){
      $DatosCorrectos[$posicion]= trim($valor);
    }
  }
  $DatosCorrectos["password"]=$datos["password"];
  $DatosCorrectos["password-repeat"]=$datos["password-repeat"];
    if ($DatosCorrectos["name"]==""){
      $errores["name"]="Completar el campo.";
    }
    elseif (ctype_alpha($DatosCorrectos["name"])==false) {
      $errores["name"]="Completar el campo sólo con caracteres alfabéticos.";
    }else{
  //DEJAR COMPLETO EL CAMPO SI HAY ERRORES EN LOS SIGUIENTES.
  }
  if ($DatosCorrectos["surname"]==""){
    $errores["surname"]="Completar el campo.";
  }
  elseif (ctype_alpha($DatosCorrectos["name"])==false) {
    $errores["surname"]="Completar el campo sólo con caracteres alfabéticos.";
  }else{
  //DEJAR COMPLETO EL CAMPO SI HAY ERRORES EN LOS SIGUIENTES.
  }
  if ($DatosCorrectos["email"]==""){
    $errores["email"]="Completar el campo.";
  }
  elseif(!filter_var($DatosCorrectos["email"],FILTER_VALIDATE_EMAIL)){
    $errores["email"]="Completar el campo con un formato email";
  }
  // CORROBORAR QUE NO SE REPITA
  //DEJAR CAMPO COMPLETO SI HAY ERRORES EN LOS SIGUIENTES.
  if ($DatosCorrectos["password"]==""){
    $errores["password"]="Completar el campo";
  }
  //PONER CONDICIONES
  //DEJAR CAMPO COMPLETO SI HAY ERRORES EN LOS SIGUIENTES.
  if ($DatosCorrectos["password-repeat"]!=$DatosCorrectos["password"]){
    $errores["password-repeat"]="El campo no coincide con Contraseña";
  }
  if (strlen ($DatosCorrectos["bDate"])==0) {
    $errores["bDate"]="Completar el campo";
  }

  //DEJAR CAMPO COMPLETO SI HAY ERRORES EN LOS SIGUIENTES.
  if ($DatosCorrectos["ocupation"]==""){
    $errores["ocupation"]="Seleccionar una ocupación";
  }
  //DEJAR CAMPO COMPLETO SI HAY ERRORES EN LOS SIGUIENTES.
  return $errores;
  }


  public static function ValidarLogin($datos){
    global $DBAll;
    $errores=[];
  if (strlen($datos["email"])==0) {
    $errores["email"]="El campo no debe estar vacío";
  }
  elseif (!filter_var($datos["email"], FILTER_VALIDATE_EMAIL)) {
    $errores["email"]="Completar el campo con formato email";
  }
  elseif (!ExisteUsuario($datos["email"])){
    $errores["email"]="El usuario no existe";
  }
  if (strlen($datos["password"])==0) {
    $errores["password"]="El campo no debe estar vacío";
  }
  else {
    $usuario=BuscarUsuario($datos["email"]);
    if (!password_verify($datos["password"], $usuario["password"])){
      $errores["password"]="La contraseña es incorrecta";
    }
  }
    return $errores;
  }
}
