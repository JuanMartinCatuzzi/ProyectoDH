<?php
session_start();
include_once "pdo.php";

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

function GenerarId(){
  if (!file_exists ("db.json")) {
    $json="";
  }
  else{
    $json=file_get_contents("db.json");
  }
  if ($json=="") {
    return 1;
  }
  $array=json_decode($json, true);
  $UltimoUsuario=array_pop($array["usuarios"]);
  $NuevoId= $UltimoUsuario["id"]+1;
  return $NuevoId;
}

function ArmarUsuario(){
return  [
    //"id"=>GenerarId(),
    "nombre"=>trim($_POST["name"]),
    "apellido"=>trim($_POST["surname"]),
    "email"=>trim($_POST["email"]),
    "password"=>password_hash($_POST["password"], PASSWORD_DEFAULT),
    "bDate"=>trim($_POST["bDate"]),
    "ocupation"=>$_POST["ocupation"]
  ];
}
function GuardarUsuario($usuario){
//if (!file_exists("db.json")){
//  $json="";
//}
//else {
//  $json=file_get_contents("db.json");
//}
//$array=json_decode($json, true);
//$array["usuarios"][]=$usuario;
//$array=json_encode($array, JSON_PRETTY_PRINT);
//file_put_contents("db.json", $array);
global $db;
$nameOK=$usuario["nombre"];
$surnameOK=$usuario["apellido"];
$emailOK=$usuario["email"];
$bDateOK=$usuario["bDate"];
$passwordOK=$usuario["password"];
$ocupationOK=$usuario["ocupation"];

$data=$db->prepare("INSERT INTO usuarios VALUES(default, :nombre, :apellido, :email, :password, :bDate, :ocupation)");
$data->bindValue(":nombre", $nameOK);
$data->bindValue(":apellido", $surnameOK);
$data->bindValue(":email", $emailOK);
$data->bindValue(":bDate", $bDateOK);
$data->bindValue(":password", $passwordOK);
$data->bindValue(":ocupation", $ocupationOK);
$data->execute();

}
////LOGIN
function BuscarUsuario($email){
//  $json=file_get_contents("db.json");
//  $array=json_decode($json, true);
//  //Buscar en la tabla
//  foreach ($array["usuarios"] as $usuario) {
//    if($usuario["email"]==$email){
//      return $usuario;
//    }
//  }
//  return null;
global $db;
$data=$db->prepare("SELECT * FROM usuarios WHERE email = :email");
$data->bindValue(":email", $email);
$data->execute();
$usuario=$data->fetch(PDO::FETCH_ASSOC);
if ($usuario){
  return $usuario;
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
  if (isset($_POST["mantener"])) {
    setcookie("mantenerme",$email,time()+3600);
  }
}

function UsuarioLogeado(){
  return isset($_SESSION["email"]);
}
?>
