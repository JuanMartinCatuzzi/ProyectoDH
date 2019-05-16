<?php
session_start();

function ValidarDatos ($datos){
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
if (strlen ($DatosCorrectos["age"])==0) {
  $errores["age"]="Completar el campo";
}elseif (ctype_digit($DatosCorrectos["age"])==false) {
  $errores["age"]="El campo debe ser completo con números.";
}
//DEJAR CAMPO COMPLETO SI HAY ERRORES EN LOS SIGUIENTES.
if ($DatosCorrectos["ocupacion"]==""){
  $errores["ocupacion"]="Seleccionar una ocupación";
}
//DEJAR CAMPO COMPLETO SI HAY ERRORES EN LOS SIGUIENTES.
return $errores;
}
function ArmarUsuario(){
return  [
    "nombre"=>trim($_POST["name"]),
    "apellido"=>trim($_POST["surname"]),
    "email"=>trim($_POST["email"]),
    "password"=>password_hash($_POST["password"], PASSWORD_DEFAULT),
    "age"=>trim($_POST["age"]),
    "ocupacion"=>$_POST["ocupacion"]
  ];
}
function GuardarUsuario($usuario){
if (!file_exists("db.json")){
  $json="";
}
else {
  $json=file_get_contents("db.json");
}
$array=json_decode($json, true);
$array["usuarios"][]=$usuario;
$array=json_encode($array, JSON_PRETTY_PRINT);
file_put_contents("db.json", $array);
}
//LOGIN
function BuscarUsuario($email){
  $json=file_get_contents("db.json");
  $array=json_decode($json, true);
  //Buscar en la tabla
  foreach ($array["usuarios"] as $usuario) {
    if($usuario["email"]==$email){
      return $usuario;
    }
  }
  return null;
}

function ExisteUsuario($email){
  return BuscarUsuario($email)!== null;
}

function ValidarLogin($datos){
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

function LogearUsuario($email){
  $_SESSION["email"]=$email;
}

function UsuarioLogeado(){
  return isset($_SESSION["email"]);
}
?>
