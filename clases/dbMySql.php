<?php

class DbMysql extends Db
{
  public $connection;

  function __construct()
  {
    //Gestionar la conexión a DB
    $dsn = "mysql:host=localhost;dbname=bookish;port=3306";
    //$dsn = "mysql:host=127.0.0.1;dbname=movies_db;port=3306";
    $user = "root";
    $pass = "root";

    //$db = new PDO($dsn, $user, $pass);

    try {
      $this->connection = new PDO($dsn, $user, $pass);
      //le dice a la db que muestre los errores en PHP.
      $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      //echo "todo bien.";
    } catch (\Exception $e) {
      echo "Hubo un error. <br>";
      echo $e->getMessage();
      exit;
    }
  }

  function GuardarUsuario(Usuario $usuario){
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
  global $connection;
  $nameOK=$usuario->getName();
  $surnameOK=$usuario->getSurname();
  $emailOK=$usuario->getEmail();
  $bDateOK=$usuario->getbDate();
  $passwordOK=$usuario->getPassword();
  $ocupationOK=$usuario->getOcupation();

  $data=$this->connection->prepare("INSERT INTO usuarios VALUES(default, :name, :surname, :email, :password, :bDate, :ocupation)");
  $data->bindValue(":name", $nameOK);
  $data->bindValue(":surname", $surnameOK);
  $data->bindValue(":email", $emailOK);
  $data->bindValue(":bDate", $bDateOK);
  $data->bindValue(":password", $passwordOK);
  $data->bindValue(":ocupation", $ocupationOK);
  $data->execute();

  }

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
  global $connection;
  $data=$this->connection->prepare("SELECT * FROM usuarios WHERE email = :email");
  $data->bindValue(":email", $email);
  $data->execute();
  $usuario=$data->fetch(PDO::FETCH_ASSOC);
  if ($usuario){
    $usuario= new Usuario ($usuario);
    return $usuario;
  }
  return null;
  }

  function ExisteUsuario($email){
    return $this->BuscarUsuario($email)!== null;
  }

  function UsuarioLogeado(){
    if (isset($_SESSION["email"])) {
      $usuario= $this->BuscarUsuario($_SESSION["email"]);
      return $usuario;
    }
    else {
      return false;
    }
  }
  }
