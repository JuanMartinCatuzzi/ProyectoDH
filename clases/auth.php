<?php
class Auth
{

  function __construct()
  {
    session_start();
  }

  public function LoguearUsuario($email){
    $_SESSION["email"] = $email;
  }

  public function UsuarioLogeado(){
     return isset($_SESSION["email"]);
  }


}
