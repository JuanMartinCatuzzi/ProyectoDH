<?php
/**
 * Conexión y gestión de datos en Json
 */
class DbJson extends Db
{
  private $json;

  function __construct()
  {
    if(!file_exists("db.json")){
      $this->json = "";
    } else {
      $this->json = file_get_contents('db.json');
    }

  }

  function GenerarId(){
    if (!file_exists ('db.json')) {
      $json="";
    }
    else{
      $json=file_get_contents('db.json');
    }
    if ($json=="") {
      return 1;
    }
    $array=json_decode($json, true);
    $UltimoUsuario=array_pop($array["usuarios"]);
    $NuevoId= $UltimoUsuario["id"]+1;
    return $NuevoId;
  }


  public function GuardarUsuario(Usuario $usuario) //No ovlidar parámetros. También se heredan
  {
      $array = json_decode($this->json, true);

      $newUsuario = [
        "id" => $this->GenerarId(),
        "name" => $usuario->getName(),
        "surname"=>$usuario->getSurname(),
        "email" => $usuario->getEmail(),
        "password" => $usuario->getPassword(),
        "bDate" => $usuario->getbDate(),
        "ocupation"=>$usuario->getOcupation()
      ];
      $array["usuarios"][] = $newUsuario;
      $array = json_encode($array, JSON_PRETTY_PRINT);

      file_put_contents('db.json', $array);
  }

  public function BuscarUsuario($email)
  {
    $array = json_decode($this->json, true);

    foreach($array["usuarios"] as $usuario){
      if($usuario["email"] == $email){
        return $usuario = new Usuario($usuario);
      }
    }
    return null;
  }

  public function ExisteUsuario($email)
  {
    return $this->BuscarUsuario($email) !== null;
  }

  public function UsuarioLogeado()
  {
    // Si está logueado trae los datos del usuario
    if(isset($_SESSION["email"])) {
      $usuario = $this->BuscarUsuario($_SESSION["email"]);
      return $usuario;
    } else {
      // Sino: FALSE
      return false;
    }
  }
}
